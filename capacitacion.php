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
if($respuesta=="continuar"){
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
    <script src="https://unpkg.com/vue@next"></script>
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
 <div class="container-fluid" >

 <!--<div class="d-none d-md-none d-sm-block bg-secondary fw-bolder text-center ">ESTAS EN SM</div>
 <div class="d-none d-lg-none d-md-block bg-danger fw-bolder text-center ">ESTAS EN MD</div>
 <div class="d-none d-xl-none d-lg-block bg-dark text-danger  fw-bolder text-center ">ESTAS EN LG</div>
 <div class="d-none d-xxl-none d-xl-block bg-warning fw-bolder text-center ">ESTAS EN XL</div>
 <div class="d-none d-xxl-block bg-primary fw-bolder text-center ">ESTAS EN XXL</div>-->

			<div class="row" style="height: 10vh;">
				<div class=" col-4 col-sm-3 col-md-3 col-lg-1 p-0 ">
					<img src="Imagenes/logoenerya.png" style="width:100px; background:white; border-radius: 0px 0px 50px 0px; padding:5px;" >
				</div>
                <div class="d-flex justify-content-center col-12">
                     <h1 class="titulos animate__animated animate__pulse animate__delay-2s text-light">CAPACITACIÓN</h1>
                </div>
			</div>

 
			<div id="app" class="contenido row d-flex mt-5" style="min-height: 80vh;">
                <div class="col-12 col-sm-6 col-md-4 col-xxl-3 text-center d-flex justify-content-center"><label class="video_texto animate__animated animate__bounceIn animate__delay-2s" >Introducción</label>
                <img style="cursor: pointer" v-on:click="introduccion"  class="icono_play animate__animated animate__fadeIn animate__delay-1s " v-bind:src="intro_rutaplay" alt=""><img class="marcovideo marcovideo animate__animated animate__zoomIn" v-bind:src="intro_rutamarco" alt=""></div>
                <div class="col-12 col-sm-6 col-md-4 col-xxl-3 text-center d-flex justify-content-center"><label class="video_texto animate__animated animate__bounceIn animate__delay-2s" >Validación Póliza</label>
                <img  v-on:click="validacion" class="icono_play animate__animated animate__fadeIn animate__delay-1s " v-bind:src="vali_rutaplay" alt=""><img class="marcovideo animate__animated animate__zoomIn" v-bind:src="vali_rutamarco" alt=""></div>
                <div class="col-12 col-sm-6 col-md-4 col-xxl-3 text-center d-flex justify-content-center"><label class="video_texto animate__animated animate__bounceIn animate__delay-2s" >Sistema Eléctronico</label>
                <img  v-on:click="sistema" class="icono_play animate__animated animate__fadeIn animate__delay-1s " v-bind:src="sis_rutaplay" alt=""><img class="marcovideo animate__animated animate__zoomIn" v-bind:src="sis_rutamarco" alt=""></div>
                <div class="col-12 col-sm-6 col-md-4 col-xxl-3 text-center d-flex justify-content-center"><label class="video_texto animate__animated animate__bounceIn animate__delay-2s" >Inspección Fisíca</label>
                <img  v-on:click="inspeccion" class="icono_play animate__animated animate__fadeIn animate__delay-1s " v-bind:src="ins_rutaplay" alt=""><img class="marcovideo animate__animated animate__zoomIn" v-bind:src="ins_rutamarco" alt=""></div>
                <div class="col-12 col-sm-6 col-md-4 col-xxl-3 text-center d-flex justify-content-center"><label class="video_texto animate__animated animate__bounceIn animate__delay-2s" >Medidor Voltaje y CCA</label>
                <img  v-on:click="medidor" class="icono_play animate__animated animate__fadeIn animate__delay-1s " v-bind:src="medi_rutaplay" alt=""><img class="marcovideo animate__animated animate__zoomIn" v-bind:src="medi_rutamarco" alt=""></div>
                <div class="col-12 col-sm-6 col-md-4 col-xxl-3 text-center d-flex justify-content-center"><label class="video_texto animate__animated animate__bounceIn animate__delay-2s" >Niveles de Electrolito</label>
                <img  v-on:click="niveles" class="icono_play animate__animated animate__fadeIn animate__delay-1s " v-bind:src="nive_rutaplay" alt=""><img class="marcovideo animate__animated animate__zoomIn" v-bind:src="nive_rutamarco" alt=""></div>
                <div class="col-12 col-sm-6 col-md-4 col-xxl-3 text-center d-flex justify-content-center"><label class="video_texto animate__animated animate__bounceIn animate__delay-2s" >Coloración de Electrolito</label>
                <img  v-on:click="coloracion" class="icono_play animate__animated animate__fadeIn animate__delay-1s " v-bind:src="colo_rutaplay" alt=""><img class="marcovideo animate__animated animate__zoomIn" v-bind:src="colo_rutamarco" alt=""></div>
                <div class="col-12 col-sm-6 col-md-4 col-xxl-3 text-center d-flex justify-content-center"><label class="video_texto animate__animated animate__bounceIn animate__delay-2s" >Densidad de Electrolito</label>
                <img  v-on:click="densidad" class="icono_play animate__animated animate__fadeIn animate__delay-1s " v-bind:src="den_rutaplay" alt=""><img class="marcovideo animate__animated animate__zoomIn" v-bind:src="den_rutamarco" alt=""></div>
                <div class="col-12 col-sm-6 col-md-4 col-xxl-3 text-center d-flex justify-content-center"><label class="video_texto animate__animated animate__bounceIn animate__delay-2s" >Prueba de Descarga</label>
                <img  v-on:click="prueba" class="icono_play animate__animated animate__fadeIn animate__delay-1s " v-bind:src="pru_rutaplay" alt=""><img class="marcovideo animate__animated animate__zoomIn" v-bind:src="pru_rutamarco" alt=""></div>
                <div class="col-12 col-sm-6 col-md-4 col-xxl-3 text-center d-flex justify-content-center"><label class="video_texto animate__animated animate__bounceIn animate__delay-2s" >Diagnostico Interátivo</label>
                <img  v-on:click="diagnostico" class="icono_play animate__animated animate__fadeIn animate__delay-1s " v-bind:src="dia_rutaplay" alt=""><img class="marcovideo animate__animated animate__zoomIn" v-bind:src="dia_rutamarco" alt=""></div>
                <div class="col-12 col-md-4 col-md-8 col-xxl-6 text-center position-relative" style="min-height: 200px;">
                        <p class="texto_indicaciones  position-absolute top-0 start-50 translate-middle-x lh-sm mt-4 mt-sm-4 mt-lg-5 "> INDICACIONES <br><br> Visualiza los videos y realiza las actividades, únicamente podrás realizarlas por una ocasión cada actividad. </p>
                    <img class="contorno_comentario position-absolute top-0 start-50 translate-middle-x" src="Imagenes/borde_comentario.png" alt="">
                </div>
            </div>  

            <div class="row justify-content-between " style="min-height: 10vh;">	
                <div class="col-12 text-light d-flex ">
                 <p class="font-monospace text-warning">Soporte Técnico (Curso de capacitación)</p>
                </div>
            </div>
	      

</body>
<script>

const app = {
	data(){
		return{
            intro_rutamarco: 'Imagenes/marcovideos.png', intro_rutaplay: 'Imagenes/icono_reproducir.png',
            //introduccion: 'introduccion()',
            vali_rutamarco: 'Imagenes/marcovideos_disable.png', vali_rutaplay: 'Imagenes/icono_reproducir_disable.png',
            validacion:'',
            sis_rutamarco: 'Imagenes/marcovideos_disable.png', sis_rutaplay: 'Imagenes/icono_reproducir_disable.png',
            sistema:'',
            ins_rutamarco: 'Imagenes/marcovideos_disable.png', ins_rutaplay: 'Imagenes/icono_reproducir_disable.png',
            inspeccion:'',
            medi_rutamarco: 'Imagenes/marcovideos_disable.png', medi_rutaplay: 'Imagenes/icono_reproducir_disable.png',
            medidor:'',
            nive_rutamarco: 'Imagenes/marcovideos_disable.png', nive_rutaplay: 'Imagenes/icono_reproducir_disable.png',
            niveles:'',
            colo_rutamarco: 'Imagenes/marcovideos_disable.png', colo_rutaplay: 'Imagenes/icono_reproducir_disable.png',
            coloracion:'',
            den_rutamarco: 'Imagenes/marcovideos_disable.png', den_rutaplay: 'Imagenes/icono_reproducir_disable.png',
            densidad:'',
            pru_rutamarco: 'Imagenes/marcovideos_disable.png', pru_rutaplay: 'Imagenes/icono_reproducir_disable.png',
            prueba:'',
            dia_rutamarco: 'Imagenes/marcovideos_disable.png', dia_rutaplay: 'Imagenes/icono_reproducir_disable.png',
            diagnistico:''
		}
	},
	mounted(){
     axios.post('datos_capacitacion.php',{
        
     }).then(response =>{
        if(response.data != ''){
            console.log(response.data)
        }else{
            window.location.href = 'menu_cliente.php'
            
        }
     }).catch(function (error) {
         console.log(error)
     })
	},
    methods:{
        introduccion(){
          window.location.href="video_actividades.php?tipo=Capacitacion & video=introduccion"
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
	header("Location: index.php");
};
?>