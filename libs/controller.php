<?php 
namespace Libs;
class Controller 
{
    public function render($viewName)
    {
        require_once 'app/views/'.$viewName.'.php';
    }
    
    public function renderTemplate($directorio)
    {
        $this->templates=new \League\Plates\Engine('app/views/'.$directorio);
    }

    public function loadDAO($name)
    {
        $url='app/daos/'.$name.'DAO.php';
        if (file_exists($url)) {
            $daoName= 'App\\Daos\\'.$name.'DAO';
            $this->dao=new $daoName;
        }
    }

    public function seguridad()
    {
        $this->session=new Seguridad();
        $this->session->start();
    }

}
?>