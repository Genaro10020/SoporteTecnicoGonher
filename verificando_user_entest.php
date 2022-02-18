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

    if(isset($datos['Usuario']){
        echo "Existe";
    }else{
        echo "No existe";
    }   
}

   /* if($resultado->num_rows>0){
        echo "existe";
    }else{
        echo "no existe";
    }*/

//echo json_encode($usuarios);

}else{
	header("Location: index.php");
}
?>