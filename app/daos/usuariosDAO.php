<?php

namespace App\Daos;

use App\Interfaces\Db\IUsuarios;
use App\Models\UsuariosModel;
use Libs\Dao;

class UsuariosDAO extends Dao implements IUsuarios
{
    public function __construct()
    {
        $this->loadEloquent();
    }
    public function getAll(bool $status)
    {
        $data=UsuariosModel::select(
            'usuarios.usuarioid',
            'usuarios.usuario',
            'usuarios.email',
            'usuarios.contrasena',
            'usuarios.intentos',
            'usuarios.updated_at',
            'empleados.nombre as empleado',
            'empleados.apellidos as empleadoap'
        )
        ->join('empleados','usuarios.empleadoid','=','empleados.empleadoid')
        ->where('usuarios.estado',$status)
        ->get();
        
        return $data;
    }
    public function get(int $id)
    {
        $data=UsuariosModel::find($id);
        if($data==null){
            $data=new UsuariosModel();
        }

        return $data;
    }
    public function create($object)
    {
        $usuarios=new UsuariosModel();
        $usuarios->usuario=$object->usuario;
        $usuarios->email=$object->email;
        $usuarios->contrasena=$object->contrasena;
        $usuarios->intentos=$object->intentos;
        $usuarios->alumnos=$object->alumnos;
        $usuarios->apoderados=$object->apoderados;
        $usuarios->empleados=$object->empleados;
        $usuarios->madres=$object->madres;
        $usuarios->matriculas=$object->matriculas;
        $usuarios->padres=$object->padres;
        $usuarios->traslados=$object->traslados;
        $usuarios->usuarios=$object->usuarios;
        $usuarios->estado=$object->estado;
        $usuarios->empleadoid=$object->empleadoid;

        return $usuarios->save();
       
    }
    public function update($object)
    {
        $usuarios= UsuariosModel::find($object->usuarioid);
        $usuarios->usuario=$object->usuario;
        $usuarios->email=$object->email;
        $usuarios->contrasena=$object->contrasena;
        $usuarios->intentos=$object->intentos;
        $usuarios->alumnos=$object->alumnos;
        $usuarios->apoderados=$object->apoderados;
        $usuarios->empleados=$object->empleados;
        $usuarios->madres=$object->madres;
        $usuarios->matriculas=$object->matriculas;
        $usuarios->padres=$object->padres;
        $usuarios->traslados=$object->traslados;
        $usuarios->usuarios=$object->usuarios;
        $usuarios->estado=$object->estado;
        $usuarios->empleadoid=$object->empleadoid;

        return $usuarios->save();
    }
    public function delete(int $id)
    {
        $usuarios= UsuariosModel::find($id);
        return $usuarios->delete();
    }

    public function usuario(string $email){
        
        $data=UsuariosModel::where('email',$email)->where('estado',1)->get()->last();
        return $data;
    }
}
