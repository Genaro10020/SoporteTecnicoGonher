<?php
error_reporting(0);
session_start();
if ($_SESSION["usuario"] && $_SESSION["tipo"]=="Usuario"){
include "conexionGhoner.php";
header("Content-Type: application/json");
    $arreglo = json_decode(file_get_contents('php://input'), true);
    $usuariotest=$_SESSION["usuario"];
    $tipo = $arreglo['tipo_var'];
    $video = $arreglo['video_var'];
    $consulta = "SELECT * FROM Test WHERE Usuario = '$usuariotest'";
    $resultado = $conexion->query($consulta);
    while($admin=$resultado->fetch_array()){
       
    }

    if($tipo=="capacitacion"){

        switch ($video) {
            case 'introduccion':
                    $actualizando = "UPDATE Test SET IntroVisto='1'  WHERE Usuario = '$usuariotest'";
                    if($conexion->query($actualizando)){
                        $datos="Terminado Intro";}
                break;

            case 'validacion':
                        $datos="Terminado Validacion";
                break;
            case 'sistema':
                        $datos="Terminado Sistema";
                break;
            case 'inspeccion':
                        $datos="Terminado Inspeccion";
                break;
            case 'medidor':
                    $datos="Terminado Medidor";
            break;
            case 'nivel_electrolito':
                $datos="Terminado Electrolito";
            break;
            case 'recarga':
                $actualizando = "UPDATE Test SET Video_Recarga='1'  WHERE Usuario = '$usuariotest'";
                if($conexion->query($actualizando)){
                    $datos="Terminado Recarga";
                }
            break;
            case 'prueba':
                $datos="Terminado Prueba";
            break;
            default:
                # code...
                break;
        }

    }elseif($tipo=="videos"){
        $datos="Terminado Videos";
    }else{
        header("Location: menu_cliente.php");
    }


    echo json_encode($datos);
}else{
	header("Location: index.php");
}
?>