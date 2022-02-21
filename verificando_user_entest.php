<?php
session_start();
if ($_SESSION["usuario"] && $_SESSION["tipo"]=="Usuario"){
    header("Content-Type: application/json");
    $arreglo = json_decode(file_get_contents('php://input'), true);
    
    include "conexionGhoner.php";
    $usuariotest = $arreglo['usuario_test']; 
    $consulta = "SELECT * FROM Test WHERE Usuario = '$usuariotest'";
    $resultado = $conexion->query($consulta);
    
    if(mysqli_num_rows($resultado)>0){
        echo "Si";
    }else{
        session_destroy();
        echo "No en test";
    }

}else{
	header("Location: index.php");
}
?>