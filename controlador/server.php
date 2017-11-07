<?php
    // Pull in the NuSOAP code
    require_once('./nusoap-0.9.5/lib/nusoap.php');
        
//  Create the server instance
    $server = new soap_server();

//  Initialize WSDL support
    $server->configureWSDL('mathwsdl', 'urn:mathwsdl');
    
    //Incluye modulos
    include_once 'ingreso.php';
            
    // Use the request to invoke the service
    $server->service(file_get_contents("php://input"));
?>