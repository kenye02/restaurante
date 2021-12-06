<?php

namespace App\Daos;

use App\Interfaces\Db\IApoderados;
use App\Models\ApoderadosModel;
use Libs\Dao;

class ApoderadosDAO extends Dao implements IApoderados
{
    public function __construct()
    {
        $this->loadEloquent();
    }
    public function getAll(bool $status)
    {
        $data=ApoderadosModel::where('estado',$status)->get();
        return $data;
    }
    public function get(int $id)
    {
        $data=ApoderadosModel::find($id);
        if($data==null){
            $data=new ApoderadosModel();
        }

        return $data;
    }
    public function create($object)
    {
        $apoderados=new ApoderadosModel();
        $apoderados->nombre=$object->nombre;
        $apoderados->apellidopaterno=$object->apellidopaterno;
        $apoderados->apellidomaterno=$object->apellidomaterno;
        $apoderados->fnacimiento=$object->fnacimiento;
        $apoderados->dni=$object->dni;
        $apoderados->sexo=$object->sexo;
        $apoderados->estadocivil=$object->estadocivil;
        $apoderados->gradodeinstruccion=$object->gradodeinstruccion;
        $apoderados->ocupacion=$object->ocupacion;
        $apoderados->telefono=$object->telefono;
        $apoderados->correo=$object->correo;
        $apoderados->direccion=$object->direccion;
        $apoderados->estado=$object->estado;

        return $apoderados->save();
       
    }
    public function update($object)
    {
        $apoderados= ApoderadosModel::find($object->apoderadoid);
        $apoderados->nombre=$object->nombre;
        $apoderados->apellidopaterno=$object->apellidopaterno;
        $apoderados->apellidomaterno=$object->apellidomaterno;
        $apoderados->fnacimiento=$object->fnacimiento;
        $apoderados->dni=$object->dni;
        $apoderados->sexo=$object->sexo;
        $apoderados->estadocivil=$object->estadocivil;
        $apoderados->gradodeinstruccion=$object->gradodeinstruccion;
        $apoderados->ocupacion=$object->ocupacion;
        $apoderados->telefono=$object->telefono;
        $apoderados->correo=$object->correo;
        $apoderados->direccion=$object->direccion;
        $apoderados->estado=$object->estado;

        return $apoderados->save();
    }
    public function delete(int $id)
    {
        $apoderados= ApoderadosModel::find($id);
        return $apoderados->delete();
    }

    public function combo()
    {
        $data= ApoderadosModel::select('apoderadoid','nombre','apellidopaterno','apellidomaterno')->where('estado',1)->get();
        return $data;
    }

}
