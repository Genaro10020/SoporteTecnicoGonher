<?php
error_reporting(0);
session_start();
if ($_SESSION["usuario"] && $_SESSION["tipo"]=="Usuario"){
    header("Content-Type: application/json");
    $arreglo = json_decode(file_get_contents('php://input'), true);
    date_default_timezone_set('UTC');
    date_default_timezone_set("America/Mexico_City");
    $fechaActual = date('d-m-Y');
    include "conexionGhoner.php";
    $usuariotest = $arreglo['usuario_test']; 
    $consulta = "SELECT * FROM Test WHERE Usuario = '$usuariotest'";
    $resultado = $conexion->query($consulta);
    
    if(mysqli_num_rows($resultado)>0){
        while($datos=$resultado->fetch_array()){

            $separando = explode("-",$datos['FechaFinalizado']);
            $reacomodando=$separando[2]."-".$separando[1]."-".$separando[0];

            $fecha_actual = strtotime(date("d-m-Y"));
            $fecha_entrada = strtotime($reacomodando);
	
                if($fecha_actual > $fecha_entrada){
                    session_destroy();
                    echo "Fecha Caducada";
                }else{
                    echo "Si";
                }
        }

       
    }else{
        session_destroy();
        echo "No existe";
    }

}else{
	header("Location: index.php");
}
?>