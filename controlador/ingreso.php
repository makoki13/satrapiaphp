<?php
    use clases\Usuario;

    function existeUsuario($usuario, $clave) {
        include_once '../clases/clsUsuario.php';
        $candidato = new Usuario();
        $candidato->setLogin($usuario);
        $candidato->setPassword($clave);        
        return $candidato->existeUsuario();
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
    
    