<?php
session_start();
if($_SESSION['tipo']=="Administrador"){
include "conexionGhoner.php";
//$usuario= $_SESSION['username'];
$Planta="";
$currentDateTime = date('Y-m-d');
//sumo 15 día
$sumando=date("Y-m-d",strtotime($currentDateTime."+ 15 days")); 
?>
<!DOCTYPE html>
<html>
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado Test</title>
    <link rel="stylesheet" href="styles/css/bootstrap.min.css"></link>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="jquery/jquery3.6.0.min.js"></script>
</head>
<body>

<style type="text/css">

input[type]:focus{

    border-color: rgb(21, 168, 168);

    box-shadow: 0 0px 1px rgba(0, 133, 180, 1)inset, 0 0 4px rgba(1, 168, 227, 1);

    outline: 0 none;

    }

#lineatabla:hover{

    background:#9EC4EB;

}   

table {

  border-collapse: collapse;

  border-radius: 10px 10px 0px 0px;

  overflow: hidden;

} 



</style>
    <div class="container-fluid" style=" min-height: 20vh; ">
            <div class="row align-content-center align-items-center justify-content-center text-center">
                        <div class="col-4 col-sm-3 col-md-3 col-lg-1">
                            <img src="Imagenes/logoenerya.png" style="width:80px;" >
                        </div>
                        <div class="col-8 col-sm-9 col-md-9 col-lg-11" style="height:60px; background: linear-gradient(90deg, rgba(255,255,255,1) 0%, rgba(37,33,140,0.8708215708158263) 15%, rgba(3,91,25,1) 100%);">    
                            <div style="display:flex; align-items: center; color:#efeeee; font-size:20px; height:60px;"> <div class="mx-auto fw-bolder">Soporte Técnico <span class="fw-light">capacitación virtual</span></div></div>
                        </div>
            </div>   
    </div>

    <div class="row justify-content-center" style="min-height: 60vh;">
                <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 col-xxl-6"> 
                <p class="h5 text-center">Resultado pruebas</p>
                            <table class="table table-striped table-hover text-center">
                            <thead  style="color:white; background: linear-gradient(90deg, rgba(2,80,80,1) 0%, rgba(9,121,20,1) 100%, rgba(0,212,255,1) 100%);">
                                <tr>
                                <th scope="col">#</th>
                                <th scope="col">Usuario</th>
                                <th scope="col">P1</th>
                                <th scope="col">P2</th>
                                <th scope="col">P3</th>
                                <th scope="col">P4</th>
                                <th scope="col">P5</th>
                                <th scope="col">P6</th>
                                <th scope="col">P7</th>
                                <th scope="col">P8</th>
                                <th scope="col">P9</th>
                                <th scope="col">Resultado</th>
                                </tr>
                            </thead >
                            <tbody>
                            <?php 
                                                $cantidad=1;
                                                $consultaF4="SELECT * FROM `Test`  ORDER BY id DESC  ";
                                                $ejecutarF4=mysqli_query($conexion,$consultaF4) or die (mysqli_error($conexion));
                                                foreach($ejecutarF4 as $opciones)
                                                    {  
                                                $suma= $opciones['Prueba1'] + $opciones['Prueba2'] + $opciones['Prueba3'] + $opciones['Prueba4'] +
                                                $opciones['Prueba5'] + $opciones['Prueba6'] + $opciones['Prueba7'] + $opciones['Prueba8'] + $opciones['Prueba9'];
                                                $resultado=$suma/9;
                                                        ?>
                                                <tr id="lineatabla">
                                                    <td><?php echo $cantidad; ?></td>
                                                    <td><div class="Planta2"><?php   echo $opciones['Usuario']; ?></div></td>
                                                    <td><div class="Planta2"><?php   echo $opciones['Prueba1'];?></div></td>
                                                    <td><div class="Planta2"><?php   echo $opciones['Prueba2'];?></div></td>
                                                    <td><div class="Planta2"><?php   echo $opciones['Prueba3'];?></div></td>
                                                    <td><div class="Planta2"><?php   echo $opciones['Prueba4'];?></div></td>
                                                    <td><div class="Planta2"><?php   echo $opciones['Prueba5'];?></div></td>
                                                    <td><div class="Planta2"><?php   echo $opciones['Prueba6'];?></div></td>
                                                    <td><div class="Planta2"><?php   echo $opciones['Prueba7'];?></div></td>
                                                    <td><div class="Planta2"><?php   echo $opciones['Prueba8'];?></div></td>
                                                    <td><div class="Planta2"><?php   echo $opciones['Prueba9'];?></div></td>
                                                    <td><div class="Planta2"><h5 class="text-primary"><b><?php  echo number_format($resultado, 1);?></b></h5></div></td>
                                                </tr>
                                                <?php $cantidad++; } 

                                        ?>
                        </tbody>
                        </table>
             </div> 
    </div>

    <div  class="mt-5 "  style=" background: linear-gradient(90deg, rgba(255,255,255) 0%, rgba(37,33,140) 0%, rgba(3,91,25,1) 100%); min-height: 20vh; ">
    </div>
                        <!-- The Modal -->

                    <div class="modal" id="myModal">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Desea eliminar al Test</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <!-- Modal body -->
                                <div id="texto_modal" class="modal-body text-center">
                                    Modal body..
                                </div>
                                <!-- Modal footer -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-warning" data-bs-dismiss="modal" onclick="eliminar()">Aceptar</button>
                                </div>
                            </div>
                        </div>
                    </div>
</body>
</html>    


<?php  
     }else{
        header("location:index.php");
    }