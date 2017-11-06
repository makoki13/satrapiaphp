<?php
    // Pull in the NuSOAP code
    require_once('./nusoap-0.9.5/lib/nusoap.php');
    
    // Define the CurrencyConverter method as a PHP function
    function existeUsuario($usuario, $clave) {
        return false;
    }

//  Create the server instance
    $server = new soap_server();

//  Initialize WSDL support
    $server->configureWSDL('mathwsdl', 'urn:mathwsdl');

    //Register the CurrencyConverter method to expose its
    //method name    
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
        'Deermina si existe un usuario y contraseña'
    );
            
    // Use the request to invoke the service
    $server->service(file_get_contents("php://input"));
?>