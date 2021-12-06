<?php
namespace App\Controllers;

use App\Daos\EmpleadosDAO;
use App\Models\UsuariosModel;

class UsuariosController extends \Libs\Controller{

    public function __construct()
    {
        $this->Seguridad();
        $this->loadDAO('usuarios');
        $this->renderTemplate('usuarios');
        if ($this->session->get('usuarios')!=null) {      
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
        $this->dao=new EmpleadosDAO();
        $empleado=$this->dao->combo();
        
        
        require_once 'app/views/usuarios/detail.php';
    }

    public function save()
    {
        $rpta=null;
        
        $usuarioid=isset($_POST['id'])? intval($_POST['id']) : 0;
        $usuario=$_POST['usuario'];
        $email=$_POST['email'];
        $contrasena=$_POST['contrasena'];
        $intentos=$_POST['intentos'];
        $alumnos=isset($_POST['alumnos'])? 1 : 0;
        $apoderados=isset($_POST['apoderados'])? 1 : 0;
        $empleados=isset($_POST['empleados'])? 1 : 0;
        $madres=isset($_POST['madres'])? 1 : 0;
        $matriculas=isset($_POST['matriculas'])? 1 : 0;
        $padres=isset($_POST['padres'])? 1 : 0;
        $traslados=isset($_POST['traslados'])? 1 : 0;
        $usuarios=isset($_POST['usuarios'])? 1 : 0;
        $empleadoid=$_POST['empleadoid'];
        $estado=isset($_POST['estado'])? 1 : 0;

        $obj=new UsuariosModel();
        $obj->usuarioid=$usuarioid;
        $obj->usuario=$usuario;
        $obj->email=$email;
        $obj->contrasena=$contrasena;
        $obj->intentos=$intentos;
        $obj->alumnos=$alumnos;
        $obj->apoderados=$apoderados;
        $obj->empleados=$empleados;
        $obj->madres=$madres;
        $obj->matriculas=$matriculas;
        $obj->padres=$padres;
        $obj->traslados=$traslados;
        $obj->usuarios=$usuarios;
        $obj->empleadoid=$empleadoid;
        $obj->estado=$estado;

        if ($usuarioid>0) {
            $rpta=$this->dao->update($obj);
        } else {
            $rpta=$this->dao->create($obj);
        }

        if($rpta){
            $response=[
                'success'=>1,
                'messege'=>'Registro: '.$usuario.' guardado correctamente',
                'redirection'=>URL.'usuarios/index/'
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
                'redirection'=>URL.'usuarios/index/'
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