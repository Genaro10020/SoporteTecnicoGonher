<?php
error_reporting(E_ALL & ~E_NOTICE);
include "conexionGhoner.php";







$Boton=$_POST['Boton'];

$Usuario=$_POST['Usuario'];

$fechaInicio=$_POST['fechaInicio'];




$currentDateTime = date('Y-m-d');



if($Boton=="Agregar Test")

{



    $consulta = "INSERT INTO `Test` (`id`, `Usuario`, `FechaActual`, `FechaFinalizado`) VALUES (NULL, '$Usuario','$currentDateTime','$fechaInicio');";

       if(mysqli_query($conexion, $consulta)==true){
            echo "correcto";
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