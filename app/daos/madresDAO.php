<?php

namespace App\Daos;

use App\Interfaces\Db\IMadres;
use App\Models\MadresModel;
use Libs\Dao;

class MadresDAO extends Dao implements IMadres
{
    public function __construct()
    {
        $this->loadEloquent();
    }
    public function getAll(bool $status)
    {
        $data=MadresModel::where('estado',$status)->get();
        return $data;
    }
    public function get(int $id)
    {
        $data=MadresModel::find($id);
        if($data==null){
            $data=new MadresModel();
        }

        return $data;
    }
    public function create($object)
    {
        $madres=new MadresModel();
        $madres->nombre=$object->nombre;
        $madres->apellidopaterno=$object->apellidopaterno;
        $madres->apellidomaterno=$object->apellidomaterno;
        $madres->fnacimiento=$object->fnacimiento;
        $madres->gradodeinstruccion=$object->gradodeinstruccion;
        $madres->ocupacion=$object->ocupacion;
        $madres->dni=$object->dni;
        $madres->sexo=$object->sexo;
        $madres->estadocivil=$object->estadocivil;
        $madres->telefono=$object->telefono;
        $madres->correo=$object->correo;
        $madres->direccion=$object->direccion;
        $madres->estado=$object->estado;

        return $madres->save();
       
    }
    public function update($object)
    {
        $madres= MadresModel::find($object->madreid);
        $madres->nombre=$object->nombre;
        $madres->apellidopaterno=$object->apellidopaterno;
        $madres->apellidomaterno=$object->apellidomaterno;
        $madres->fnacimiento=$object->fnacimiento;
        $madres->gradodeinstruccion=$object->gradodeinstruccion;
        $madres->ocupacion=$object->ocupacion;
        $madres->dni=$object->dni;
        $madres->sexo=$object->sexo;
        $madres->estadocivil=$object->estadocivil;
        $madres->telefono=$object->telefono;
        $madres->correo=$object->correo;
        $madres->direccion=$object->direccion;
        $madres->estado=$object->estado;

        return $madres->save();
    }
    public function delete(int $id)
    {
        $madres= MadresModel::find($id);
        return $madres->delete();
    }

    public function combo()
    {
        $data= MadresModel::select('madreid','nombre','apellidopaterno','apellidomaterno')->where('estado',1)->get();
        return $data;
    }

}
