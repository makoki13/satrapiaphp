<?php
namespace clases;

class Login
{
    private $cadena;
    
    public function init() {$this->cadena = ''; }
    
    public function set($cadena) { $this->cadena = $cadena; }
    
    public function get() {return $this->cadena; }
}

