<?php
include "conexionGhoner.php";

$Puntos =$_GET['Puntos'];
$Usuario =$_GET['Usuario'];
$NumeroPrueba =$_GET['NumeroPrueba'];




$consultaF2= "SELECT * FROM `Test` WHERE `Usuario` LIKE '$Usuario'";
$ejecutarF2=mysqli_query($conexion,$consultaF2) or die (mysqli_error($conexion));
foreach($ejecutarF2 as $opciones)
{
 
     $Prueba1=$opciones['Prueba1'];
   $Prueba2=$opciones['Prueba2'];
   $Prueba3=$opciones['Prueba3'];
   $Prueba4=$opciones['Prueba4'];
   $Prueba5=$opciones['Prueba5'];
  $Prueba6=$opciones['Prueba6'];
  $Prueba7=$opciones['Prueba7'];
  $Prueba8=$opciones['Prueba8'];
   $Prueba9=$opciones['Prueba9'];


}



if($NumeroPrueba=="0" )
{
$consulta = "UPDATE `Test` SET `IntroVisto` = '$Puntos' WHERE `Test`.`Usuario` = '$Usuario';";
mysqli_query($conexion, $consulta);
} 


if($NumeroPrueba=="1" &&  $Prueba1== "")
{
$consulta = "UPDATE `Test` SET `Prueba1` = '$Puntos' WHERE `Test`.`Usuario` = '$Usuario';";
mysqli_query($conexion, $consulta);
}   

if($NumeroPrueba=="2" &&  $Prueba2== "")
{
$consulta = "UPDATE `Test` SET `Prueba2` = '$Puntos' WHERE `Test`.`Usuario` = '$Usuario';";
mysqli_query($conexion, $consulta);
} 

if($NumeroPrueba=="3" &&  $Prueba3== "")
{
$consulta = "UPDATE `Test` SET `Prueba3` = '$Puntos' WHERE `Test`.`Usuario` = '$Usuario';";
mysqli_query($conexion, $consulta);
} 

if($NumeroPrueba=="4" &&  $Prueba4== "")
{
$consulta = "UPDATE `Test` SET `Prueba4` = '$Puntos' WHERE `Test`.`Usuario` = '$Usuario';";
mysqli_query($conexion, $consulta);
}

if($NumeroPrueba=="5" &&  $Prueba5== "")
{
$consulta = "UPDATE `Test` SET `Prueba5` = '$Puntos' WHERE `Test`.`Usuario` = '$Usuario';";
mysqli_query($conexion, $consulta);
}

if($NumeroPrueba=="6" &&  $Prueba6== "")
{
$consulta = "UPDATE `Test` SET `Prueba6` = '$Puntos' WHERE `Test`.`Usuario` = '$Usuario';";
mysqli_query($conexion, $consulta);
}


if($NumeroPrueba=="7" &&  $Prueba7== "")
{
$consulta = "UPDATE `Test` SET `Prueba7` = '$Puntos' WHERE `Test`.`Usuario` = '$Usuario';";
mysqli_query($conexion, $consulta);
}

if($NumeroPrueba=="8" &&  $Prueba8== "")
{
$consulta = "UPDATE `Test` SET `Prueba8` = '$Puntos' WHERE `Test`.`Usuario` = '$Usuario';";
mysqli_query($conexion, $consulta);
}

if($NumeroPrueba=="9" &&  $Prueba9== "")
{
$consulta = "UPDATE `Test` SET `Prueba9` = '$Puntos' WHERE `Test`.`Usuario` = '$Usuario';";
mysqli_query($conexion, $consulta);
}
    
    
    
    
    
    
    
    
    mysqli_close($conexion);










?>