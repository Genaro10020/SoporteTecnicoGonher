<?php
session_start();
if($_SESSION['tipo']=="Administrador"){
include "conexionGhoner.php";
?>
<!DOCTYPE html>

<html lang="en">

<head>
    <title>Menú</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Soporte Técnico</title>
    <link rel="stylesheet" href="styles/css/bootstrap.min.css"></link>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
  <script src="jquery/jquery3.6.0.min.js"></script>

</head>
<body >
    <style type="text/css">

#ac,#at{
  background: linear-gradient(8deg, rgba(18,129,213,1) 1%, rgba(17,28,98,1) 100%); 
}
#ac:hover{
    background: linear-gradient(8deg, rgba(18,10,213,1) 1%, rgba(17,28,0,1) 100%);
}
#at:hover{
    background: linear-gradient(8deg, rgba(18,10,213,1) 1%, rgba(17,28,0,1) 100%);
}
    </style>
    <div class="container-fluid" style=" min-height: 80vh; ">
        <div class="row align-content-center align-items-center justify-content-center text-center">

                <div class="col-4 col-sm-3 col-md-3 col-lg-1">

                    <img src="Imagenes/logoenerya.png" style="width:80px;" >

                </div>

                    <div class="col-8 col-sm-9 col-md-9 col-lg-11" style="height:60px; background: linear-gradient(90deg, rgba(255,255,255,1) 0%, rgba(27,85,131,1) 15%, rgba(10,8,36,1) 100%);">    

                        <div style="display:flex; align-items: center; color:#efeeee; font-size:20px; height:60px;"> <div class="mx-auto fw-bolder">Soporte Técnico <span class="fw-light">capacitación virtual</span></div></div>

                    </div>

                        
                            <div id="ac"  class="animate__animated animate__fadeInLeft fw-lighter col-8 col-sm-6 col-md-5 col-lg-5 align-self-center rounded shadow "  style="cursor: pointer; height: 150px; color:#efeeee; margin-top: 50px; " onclick='location.href="Agregar_Cliente.php"'>
                                 <div style="margin-top:30px; font-size: 25px ;" ><img src="Imagenes/clientes.png" style="width:80px;" > Agregar Cliente </div>
                            </div>
                            <div class="row">
                               
                            </div>
                              <div id="at" class="animate__animated animate__fadeInLeft fw-lighter col-8 col-sm-6 col-md-5 col-lg-5 align-self-center rounded shadow"  style="cursor: pointer; height: 150px; color:#efeeee; margin-top: 100px; " onclick="location.href='Agregar_Test.php'">
                                   <div style="margin-top:30px; font-size: 25px ;" ><img src="Imagenes/prueba.png" style="width:80px;" > Agregar Test </div>
                            </div>
                            <div class="row">
                               
                            </div>
                              <div id="at" class="animate__animated animate__fadeInLeft fw-lighter col-8 col-sm-6 col-md-5 col-lg-5 align-self-center rounded shadow"  style="cursor: pointer; height: 150px; color:#efeeee; margin-top: 100px; " onclick="location.href='Resultados_Test.php'">
                                   <div style="margin-top:30px; font-size: 25px ;" ><img src="Imagenes/resultados.png" style="width:80px;" > Reporte Resultados</div>
                            </div>




        </div>   

    </div>



    <div  class="mt-5 "  style=" background: #1b5583; min-height: 285px; ">

    </div>

</body>

</html>
 <?php  
     }else{
        header("location:index.php");
    }
?>


