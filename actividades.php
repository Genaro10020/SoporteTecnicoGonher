<?php
session_start();
if ($_SESSION["usuario"] && $_SESSION["tipo"]=="Usuario"){

    include("conexionGhoner.php");
    $usuario = $_SESSION["usuario"];
    $consulta = "SELECT * FROM Test WHERE Usuario = '$usuario'";
    $resultado=$conexion->query($consulta);
    while($datos=$resultado->fetch_array()){ 
        if($datos['TestInicial'] !="" && $datos['RespuestasTI']!= "" && $datos['IntroVisto']!= ""){
            $respuesta="continuar";
                $Prueba1=$datos['Prueba1'];
                $Prueba2=$datos['Prueba2'];
        }else{
           $respuesta = "regresar";
        }  
    }
$actividad = $_GET['actividad'];
if($respuesta=="continuar"){
    if($actividad =="validacion" && $Prueba1=="" || $actividad =="sistema" && $Prueba2==""){

    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actividades</title>
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
	
/*Pequenia*/
@media (min-width: 0px) { 

    .pushablef, .pushablev {
        border-radius: 12px;
        border: none;
        padding: 0;
        cursor: pointer;
        outline-offset: 4px;
    }
    .frontv{background: hsl(149, 58%, 50%)}
    .pushablev{background: hsl(149, 58%, 20%)}
    .frontf{background: hsl(345deg 100% 47%)}
    .pushablef{background: hsl(340deg 100% 32%)}
    .frontv, .frontf {
        display: block;
        padding: 12px 42px;
        border-radius: 12px;
        font-size: 1.15rem;
        color: white;
        transform: translateY(-6px);
    }
    .pushablev:active .frontv, .pushablef:active .frontf {
        transform: translateY(-2px);
    }
    .acumulador{height: 600px; width: 650px; }
    .titulos {font-family: 'Orbitron', sans-serif;text-shadow:-1px 2px 0px black;} 
    .texto_indicaciones{color:#9bd2ff; font-weight: bold; text-shadow:-1px 2px 0px blue;}
    .etiqueta{
        position:absolute; margin-top:350px; margin-left:30px;





      

    transform: rotate(32deg) scale(0.781) skew(29deg) translate(0px);
    -webkit-transform: rotate(32deg) scale(0.781) skew(29deg) translate(0px);
    -moz-transform: rotate(32deg) scale(0.781) skew(29deg) translate(0px);
    -o-transform: rotate(32deg) scale(0.781) skew(29deg) translate(0px);
    -ms-transform: rotate(32deg) scale(0.781) skew(29deg) translate(0px);











    }
}
/*SM*/	
@media (min-width: 576px) { 
    

}

/* Medium MD devices (tablets, 768px and up)*/
@media (min-width: 768px) {  
  
}

/* Large LG devices (desktops, 992px and up)*/
@media (min-width: 992px) { 

 }

/* X-Large devices (large desktops, 1200px and up)*/
@media (min-width: 1200px) { 

 }

/* XX-Large devices (larger desktops, 1400px and up)*/
@media (min-width: 1400px) { 
	
 }



</style>


<body style="background: rgb(32,141,152); background: radial-gradient(circle, rgba(32,141,152,1) 0%, rgba(39,196,205,1) 0%, rgba(9,11,121,1) 90%, rgba(0,19,68,1) 100%);
 background-repeat: no-repeat; background-size: 100%"  >
    <div id="app" class="container-fluid">
 
            <div class="d-none d-md-none d-sm-block bg-secondary fw-bolder text-center ">ESTAS EN SM</div>
            <div class="d-none d-lg-none d-md-block bg-danger fw-bolder text-center ">ESTAS EN MD</div>
            <div class="d-none d-xl-none d-lg-block bg-dark text-danger  fw-bolder text-center ">ESTAS EN LG</div>
            <div class="d-none d-xxl-none d-xl-block bg-warning fw-bolder text-center ">ESTAS EN XL</div>
            <div class="d-none d-xxl-block bg-primary fw-bolder text-center ">ESTAS EN XXL</div>

            <div class="row" style="min-height: 10vh;">
                    <div class=" col-4 col-sm-3 col-md-3 col-lg-1 p-0 ">
                        <img src="Imagenes/logoenerya.png" style="width:100px; background:white; border-radius: 0px 0px 50px 0px; padding:5px;" >
                    </div>
                    <div class="d-flex justify-content-center col-12">
                        <h1 class=" titulos animate__animated animate__pulse animate__delay-2s text-light">ACTIVIDAD</h1>
                    </div>
                    <div class="d-flex justify-content-center col-12">
                        <h1 class="titulos animate__animated animate__pulse animate__delay-2s text-light">{{titulo_actividad}}</h1>
                    </div>
                    <div class="d-flex justify-content-center col-12">
                    <p class="texto_indicaciones fs-5 text-center "> {{texto_indicaciones}}</p> 
                    </div> 
            </div>
                    <!---Actividad validacion-->
                    <div v-if="nombre_actividad=='validacion'" class="row mt-5" style="min-height: 80vh;">
     
                                                        <div class="row d-flex ">  
                                                                    <div class="col-12 text-center"> <img width="80"  class="etiqueta" src="Imagenes/etiqueta_poliza.jpg"><img class="acumulador" src="Imagenes/acumulador.png"> </img>
                                                                    </div>
                                                                    <!--<div class="col-12 col-sm-6 col-md-6  col-lg-4 col-xl-3 text-center"> <img class="acumulador" src="Imagenes/acumulador.png"></img></div>
                                                                    <div class="col-12 col-sm-6 col-md-6  col-lg-4 col-xl-3 text-center"> <img class="acumulador" src="Imagenes/acumulador.png"></img></div>
                                                                    <div class="col-12 col-sm-6 col-md-6  col-lg-4 col-xl-3 text-center"> <img class="acumulador" src="Imagenes/acumulador.png"></img></div>
                                                                    <div class="col-12 col-sm-6 col-md-6  col-lg-4 col-xl-3 text-center"> <img class="acumulador" src="Imagenes/acumulador.png"></img></div>
                                                                    <div class="col-12 col-sm-6 col-md-6  col-lg-4 col-xl-3 text-center"> <img class="acumulador" src="Imagenes/acumulador.png"></img></div>
                                                                    <div class="col-12 col-sm-6 col-md-6  col-lg-4 col-xl-3 text-center"> <img class="acumulador" src="Imagenes/acumulador.png"></img></div>
                                                                    <div class="col-12 col-sm-6 col-md-6  col-lg-4 col-xl-3 text-center"> <img class="acumulador" src="Imagenes/acumulador.png"></img></div>
                                                                    <div class="col-12 col-sm-6 col-md-6  col-lg-4 col-xl-3 text-center"> <img class="acumulador" src="Imagenes/acumulador.png"></img></div>
                                                                    <div class="col-12 col-sm-6 col-md-6  col-lg-4 col-xl-3 text-center"> <img class="acumulador" src="Imagenes/acumulador.png"></img></div>-->
                                                         
                                                    </div>
                                                    <div class="d-flex h-100  align-items-center justify-content-center">
                                                            <div class="div_botones row w-100">
                                                                    <div class="col-6 text-center ">
                                                                        <button class="pushablev"><span class="frontv">{{btn_verde}}</span></button>
                                                                    </div>
                                                                    <div class="col-6 text-center">
                                                                        <button class="pushablef"><span class="frontf">{{btn_rojo}}</span></button>
                                                                    </div>
                                                            </div>    
                                                    </div>
                                    
                    </div>

                    <!---Actividad validacion-->
                    <div v-else-if="nombre_actividad=='sistema'" class="row  mt-5" style="min-height: 80vh;">
                            <h3 class="text-warning">BLOQUE 2</h3>
                    </div>  

            <div class="row " style="max-height: 10vh;">	
                <div class="col-12 text-light d-flex ">
                 <p class="font-monospace text-warning">Soporte Técnico (Curso de capacitación)</p>
                </div>
            </div>
            <input id="actividad" type="hidden" value="<?php echo $actividad;?>" class="form-control">

	</div>  

</body>
</html>
<script>
const app = {
	data(){
		return{
        nombre_actividad:'',
		titulo_actividad:'', 
        texto_indicaciones:'',
        btn_verde:'',
        btn_rojo:''
		}
	},
	mounted(){
		var actividad = document.getElementById('actividad').value;
        if (actividad == "validacion"){
            this.nombre_actividad = actividad
            this.titulo_actividad = 'Validación de Póliza'
            this.texto_indicaciones = 'Verifica que los acumuladores que estén dentro del periodo de Garantía.'
            this.btn_rojo = "Sin Garantía"
            this.btn_verde = "Con Garantía"
        }
        else if (actividad == "sistema"){
            this.nombre_actividad = actividad
            this.titulo_actividad = 'Validación Eléctrico'
            this.texto_indicaciones = 'Verifica que los acumuladores esten dentro del periodo de Garantia.'
        }
        
	},
	methods:{

	}
}
var mountedApp = Vue.createApp(app).mount('#app');
</script>

<?php
}else{
    header("Location: menu_cliente.php");
}
}else{
	header("Location: menu_cliente.php");
}
}else{
	header("Location: index.php");
}
?>