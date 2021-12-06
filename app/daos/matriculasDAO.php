<?php

namespace App\Daos;

use App\Interfaces\Db\IMatriculas;
use App\Models\MatriculasModel;
use Libs\Dao;

class MatriculasDAO extends Dao implements IMatriculas
{
    public function __construct()
    {
        $this->loadEloquent();
    }
    public function getAll(bool $status)
    {
        $data=MatriculasModel::select(
            'matriculas.matriculaid',
            'matriculas.codigomodular',
            'matriculas.fechamatricula',
            'matriculas.nombreie',
            'matriculas.nivel',
            'matriculas.grado',
            'matriculas.updated_at',
            'alumnos.nombre as alumno',
            'alumnos.apellidopaterno as alumnoap',
            'alumnos.apellidomaterno as alumnoam'
        )
        ->join('alumnos','matriculas.alumnoid','=','alumnos.alumnoid')
        ->where('alumnos.estado',$status)
        ->get();

        return $data;
    }
    public function get(int $id)
    {
        $data=MatriculasModel::find($id);
        if($data==null){
            $data=new MatriculasModel();
        }

        return $data;
    }
    public function create($object)
    {
        $matriculas=new MatriculasModel();
        $matriculas->fechamatricula=$object->fechamatricula;
        $matriculas->codigomodular=$object->codigomodular;
        $matriculas->nombreie=$object->nombreie;
        $matriculas->ugel=$object->ugel;
        $matriculas->seccion=$object->seccion;
        $matriculas->nivel=$object->nivel;
        $matriculas->grado=$object->grado;
        $matriculas->turno=$object->turno;
        $matriculas->alumnoid=$object->alumnoid;
        $matriculas->empleadoid=$object->empleadoid;
        $matriculas->estado=$object->estado;

        return $matriculas->save();
       
    }
    public function update($object)
    {
        $matriculas= MatriculasModel::find($object->matriculaid);
        $matriculas->fechamatricula=$object->fechamatricula;
        $matriculas->codigomodular=$object->codigomodular;
        $matriculas->nombreie=$object->nombreie;
        $matriculas->ugel=$object->ugel;
        $matriculas->seccion=$object->seccion;
        $matriculas->nivel=$object->nivel;
        $matriculas->grado=$object->grado;
        $matriculas->turno=$object->turno;
        $matriculas->alumnoid=$object->alumnoid;
        $matriculas->empleadoid=$object->empleadoid;
        $matriculas->estado=$object->estado;

        return $matriculas->save();
    }
    public function delete(int $id)
    {
        $matriculas= MatriculasModel::find($id);
        return $matriculas->delete();
    }
}
