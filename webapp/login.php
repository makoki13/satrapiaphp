<?php 
    header('Access-Control-Allow-Origin: *');
    
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
        .Sil{width: 100%;height:100%;background: url(./login.jpg) no-repeat; border:0px solid black;
            background-color:black;            
            left:0%;
            top:0%;
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
        #btnNuevo {font-size:28px; color:black; font-weight:bolder; text-shadow:1px 1px 1px gainsboro;padding-left:5px;cursor:pointer; border:2px solid black;}
        
        #bloqueo{position:absolute;top:0px;left:0px;right:0%; bottom:.6%;border:1px solid #000000;background:#DDDDDD;z-index:3;filter: alpha(opacity=50); opacity: .5;visibility:hidden;}
        #nuevaVersion{position: fixed;top: 50%;left: 50%;-webkit-transform: translate(-50%, -50%);transform: translate(-50%, -50%);width: 80%;height: 80%;background-color:white;
            visibility:hidden;z-index:4;border:2px solid black;alpha(opacity=70); opacity: .7;}
        
        ui-layout-pane { /* all 'panes' */		background: white;border: 1px solid black;overflow: hidden !important;}
        .ui-layout-resizer { /* all 'resizer-bars' */ background: silver;}
        .ui-layout-toggler { /* all 'toggler-buttons' */ background: red;}
        .ui-layout-pane-north {overflow: hidden !important;}
        .ui-layout-pane-center {overflow: hidden !important;}
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-layout/1.4.3/layout-default.min.css">
    <script src="jquery.layout.js"></script>    
    <script src="./servicios.js"></script>
    <script>
    	var myLayout;
    	
    	$(function() {
    		myLayout = $('body').layout({
    			north__size: 100,
                slidable: false                
            });
            
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
                var idJugador = 1;
            	document.getElementById('bloqueo').style.visibility='visible';
                document.getElementById('nuevaVersion').style.visibility='visible';                
                document.getElementById('frmNuevaVersion').src="mensaje.html?idJugador="+idJugador;
                return;
                
                                
                var service = new WebService(81);
                                
                const params = { servicio: 'existeUsuario', usuario: 'makoki', pass: 'mak0k1ma66' };
				const urlParams = new URLSearchParams(Object.entries(params));
                service.Get(urlParams).then(function(rest) {
                    alert(rest);
                    /*
                    if (rest===true) {
                        const params = { servicio: 'idUsuario', usuario: 'makoki'};
        				const urlParams = new URLSearchParams(Object.entries(params));
        				service.Get(urlParams).then(function(rest) {
            				alert(rest);
            				 
            					Se devuelve un objecto con los siguientes campos:
            					id: id de jugador
            					status: 0, activo, 1: con alerta, 2: bloqueado
            					nivel: 0: en tutorial, 1: en juego
            				
        				});
                    }
                    */
                })
                

                /*
                formulario = new Object();
                formulario.servicio = 'existeUsuario';
                formulario.usuario = 'pablo';
                formulario.pass = 'olbap';
                service.Post(formulario).then(function(rest) {
                    if (rest===true) alert("TRUE"); else alert("GASLE"); 
                })
                */  
            });
    	});
    	
    </script>
    </head>
    <body onload="document.getElementById('login').focus();">    	            
    	<div class="ui-layout-center">    		
    		<table class="Sil" style="width:100%;height:100%;vertical-align:middle;" align="center">
    			<tr style="height:60%;vertical-align: bottom;">
    				<td>
    					<table style="width:100%;height:100%;">    							    							
    						<tr style="height:50%;vertical-align: bottom;">
    							<td style="width:20%;padding-right:3px;">&nbsp;</td>
    							<td style="width:25%;padding-right:3px;">USUARIO:</td>
    							<td style="width:25%;"><input type="text" id="login"></td>
    							<td style="width:30%;padding-right:3px;">&nbsp;</td>
    						</tr>
    						<tr style="height:50%;vertical-align: top;">
    							<td style="padding-right:3px;">&nbsp;</td>
    							<td style="padding-right:3px;padding-top:10px;">PASSWORD:</td>
    							<td style="padding-top:10px;"><input type="password" id="password"></td>
    							<td style="padding-right:3px;">&nbsp;</td>
    						</tr>	
    					</table>
    				</td>
    			</tr>    				
    			<tr style="height:40%;vertical-align: top;">
    				<td colspan="2" style="text-align:center;padding-top:20px;"><button id="btnNuevo">Dar de alta un nuevo usuario</button></td>    					
    			</tr>    				
    		</table>    		
    	</div>
    	
    	<div id="bloqueo"></div>

        <div id="nuevaVersion">
            <iframe id="frmNuevaVersion" style="width:100%;height:100%;border:0px;"></iframe>
        </div>
    </body>
</html>