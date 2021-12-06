<?php
namespace App\Controllers;

use App\Daos\AlumnosDAO;
use App\Daos\EmpleadosDAO;
use App\Models\TrasladosModel;

class TrasladosController extends \Libs\Controller{

    public function __construct()
    {
        $this->Seguridad();
        $this->loadDAO('traslados');
        $this->renderTemplate('traslados');
        if ($this->session->get('traslados')!=0) {      
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
        $this->dao=new AlumnosDAO();
        $alumno=$this->dao->combo();
        $this->dao=new EmpleadosDAO();
        $empleado=$this->dao->combo();
        
        require_once 'app/views/traslados/detail.php';
    }

    public function save()
    {
        $rpta=null;
        
        $trasladoid=isset($_POST['id'])? intval($_POST['id']) : 0;
        $motivodetraslado=$_POST['motivodetraslado'];
        $codigomodular=$_POST['codigomodular'];
        $iededestino=$_POST['iededestino'];
        $vbdetraslado=$_POST['vbdetraslado'];
        $alumnoid=$_POST['alumnoid'];
        $empleadoid=$this->session->get('empleadoid');
        $estado=isset($_POST['estado'])? 1 : 0;

        $obj=new TrasladosModel();
        $obj->trasladoid=$trasladoid;
        $obj->motivodetraslado=$motivodetraslado;
        $obj->codigomodular=$codigomodular;
        $obj->iededestino=$iededestino;
        $obj->vbdetraslado=$vbdetraslado;
        $obj->alumnoid=$alumnoid;
        $obj->empleadoid=$empleadoid;
        $obj->estado=$estado;

        if ($trasladoid>0) {
            $rpta=$this->dao->update($obj);
        } else {
            $rpta=$this->dao->create($obj);
        }

        if($rpta){
            $response=[
                'success'=>1,
                'messege'=>'Registro: '.$trasladoid.' guardado correctamente',
                'redirection'=>URL.'traslados/index/'
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
                'redirection'=>URL.'traslados/index/'
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