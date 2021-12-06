<?php

namespace App\Daos;

use App\Interfaces\Db\IAlumnos;
use App\Models\AlumnosModel;
use Libs\Dao;

class AlumnosDAO extends Dao implements IAlumnos
{
    public function __construct()
    {
        $this->loadEloquent();
    }
    public function getAll(bool $status)
    {
        $data=AlumnosModel::select(
            'alumnos.alumnoid',
            'alumnos.nombre',
            'alumnos.apellidopaterno',
            'alumnos.apellidomaterno',
            'alumnos.dni',
            'alumnos.updated_at',
            'padres.nombre as padre',
            'padres.apellidopaterno as padreap',
            'padres.apellidomaterno as padream',
            'madres.nombre as madre',
            'madres.apellidopaterno as madreap',
            'madres.apellidomaterno as madream',
            'apoderados.nombre as apoderado',
            'apoderados.apellidopaterno as apoderadoap',
            'apoderados.apellidomaterno as apoderadoam'
        )
        ->join('padres','alumnos.padreid','=','padres.padreid')
        ->join('madres','alumnos.madreid','=','madres.madreid')
        ->join('apoderados','alumnos.apoderadoid','=','apoderados.apoderadoid')
        ->where('alumnos.estado',$status)
        ->get();
        
        return $data;
    }
    public function get(int $id)
    {
        $data=AlumnosModel::find($id);
        if($data==null){
            $data=new AlumnosModel();
        }

        return $data;
    }
    public function create($object)
    {
        $alumnos=new AlumnosModel();
        $alumnos->nombre=$object->nombre;
        $alumnos->apellidopaterno=$object->apellidopaterno;
        $alumnos->apellidomaterno=$object->apellidomaterno;
        $alumnos->sexo=$object->sexo;
        $alumnos->fnacimiento=$object->fnacimiento;
        $alumnos->lugarnacimiento=$object->lugarnacimiento;
        $alumnos->tipodiscapacidad=$object->tipodiscapacidad;
        $alumnos->certificadodiscapacidad=$object->certificadodiscapacidad;
        $alumnos->dni=$object->dni;
        $alumnos->direccion=$object->direccion;
        $alumnos->telefono=$object->telefono;
        $alumnos->correo=$object->correo;
        $alumnos->apoderadoid=$object->apoderadoid;
        $alumnos->padreid=$object->padreid;
        $alumnos->madreid=$object->madreid;
        $alumnos->estado=$object->estado;

        return $alumnos->save();
       
    }
    public function update($object)
    {
        $alumnos= AlumnosModel::find($object->alumnoid);
        $alumnos->nombre=$object->nombre;
        $alumnos->apellidopaterno=$object->apellidopaterno;
        $alumnos->apellidomaterno=$object->apellidomaterno;
        $alumnos->sexo=$object->sexo;
        $alumnos->fnacimiento=$object->fnacimiento;
        $alumnos->lugarnacimiento=$object->lugarnacimiento;
        $alumnos->tipodiscapacidad=$object->tipodiscapacidad;
        $alumnos->certificadodiscapacidad=$object->certificadodiscapacidad;
        $alumnos->dni=$object->dni;
        $alumnos->direccion=$object->direccion;
        $alumnos->telefono=$object->telefono;
        $alumnos->correo=$object->correo;
        $alumnos->apoderadoid=$object->apoderadoid;
        $alumnos->padreid=$object->padreid;
        $alumnos->madreid=$object->madreid;
        $alumnos->estado=$object->estado;

        return $alumnos->save();
    }
    public function delete(int $id)
    {
        $alumnos= AlumnosModel::find($id);
        return $alumnos->delete();
    }

    public function combo()
    {
        $data= AlumnosModel::select('alumnoid','nombre','apellidopaterno','apellidomaterno')->where('estado',1)->get();
        return $data;
    }

}
