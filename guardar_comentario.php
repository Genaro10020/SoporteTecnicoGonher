<?php
error_reporting(0);
session_start();
if ($_SESSION["usuario"] && $_SESSION["tipo"]=="Usuario"){
    include "conexionGhoner.php";
    header("Content-Type: application/json");
    $arreglo = json_decode(file_get_contents('php://input'), true);
    $usuario = $_SESSION["usuario"];
    $comentario=$arreglo['comentario'];
    $estrellas=$arreglo['estrellas'];
   // $recopilado="LLEGUE".$comentario;
    $actualizar = "UPDATE Test SET  Comentarios='$comentario', Estrellas='$estrellas' WHERE Usuario = '$usuario'";
    if($conexion->query($actualizar)){
        $recopilado="Comentario enviado..";
    }
    echo json_encode($recopilado);
}else{
	header("Location: index.php");
}
?>