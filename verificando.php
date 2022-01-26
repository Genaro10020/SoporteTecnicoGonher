<?php
session_start();
include "conexionGhoner.php";
header("Content-Type: application/json");
$arreglo = json_decode(file_get_contents('php://input'), true);
    $usuario = $arreglo['usu'];
    $contrasena = $arreglo['pass'];
$consulta = "SELECT * FROM UsuariosServicio WHERE Usuario = '$usuario' AND Clave = '$contrasena'";
$resultado=$conexion->query($consulta);
while($admin=$resultado->fetch_array()){
        $_SESSION['usuario']=$admin['Usuario'];   
        echo $_SESSION['tipo']=$admin['tipo']; 
}

?>