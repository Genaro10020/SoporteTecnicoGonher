<?php

session_start();

if($_SESSION['tipo']=="admin"){

include "conexionGhoner.php";

//$usuario= $_SESSION['username'];

$Planta="";

?>

<!DOCTYPE html>

<html>

<head>

	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Cliente</title>
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

<script type="text/javascript">
    $(document).ready(function(){
            $("#telefono").on('input', function (evt) {

                // Allow only numbers.

                $(this).val($(this).val().replace(/[^0-9]/g, ''));

            });

                        $("#agregar_cliente").click(function(){

                            var boton = "Agregar Cliente";

                            var organizacion =$("#organizacion").val();

                            var ciudad =$("#ciudad").val();

                            var sucursal =$("#sucursal").val();

                            var nombre =$("#nombre").val();

                            var correo =$("#correo").val();

                            var clave =$("#clave").val();

                            var telefono =$("#telefono").val();

                            var puesto =$("#puesto").val();

                            var usuario =$("#usuario").val();

                            var tipodeusuario = $("#tipodeusuario option:selected").val();
                            

                            if (organizacion=="" || ciudad=="" || sucursal=="" || nombre =="" || correo =="" || clave == "" || telefono =="" || puesto =="" || usuario=="" ) {

                                alert("favor de completar todos los campos");

                            }else{

                                     $.ajax({ 

                                            // la URL para la petición

                                            url : 'AgregarCliente_Botones.php',

                                            // la información a enviar

                                            // (también es posible utilizar una cadena de datos)

                                            data : { "Boton" : boton, "Organizacion": organizacion,"Ciudad":ciudad,"Sucursal":sucursal,"Nombre":nombre,"Correo":correo,

                                                     "Clave":clave,"Telefono":telefono,"Responsable":puesto,"Usuario":usuario,"TipoUsuario":tipodeusuario},

                                            // especifica si será una petición POST o GET

                                            type : 'post',

                                            // el tipo de información que se espera de respuesta

                                            //dataType : 'html',

                                            // código a ejecutar si la petición es satisfactoria;

                                            // la respuesta es pasada como argumento a la función

                                            success : function(resultado) {

                                                if(resultado=="correcto"){

                                                    $("#mensaje").html("Usuario agregado con éxito");

                                                    llamandotabla();

                                                    $("#organizacion").val("");

                                                    $("#ciudad").val("");

                                                    $("#sucursal").val("");

                                                    $("#nombre").val("");

                                                    $("#correo").val("");

                                                    $("#clave").val("");

                                                    $("#telefono").val("");

                                                    $("#puesto").val("");

                                                    $("#usuario").val("");

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

                                            // código a ejecutar si la petición falla;

                                            // son pasados como argumentos a la función

                                            // el objeto de la petición en crudo y código de estatus de la petición

                                            error : function(xhr, status) {

                                                alert('Disculpe, existió un problema');

                                            },

                                            // código a ejecutar sin importar si la petición falló o no

                                            complete : function(xhr, status) {

                                                //alert('Petición realizada');

                                            }

                                        }); 

                                }       

                            

                         });//agregar cliente  



        });/*Document ready fin*/





    function confirmar(usuario){

           $("#texto_modal").html(usuario);

        }

    

    function eliminar(){

                    var boton = "Eliminar";

                    var usuario=$("#texto_modal").text();

                        $.ajax({ 

                                url : 'AgregarCliente_Botones.php',

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

        function detalles(usuario){
                $.ajax({ 
                        url : 'detalles.php',
                        data : {"usuario":usuario},
                        type : 'post',
                        success : function(resultado) {
                          $("#texto_detalles").html(resultado);      
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


    function llamandotabla(){

        $.ajax({ 

                                url : 'tabla_usuarios.php',

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





   

    

</script>





<div class="container-fluid" style=" min-height: 80vh; ">



         <div class="row align-content-center align-items-center justify-content-center text-center">

            <div class="col-4 col-sm-3 col-md-3 col-lg-1">

                <img src="Imagenes/logoenerya.png" style="width:80px;" >

            </div>

            <div class="col-8 col-sm-9 col-md-9 col-lg-11" style="height:60px; background: linear-gradient(90deg, rgba(255,255,255,1) 0%, rgba(37,33,140,0.8708215708158263) 15%, rgba(3,91,25,1) 100%);">    

                            <div style="display:flex; align-items: center; color:#efeeee; font-size:20px; height:60px;"> <div class="mx-auto fw-bolder">Soporte Técnico <span class="fw-light">capacitación virtual</span></div></div>

            </div>

  



            <div class="row justify-content-center mt-5">
                <div class="col-12 col-sm-10 col-md-6 col-lg-5">

                         <div class="input-group mb-2">
                                <div class="input-group-prepend" style="min-width: 120px;">
                                    <div class="input-group-text">Organización</div>
                                </div>
                                    <input id="organizacion" class="form-control " type="text" name="Organizacion" required >
                          </div>


                        <div class="input-group mb-2">
                            <div class="input-group-prepend" style="min-width: 120px;">
                                <div class="input-group-text">Sucursal:</div>
                            </div>
                            <input id="sucursal"  class="form-control" type="text" name="Sucursal" required>
                        </div>


                        <div class="input-group mb-2">
                            <div class="input-group-prepend" style="min-width: 120px;">
                                <div class="input-group-text">Ciudad:</div>
                            </div>
                            <input id="ciudad" class="form-control" type="text" name="Ciudad" required>
                        </div>


                        <div class="input-group mb-2">
                            <div class="input-group-prepend" style="min-width: 120px;">
                                <div class="input-group-text">Nombre:</div>
                            </div>
                            <input id="nombre"  class="form-control" type="text" name="Nombre" required>
                        </div>



                        <div class="input-group mb-2">
                            <div class="input-group-prepend" style="min-width: 120px;">
                                <div class="input-group-text">Puesto:</div>
                            </div>
                             <input id="puesto" class="form-control" type="text" name="Responsable" required>
                        </div>



                        <div class="input-group mb-2">
                            <div class="input-group-prepend" style="min-width: 120px;">
                                <div class="input-group-text">Correo:</div>
                            </div>
                            <input id="correo"  class="form-control" type="text" name="Correo" required>
                        </div>


                        <div class="input-group mb-2">
                            <div class="input-group-prepend" style="min-width: 120px;">
                                <div class="input-group-text">Teléfono:</div>
                            </div>
                            <input id="telefono" class="form-control" type="text" name="Telefono" required>
                        </div>

                        <div class="input-group mb-2">
                            <div class="input-group-prepend" style="min-width: 120px;">
                                <div class="input-group-text">Usuario:</div>
                            </div>
                            <input id="usuario"  class="form-control" type="text"  name="Usuario" required>
                        </div>


                        <div class="input-group mb-2">
                            <div class="input-group-prepend" style="min-width: 120px;">
                                <div class="input-group-text">Contraseña:</div>
                            </div>
                            <input id="clave" class="form-control" type="text"  name="Clave" required>
                        </div>


                        <div class="input-group mb-2">
                            <div class="input-group-prepend" style="min-width: 120px;">
                                <div class="input-group-text">Tipo de Usuario:</div>
                            </div>
                            <select id="tipodeusuario" class="form-control">
                                <option>Usuario</option>
                                <option>Administrador</option>
                            </select>
                        </div>





                        <input id="agregar_cliente" class="btn btn-primary mt-3" value="Guardar" type="submit">

                </div>

            </div>

            

                            <div id="correcto" class="mt-5 row justify-content-center" style="display:none;">

                            <div id="mensaje" class="col-6 align-self-center alert alert-success">Los datos se insertaron correctamente.</div>

                            </div>

                            <div id="incorrecto" class="mt-5 row justify-content-center">

                            <div id="mensajeerror" class="col-6 align-self-center alert alert-danger" style="display:none;">Error al insertar los datos.</div>

                            </div>



            <div class="row justify-content-center">

                <div id="div_tabla" class="col-12 col-sm-8 col-md-8 col-lg-8 col-xl-8 " style="font-size:14px;">



                    <?php include "tabla_usuarios.php"; ?>

                </div>    

            </div>

       </div>

    </div> 





</div>

                    <!-- The Modal -->
                    <div class="modal" id="myModalDetalles">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <!-- Modal Header -->
                                <div class="modal-header">

                                    <h4 class="modal-title">Detalles....</h4>

                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>

                                </div>
                                <!-- Modal body -->
                                <div id="texto_detalles" class="modal-body">
                                    Vacio..
                                </div>
                                <!-- Modal footer -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Aceptar</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- The Modal -->
                    <div class="modal" id="myModal">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <!-- Modal Header -->
                                <div class="modal-header">

                                    <h4 class="modal-title">Desea eliminar al usuario</h4>

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

                    



    <div  class="mt-5 "  style=" background: linear-gradient(90deg, rgba(255,255,255) 0%, rgba(37,33,140) 0%, rgba(3,91,25,1) 100%); min-height: 285px; ">



   

    </div>





 <?php  

     }else{

        header("location:index.php");

    }

    ?>