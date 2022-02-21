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
    <title>Login</title>
    <!--CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!--ICONS-->
    <link href="icons_libreria/css/all.css" rel="stylesheet">
    <!--FONT-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@900&display=swap" rel="stylesheet">
    <!--ANIMATE-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <!--VUE 3-->
    <script src="https://unpkg.com/vue@next"></script>
    <!--Axios--> 
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

</head>
        <style type="text/css">
            .titulos {
                font-family: 'Orbitron', sans-serif;
            }  
            input[type]:focus,button[type]:focus {
                border-color: rgb(21, 168, 168);
                box-shadow: 0 0px 1px rgba(0, 133, 180, 1)inset, 0 0 4px rgba(1, 168, 227, 1);
                outline: 0 none;
                }
            .animate__animated.animate__rotateIn {/* girar perilla inicial*/
                --animate-duration: 4s;
            }
            .animate__animated.animate__zoomIn {/*titulos*/
                --animate-duration: 4s;
            }



.rotate {
    -webkit-animation:spin 2s ease-in-out;
     -moz-animation:spin 2s ease-in-out;
     animation:spin 2s ease-in-out;
     
 }
 @-moz-keyframes spin {
     25%{ -webkit-transform: rotate(60deg); transform:rotate(60deg); }
     50%{ -webkit-transform: rotate(-60deg); transform:rotate(-50deg); }
     100% { -webkit-transform: rotate(210deg); transform:rotate(210deg); }
 }
 @-webkit-keyframes spin {
    25%{ -webkit-transform: rotate(60deg); transform:rotate(60deg); }
    50%{ -webkit-transform: rotate(-60deg); transform:rotate(-50deg); }
    100% { -webkit-transform: rotate(210deg); transform:rotate(210deg); }
 }
 @keyframes spin { 
    25%{ -webkit-transform: rotate(60deg); transform:rotate(60deg); }
    50%{ -webkit-transform: rotate(-60deg); transform:rotate(-50deg); }
    100% { -webkit-transform: rotate(210deg); transform:rotate(210deg); }
 }

 .rotate2 {
    -webkit-animation:spin2 2s ease-in-out;
     -moz-animation:spin2 2s ease-in-out;
     animation:spin2 2s ease-in-out;
 }
 @-moz-keyframes spin2 {
     25%{ -webkit-transform: rotate(150deg); transform:rotate(150deg); }
     50%{ -webkit-transform: rotate(-60deg); transform:rotate(-60deg); }
     75%{ -webkit-transform: rotate(100deg); transform:rotate(100deg); }
     100% { -webkit-transform: rotate(-180deg); transform:rotate(-180deg); }
 }
 @-webkit-keyframes spin2 {
    25%{ -webkit-transform: rotate(150deg); transform:rotate(150deg); }
     50%{ -webkit-transform: rotate(-60deg); transform:rotate(-60deg); }
     75%{ -webkit-transform: rotate(100deg); transform:rotate(100deg); }
     100% { -webkit-transform: rotate(-180deg); transform:rotate(-180deg); }
 }
 @keyframes spin2 { 
    25%{ -webkit-transform: rotate(150deg); transform:rotate(150deg); }
     50%{ -webkit-transform: rotate(-60deg); transform:rotate(-60deg); }
     75%{ -webkit-transform: rotate(100deg); transform:rotate(100deg); }
     100% { -webkit-transform: rotate(-180deg); transform:rotate(-180deg); }
 }


 .resultado{

     color:white;
     
 }


        </style>

<script type="text/javascript">
  
