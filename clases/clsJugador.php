<?php
namespace clases;

include_once 'clsSatrapia.php';

class Jugador extends Satrapia
{
    private $nombre;
    private $idEstatico; //id del jugador en el sistema
    private $partidaActual = -1;
    private $idJugador = -1;
    
    public function __construct()
    {
        $this->idJugador = Satrapia::getSiguienteID();
    }
    
    public function getID() { return $this->idJugador; }

    function __destruct()
    {}
}

