<?php 
namespace Libs;
class App{
    function __construct(){

        //Capturamos los parámetros de la petición URL
        $url = isset($_GET['url']) ? $_GET['url']: null;

        //Borrar el último /
        $url = rtrim($url, '/');

        //Cuardamos los composnentes de la uri en un array
        $url = explode('/', $url);
        //echo "<pre>",print_r($url),"</pre>";

        //Cuando no se especifique un controlador cargamos por defecto el controlador
        //home con su acción index
        if (empty($url[0])) {
            //holaa aqui
            //require_once 'app/controllers/homeController.php';
            $controller = new \App\Controllers\HomeController();
            $controller->index();
            return false;
        }
        //Cuando el susuario especifica el nombre de un controlador en la URL
        //formamos su ruta
        $file_Controller = 'app/controllers/' . $url[0] . 'Controller.php';

        //Si el archivo controlador existe entonces lo cargamos
        //en caso contrario mostramos un mensaje de error
        if (file_exists($file_Controller)) {
            //Hacemos una referencia al controlador
            //require_once $file_Controller;

            //Creamos una instancia del controlador
            $controlador = "\\App\\Controllers\\".$url[0]."Controller";
            $controller = new $controlador();

            //obtenemos la cantidad de elementos del array
            $nelementos = sizeof($url);

            //Si la cantidad de elementos es >= 2
            //significa que se ha especificado al menos un controlador y una acción
            //en caso contrario cargamos por defecto la accion index
            if ($nelementos >= 2) {
                //Si existe la acción la cargamos
                //en caso contrario enviamos un mensaje de error
                if (method_exists($controller,$url[1])) {
                    //Si la cantidad de elementos del array es >=3
                    //significa que se ha especificado al menos 1 parámetro
                    //en caso contrario cargamos la acción sin pasarle parámetros
                    if ($nelementos >= 3) {   
                        //Cargamos los parámetros en el array "param"
                        $param = [];
    
                        //Guardamos los parámetros en el array $param
                        for ($i=2; $i < $nelementos; $i++) {
                            array_push($param, $url[$i]);
                        } 
                          
                        //Llamamos a la acción pasándole sus parámetros
    
                        $controller->{$url[1]}($param);
    
                    }else{
                        $controller->{$url[1]}();
                    }
                }else{
                    echo "La acción no existe";
                }
            }else{
                $controller->index();
            }
        }else {
            echo "No existe el archivo controlador";
        }
    }
} 