<?php
error_reporting(0);
session_start();
if ($_SESSION["usuario"] && $_SESSION["tipo"]=="Usuario"){
include "conexionGhoner.php";
header("Content-Type: application/json");
    $arreglo = json_decode(file_get_contents('php://input'), true);
    $tipo = $arreglo['tipo'];
    $video = $arreglo['video'];
    $consulta = "SELECT * FROM UsuariosServicio WHERE Usuario = '$usuario' AND Clave = '$contrasena'";
    $resultado=$conexion->query($consulta);
    while($admin=$resultado->fetch_array()){
           
            $datos = $admin;
    }

echo json_encode($datos);
}else{
	header("Location: index.php");
}
?>