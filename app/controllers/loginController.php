<?php
namespace App\Controllers;

use Libs\Seguridad;

class LoginController extends \Libs\Controller{

    public function __construct()
    {
        $this->Seguridad();
        $this->loadDAO('usuarios');
    }

    public function index(){

        echo $this->render('login/index');
    }

    public function acceso($param=null){
        $email=$_POST['email'];
        $contra=$_POST['contra'];
        $usuario=$this->dao->usuario($email);
        if ($usuario!=null) {
            if ($usuario->contrasena==$contra) {
                $this->session->addSession('usuarioid',$usuario->usuarioid);
                $this->session->addSession('usuario',$usuario->usuario);
                $this->session->addSession('email',$usuario->email);
                $this->session->addSession('alumnos',$usuario->alumnos);
                $this->session->addSession('apoderados',$usuario->apoderados);
                $this->session->addSession('empleados',$usuario->empleados);
                $this->session->addSession('madres',$usuario->madres);
                $this->session->addSession('matriculas',$usuario->matriculas);
                $this->session->addSession('padres',$usuario->padres);
                $this->session->addSession('traslados',$usuario->traslados);
                $this->session->addSession('usuarios',$usuario->usuarios);
                $this->session->addSession('empleadoid',$usuario->empleadoid);
                header('Location:'.URL.'home/intranet');
            } else {
                header('Location:'.URL.'login/index');
            }
            
        } else {
            
        }   
    }

    public function salir()
    {
        $this->session->close();
        header('Location:'.URL.'login/index');
    }

}
?>