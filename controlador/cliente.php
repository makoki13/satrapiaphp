<?php
    header('Access-Control-Allow-Origin: *');
        
    require_once('./nusoap-0.9.5/lib/nusoap.php');
    
    // This is your Web service server WSDL URL address
    $wsdl = "http://localhost/satrapia/satrapia/controlador/server.php?wsdl";

    // Create client object
    $client = new nusoap_client($wsdl, true);
    $err = $client->getError();
    if ($err) {
       // Display the error
        echo '<h2>Constructor error</h2>' . $err;
       // At this point, you know the call that follows will fail
        exit();
    }
    
    if (!empty($_POST)) {
        $servicio = $_POST['servicio'];
    }
    if (!empty($_GET)) {
        $servicio = $_GET['servicio'];
    }
        
    if ($servicio=="existeUsuario") {
        $usuario = $_GET['usuario'];
        $pass = $_GET['pass'];
        $result1=$client->call('existeUsuario', array('usuario'=>$usuario, 'clave'=>$pass));        
    }
    
    print_r(json_encode($result1));
?>
