<?php
error_reporting(0);
session_start();
include "conexionGhoner.php";
header("Content-Type: application/json");
$arreglo = json_decode(file_get_contents('php://input'), true);

    $usuario = $arreglo['usu'];
    $contrasena = $arreglo['pass'];
   // $token = $arreglo['token'];

    //funcion obtien IP
    function getRealIP() {
        if (!empty($_SERVER['HTTP_CLIENT_IP']))
           
            if (!empty($_SERVER['HTTP_CLIENT_IP'])){
                return $_SERVER['HTTP_CLIENT_IP'];
            }
            if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
                return $_SERVER['HTTP_X_FORWARDED_FOR'];
            }
            if (!empty($_SERVER['REMOTE_ADDR'])){
                return $_SERVER['REMOTE_ADDR'];
            }

        }
        $ip = getRealIP();
        // PHP code to get the MAC address of Client
/*$MAC = exec('getmac');
// Storing 'getmac' value in $MAC
$ip = strtok($MAC, ' ');*/
    
    
    //Verificar SI existe usuario
    $consulta = "SELECT * FROM UsuariosServicio WHERE Usuario = '$usuario' AND Clave = '$contrasena'";
    $resultado=$conexion->query($consulta);
    while($informacion=$resultado->fetch_array()){
            $_SESSION['usuario']=$informacion['Usuario'];   
            $_SESSION['tipo']=$informacion['tipo']; 
 
           /* if($_SESSION['token'] == $token){
                $datos[0]="IP Coincide"; 
            }else{
                $datos[0]="IP No Coincide";
            }
            $datos[1] = $informacion;*/

            
            if($informacion['ip']==""){//si la ip es vacio inserta
                    $actualizar= "UPDATE UsuariosServicio SET ip='$ip' WHERE Usuario='$usuario' AND tipo='Usuario'";
                    $conexion->query($actualizar);
                    
                   
                        $datos[0]="IP Coincide";
                  
            }else{
                    // si es Usuario
                    if($informacion['tipo']=="Usuario"){
                        if($informacion['ip']==$ip){
                            $datos[0]="IP Coincide";  
                        }else{
                        session_destroy();
                        $datos[0]="IP No Coincide";
                        }
                    }
            }
            $datos[1] = $informacion;
    }

    
 
    //introducir IP
    
    

   


echo json_encode($datos);

?>