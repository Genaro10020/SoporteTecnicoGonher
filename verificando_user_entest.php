<?php
session_start();
if ($_SESSION["usuario"] && $_SESSION["tipo"]=="Usuario"){
    header("Content-Type: application/json");
include "conexionGhoner.php";

$arreglo = json_decode(file_get_contents('php://input'), true);
$usuariotest = $arreglo['usuario_test']; 

$consulta = "SELECT * FROM test WHERE Usuario = '$usuariotest'";
$resultado = $conexion->query($consulta);
while($datos=$resultado->fetch_array()){
  
    if($usuariotest==$datos['Usuario']){
        echo "Existe";
    }else{
        session_destroy();
        echo "No existe";
    }   
}


}else{
	header("Location: index.php");
}
?>