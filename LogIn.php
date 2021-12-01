<?php
include "conexionGhoner.php";



$Finded="0";
$FindedDate="0";




$currentDateTime = date('Y-m-d');
$Password="Clave Unica";

$User =$_GET['User'];
$Password =$_GET['Password'];

//$User ="ensalada";
//$Password ="abc";


$consultaF2= "SELECT * FROM `UsuariosServicio` WHERE `Usuario` LIKE '$User' AND `Clave` LIKE '$Password'";
   	
$ejecutarF2=mysqli_query($conexion,$consultaF2) or die (mysqli_error($conexion));
foreach($ejecutarF2 as $opciones)
{
      
     $Clave=$opciones['Clave'];
      
}

if($Clave==$Password)
{
    $Finded="1";
    
    
}

if($Finded=="1")
{
    
    
 $consultaF2= "SELECT * FROM `Test` WHERE `Usuario` LIKE '$User'";
   	
$ejecutarF2=mysqli_query($conexion,$consultaF2) or die (mysqli_error($conexion));
foreach($ejecutarF2 as $opciones)
{
      
   $DateFinal=$opciones['FechaFinalizado'];


if($DateFinal>=$currentDateTime)

{
//echo "NO a expirado";  
$FindedDate="2";

}

else
{
    $FindedDate="1";
    "ya expiro";
}


      
} 
    
    
    
}



echo json_encode($FindedDate);
$resultado -> close();

?>