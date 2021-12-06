<?php
namespace App\Controllers;

use App\Daos\AlumnosDAO;
use App\Daos\EmpleadosDAO;
use App\Models\MatriculasModel;

class MatriculasController extends \Libs\Controller{

    public function __construct()
    {
        $this->Seguridad();
        $this->loadDAO('matriculas');
        $this->renderTemplate('matriculas');
        if ($this->session->get('matriculas')!=null) {      
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
        
        require_once 'app/views/matriculas/detail.php';
    }

    public function save()
    {
        $rpta=null;
        
        $matriculaid=isset($_POST['id'])? intval($_POST['id']) : 0;
        $fechamatricula=$_POST['fechamatricula'];
        $codigomodular=$_POST['codigomodular'];
        $nombreie=$_POST['nombreie'];
        $ugel=$_POST['ugel'];
        $seccion=$_POST['seccion'];
        $nivel=$_POST['nivel'];
        $grado=$_POST['grado'];
        $turno=$_POST['turno'];
        $alumnoid=$_POST['alumnoid'];
        $empleadoid=$this->session->get('empleadoid');
        $estado=isset($_POST['estado'])? 1 : 0;

        $obj=new MatriculasModel();
        $obj->matriculaid=$matriculaid;
        $obj->fechamatricula=$fechamatricula;
        $obj->codigomodular=$codigomodular;
        $obj->nombreie=$nombreie;
        $obj->ugel=$ugel;
        $obj->seccion=$seccion;
        $obj->nivel=$nivel;
        $obj->grado=$grado;
        $obj->turno=$turno;
        $obj->alumnoid=$alumnoid;
        $obj->empleadoid=$empleadoid;
        $obj->estado=$estado;

        if ($matriculaid>0) {
            $rpta=$this->dao->update($obj);
        } else {
            $rpta=$this->dao->create($obj);
        }

        if($rpta){
            $response=[
                'success'=>1,
                'messege'=>'Registro: '.$matriculaid.' guardado correctamente',
                'redirection'=>URL.'matriculas/index/'
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
                'redirection'=>URL.'matriculas/index/'
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