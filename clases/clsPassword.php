<?php
namespace clases;

class Password
{
    private $cadena;
    
    public function init() {$this->cadena = ''; }
    
    public function set($cadena) { $this->cadena = $cadena; }
    
    public function get() {return $this->cadena; }
}

