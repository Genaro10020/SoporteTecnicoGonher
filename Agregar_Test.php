<?php
session_start();
if($_SESSION['tipo']=="admin"){
include "conexionGhoner.php";
//$usuario= $_SESSION['username'];
$Planta="";
$currentDateTime = date('Y-m-d');
?>
<!DOCTYPE html>
<html>
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Test</title>
    <link rel="stylesheet" href="styles/css/bootstrap.min.css"></link>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="jquery/jquery3.6.0.min.js"></script>

<script type="text/javascript">


 $(document).ready(function()
    {
                        $("#guardar_test").click(function()
                          {
                            var boton = "Agregar Test";
                            var seleccion= $("#selector_usuarios").children("option:selected").val();
                            var fecha_inicial =$("#fecha_inicial").val();
                                     $.ajax({ 
                                            url : 'AgregarTest_Botones.php',
                                            data : { "Boton" : boton, "FechaInical": fecha_inicial,"Usuario":seleccion},
                                            type : 'post',
                                            success : function(resultado) {;
                                                if(resultado=="correcto"){
                                                    $("#mensaje").html("Usuario agregado con éxito");
                                                    llamandotabla();
                                                    $("#correcto").show(1000);
                                                    setTimeout(function(){
                                                        $("#correcto").hide(1000);
                                                    },3000);
                                                }else{
                                                    llamandotabla();
                                                   $("#incorrecto").show(1000);   
                                                   setTimeout(function(){
                                                    $("#incorrecto").hide(1000);
                                                   },3000); 
                                                }
                                            },
                                            error : function(xhr, status) {
                                                alert('Disculpe, existió un problema');
                                            },
                                            // código a ejecutar sin importar si la petición falló o no
                                            complete : function(xhr, status) {
                                                //alert('Petición realizada');
                                            }
                                        }); 
                         });//agregar cliente  
    });//fin documento ready

        function llamandotabla(){
                    $.ajax({ 
                                url : 'tabla_test.php',
                                data : {},
                                type : 'post',
                                success : function(resultado) {
                                    $("#div_tabla").html('');  
                                      $("#div_tabla").html(resultado);  
                                },
                                error : function(xhr, status) {
                                 alert('Disculpe, existió un problema'+xhr, status);
                                },
                            }); 
                    }

         function confirmar(usuario){
               $("#texto_modal").html(usuario);
            }


        function eliminar(){

                    var boton = "Eliminar";

                    var usuario=$("#texto_modal").text();

                        $.ajax({ 

                                url : 'AgregarTest_Botones.php',

                                data : { "Boton" : boton,"Usuario":usuario},

                                type : 'post',

                                success : function(resultado) {
 
                                    if(resultado=="correcto"){

                                        llamandotabla();

                                        $("#mensaje").html("Usuario eliminado con éxito");

                                        $("#correcto").show(1000);

                                        setTimeout(function(){

                                            $("#correcto").hide(1000);

                                        },3000);

                                    }else{

                                        llamandotabla();

                                        $("#mensaje").html("Hay un problema para eliminar este usuarios");

                                        $("#incorrecto").show(1000);   

                                        setTimeout(function(){

                                            $("#incorrecto").hide(1000);

                                        },3000); 

                                    }

                                },

                                error : function(xhr, status) {

                                    alert('Disculpe, existió un problema'+xhr, status);

                                },

                                // código a ejecutar sin importar si la petición falló o no

                                complete : function(xhr, status) {

                                    //alert('Petición realizada');

                                }

                            }); 

                }
</script>
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
    <div class="row justify-content-center" style="">
        <div class="col-8 col-sm-6 col-md-4 col-lg-4 col-xl-4 text-center position-relative shadow p-3 mb-5 bg-body rounded" style="height: 100%; border-radius: 10px 10px 10px 10px;">
            <legend><b>Agregar Test</b></legend>
            <div>
                  <label for="disabledSelect" class="form-label"></label>
                  <select id="selector_usuarios" class="form-select">
                    <?php

                                                $consultaF4="SELECT * FROM `UsuariosServicio` ORDER BY id DESC";
                                                $ejecutarF4=mysqli_query($conexion,$consultaF4) or die (mysqli_error($conexion));
                                                foreach($ejecutarF4 as $opciones)

                                                    {   
                                                        ?>
                                                         <option><?php echo $opciones['Usuario']; ?></option> 
                                                        <?php
                                                    }

                       /* $consulta = "SELECT * FROM usuariosservicio";
                        $veri=$conexion->query($consulta);
                        while($resultado=$veri->fetch_array())
                        {
                            ?>
                             <option><?php echo $resultado['Usuario']; ?></option> 
                            <?php
                        }*/
                        ?>
                   
                    ?>
                  </select>
            </div>
            <div class="mt-4">
                <input class="form-control"  type="date" id="fecha_inicial" value="<?php echo $currentDateTime?>" max="2030-01-01">
            </div>
             <input id="guardar_test" class="btn btn-primary mt-3 mb-3" value="Guardar" type="submit">

       </div>  


    </div>
                             <div id="correcto" class="row justify-content-center" style="display:none;">
                            <div id="mensaje" class="col-6 align-self-center alert alert-success">Los datos se insertaron correctamente.</div>
                            </div>
                            <div id="incorrecto" class="mt-5 row justify-content-center">
                            <div id="mensajeerror" class="col-6 align-self-center alert alert-danger" style="display:none;">Error al insertar los datos.</div>
                            </div> 

            <div class="row justify-content-center">
                <div id="div_tabla" class="col-12 col-sm-8 col-md-8 col-lg-8 col-xl-8 " style="font-size:14px;">
                    <?php include "tabla_test.php"; ?>
                </div>    
            </div>  

    <div  class="mt-5 "  style=" background: linear-gradient(90deg, rgba(255,255,255) 0%, rgba(37,33,140) 0%, rgba(3,91,25,1) 100%); min-height: 285px; ">
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