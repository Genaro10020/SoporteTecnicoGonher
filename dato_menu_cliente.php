<?php
session_start();
include "conexionGhoner.php";
header("Content-Type: application/json");
$arreglo = json_decode(file_get_contents('php://input'), true);
$usuario = $arreglo['usu'];

$consulta = "SELECT * FROM Test WHERE Usuario = '$usuario'";
$resultado=$conexion->query($consulta);
while($datos=$resultado->fetch_array()){
    $recopilado=$datos;
}

echo json_encode($recopilado);


?>