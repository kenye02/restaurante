<?php

namespace App\Daos;

use App\Interfaces\Db\ITraslados;
use App\Models\TrasladosModel;
use Libs\Dao;

class TrasladosDAO extends Dao implements ITraslados
{
    public function __construct()
    {
        $this->loadEloquent();
    }
    public function getAll(bool $status)
    {
        $data=TrasladosModel::select(
            'traslados.trasladoid',
            'traslados.motivodetraslado',
            'traslados.codigomodular',
            'traslados.iededestino',
            'traslados.vbdetraslado',
            'traslados.updated_at',
            'alumnos.nombre as alumno',
            'alumnos.apellidopaterno as alumnoap',
            'alumnos.apellidomaterno as alumnoam'
        )
        ->join('alumnos','traslados.alumnoid','=','alumnos.alumnoid')
        ->where('traslados.estado',$status)
        ->get();

        return $data;
    }
    public function get(int $id)
    {
        $data=TrasladosModel::find($id);
        if($data==null){
            $data=new TrasladosModel();
        }

        return $data;
    }
    public function create($object)
    {
        $traslados=new TrasladosModel();
        $traslados->motivodetraslado=$object->motivodetraslado;
        $traslados->codigomodular=$object->codigomodular;
        $traslados->iededestino=$object->iededestino;
        $traslados->vbdetraslado=$object->vbdetraslado;
        $traslados->alumnoid=$object->alumnoid;
        $traslados->empleadoid=$object->empleadoid;
        $traslados->estado=$object->estado;

        return $traslados->save();
       
    }
    public function update($object)
    {
        $traslados= TrasladosModel::find($object->trasladoid);
        $traslados->motivodetraslado=$object->motivodetraslado;
        $traslados->codigomodular=$object->codigomodular;
        $traslados->iededestino=$object->iededestino;
        $traslados->vbdetraslado=$object->vbdetraslado;
        $traslados->alumnoid=$object->alumnoid;
        $traslados->empleadoid=$object->empleadoid;
        $traslados->estado=$object->estado;

        return $traslados->save();
    }
    public function delete(int $id)
    {
        $traslados= TrasladosModel::find($id);
        return $traslados->delete();
    }
}
