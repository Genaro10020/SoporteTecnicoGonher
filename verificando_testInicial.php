<?php
session_start();
if ($_SESSION["usuario"] && $_SESSION["tipo"]=="Usuario"){


echo "aqui estoy"


}else{
	header("Location: index.php");
}
?>