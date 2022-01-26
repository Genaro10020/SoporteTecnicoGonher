<?php
error_reporting(E_ALL & ~E_NOTICE);
include "conexionGhoner.php";



$Boton=$_POST['Boton'];

$Organizacion=$_POST['Organizacion'];

$Ciudad=$_POST['Ciudad'];

$Sucursal=$_POST['Sucursal'];

$Nombre=$_POST['Nombre'];

$Correo=$_POST['Correo'];

$Clave=$_POST['Clave'];

$Telefono=$_POST['Telefono'];

$Responsable=$_POST['Responsable'];

$Usuario=$_POST['Usuario'];

$TipoDeUsuario=$_POST['TipoUsuario'];

 

if($Boton=="Agregar Cliente")

{

    $consulta = "INSERT INTO `UsuariosServicio` (`id`, `Responsable`, `Usuario`, `Clave`, `Organizacion`, `Ciudad`, `Sucursal`, `Correo`, `Telefono`,`tipo`) VALUES (NULL, '$Responsable', '$Usuario', '$Clave', '$Organizacion', '$Ciudad', '$Sucursal', '$Correo', '$Telefono','$TipoDeUsuario');";

    if(mysqli_query($conexion, $consulta)==true){
        echo "correcto";
    }else{
        echo "incorrecto";
    }

    mysqli_close($conexion);

}



if($Boton=="Eliminar")

{


    $consulta = "DELETE FROM `UsuariosServicio` WHERE `UsuariosServicio`.`Usuario` = '$Usuario';";

   if(mysqli_query($conexion, $consulta)==true){
        echo "correcto";
    }else{
        echo "incorrecto";
    }

    mysqli_close($conexion);

}



if($Boton=="Editar")

{

    

    echo "hola";

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





 //header("Location:  ../ServicioCliente/Agregar_Cliente.php");

   







?>