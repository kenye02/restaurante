<?php

namespace App\Daos;

use App\Interfaces\Db\IPadres;
use App\Models\PadresModel;
use Libs\Dao;

class PadresDAO extends Dao implements IPadres
{
    public function __construct()
    {
        $this->loadEloquent();
    }
    public function getAll(bool $status)
    {
        $data=PadresModel::where('estado',$status)->get();
        return $data;
    }
    public function get(int $id)
    {
        $data=PadresModel::find($id);
        if($data==null){
            $data=new PadresModel();
        }

        return $data;
    }
    public function create($object)
    {
        $padres=new PadresModel();
        $padres->nombre=$object->nombre;
        $padres->apellidopaterno=$object->apellidopaterno;
        $padres->apellidomaterno=$object->apellidomaterno;
        $padres->fnacimiento=$object->fnacimiento;
        $padres->gradodeinstruccion=$object->gradodeinstruccion;
        $padres->ocupacion=$object->ocupacion;
        $padres->dni=$object->dni;
        $padres->sexo=$object->sexo;
        $padres->estadocivil=$object->estadocivil;
        $padres->telefono=$object->telefono;
        $padres->correo=$object->correo;
        $padres->direccion=$object->direccion;
        $padres->estado=$object->estado;

        return $padres->save();
       
    }
    public function update($object)
    {
        $padres= PadresModel::find($object->padreid);
        $padres->nombre=$object->nombre;
        $padres->apellidopaterno=$object->apellidopaterno;
        $padres->apellidomaterno=$object->apellidomaterno;
        $padres->fnacimiento=$object->fnacimiento;
        $padres->gradodeinstruccion=$object->gradodeinstruccion;
        $padres->ocupacion=$object->ocupacion;
        $padres->dni=$object->dni;
        $padres->sexo=$object->sexo;
        $padres->estadocivil=$object->estadocivil;
        $padres->telefono=$object->telefono;
        $padres->correo=$object->correo;
        $padres->direccion=$object->direccion;
        $padres->estado=$object->estado;

        return $padres->save();
    }
    public function delete(int $id)
    {
        $padres= PadresModel::find($id);
        return $padres->delete();
    }

    public function combo()
    {
        $data= PadresModel::select('padreid','nombre','apellidopaterno','apellidomaterno')->where('estado',1)->get();
        return $data;
    }

}
