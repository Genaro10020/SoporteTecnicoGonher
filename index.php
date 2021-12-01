<?php
error_reporting(E_ALL & ~E_NOTICE | E_STRICT);
session_start();
session_destroy();
?>
<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login Soporte Técnico</title>

    <link rel="stylesheet" href="styles/css/bootstrap.min.css"></link>

  <script src="jquery/jquery3.6.0.min.js"></script>

  <script>



 $(document).ready(function() {

            $("#acceder").click(function(){
                            var usuario =$("#usuario").val();
                            var contrasena =$("#contrasena").val();
                            
                            if(usuario=="" || contrasena==""){
                                $("#vaciousuario").fadeIn();
                                setTimeout(function() {
                                    $("#vaciousuario").fadeOut();
                                },2000);

                            }else{

                             $.ajax({
                                    // la URL para la petición
                                    url : 'verificando.php',

                                    // la información a enviar
                                    // (también es posible utilizar una cadena de datos)
                                    data : { "usuario" : usuario, "contrasena": contrasena },

                                    // especifica si será una petición POST o GET
                                    type : 'post',

                                    // el tipo de información que se espera de respuesta
                                    //dataType : 'html',
                                    // código a ejecutar si la petición es satisfactoria;
                                    // la respuesta es pasada como argumento a la función
                                    success : function(resultado) {
                                        if(resultado=="admin"){
                                            $(location).attr('href','menu.php');
                                        }else{
                                           alert("ACCESO RESTRINGIDO NO ERES ADMINISTRADOR");     
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

            });
 });

  </script>

</head>



<body>



    <div class="container-fluid" style=" min-height: 80vh; ">

        <div class="row align-content-center align-items-center justify-content-center text-center">

                <div class="col-4 col-sm-3 col-md-3 col-lg-1">

                    <img src="Imagenes/logoenerya.png" style="width:80px;" >

                </div>

                    <div class="col-8 col-sm-9 col-md-9 col-lg-11" style=" height:60px; background: linear-gradient(90deg, rgba(255,255,255,1) 0%, rgba(37,33,140,0.8708215708158263) 15%, rgba(3,91,25,1) 100%);">    

                        <div  style="display:flex; align-items: center; color:#efeeee; font-size:20px; height:60px;"> <div class="mx-auto fw-bolder">Soporte Técnico <span class="fw-light">capacitación virtual</span></div></div>

                    </div>

                

                    <div class="col-8 col-sm-6 col-lg-4 col-xl-4 col-xxl-3 offset rounded shadow"  style="color:#efeeee; margin-top: 150px; background: linear-gradient(8deg, rgba(18,129,213,1) 1%, rgba(17,28,98,1) 100%); ">

                            <img class="mt-5" src="Imagenes/ing2.png" width="30%" alt="">

                   

                                <div class="ms-4 me-4 mb-3">

                                    <label for="exampleInputEmail1" class="mt-5 form-label">USUARIO</label>

                                    <input id="usuario" type="email" class="form-control" aria-describedby="emailHelp">

                                </div>

                                <div class="ms-4 me-4 mt-2">

                                    <label for="exampleInputPassword1" class="form-label">CONTRASEÑA</label>

                                    <input id="contrasena"  type="password" class="form-control" >

                                </div>



                                <button id="acceder"  class="btn bg-light mb-3 mt-4"><img style="height:20px;" src="Imagenes/door.png"  alt=""> Acceder</button>

                    

                                <div id="vaciousuario" class="alert alert-warning" style="display:none;">

                                Favor de colocar un usuario/contraseña.

                                </div>

                    </div>

                   



        </div>   

    </div>

    <div id="resultado">

        O

    </div>

    <div  class="mt-5 "  style=" background: linear-gradient(90deg, rgba(255,255,255) 0%, rgba(37,33,140) 0%, rgba(3,91,25,1) 100%); min-height: 230px; ">

   

    </div>

</body>

</html>



