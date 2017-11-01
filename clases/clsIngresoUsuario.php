<?php
namespace clases;

class Formulario {
    public $nombre;
    public $apellidos;
    public $edad;
    public $usuario;
    public $contrasenya;
}

class IngresoUsuario
{
    
    private $formulario;
        
    public function __construct()
    {
        $this->formulario = new Formulario(); 
    }
    
    public function verificaFormulario() {
        return true;
    }
    
    /**
     * Devuelve un número de jugador
     * @return number
     */
    public function guardaFormulario() {
        return 1;
    }

    function __destruct()
    {}
}

