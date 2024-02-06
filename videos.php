<?php
session_start();
if ($_SESSION["usuario"] && $_SESSION["tipo"]=="Usuario"){
    include("conexionGhoner.php");
    $usuario = $_SESSION["usuario"];
    $consulta = "SELECT * FROM Test WHERE Usuario = '$usuario'";
    $resultado=$conexion->query($consulta);
    while($datos=$resultado->fetch_array()){ 
        if($datos['TestInicial'] !="" && $datos['RespuestasTI']!= ""){
            $respuesta="continuar";
        }else{
           $respuesta = "regresar";
        }  
    }
$video_o_capacitacion = $_GET['videos_capacitacion'];
if($respuesta=="continuar"){
    if($video_o_capacitacion=="capacitacion"  || $video_o_capacitacion=="videos"){
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Capacitación</title>
    <!--CSS 5-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!--ICONS-->
    <link href="icons_libreria/css/all.css" rel="stylesheet">
    <!--FONT-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@900&display=swap" rel="stylesheet"><!--TITULOS-->
    <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet"><!--OPCIONES--> 
    <!--ANIMATE-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
     <!--VUE 3-->
     <script src="https://unpkg.com/vue@3.2.36/dist/vue.global.js"></script>
    <!--Axios--> 
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</head>
<style>
	.titulos {
                font-family: 'Orbitron', sans-serif;
                text-shadow:-1px 2px 0px black;
            } 

/*Pequenia*/
@media (min-width: 0px) { 
    .miboton {
    height:50px;
    text-align: center;
    width:200px;
    font-family: 'Rowdies', cursive;
    background: rgb(0,97,135);
    background: linear-gradient(0deg, rgba(0,97,135,1) 0%, rgba(4,65,106,1) 32%, rgba(0,26,71,1) 89%); 
	border-radius:6px;
	border:2px solid #124d77;
	cursor:pointer;
	color:#ffffff;
	font-size:20px;
	padding:7px 14px;
	text-decoration:none;
	text-shadow:-1px 2px 0px black;
    }
    .miboton:hover {
        background: rgb(23,0,94);
    background: linear-gradient(0deg, rgba(23,0,94,1) 0%, rgba(10,16,102,1) 17%, rgba(0,22,99,1) 58%, rgba(0,12,23,1) 98%);
    }
    
    .formulario{height:600px}
    .marcovideo{height:230px; z-index:0;}
    .icono_play{height:120px; position:absolute; margin-top:50px; z-index:1;}
    .contorno_comentario{height:170px;}
    .video_texto{color:white;  margin-top:160px; position:absolute;  z-index:3;}
    .texto_indicaciones{color:#76e6b9; font-weight: bold; z-index: 1; text-shadow:-1px 2px 0px black;}
    
}
/*SM*/	
@media (min-width: 576px) { 
    .marcovideo{height:180px;}
    .icono_play{height:100px; position:absolute; margin-top:30px;}
    .contorno_comentario{height:200px;}
    .video_texto{ margin-top:130px;}
  
    

}

/*MD Medium MD devices (tablets, 768px and up)*/
@media (min-width: 768px) {  
    
   
}

/*LG Large LG devices (desktops, 992px and up)*/
@media (min-width: 992px) { 
   
 }

/*XL X-Large devices (large desktops, 1200px and up)*/
@media (min-width: 1200px) { 
  
 }

/*XXL XX-Large devices (larger desktops, 1400px and up)*/
@media (min-width: 1400px) { 
    .formulario{ max-width:1000px;}
    .contenido{height:80vh;}
    .marcovideo{height:220px;}
    .video_texto{margin-top:160px;}
    .icono_play{height:120px; position:absolute; margin-top:40px;}
    .contorno_comentario{height:245px; width:700px;}
    .texto_indicaciones{font-size: 20px;margin-top:-10px;}
 }



</style>


<body style="background: rgb(32,141,255); background: radial-gradient(circle, rgba(32,141,182,1) 0%, rgba(39,196,205,1) 0%, rgba(9,11,100,1) 90%, rgba(0,19,68,100) 100%);
 background-repeat: no-repeat; background-size: 100%;">
 <div  class="container-fluid" >

 <!--<div class="d-none d-md-none d-sm-block bg-secondary fw-bolder text-center ">ESTAS EN SM</div>
 <div class="d-none d-lg-none d-md-block bg-danger fw-bolder text-center ">ESTAS EN MD</div>
 <div class="d-none d-xl-none d-lg-block bg-dark text-danger  fw-bolder text-center ">ESTAS EN LG</div>
 <div class="d-none d-xxl-none d-xl-block bg-warning fw-bolder text-center ">ESTAS EN XL</div>
 <div class="d-none d-xxl-block bg-primary fw-bolder text-center ">ESTAS EN XXL</div>-->
    <div id="app">
			<div class="row" style="min-height: 10vh;">
				<div class=" col-4 col-sm-3 col-md-3 col-lg-1 p-0 ">
                     
					<a href="menu_cliente.php"><img src="Imagenes/icono_home.png" style="width:90px; background:white; border-radius: 0px 0px 50px 0px; padding:5px; cursor:pointer" ></a>
				</div>
                <div class="d-flex justify-content-center col-12">
                     <h1 class="titulos animate__animated animate__pulse animate__delay-2s text-light">{{titulo}}</h1>
                </div>
			</div>
                    <div v-if="video_o_capacitacion=='videos'" class="col-12 justi">
                        <p class="texto_indicaciones text-center mt-4"> Visualiza los videos las veces que sean necesarias. </p>
                    </div>

			<div  class="contenido row d-flex mt-5" style="min-height: 80vh;">
               
                <div class="col-12 col-sm-6 col-md-4 col-xxl-3 text-center d-flex justify-content-center">
                    <label v-if="video_o_capacitacion=='capacitacion'" class="position-absolute  text-warning font-weight-bold fw-bold"  style="text-shadow: 1px 1px black;z-index:1;">{{puntos_IntroVisto}}</label>
                    <label  class="video_texto animate__animated animate__bounceIn animate__delay-2s" >Introducción</label>
                <img v-on:click="introduccion"  class="icono_play animate__animated animate__fadeIn animate__delay-1s " v-bind:src="intro_rutaplay" alt=""><img class="marcovideo marcovideo animate__animated animate__zoomIn" v-bind:src="intro_rutamarco" alt=""></div>
                <div class="col-12 col-sm-6 col-md-4 col-xxl-3 text-center d-flex justify-content-center">
                    <label v-if="video_o_capacitacion=='capacitacion' &&  puntos_Prueba1!=''" class="position-absolute  text-warning font-weight-bold fw-bold"  style="text-shadow: 1px 1px black;z-index:1;">Puntos: {{puntos_Prueba1}}</label>
                    <label class="video_texto animate__animated animate__bounceIn animate__delay-2s" >Validación Póliza</label>
                <img  v-on:click="validacion" class="icono_play animate__animated animate__fadeIn animate__delay-1s " v-bind:src="vali_rutaplay" alt=""><img class="marcovideo animate__animated animate__zoomIn" v-bind:src="vali_rutamarco" alt=""></div>
                <div class="col-12 col-sm-6 col-md-4 col-xxl-3 text-center d-flex justify-content-center">
                    <label v-if="video_o_capacitacion=='capacitacion' &&  puntos_Prueba2!=''" class="position-absolute  text-warning font-weight-bold fw-bold"  style="text-shadow: 1px 1px black;z-index:1">Puntos: {{puntos_Prueba2}}</label>
                    <label class="video_texto animate__animated animate__bounceIn animate__delay-2s" >Sistema Eléctrico</label>
                <img  v-on:click="sistema" class="icono_play animate__animated animate__fadeIn animate__delay-1s " v-bind:src="sis_rutaplay" alt=""><img class="marcovideo animate__animated animate__zoomIn" v-bind:src="sis_rutamarco" alt=""></div>
                <div class="col-12 col-sm-6 col-md-4 col-xxl-3 text-center d-flex justify-content-center">
                    <label v-if="video_o_capacitacion=='capacitacion' &&  puntos_Prueba3!=''" class="position-absolute  text-warning font-weight-bold fw-bold"  style="text-shadow: 1px 1px black;z-index:1">Puntos: {{puntos_Prueba3}}</label>
                    <label class="video_texto animate__animated animate__bounceIn animate__delay-2s" >Inspección Física</label>
                <img  v-on:click="inspeccion" class="icono_play animate__animated animate__fadeIn animate__delay-1s " v-bind:src="ins_rutaplay" alt="">
                <img class="marcovideo animate__animated animate__zoomIn" v-bind:src="ins_rutamarco" alt=""></div>
                <div class="col-12 col-sm-6 col-md-4 col-xxl-3 text-center d-flex justify-content-center">
                    <label v-if="video_o_capacitacion=='capacitacion' &&  puntos_Prueba4!=''" class="position-absolute  text-warning font-weight-bold fw-bold"  style="text-shadow: 1px 1px black;z-index:1">Puntos: {{puntos_Prueba4}}</label>
                    <label class="video_texto animate__animated animate__bounceIn animate__delay-2s" >Medidor de Voltaje y CCA</label>
                <img  v-on:click="medidor" class="icono_play animate__animated animate__fadeIn animate__delay-1s " v-bind:src="medi_rutaplay" alt=""><img class="marcovideo animate__animated animate__zoomIn" v-bind:src="medi_rutamarco" alt=""></div>
                <div class="col-12 col-sm-6 col-md-4 col-xxl-3 text-center d-flex justify-content-center">
                    <label v-if="video_o_capacitacion=='capacitacion' && puntos_Prueba5!=''" class="position-absolute  text-warning font-weight-bold fw-bold"  style="text-shadow: 1px 1px black;z-index:1">Puntos: {{puntos_Prueba5}}, {{puntos_Prueba6}}, {{puntos_Prueba7}}</label>
                    <label class="video_texto animate__animated animate__bounceIn animate__delay-2s lh-1" >Nivel, Coloración y densidad <br>de Electrolito</label>
                <img  v-on:click="niveles" class="icono_play animate__animated animate__fadeIn animate__delay-1s " v-bind:src="nive_rutaplay" alt=""><img class="marcovideo animate__animated animate__zoomIn" v-bind:src="nive_rutamarco" alt=""></div>
                <div class="col-12 col-sm-6 col-md-4 col-xxl-3 text-center d-flex justify-content-center">
                    <label v-if="video_o_capacitacion=='capacitacion' && puntos_Video_Recarga!='' " class="position-absolute  text-warning font-weight-bold fw-bold"  style="text-shadow: 1px 1px black;z-index:1">{{puntos_Video_Recarga}}</label>
                    <label class="video_texto animate__animated animate__bounceIn animate__delay-2s" >Proceso de Recarga</label>
                <img  v-on:click="recarga" class="icono_play animate__animated animate__fadeIn animate__delay-1s " v-bind:src="reca_rutaplay" alt=""><img class="marcovideo animate__animated animate__zoomIn" v-bind:src="reca_rutamarco" alt=""></div>
                <div class="col-12 col-sm-6 col-md-4 col-xxl-3 text-center d-flex justify-content-center">
                    <label v-if="video_o_capacitacion=='capacitacion' && puntos_Prueba8!=''" class="position-absolute  text-warning font-weight-bold fw-bold"  style="text-shadow: 1px 1px black;z-index:1">Puntos: {{puntos_Prueba8}}</label>
                    <label class="video_texto animate__animated animate__bounceIn animate__delay-2s" >Prueba de Descarga</label>
                <img v-on:click="prueba" class="icono_play animate__animated animate__fadeIn animate__delay-1s " v-bind:src="pru_rutaplay" alt=""><img class="marcovideo animate__animated animate__zoomIn" v-bind:src="pru_rutamarco" alt=""></div>
                <div  class="col-12 col-sm-6 col-md-4 col-xxl-3 text-center d-flex justify-content-center">
                    <label v-if="video_o_capacitacion=='capacitacion' && puntos_Prueba9!=''" class="position-absolute  text-warning font-weight-bold fw-bold"  style="text-shadow: 1px 1px black;z-index:1">Puntos: {{puntos_Prueba9}}</label>
                    <label  class="video_texto animate__animated animate__bounceIn animate__delay-2s" >Diagnostico Interáctivo</label>
                <img  v-on:click="diagnostico" class="icono_play animate__animated animate__fadeIn animate__delay-1s " v-bind:src="dia_rutaplay" alt=""><img  class="marcovideo animate__animated animate__zoomIn" v-bind:src="dia_rutamarco" alt=""></div>
                <div v-if="btn==true && video_o_capacitacion=='capacitacion'" class="col-12 col-sm-6 col-md-4 col-xxl-3 text-center d-flex justify-content-center">
                    <div class="d-flex justify-content-center mt-5">
                                    <div id="boton" @click="ir_menu" class="text-center miboton  animate__animated animate__pulse animate__infinite	"> Ir al menú..</div>
                    </div>
                </div>
                <div v-if="video_o_capacitacion=='capacitacion'" class="col-12 col-md-4 col-md-6 offset-md-3 text-center position-relative " style="min-height: 200px;">
                        <p class="texto_indicaciones  position-absolute top-0 start-50 translate-middle-x lh-sm mt-4 mt-sm-4 mt-lg-5 "> INDICACIONES <br><br> Visualiza los videos y realiza las actividades, únicamente podrás realizarlas por una ocasión cada actividad. </p>
                    <img class="contorno_comentario position-absolute top-0 start-50 translate-middle-x" src="Imagenes/borde_comentario.png" alt="">
                </div>
            </div>  

            <div class="row justify-content-between " style="min-height: 10vh;">	
                <div class="col-12 text-light d-flex ">
                 <p class="font-monospace text-warning">Soporte Técnico (Curso de capacitación)</p>
                </div>
            </div>
            <input id="video_o_capacitacion" type="hidden" value="<?php echo $video_o_capacitacion;?>">
    </div>
            
            
</body>
<script>
 
       
const app = {
	data(){
		return{
            video_o_capacitacion:"",
            titulo:'',
            intro_rutamarco: 'Imagenes/marcovideos.png', intro_rutaplay: 'Imagenes/icono_reproducir.png',
            intro: '',
            vali_rutamarco: 'Imagenes/marcovideos_disable.png', vali_rutaplay: 'Imagenes/icono_reproducir_disable.png',
            prueba1:'',
            sis_rutamarco: 'Imagenes/marcovideos_disable.png', sis_rutaplay: 'Imagenes/icono_reproducir_disable.png',
            prueba2:'',
            ins_rutamarco: 'Imagenes/marcovideos_disable.png', ins_rutaplay: 'Imagenes/icono_reproducir_disable.png',
            prueba3:'',
            medi_rutamarco: 'Imagenes/marcovideos_disable.png', medi_rutaplay: 'Imagenes/icono_reproducir_disable.png',
            prueba4:'',
            nive_rutamarco: 'Imagenes/marcovideos_disable.png', nive_rutaplay: 'Imagenes/icono_reproducir_disable.png',
            prueba5:'',
            reca_rutamarco: 'Imagenes/marcovideos_disable.png', reca_rutaplay: 'Imagenes/icono_reproducir_disable.png',
            video_recarga:'',
            pru_rutamarco: 'Imagenes/marcovideos_disable.png', pru_rutaplay: 'Imagenes/icono_reproducir_disable.png',
            prueba8:'',
            dia_rutamarco: 'Imagenes/marcovideos_disable.png', dia_rutaplay: 'Imagenes/icono_reproducir_disable.png',
            prueba9:'',
            btn: false,
            puntos_IntroVisto:'',
            puntos_Prueba1:'',
            puntos_Prueba2:'',
            puntos_Prueba3:'',
            puntos_Prueba4:'',
            puntos_Prueba5:'',
            puntos_Prueba6:'',
            puntos_Prueba7:'',
            puntos_Video_Recarga:'',
            puntos_Prueba8:'',
            puntos_Prueba9:'',

		}
	},
	mounted(){
        this.video_o_capacitacion = document.getElementById("video_o_capacitacion").value;
       
       if(this.video_o_capacitacion=="capacitacion"){
           this.titulo='CAPACITACIÓN'
        }
       if(this.video_o_capacitacion=="videos"){
           this.titulo='VIDEOS'
          
           
        }


       
     
        axios.post('datos_capacitacion.php',{
     }).then(response =>{
        if(response.data != ''){
            console.log(response.data)
            var iconos = document.getElementsByClassName("icono_play");
          
            
           // console.log(iconos)
            if(response.data.IntroVisto!="" ){
                    this.puntos_IntroVisto="Visto."
                    iconos[0].style.cursor='default'
                    this.intro="Visto"
                    this.agregandoCSS(1)
                }else{
                    iconos[0].style.cursor='pointer'
                }
                if(response.data.Prueba1!=""){
                    this.puntos_Prueba1=response.data.Prueba1
                    iconos[1].style.cursor='default'
                    this.prueba1="Visto"
                       this.agregandoCSS(2)
                }
                if(response.data.Prueba2!=""){
                    this.puntos_Prueba2=response.data.Prueba2
                    iconos[2].style.cursor='default'
                    this.prueba2="Visto"
                       this.agregandoCSS(3)
                }
                if(response.data.Prueba3!=""){
                    this.puntos_Prueba3=response.data.Prueba3
                    iconos[2].style.cursor='default'
                    this.prueba3="Visto"
                       this.agregandoCSS(4)
                }
                if(response.data.Prueba4!=""){
                    this.puntos_Prueba4=response.data.Prueba4
                        if(response.data.Prueba5!=""){this.puntos_Prueba5=response.data.Prueba5}
                        if(response.data.Prueba6!=""){this.puntos_Prueba6=response.data.Prueba6}
                        if(response.data.Prueba7!=""){this.puntos_Prueba7=response.data.Prueba7}
                    iconos[4].style.cursor='default'
                    this.prueba4="Visto"
                       this.agregandoCSS(5)
                }
                if(response.data.Prueba5!="" && response.data.Prueba6!="" && response.data.Prueba7!=""){
                    iconos[5].style.cursor='default'
                    this.prueba5="Visto"
                    this.prueba6="Visto"
                    this.prueba7="Visto"
                    this.agregandoCSS(6)
                }
                if(response.data.Video_Recarga!=""){
                    this.puntos_Video_Recarga="Visto."
                    iconos[6].style.cursor='default'
                    this.video_recarga="Visto"
                       this.agregandoCSS(7)
                }
                if(response.data.Prueba8!=""){
                    this.puntos_Prueba8=response.data.Prueba8
                    iconos[7].style.cursor='default'
                    this.prueba8="Visto"
                       this.agregandoCSS(8)
                }
                if(response.data.Prueba9!=""){
                    this.puntos_Prueba9=response.data.Prueba9
                    iconos[8].style.cursor='default'
                    this.prueba9="Visto"
                    this.btn=true
                       
                }

                if(this.video_o_capacitacion=="videos"){
                    this.agregandoCSS(1)
                    this.agregandoCSS(2)
                    this.agregandoCSS(3)
                    this.agregandoCSS(4)
                    this.agregandoCSS(5)
                    this.agregandoCSS(6)
                    this.agregandoCSS(7)
                  
                    iconos[0].style.cursor='pointer'
                    iconos[1].style.cursor='pointer'
                    iconos[2].style.cursor='pointer'
                    iconos[3].style.cursor='pointer'
                    iconos[4].style.cursor='pointer'
                    iconos[5].style.cursor='pointer'
                    iconos[6].style.cursor='pointer'
                    iconos[7].style.cursor='pointer'
                   
                }


        }else{
            window.location.href = 'menu_cliente.php'
        }
     }).catch(function (error) {
         console.log(error)
     })
	},
    methods:{
        agregandoCSS(num){
            var icono = document.getElementsByClassName("icono_play");
           
                if(num==1){
                    icono[1].style.cursor='pointer'
                    this.vali_rutamarco= 'Imagenes/marcovideos.png'
                    this.vali_rutaplay='Imagenes/icono_reproducir.png'
                }
                if(num==2){
                    icono[2].style.cursor='pointer'
                    this.sis_rutamarco= 'Imagenes/marcovideos.png'
                    this.sis_rutaplay='Imagenes/icono_reproducir.png'
                }else{
                    icono[2].style.cursor='default'
                }
                if(num==3){
                    icono[3].style.cursor='pointer'
                    this.ins_rutamarco= 'Imagenes/marcovideos.png'
                    this.ins_rutaplay='Imagenes/icono_reproducir.png'
                }else{
                    icono[3].style.cursor='default'
                }
                if(num==4){
                    icono[4].style.cursor='pointer'
                    this.medi_rutamarco= 'Imagenes/marcovideos.png'
                    this.medi_rutaplay='Imagenes/icono_reproducir.png'
                }else{
                    icono[4].style.cursor='default'
                }
                if(num==5){
                    icono[5].style.cursor='pointer'
                    this.nive_rutamarco= 'Imagenes/marcovideos.png'
                    this.nive_rutaplay='Imagenes/icono_reproducir.png'
                }else{
                    icono[5].style.cursor='default'
                }
                if(num==6){
                    icono[6].style.cursor='pointer'
                    this.reca_rutamarco= 'Imagenes/marcovideos.png'
                    this.reca_rutaplay='Imagenes/icono_reproducir.png'
                }else{
                    icono[6].style.cursor='default'
                }
                if(num==7){
                    icono[7].style.cursor='pointer'
                    this.pru_rutamarco= 'Imagenes/marcovideos.png'
                    this.pru_rutaplay='Imagenes/icono_reproducir.png'
                }else{
                    icono[7].style.cursor='default'
                }
                if(num==8){
                   
                    if(this.video_o_capacitacion!="videos"){
                        icono[8].style.cursor='pointer'
                        this.dia_rutamarco= 'Imagenes/marcovideos.png'
                        this.dia_rutaplay='Imagenes/icono_reproducir.png'
                    }
                   
                }else{
                    icono[8].style.cursor='default'
                }

        },
        introduccion(){
            if(this.intro!="Visto" || this.video_o_capacitacion=="videos"){
                console.log(this.intro);

                if(this.video_o_capacitacion=="videos"){
                    window.location.href="video_actividades.php?tipo=videos&video=introduccion"
                }else{
                    window.location.href="video_actividades.php?tipo=capacitacion&video=introduccion"
                }
               
            }
        },
        validacion(){
            if(this.intro!="" && this.prueba1!="Visto" || this.video_o_capacitacion=="videos" ){

                if(this.video_o_capacitacion=="videos"){
                    window.location.href="video_actividades.php?tipo=videos&video=validacion"
                }else{
                    window.location.href="video_actividades.php?tipo=capacitacion&video=validacion"
                }

            }
        },
        sistema(){
            if(this.prueba1!="" && this.prueba2!="Visto" || this.video_o_capacitacion=="videos"){

                if(this.video_o_capacitacion=="videos"){
                    window.location.href="video_actividades.php?tipo=videos&video=sistema"
                }else{
                    window.location.href="video_actividades.php?tipo=capacitacion&video=sistema"
                }
                
            }
        },
        inspeccion(){
            if(this.prueba2!="" && this.prueba3!="Visto" || this.video_o_capacitacion=="videos"){
                if(this.video_o_capacitacion=="videos"){
                    window.location.href="video_actividades.php?tipo=videos&video=inspeccion"
                }else{
                    window.location.href="video_actividades.php?tipo=capacitacion&video=inspeccion"
                }
            }
        },
        medidor(){
            if(this.prueba3!="" && this.prueba4!="Visto" || this.video_o_capacitacion=="videos"){
                if(this.video_o_capacitacion=="videos"){
                    window.location.href="video_actividades.php?tipo=videos&video=medidor"
                }else{
                    window.location.href="video_actividades.php?tipo=capacitacion&video=medidor"
                }
               
            }
        },
        niveles(){
            if(this.prueba4!="" && this.prueba5!="Visto" || this.video_o_capacitacion=="videos"){
                if(this.video_o_capacitacion=="videos"){
                    window.location.href="video_actividades.php?tipo=videos&video=nivel_electrolito"
                }else{
                    window.location.href="video_actividades.php?tipo=capacitacion&video=nivel_electrolito"
                }
               
            }
        },
        recarga(){
            if(this.prueba5!="" && this.prueba6!="" && this.prueba7!="" && this.video_recarga!="Visto" || this.video_o_capacitacion=="videos"){
                if(this.video_o_capacitacion=="videos"){
                    window.location.href="video_actividades.php?tipo=videos&video=recarga"
                }else{
                    window.location.href="video_actividades.php?tipo=capacitacion&video=recarga"
                }
               
            }
        },
        prueba(){
            if(this.video_recarga!="" && this.prueba8!="Visto" || this.video_o_capacitacion=="videos"){
                if(this.video_o_capacitacion=="videos"){
                    window.location.href="video_actividades.php?tipo=videos&video=prueba"
                }else{
                    window.location.href="video_actividades.php?tipo=capacitacion&video=prueba"
                }
               
            }
        },
        diagnostico(){
            if(this.prueba8!="" && this.prueba9!="Visto" && this.video_o_capacitacion=="capacitacion"){
                window.location.href = "actividades.php?actividad=diagnostico"
            }
        },
        ir_menu(){
            window.location.href = "menu_cliente.php";
        }
        
    },create(){
        
    }
}

var mountedApp = Vue.createApp(app).mount('#app');
</script>
</html>
<?php
}else{
    header("Location: menu_cliente.php");
}
}else{
    header("Location: menu_cliente.php");
}
}else{
	header("Location: index.php");
};
?>