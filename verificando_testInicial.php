<?php
error_reporting(0);
session_start();
if ($_SESSION["usuario"] && $_SESSION["tipo"]=="Usuario"){
include "conexionGhoner.php";
$consulta ="SELECT * FROM test";
$conectando = $conexion->query($consulta);
while($datos = $conectando->fetch_array()){
		$recopilando = $datos;
}

echo json_encode($recopilando);
//echo "sin realizar";

}else{
	header("Location: index.php");
}
?>