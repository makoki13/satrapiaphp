<?php
    use clases\Jugador;
    use clases\Usuario;

    include_once '../clases/clsUsuario.php';
    
    $j = new Usuario();
    $j->setLogin('makoki');
    $j->setPassword('ikokam');
    
    echo "login: ".$j->getLogin()."\n";
    echo "passw: ".$j->getPassword()."\n";
    $idJugador = $j->getIDJugador();
    if ($idJugador==-1) {
        echo "NO EXISTE ESE JUGADOR";
        $j->nuevoIngresoUsuario();
        exit();
    }
    else {
        echo "Bienvenido, jugador $idJugador\n";
    }
    echo "FIN_____________________\n";
    
    