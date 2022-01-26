<?php
session_start();
if($_SESSION['tipo']=="Administrador"){
include "conexionGhoner.php";
$usuario=$_POST['usuario'];

$consulta = "SELECT * FROM UsuariosServicio WHERE Usuario = '$usuario'";
$query=$conexion->query($consulta);

    foreach($query as $datos)
        {
            
            echo "<div><h7>Puesto: </h7><label style='color:green;'>".$datos['Responsable'].".</label><div><hr>";
            echo "<div><h7>Oorganización: </h7><label style='color:green;'>".$datos['Organizacion'].".</label><div><hr>";
            echo "<div><h7>Ciudad: </h7><label style='color:green;'>".$datos['Ciudad'].".</label><div><hr>";
            echo "<div><h7>Sucursal: </h7><label style='color:green;'>".$datos['Sucursal'].".</label><div><hr>";
            echo "<div><h7>Teléfono: </h7><label style='color:green;'>".$datos['Telefono'].".</label><div><hr>";

            
        }

}else{
   header("location:index.php");
}
?>