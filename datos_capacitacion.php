<?php
session_start();
if ($_SESSION["usuario"] && $_SESSION["tipo"]=="Usuario"){
include "conexionGhoner.php";
header("Content-Type: application/json");
//$arreglo = json_decode(file_get_contents('php://input'), true);
$usuario = $_SESSION["usuario"];

$consulta = "SELECT * FROM Test WHERE Usuario = '$usuario'";
$resultado=$conexion->query($consulta);
while($datos=$resultado->fetch_array()){
    $recopilado=$datos;
}

echo json_encode($recopilado);    

}else{
	header("Location: index.php");
}
?>