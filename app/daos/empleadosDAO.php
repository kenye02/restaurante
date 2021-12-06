<?php

namespace App\Daos;

use App\Interfaces\Db\IEmpleados;
use App\Models\EmpleadosModel;
use Libs\Dao;

class EmpleadosDAO extends Dao implements IEmpleados
{
    public function __construct()
    {
        $this->loadEloquent();
    }
    public function getAll(bool $status)
    {
        $data=EmpleadosModel::where('estado',$status)->get();
        return $data;
    }
    public function get(int $id)
    {
        $data=EmpleadosModel::find($id);
        if($data==null){
            $data=new EmpleadosModel();
        }

        return $data;
    }
    public function create($object)
    {
        $empleados=new EmpleadosModel();
        $empleados->nombre=$object->nombre;
        $empleados->apellidos=$object->apellidos;
        $empleados->fnacimiento=$object->fnacimiento;
        $empleados->dni=$object->dni;
        $empleados->sexo=$object->sexo;
        $empleados->estadocivil=$object->estadocivil;
        $empleados->telefono=$object->telefono;
        $empleados->correo=$object->correo;
        $empleados->direccion=$object->direccion;
        $empleados->cargo=$object->cargo;
        $empleados->estado=$object->estado;

        return $empleados->save();
       
    }
    public function update($object)
    {
        $empleados= EmpleadosModel::find($object->empleadoid);
        $empleados->nombre=$object->nombre;
        $empleados->apellidos=$object->apellidos;
        $empleados->fnacimiento=$object->fnacimiento;
        $empleados->dni=$object->dni;
        $empleados->sexo=$object->sexo;
        $empleados->estadocivil=$object->estadocivil;
        $empleados->telefono=$object->telefono;
        $empleados->correo=$object->correo;
        $empleados->direccion=$object->direccion;
        $empleados->cargo=$object->cargo;
        $empleados->estado=$object->estado;

        return $empleados->save();
    }
    public function delete(int $id)
    {
        $empleados= EmpleadosModel::find($id);
        return $empleados->delete();
    }

    public function combo()
    {
        $data= EmpleadosModel::select('empleadoid','nombre','apellidos')->where('estado',1)->get();
        return $data;
    }

}
