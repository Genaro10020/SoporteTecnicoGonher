<?php
error_reporting(E_ALL & ~E_NOTICE);
include "conexionGhoner.php";







$Boton=$_POST['Boton'];

$Usuario=$_POST['Usuario'];

$fechaInicio=$_POST['fechaInicio'];
$fechaFinal=$_POST['fechaFinal'];




$currentDateTime = date('Y-m-d');



if($Boton=="Agregar Test")

{



    $consulta = "INSERT INTO `Test` (`id`, `Usuario`, `FechaActual`, `FechaFinalizado`) VALUES (NULL, '$Usuario','$fechaInicio','$fechaFinal');";

       if(mysqli_query($conexion, $consulta)==true){

            $consul = " SELECT * FROM `UsuariosServicio` WHERE Usuario = '$Usuario'";
            $conectando =mysqli_query($conexion, $consul);
            while($datos=mysqli_fetch_array($conectando)){
                  $usuario_del_test=$datos['Usuario'];
                  $clave_del_test=$datos['Clave'];
                  $fecha_limite_del_test=$datos['Clave'];
                  $correo_del_test=$datos['Correo'];

                    $consult = " SELECT * FROM `Test` WHERE Usuario = '$Usuario'";
                    $conect =mysqli_query($conexion, $consult);
                    while($dato=mysqli_fetch_array($conect)){
                            $fecha_finaliza_del_test=$dato['FechaFinalizado'];


                            header('Content-Type: text/html; charset=utf-8'); 
                                // Varios destinatarios
                                $para  = $correo_del_test . ', '; // atención a la coma
                                //$para .= 'correotecinge9@gmail.com';
                                // título
                                $título = 'Ruta y credenciales de la capacitación para '.$nombre_del_test;
                                // mensaje
                                $mensaje = '
                                <html>
                                    <head>
                                    <title>Datos para la Capacitación</title>
                                    </head>
                                    <body>
                                    <p>¡No exceder la fecha limite de la Capacitación.<br>Presionar en la liga y colocar usuario y contraseña para realizarla.!</p>
                                    <table>
                                        <tr>
                                            <th colspan="2">Datos de Acceso:</th>
                                        </tr>
                                        <tr>
                                        <td>Ruta: </td><td> https://vvnorth.com/ServicioCliente</td>
                                        </tr>
                                         <tr>
                                        <td>Usuario: </td><td> '.$usuario_del_test.'</td>
                                        </tr>
                                         <tr>
                                        <td>Password: </td><td> '.$clave_del_test.'</td>
                                        </tr>
                                    </table>
                                    </body>
                                </html>';
                                // Para enviar un correo HTML, debe establecerse la cabecera Content-type
                                $cabeceras  = 'MIME-Version: 1.0' . "\r\n";
                                $cabeceras .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                                //$cabeceras .= 'Content-Type: text/html; charset=utf-8' . "\r\n";
                                //$cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                                // Cabeceras adicionales
                                //$cabeceras .= 'To: Genaro <gvillanuevap@enerya.com>' . "\r\n";
                                $cabeceras .= 'From: Capacitación <iscgenarovp@gmail.com>' . "\r\n";
                                //$cabeceras .= 'Cc: birthdayarchive@example.com' . "\r\n";
                                //$cabeceras .= 'Bcc: birthdaycheck@example.com' . "\r\n";
                                // Enviarlo
                                $mail=mail($para,$título, $mensaje, $cabeceras);
                                echo $mail?"correcto":"<h1>El envío de correo falló.</h1>";
                                //echo "correcto";
                    }
                  
            }
         
 
        }else{
            echo "incorrecto";
        }

    mysqli_close($conexion);

}



if($Boton=="Eliminar")

{

    $consulta = "DELETE FROM `Test` WHERE `Test`.`Usuario` = '$Usuario'";

     if(mysqli_query($conexion, $consulta)==true){
            echo "correcto";
        }else{
            echo "incorrecto";
        }

    mysqli_close($conexion);

}



if($Boton=="Editar")

{

    $consulta = "UPDATE `auditor` SET `auditor` = '$NuevaNomina' WHERE `auditor`.`auditor` = '$Auditor';";

    mysqli_query($conexion, $consulta);

    mysqli_close($conexion);

}



if($Boton=="EditarNombre")

{

    $consulta = "UPDATE `auditor` SET `NombreAuditor` = '$NuevaNomina' WHERE `auditor`.`auditor` = '$Auditor';";

    mysqli_query($conexion, $consulta);

    mysqli_close($conexion);

}



if($Boton=="EditarMail")

{

    $consulta = "UPDATE `auditor` SET `Mail` = '$NuevaNomina' WHERE `auditor`.`auditor` = '$Auditor';";

    mysqli_query($conexion, $consulta);

    mysqli_close($conexion);

}



if($Boton=="EditarPassword")

{

    $consulta = "UPDATE `auditor` SET `Password` = '$NuevaNomina' WHERE `auditor`.`auditor` = '$Auditor';";

    mysqli_query($conexion, $consulta);

    mysqli_close($conexion);

}


   







?>