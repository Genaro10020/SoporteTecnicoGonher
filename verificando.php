<?php
session_start();
include "conexionGhoner.php";

$usuario = $_POST['usuario'];

$contrasena = $_POST['contrasena'];

$consulta = "SELECT * FROM UsuariosServicio WHERE Usuario = '$usuario' AND Clave = '$contrasena'";

$resultado=$conexion->query($consulta);

while($admin=$resultado->fetch_array()){
         $_SESSION['usuario']=$admin['tipo'];   
    echo $_SESSION['tipo']=$admin['tipo']; 
}

?>