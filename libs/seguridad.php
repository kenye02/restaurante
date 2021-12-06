<?php
namespace Libs;

class Seguridad
{

  //Inicializa la sesión
  public function start()
  {
    session_start();
  }

  //Agrega un elemento a la sesión
  public function addSession($key, $value)
  {
    $_SESSION[$key] = $value;
  }

  public function get($key)
  {
    return !empty($_SESSION[$key]) ? $_SESSION[$key] : null;
  }

  //todas las sesiones
  public function getAll()
  {
    return $_SESSION;
  }

 //remover la sesion
  public function remove($key)
  {
    if(!empty($_SESSION[$key]))
      unset($_SESSION[$key]);
  }

  //Cierra la sesión eliminando los valores
  public function close()
  {
    session_unset();
    session_destroy();
  }

  //Retorna el estado de la sesión
  public function getStatus()
  {
    return session_status();
  }

}