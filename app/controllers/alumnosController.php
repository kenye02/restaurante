<?php
namespace App\Controllers;

use App\Daos\ApoderadosDAO;
use App\Daos\MadresDAO;
use App\Daos\PadresDAO;
use App\Models\AlumnosModel;
use App\Utils\Validation\GUMP;

class AlumnosController extends \Libs\Controller{

    public function __construct()
    {
        $this->Seguridad();
        $this->loadDAO('alumnos');
        $this->renderTemplate('alumnos');
        
        if ($this->session->get('alumnos')!=0) {      
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
        $this->dao=new ApoderadosDAO();
        $apoderado=$this->dao->combo();
        $this->dao=new MadresDAO();
        $madre=$this->dao->combo();
        $this->dao=new PadresDAO();
        $padre=$this->dao->combo();
        
        require_once 'app/views/alumnos/detail.php';
    }

    public function save()
    {
        $rpta=null;
        $valid_data=$this->valida($_POST);
        if ($valid_data['status_valid']===true) {

            $alumnoid=isset($_POST['id'])? intval($_POST['id']) : 0;
            $nombre=$_POST['nombre'];
            $apellidopaterno=$_POST['apellidopaterno'];
            $apellidomaterno=$_POST['apellidomaterno'];
            $sexo=$_POST['sexo'];
            $fnacimiento=$_POST['fnacimiento'];
            $lugarnacimiento=$_POST['lugarnacimiento'];
            $tipodiscapacidad=$_POST['tipodiscapacidad'];
            $certificadodiscapacidad=isset($_POST['certificadodiscapacidad'])? 1 : 0;;
            $dni=$_POST['dni'];
            $direccion=$_POST['direccion'];
            $telefono=$_POST['telefono'];
            $correo=$_POST['correo'];
            $apoderadoid=$_POST['apoderadoid'];
            $padreid=$_POST['padreid'];
            $madreid=$_POST['madreid'];
            $estado=isset($_POST['estado'])? 1 : 0;

            $obj=new AlumnosModel();
            $obj->alumnoid=$alumnoid;
            $obj->nombre=$nombre;
            $obj->apellidopaterno=$apellidopaterno;
            $obj->apellidomaterno=$apellidomaterno;
            $obj->sexo=$sexo;
            $obj->fnacimiento=$fnacimiento;
            $obj->lugarnacimiento=$lugarnacimiento;
            $obj->tipodiscapacidad=$tipodiscapacidad;
            $obj->certificadodiscapacidad=$certificadodiscapacidad;
            $obj->dni=$dni;
            $obj->direccion=$direccion;
            $obj->telefono=$telefono;
            $obj->correo=$correo;
            $obj->apoderadoid=$apoderadoid;
            $obj->padreid=$padreid;
            $obj->madreid=$madreid;
            $obj->estado=$estado;

            if ($alumnoid>0) {
                $rpta=$this->dao->update($obj);
            } else {
                $rpta=$this->dao->create($obj);
            }

            if($rpta){
                $response=[
                    'success'=>1,
                    'messege'=>'Registro: '.$nombre.' guardado correctamente',
                    'redirection'=>URL.'alumnos/index/'
                ];
            }else{
                $response=[
                    'success'=>0,
                    'messege'=>'Error al registrarse'
                ];
            }
        } else {
            $response=[
                'success'=>-1,
                'messege'=>$valid_data['data']
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
                'redirection'=>URL.'alumnos/index/'
            ];
        }else{
            $response=[
                'success'=>false,
                'messege'=>'Error al elimnar el registro'
            ];
        }
        echo json_encode($response);
        
    }

    public function valida($datos){

        $gump=new GUMP();
        $gump->validation_rules([
            'nombre'=> 'required|max_len,20',
            'apellidopaterno'=>'required|max_len,15',
            'apellidomaterno'=> 'required|max_len,15',
            'fnacimiento'=>'required|date',
            'tipodiscapacidad'=> 'max_len,10',
            'dni'=>'required|max_len,8|min_len,8',
            'direccion'=> 'max_len,30',
            'telefono'=>'max_len,10|min_len,7',
            'correo'=> 'valid_email|max_len,30',
        ]);
        $gump->set_fields_error_messages([
            'nombre'=> ['required' => 'El campo Nombre es obligatorio'
                        ,'max_len' => 'El campo Nombre no puede tener mas de 20 carácteres'] ,
            'apellidopaterno'=> ['required' => 'El campo Apellido Paterno es obligatorio'
            ,'max_len' => 'El campo Apellido Paterno no puede tener mas de 15 carácteres'] ,
            'apellidomaterno'=> ['required' => 'El campo Apellido Materno es obligatorio'
            ,'max_len' => 'El campo Apellido Materno no puede tener mas de 15 carácteres'] ,
            'fnacimiento'=> ['required' => 'El campo Fecha de Nacimiento  es obligatorio'
            ,'date' => 'El campo Fecha de Nacimiento  tiene que ser una fecha'] ,
            'tipodiscapacidad'=> ['max_len' => 'El campo Tipo de Discapacidad no puede tener mas de 10 carácteres'] ,
            'dni'=> ['required' => 'El campo DNI  es obligatorio'
            ,'max_len' => 'El campo DNI tine que tener maximo 8 caráctares'
            ,'min_len' => 'El campo DNI tine que tener minimo 8 caráctares'] ,
            'direccion'=> ['max_len' => 'El campo tine que tener maximo 30 caráctares'] ,
            'telefono'=> ['max_len' => 'El campo Telefono tine que tener maximo 10 caráctares'
            ,'min_len' => 'El campo Telefono tine que tener minimo 7 caráctares'] ,
            'correo'=> ['max_len' => 'El campo Correo tine que tener maximo 30 caráctares'
            ,'valid_email' => 'El campo Correo tine que tener ser un Email']
             
        ]);

        // set filter rules
        $gump->filter_rules([
            'nombre' =>'trim|sanitize_string',
            'apellidopaterno' =>'trim|sanitize_string',
            'apellidomaterno' =>'trim|sanitize_string',
            'fnacimiento' =>'trim|sanitize_string',
            'tipodiscapacidad' =>'trim|sanitize_string',
            'dni' =>'trim|sanitize_string',
            'direccion' =>'trim|sanitize_string',
            'telefono' =>'trim|sanitize_string',
            'correo' =>'trim|sanitize_email'
            
        ]);

        $valid_data=$gump->run($datos);

        if ($gump->errors()) {
            $rpta=[
                'status_valid'=>false,
                'data'=>$gump->get_errors_array()
            ];
        }else{
            $rpta=[
                'status_valid'=>true,
                'data'=>$valid_data
            ];
        }

        return $rpta;    
    }

}
?>