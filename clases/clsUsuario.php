<?php
namespace clases;

include_once 'clsSatrapia.php';
include_once 'clsLogin.php';
include_once 'clsPassword.php';
include_once 'clsIngresoUsuario.php';

class Usuario extends Satrapia
{
    private $login;
    private $password;
    private $formularioIngreso;
    
    public function __construct()
    {
        $this->login = new Login();
        $this->password = new Password();
        
        $this->login->init();
        $this->password->init();
    }

    function __destruct()
    {
        
    }
    
    public function setLogin($cadena) {
        $this->login->set($cadena);
    }
    
    public function setPassword($cadena) {
        $this->password->set($cadena);
    }
    
    public function getLogin() {return $this->login->get(); }
    
    public function getPassword() {return $this->password->get(); }
    
    private function _chkAcceso() {
        return -1;
    }
    
    public function getIDJugador() {
        return $this->_chkAcceso(); 
    }
    
    public function nuevoIngresoUsuario() {
        $this->formularioIngreso = new IngresoUsuario();
    }
}

