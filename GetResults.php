<?php
include "conexionGhoner.php";

$Pregunta =$_GET['Pregunta'];
$Usuario =$_GET['Usuario'];




$consultaF2= "SELECT * FROM `Test` WHERE `Usuario` LIKE '$Usuario'";
    
    $ejecutarF2=mysqli_query($conexion,$consultaF2) or die (mysqli_error($conexion));
foreach($ejecutarF2 as $opciones)
{
      
      if($Pregunta=="0") $Prueba=$opciones['IntroVisto'];
      if($Pregunta=="1") $Prueba=$opciones['Prueba1'];
   if($Pregunta=="2") $Prueba=$opciones['Prueba2'];
   if($Pregunta=="3") $Prueba=$opciones['Prueba3'];
   if($Pregunta=="4") $Prueba=$opciones['Prueba4'];
   if($Pregunta=="5") $Prueba=$opciones['Prueba5'];
  if($Pregunta=="6")  $Prueba=$opciones['Prueba6'];
   if($Pregunta=="7")  $Prueba=$opciones['Prueba7'];
     if($Pregunta=="8")  $Prueba=$opciones['Prueba8'];
     if($Pregunta=="9")  $Prueba=$opciones['Prueba9'];
      
}
    
    
    
    
    
    
    
    
    
    
    mysqli_close($conexion);




echo json_encode($Prueba);
$resultado -> close();





?>