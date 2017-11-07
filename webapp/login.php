<?php 
    session_start();
    $_SESSION = array();
    session_destroy()
?>
<!DOCTYPE html>
<html> 	
    <head>
    <meta charset="ISO-8859-1">
    <meta http-equiv="cache-control" content="no-cache, must-revalidate, post-check=0, pre-check=0" />
  	<meta http-equiv="cache-control" content="max-age=0" />
  	<meta http-equiv="expires" content="0" />
  	<meta http-equiv="expires" content="Tue, 01 Jan 1980 1:00:00 GMT" />
  	<meta http-equiv="pragma" content="no-cache" />
    <title>SATRAPIA</title>
    <style>
        html {height: 90%;}
        body {height: 90vh;}
        .Sil{max-width: 100%;height:100vh;background: url(./login.jpg) no-repeat; border:0px solid black;
            background-color:black;
            position:absolute;
            left:0%;
            top:0%;
            width:100%;
            height:100%;
            margin: 0px;
            opacity:0.6;
        }
        
        .Sil2{max-width: 100%;height:100vh;border:0px solid black;
            background-color:transparent;
            position:absolute;
            left:23%;
            top:33%;
            width:33%;
            height:33%;
            margin: 0px;
            opacity:1;
        }       
        
        td {font-size:48px; color:black; font-weight:bolder; text-shadow:1px 1px 1px gainsboro; text-align:right;}
        input {font-size:48px; color:#b30000; font-weight:bolder; text-shadow:1px 1px 1px gainsboro;padding-left:5px;border:2px solid black;}
        #btnNuevo {font-size:28px; color:black; font-weight:bolder; text-shadow:1px 1px 1px gainsboro;padding-left:5px;cursor:pointer;}
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="./servicios.js"></script>
    <script>
    	$(function() {
        	$("#login").keypress(function(e) {
        		if(e.which == 13) {
        	        $("#password").focus();
        	    }
            });

        	$("#login, #password").mouseenter(function () {$(this).css('border-color','orange');$(this).focus();});
        	$("#login, #password").mouseout(function () {$(this).css('border-color','black');});
        	        	
            $("#btnNuevo").mouseenter(function () {$(this).css('color','orange');$(this).focus();});
            $("#btnNuevo").mouseout(function () {$(this).css('color','black');});
            $("#btnNuevo").click(function() {
                var service = new WebService();
                
                /*
                const params = { funcion: 'existeJugador', usuario: 'pablo', pass: 'olbap' };
				const urlParams = new URLSearchParams(Object.entries(params));
                service.Get(urlParams).then(function(rest) {
                    if (rest===true) alert("TRUE"); else alert("GASLE"); 
                })
                */
                
                formulario = new Object();
                formulario.funcion = 'existeJugador';
                formulario.usuario = 'pablo';
                formulario.pass = 'olbap';
                service.Post(formulario).then(function(rest) {
                    if (rest===true) alert("TRUE"); else alert("GASLE"); 
                })  
            });
    	});
    	
    </script>
    </head>
    <body onload="document.getElementById('login').focus();">
    	<div class="Sil">
    		<div class="Sil2">
    			<table style="width:100%;">   				
    				<tr style="height:50%;">
    					<td style="height:50%;min-width:100px;padding-right:3px;">USUARIO:</td>
    					<td style="width:100%;"><input type="text" id="login"></td>
    				</tr>
    				<tr style="height:50%;">
    					<td style="height:50%;padding-right:3px;">PASSWORD:</td>
    					<td><input type="password" id="password"></td>
    				</tr>
    				<tr>
    					<td colspan="2" style="text-align:center;padding-top:20px;"><button id="btnNuevo">Dar de alta un nuevo usuario</button></td>
    				</tr>
    			</table>
    		</div>
    	</div>
    </body>
</html>