<?php
    function existeUsuario($usuario, $clave) {
        return true;
    }
        
    //Registramos las funciones del modulo
    $server->register(
        'existeUsuario',
        // input parameters
        array('usuario' => 'xsd:string', 'clave' => 'xsd:string'),
        // output parameters
        array('return' => 'xsd:boolean'),
        // namespace
        'urn:mathwsdl',
        // soapaction
        'urn:mathwsdl#existeUsuario',
        'rpc',       // style
        'encoded',   // use
        // documentation
        'Determina si existe un usuario y contraseña'
    );
    
    