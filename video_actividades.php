<?php
session_start();
if ($_SESSION["usuario"] && $_SESSION["tipo"]=="Usuario"){
$tipo=$_GET['tipo'];
$video_solicitado=$_GET['video'];
if($tipo=="capacitacion" || $tipo=="videos"){

    if($video_solicitado=="introduccion" || $video_solicitado=="validacion" || $video_solicitado=="sistema" || $video_solicitado=="inspeccion" || $video_solicitado=="medidor" || $video_solicitado=="nivel_electrolito" || $video_solicitado=="recarga" || $video_solicitado=="prueba"){

    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Introducción</title>
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
    <link href="https://fonts.googleapis.com/css2?family=Rowdies:wght@300&display=swap" rel="stylesheet"> <!--INDICACION-->
    <!--ANIMATE-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <!--VUE 3-->
    <script src="https://unpkg.com/vue@next"></script>
    <!--Axios--> 
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</head>
<style>
.titulos, .miboton {
    font-family: 'Orbitron', sans-serif;
    text-shadow:-1px 2px 0px black;
}       

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

/*Pequenia*/
@media (min-width: 0px) { 
    .texto_indicaciones{color:#76e6b9;font-size: 1em; font-weight: bold; font-family: 'Rowdies', cursive; text-shadow:-2px 2px 2px black;}
    .etiquetavideo{width:100%}
    .container-fluid{height:100vh;}
}
/*SM*/	
@media (min-width: 576px) { 
}
/*MD Medium MD devices (tablets, 768px and up)*/
@media (min-width: 768px) {  
}
/*LG Large LG devices (desktops, 992px and up)*/
@media (min-width: 992px) { 
    .etiquetavideo{width:90%}
    .texto_indicaciones{font-size: 1.5em;}
 }

/*XL X-Large devices (large desktops, 1200px and up)*/
@media (min-width: 1200px) { 
    .etiquetavideo{width:80%}
    .container-fluid{ height:100%;}
 }

/*XXL XX-Large devices (larger desktops, 1400px and up)*/
@media (min-width: 1400px) { 
 }
</style>


<body  style="background: rgb(32,141,152); background: radial-gradient(circle, rgba(32,141,152,1) 0%, rgba(39,196,205,1) 0%, rgba(9,11,121,1) 90%, rgba(0,19,68,1) 100%);
 background-repeat: no-repeat; background-size: 100%"  >
<div id="app" class="container-fluid" >
<!--oncontextmenu="return false" onkeydown="return false"-->

 <!--<div class="d-none d-md-none d-sm-block bg-secondary fw-bolder text-center ">ESTAS EN SM</div>
 <div class="d-none d-lg-none d-md-block bg-danger fw-bolder text-center ">ESTAS EN MD</div>
 <div class="d-none d-xl-none d-lg-block bg-dark text-danger  fw-bolder text-center ">ESTAS EN LG</div>
 <div class="d-none d-xxl-none d-xl-block bg-warning fw-bolder text-center ">ESTAS EN XL</div>
 <div class="d-none d-xxl-block bg-primary fw-bolder text-center ">ESTAS EN XXL</div>-->

			<div class="row" style="min-height: 10vh;">
				<div class=" col-4 col-sm-3 col-md-3 col-lg-1 p-0 ">
                     <a href="index.php"><img src="Imagenes/icono_salir.png" style="width:75px; height:65px; background:white; border-radius: 0px 0px 50px 0px; padding:5px;" ></a>
					<!--<img src="Imagenes/logoenerya.png" style="width:100px; background:white; border-radius: 0px 0px 50px 0px; padding:5px;" >-->
				</div>
                <div class="d-flex justify-content-center col-12">
                     <h1 class="titulos animate__animated animate__flash  text-light">{{titulo}}</h1>
                </div>
			</div>

 
			<div  class="row mt-xl-2 "><!--contenido-->
                                    <div class="texto_indicaciones text-center animate__animated animate__zoomIn">
                                         Verifica que tu audio de salida este correctamente conectado, el video iniciara automaticamente y después de ver el video podrás realizar la actividad.
                                    </div>
                                    <div class=" d-flex justify-content-center mt-5">
                                        <div id="boton" @click="reproducir" class="text-center miboton  animate__animated animate__pulse animate__infinite	"> Estoy Listo..</div>
                                    </div>
                                    <div class="d-flex justify-content-center ">
                                        <video id="verificar"  class="etiquetavideo" opreload="auto" controls>
                                                <source v-if="video_solicitado=='introduccion'" id="video" src="videos/Introduccion.mp4" type="video/mp4">
                                                <source v-if="video_solicitado=='validacion'" id="video" src="videos/Validacion_Poliza.mp4" type="video/mp4">
                                                <source v-if="video_solicitado=='sistema'" id="video" src="videos/Sistema_Electrico.mp4" type="video/mp4">
                                                <source v-if="video_solicitado=='inspeccion'" id="video" src="videos/Inspeccion_Fisica.mp4" type="video/mp4">
                                                <source v-if="video_solicitado=='medidor'" id="video" src="videos/Medidor_Voltaje.mp4" type="video/mp4">
                                                <source v-if="video_solicitado=='nivel_electrolito'" id="video" src="videos/Nivel_Electrolito.mp4" type="video/mp4">
                                                <source v-if="video_solicitado=='recarga'" id="video" src="videos/Proceso_Recarga.mp4" type="video/mp4">
                                                <source v-if="video_solicitado=='prueba'" id="video" src="videos/Prueba_Descarga.mp4" type="video/mp4">
                                        </video> 
                                        
                                    </div>
            </div>  

          
            <div class="row justify-content-end mt-5 " style="min-height: 10vh;">	
                            <div class="col-12 text-light d-flex ">
                            <p class="font-monospace text-warning">Soporte Técnico (Curso de capacitación)</p>
                            </div>
            </div>
            <input id="valortipo" type="hidden" value="<?php echo $tipo;?>" class="form-control">
            <input id="valorvideo" type="hidden" value="<?php echo $video_solicitado;?>" class="form-control">
	      
         
 </div>
</body>

 
<script>

const app = {
	data(){
		return{
            titulo:'',
            tipo_solicitud:'',
            video_solicitado: '',
            revisando:0,
            video:0,
		}
	},
	mounted(){
       this.video_solicitado = document.getElementById("valorvideo").value;
       this.tipo_solicitud = document.getElementById("valortipo").value;
       console.log(this.tipo_solicitud);
       console.log(this.video_solicitado)
       if(this.video_solicitado=="introduccion"){
            this.titulo="INTRODUCCIÓN";
       }else if(this.video_solicitado=="validacion"){
            this.titulo="VALIDACIÓN PÓLIZA";
       }else if(this.video_solicitado=="sistema"){
            this.titulo="SISTEMA ELÉCTRICO";
       }else if(this.video_solicitado=="inspeccion"){
            this.titulo="INSPECCIÓN FíSICA";
       }else if(this.video_solicitado=="medidor"){
            this.titulo="MEDIDOR VOLTAJE Y CCA";
       }else if(this.video_solicitado=="nivel_electrolito"){
            this.titulo="NIVEL, COLORACIÓN Y DENSIDAD DE ELECTROLITO";
       }else if(this.video_solicitado=="recarga"){
            this.titulo="Proceso de Recarga";
       }else if(this.video_solicitado=="prueba"){
            this.titulo="Prueba de Descarga";
       }
       
        
	},  
    methods:{
        reproducir(){
            
            var boton = document.getElementById("boton").style.visibility="hidden";
            this.video = document.getElementById("verificar"); 
            this.video.load();
            this.video.play();
            this.revisando = setInterval(this.verifica_fin,700);
            
        },
         verifica_fin(){
                console.log('verificando..');
                if (this.video.ended){
                    console.log("TERMINO")
                     clearInterval(this.revisando);
                        axios.post('verificando_video.php',{
                            tipo_var:this.tipo_solicitud,
                            video_var:this.video_solicitado
                        }).then(response =>{
                            console.log("respueta"+response.data+"tipo de solicitud"+this.tipo_solicitud)

                            if(this.tipo_solicitud=="videos"){
                                window.location.href = "videos.php?videos_capacitacion=videos"
                            }else{

                                        if(response.data=="Terminado Intro" && this.tipo_solicitud=="capacitacion"){
                                            window.location.href = "videos.php?videos_capacitacion=capacitacion"
                                        }else if(response.data=="Terminado Validacion" && this.tipo_solicitud=="capacitacion"){
                                            window.location.href = "actividades.php?actividad=validacion"
                                        }else if(response.data=="Terminado Sistema" && this.tipo_solicitud=="capacitacion"){
                                            window.location.href = "actividades.php?actividad=sistema"
                                        }else if(response.data=="Terminado Inspeccion" && this.tipo_solicitud=="capacitacion"){
                                            window.location.href = "actividades.php?actividad=inspeccion"
                                        }else if(response.data=="Terminado Medidor" && this.tipo_solicitud=="capacitacion"){
                                            window.location.href = "actividades.php?actividad=medidor"
                                        }else if(response.data=="Terminado Electrolito" && this.tipo_solicitud=="capacitacion"){
                                            window.location.href = "actividades.php?actividad=nivel_electrolito"
                                        }else if(response.data=="Terminado Prueba" && this.tipo_solicitud=="capacitacion"){
                                            window.location.href = "actividades.php?actividad=prueba"
                                        }else if(response.data=="Terminado Recarga" && this.tipo_solicitud=="capacitacion"){
                                            window.location.href = "videos.php?videos_capacitacion=capacitacion"
                                        }

                            }

                        }).catch(function(error){

                        })

                 }
       
       }
        

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