<?php
error_reporting(0);
session_start();
if ($_SESSION["usuario"] && $_SESSION["tipo"]=="Usuario"){
include "conexionGhoner.php";
header("Content-Type: application/json");
$arreglo = json_decode(file_get_contents('php://input'), true);
$actividad = $arreglo["actividad"];
$usuariotest=$_SESSION["usuario"];
$puntos = $arreglo["puntos"];

$cantidad_activiti = $arreglo["cantidad_activiti"];

$consulta = "SELECT * FROM Test WHERE Usuario = '$usuariotest'";
$resultado=$conexion->query($consulta);

if($resultado->num_rows >0){
    
  switch ($actividad) {
      case 'validacion':
                $actualizar = "UPDATE Test SET Prueba1='$puntos' WHERE Usuario = '$usuariotest'";
                $conexion->query($actualizar);
                if($actualizar==true){
                        if($cantidad_activiti=="10"){
                            $respuesta ="Fin Actividad";
                        }else{
                            $respuesta ="Actualizado".$puntos;
                        }
                    }
          break;
    case 'sistema':
                $actualizar = "UPDATE Test SET Prueba2='$puntos' WHERE Usuario = '$usuariotest'";
                $conexion->query($actualizar);
                if($actualizar==true){
                        if($cantidad_activiti=="10"){
                            $respuesta ="Fin Actividad";
                        }else{
                            $respuesta ="Actualizado".$puntos;
                        }
                    }
        break;
      default:
         
          break;
  }  
    
}else{
    $respuesta = "No se encuentra el usuario";
}


echo json_encode($respuesta);    

}else{
	header("Location: index.php");
}
?>