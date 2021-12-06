<?php
namespace App\Controllers;

use App\Models\PadresModel;

class PadresController extends \Libs\Controller{

    public function __construct()
    {
        $this->Seguridad();
        $this->loadDAO('padres');
        $this->renderTemplate('padres');
        if ($this->session->get('padres')!=null) {      
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
        require_once 'app/views/padres/detail.php';
    }

    public function save()
    {
        $rpta=null;
        
        $padreid=isset($_POST['id'])? intval($_POST['id']) : 0;
        $nombre=$_POST['nombre'];
        $apellidopaterno=$_POST['apellidopaterno'];
        $apellidomaterno=$_POST['apellidomaterno'];
        $fnacimiento=$_POST['fnacimiento'];
        $gradodeinstruccion=$_POST['gradodeinstruccion'];
        $ocupacion=$_POST['ocupacion'];
        $dni=$_POST['dni'];
        $sexo=$_POST['sexo'];
        $estadocivil=$_POST['estadocivil'];
        $telefono=$_POST['telefono'];
        $correo=$_POST['correo'];
        $direccion=$_POST['direccion'];
        $estado=isset($_POST['estado'])? 1 : 0;

        $obj=new PadresModel();
        $obj->padreid=$padreid;
        $obj->nombre=$nombre;
        $obj->apellidopaterno=$apellidopaterno;
        $obj->apellidomaterno=$apellidomaterno;
        $obj->fnacimiento=$fnacimiento;
        $obj->gradodeinstruccion=$gradodeinstruccion;
        $obj->ocupacion=$ocupacion;
        $obj->dni=$dni;
        $obj->sexo=$sexo;
        $obj->estadocivil=$estadocivil;
        $obj->telefono=$telefono;
        $obj->correo=$correo;
        $obj->direccion=$direccion;
        $obj->estado=$estado;

        if ($padreid>0) {
            $rpta=$this->dao->update($obj);
        } else {
            $rpta=$this->dao->create($obj);
        }

        if($rpta){
            $response=[
                'success'=>1,
                'messege'=>'Registro: '.$nombre.' guardado correctamente',
                'redirection'=>URL.'padres/index/'
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
                'success'=>true,
                'messege'=>'Registro eliminado correctamente',
                'redirection'=>URL.'padres/index/'
            ];
        }else{
            $response=[
                'success'=>false,
                'messege'=>'Error al elimnar el registro'
            ];
        }
        echo json_encode($response);
        
    }
}
?>