<?php
namespace App\Controllers;

use App\Models\ApoderadosModel;

class ApoderadosController extends \Libs\Controller{

    public function __construct()
    {
        $this->Seguridad();
        $this->loadDAO('apoderados');
        $this->renderTemplate('apoderados');
        if ($this->session->get('apoderados')!=0) {      
        } else if($this->session->get('email')!=null){
            header('Location:'.URL.'home/intranet');
        }else{
            header('Location:'.URL.'home/index');
        }
    }
    public function index($param=null){

        $status=isset($param[0])?$param[0]:1;
        $data=$this->dao->getAll($status);
        $usuario=$this->session->get('usuario');
        $email=$this->session->get('email');
        echo $this->templates->render('index',['data'=>$data,'usuario'=>$usuario,'email'=>$email]);
    }

    public function detail($param=null)
    {
        $id=(isset($param[0]))?$param[0]:0;
        $data=$this->dao->get($id);
        require_once 'app/views/apoderados/detail.php';
    }

    public function save()
    {
        $rpta=null;
        
        $apoderadoid=isset($_POST['id'])? intval($_POST['id']) : 0;
        $nombre=$_POST['nombre'];
        $apellidopaterno=$_POST['apellidopaterno'];
        $apellidomaterno=$_POST['apellidomaterno'];
        $fnacimiento=$_POST['fnacimiento'];
        $dni=$_POST['dni'];
        $sexo=$_POST['sexo'];
        $estadocivil=$_POST['estadocivil'];
        $gradodeinstruccion=$_POST['gradodeinstruccion'];
        $ocupacion=$_POST['ocupacion'];
        $telefono=$_POST['telefono'];
        $correo=$_POST['correo'];
        $direccion=$_POST['direccion'];
        $estado=isset($_POST['estado'])? 1 : 0;

        $obj=new ApoderadosModel();
        $obj->apoderadoid=$apoderadoid;
        $obj->nombre=$nombre;
        $obj->apellidopaterno=$apellidopaterno;
        $obj->apellidomaterno=$apellidomaterno;
        $obj->fnacimiento=$fnacimiento;
        $obj->dni=$dni;
        $obj->sexo=$sexo;
        $obj->estadocivil=$estadocivil;
        $obj->gradodeinstruccion=$gradodeinstruccion;
        $obj->ocupacion=$ocupacion;
        $obj->telefono=$telefono;
        $obj->correo=$correo;
        $obj->direccion=$direccion;
        $obj->estado=$estado;

        if ($apoderadoid>0) {
            $rpta=$this->dao->update($obj);
        } else {
            $rpta=$this->dao->create($obj);
        }

        if($rpta){
            $response=[
                'success'=>1,
                'messege'=>'Registro: '.$nombre.' guardado correctamente',
                'redirection'=>URL.'apoderados/index/'
            ];
        }else{
            $response=[
                'success'=>0,
                'messege'=>'Error al registrarse'
            ];
        }
        echo json_encode($response);
    }
    
    public function delete($param=null)
    {
        $rpta=null;
        $id=(isset($param[0]))?intval($param[0]):0;
        if ($id>0) {
            $rpta=$this->dao->delete($id);
        }
        if($rpta){
            $response=[
                'success'=>1,
                'messege'=>'Registro eliminado correctamente',
                'redirection'=>URL.'apoderados/index/'
            ];
        }else{
            $response=[
                'success'=>0,
                'messege'=>'Error al elimnar el registro'
            ];
        }
        echo json_encode($response);
        
    }
}
?>