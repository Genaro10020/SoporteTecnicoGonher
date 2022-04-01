<?php

header('Content-Type: text/html; charset=utf-8'); 
// Varios destinatarios
$para  = 'gvillanuevap@enerya.com' . ', '; // atención a la coma
//$para .= 'iscgenarovp@gmail.com';
// título
$título = 'Ruta y credenciales de la capacitación';
// mensaje
echo $mensaje = '
<html>
<head>
  <title>Datos para la Capacitación</title>
</head>
<body>
  <p>¡Presione en la liga y coloque su usuario y contraseña para acceder al curso.!</p>
  <table>
    <tr>
      <th>Ruta:</th><th>Usuario</th><th>Contraseña</th><th>Año</th>
    </tr>
    <tr>
      <td>Usuario:</td><td>3</td><td>Agosto</td><td>1970</td>
    </tr>
    <tr>
      <td>Contraseña:</td><td>17</td><td>Agosto</td><td>1973</td>
    </tr>
  </table>
</body>
</html>
';
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
/*$mail=mail($para,$título, $mensaje, $cabeceras);
echo $mail?"<h1>Correo enviado.</h1>":"<h1>El envío de correo falló.</h1>";*/

?>