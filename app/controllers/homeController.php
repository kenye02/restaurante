<?php
namespace App\Controllers;

use Libs\Seguridad;

class HomeController extends \Libs\Controller{

    public function __construct()
    {
        $this->seguridad();
        $this->renderTemplate('home');
        $this->loadDAO('home');

    }

    public function index(){

        $usuario=$this->session->get('usuario');
        echo $this->templates->render('index',['usuario'=>$usuario]);
        
    }
    public function intranet(){

        if ($this->session->get('email')!=null) {
            $usuario=$this->session->get('usuario');
            $email=$this->session->get('email');
            echo $this->templates->render('intranet',['usuario'=>$usuario,'email'=>$email]);
        } else{
            header('Location:'.URL.'home/index');
        }
        
    }

}
?>