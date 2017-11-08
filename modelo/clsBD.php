<?php
namespace modelo;

class BD
{
    private $conexion;
    
    public function __construct()
    {
        $this->conexion = pg_connect("host=127.0.0.1 port=5433 dbname=satrapia user=makoki password=mak0k1ma66");
    }
    
    public function consulta($sql, &$filas) {
        $result = pg_query($this->conexion,$sql);
        $filas = pg_num_rows($result);
        return $result;
    }
    
    public function ejecuta($sql) {
        $result = pg_query($this->conexion,$sql);
        return $result;
    }

    function __destruct()
    {
        pg_close($this->conexion);
    }
}