</script>
<body class="" style="background: rgb(0,212,255);
background: linear-gradient(90deg, rgba(0,212,255,1) 0%, rgba(9,7,36,1) 1%, rgba(10,8,36,1) 99%, rgba(0,212,255,1) 100%);" >

    <div class="container-fluid"   >
   <!-- background-image: url(Imagenes/fondo.jpg); background-position-x:center; background-position-y:center;  background-repeat: no-repeat; background-size: 100%; -->
        <div class="row text-center justify-content-center" style="height:5vh;"><!--ENCABEZADO-->
           
        </div><!--fin encabezada-->
        
        
        
        <div class="row  align-items-center justify-content-center " style=" height: 80vh; border-radius:20px; "><!--CUERPO-->

                    <div class="resultado"> </div>
                    <div class="row justify-content-center">         
                               <div class="row">
                                <div  class="text-center animate__animated animate__zoomIn col-10 titulos " style="color:#1d82b8; font-size:50px;">LOGIN</div>
                               </div>
                                <div class="shadow col-10 col-sm-8 col-md-6 col-lg-4 col-xl-3 col-xxl-3 mt-2"  style="background:#efefef;  border-radius: 50px 50px 10px 10px; max-width:360px;">
                                    <div class="row text-center text-light " style=" background: #1b5583;  border-radius:20px 20px 0px 0px; height:50px; display: flex; justify-content:center; align-items:center;">
                                        <b>C R E D E N C I A L E S</b><!--display:flex; justify-content: center; align-items: center;-->
                                    </div>
                                            <div id="formulario" class="row align-items-cente justify-content-center" >

                                                <form @submit.prevent="iniciarSession" >
                                                    <!--input usuario-->
                                                    <div id="" class="input-group mt-3 align-items-center">
                                                        <div class="input-group-prepend ">
                                                            <span class="input-group-text " id="basic-addon1"><i class=" mt-2 mb-2 mx-2 fas fa-user-tie" style="color: #42b4cf "></i></span>
                                                        </div>
                                                        <input id="inputuser" v-model="user" v-on:input="presiona"  :required="requerido" type="text" class="form-control" placeholder="Usuario" aria-label="Username" aria-describedby="basic-addon1" autocomplete="off">
                                                        <!--{{contador}}<br>
                                                        {{rando}}-->
                                                    </div>
                                                    <!--fin input usuario-->
                                                     <!--input password-->
                                                    <div id="segmento-password" class="input-group mt-3  align-items-center">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text " id="basic-addon1"><i class=" mt-2 mb-2 mx-2 fas fa-lock" style="color: #42b4cf "></i></span>
                                                        </div>
                                                        <input id="inputpass" v-model="password" v-on:input="presiona" :required="requerido" type="password" class="form-control" placeholder="Contraseña" aria-label="Username" aria-describedby="basic-addon1">
                                                        
                                                    </div>
                                                    <!--fin input password-->
                                                    <div class="row text-center align-items-center justify-content-center">
                                                        <div class="col-12">
                                                        <button class=" btn mt-3 mb-3" type="submit" style="background:#33c0dd; color:white;" ><i class="fas fa-sign-in-alt"></i>   Acceder</button>
                                                        </div>

                                                        <div class=" row justify-content-center">
                                                            
                                                            <img class="" src="Imagenes/candado.png" alt="" style="height: 200px; width: 160px; position: absolute; margin-top:20px;">
                                                            <img id="MyElement" class="animate__animated animate__rotateIn" src="Imagenes/candadogirar.png" alt="" style=" height: 110px; width: 135px;  position: absolute; margin-top:98px;">
                                                            
                                                        </div>

                                                    </div>
                                                    
                                                    <!--<div class="col-12 mx-auto">
                                                        <img class="img-responsive " src="Imagenes/candado.png" alt="" style=" height: 200px; width: 140px; position: absolute; margin-left:90px; margin-top:20px;">
                                                        <img class="img-responsive " src="Imagenes/candadogira.png" alt="" style=" margin-top: 20px; height: 100px; width: 100px;  position: absolute; margin-left:110px; margin-top:100px;">
                                                    </div>-->
                                                </form>

                                            </div>
                                </div>
                                <div class="col-2  col-sm-2 col-md-2 col-lg-2 col-xl-2  col-xx-2">
                                        <img class=" img-responsive " src="Imagenes/robbot.png" alt="" style=" height: 400px; width: 450px; margin-left: -142px; margin-top: 180px;">
                                </div>
                        </div>
                

        </div><!--fin cuerpo-->

        <script>

        var url="menu.php";
         const mivue ={
                data() {
                    return {
                        user: '',
                        password: '',
                        contador: 0,
                        rando: 0,
                        resultado:[],
                        requerido: true
                    }
                },
                mounted() {
                },
                methods: {
                        presiona(){
                            document.getElementById("MyElement").className = ""
                            if(this.contador==0){
                                this.contador=1
                                /*this.rando = Math.floor(Math.random() * 360)
                                document.getElementById("MyElement").style.transform = "rotate("+this.rando+"deg)";*/
                                document.getElementById("MyElement").className = "rotate";
                            }else{
                                this.contador=0
                                /*this.rando = Math.floor(Math.random() * -360)
                                document.getElementById("MyElement").style.transform = "rotate("+this.rando+"deg)";*/
                                document.getElementById("MyElement").className = "rotate2";
                            }
                        }, 
                        async iniciarSession(){

                            axios.post('verificando.php', {
                                    usu: this.user,
                                    pass: this.password
                                })
                                .then(function (response) {
                                    //console.log(response.data)
                                        
                                        if(response.data.tipo=="Administrador"){
                                            window.location.href = 'menu.php'
                                            document.getElementById("inputuser").value = ""
                                            document.getElementById("inputpass").value = ""
                                        }else{
                                            if(response.data.tipo=="Usuario"){
                                                axios({ //verificando si existe en test.
                                                    method:'POST',
                                                    url:'verificando_user_entest.php',
                                                    data:{
                                                        usuario_test: response.data.Usuario
                                                    }
                                                }).then(function(responsedos){
                                                    //console.log(responsedos.data)

                                                    if(responsedos.data=="Si"){
                                                        window.location.href = 'menu_cliente.php'
                                                        document.getElementById("inputuser").value = ""
                                                        document.getElementById("inputpass").value = ""
                                                    }else{
                                                        alert("VERIFIQUE SUS CREDENCIALES")
                                                    }

                                                }).catch(function (error) {
                                                    console.log(error);
                                                 });
                                                
                                                
                                             }else{
                                                alert("CREDENCIALES INCORRECTAS")
                                             }
                                        }
                                })
                                .catch(function (error) {
                                    console.log(error);
                                });
                            }           
                     }
            }
            var mountedApp = Vue.createApp(mivue).mount('#formulario');
        </script>

        <div class="row" style="height: 10vh;"><!--PIE-->
        </div><!--fin pie-->
    </div><!--fin container-->
</body>
</html>


<!--filter: grayscale(1);
        transition-property: filter;
        transition-duration: 1s;  -->    