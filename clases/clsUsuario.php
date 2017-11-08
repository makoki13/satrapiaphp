<?php
namespace clases;

use modelo\BD;

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
    
    public function existeUsuario() {        
        include_once '../modelo/clsBD.php';
        $oBD = new BD();
        $sql="SELECT COUNT(*) FROM usuarios.Maestro WHERE UPPER(Login)=$$".strtoupper($this->login->get())."$$ AND Password='".$this->password->get()."'";        
        $reg = $oBD->consulta($sql, $filas);
        
        $resultado = false; if ($filas > 0) $resultado = (pg_result($reg,0,0)>0); 
        return $resultado;
    }
    
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

