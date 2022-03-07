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
@media (min-width: 0px)
{ 
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
    .acumulador{margin-top:50px; height: 300px; width: 350px; }
    .titulos {font-family: 'Orbitron', sans-serif;text-shadow:-1px 2px 0px black;} 
    .texto_indicaciones{color:#9bd2ff; font-weight: bold; text-shadow:-1px 2px 0px blue;}
    .etiqueta{width: 50px; height: 50px; position:absolute; margin-top:220px; margin-left:15px; cursor: pointer;
    transform: rotate(28deg) scale(0.781) skew(34deg) skewY(38deg) translate(0px);
    -webkit-transform: rotate(28deg) scale(0.781) skew(34deg) skewY(38deg) translate(0px);
    -moz-transform: rotate(28deg) scale(0.781) skew(34deg) skewY(38deg) translate(0px);
    -o-transform: rotate(28deg) scale(0.781) skew(34deg) skewY(38deg) translate(0px);
    -ms-transform: rotate(28deg) scale(0.781) skew(34deg) skewY(38deg) translate(0px);
    border-width: 2px;
    border-style: solid;
    border-color: purple;
    transition-duration: 2s;
    }
    .etiqueta_ver {
        -webkit-transform:scale(1);transform:scale(1); width: 350px; height: 250px; cursor: default;
    }
    .flecha{margin-top:320px; width: 100px; position: absolute; z-index:3; 
        transform: rotate(-90deg);
        -webkit-transform:rotate(-90deg);
        -moz-transform:rotate(-90deg);
        -o-transform:rotate(-90deg);
        -ms-transform:rotate(-90deg);
        animation: identifier; 
        animation-duration: 2s;
        animation-iteration-count:infinite;
    }

    @keyframes identifier {
        0% { margin-top:320px; }
        50%{ margin-top:300px;}      
        100% { margin-top:320px; }
    }    
}
/*SM*/	
@media (min-width: 576px) { 
    

}
/* Medium MD devices (tablets, 768px and up)*/
@media (min-width: 768px) {  
    .acumulador{height: 600px; width: 650px; }
    .etiqueta{width: 70px; height: 70px; position:absolute; margin-top:380px; margin-left:45px;
    }
    .etiqueta_ver{
        -webkit-transform:scale(1.3);transform:scale(1.3); width: 450px; height: 350px; cursor: default;
    }
    .flecha{margin-top:360px; width: 100px; position: absolute; z-index:3; margin-left: -80px;
        transform: rotate(0deg);
        -webkit-transform:rotate(0deg);
        -moz-transform:rotate(0deg);
        -o-transform:rotate(0deg);
        -ms-transform:rotate(0deg);
        animation: identifiere; 
        animation-duration: 2s;
        animation-iteration-count:infinite;
    }
    @keyframes identifiere {
        0%{margin-left: -80px}
        100%{margin-left: -50px}
    }
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
 
            <!--<div class="d-none d-md-none d-sm-block bg-secondary fw-bolder text-center ">ESTAS EN SM</div>
            <div class="d-none d-lg-none d-md-block bg-danger fw-bolder text-center ">ESTAS EN MD</div>
            <div class="d-none d-xl-none d-lg-block bg-dark text-danger  fw-bolder text-center ">ESTAS EN LG</div>
            <div class="d-none d-xxl-none d-xl-block bg-warning fw-bolder text-center ">ESTAS EN XL</div>
            <div class="d-none d-xxl-block bg-primary fw-bolder text-center ">ESTAS EN XXL</div>-->

            <div class="row" style="min-height: 10vh;">
                    <div class=" col-4 col-sm-3 col-md-3 col-lg-1 p-0 ">
                        <img src="Imagenes/logoenerya.png" style="width:100px; background:white; border-radius: 0px 0px 50px 0px; padding:5px;" >
                    </div>
                    <div class="d-flex justify-content-center col-12">
                        <h1 class=" titulos animate__animated animate__pulse text-light">ACTIVIDAD</h1>
                    </div>
                    <div class="d-flex justify-content-center col-12">
                        <h1 class="titulos animate__animated animate__pulse text-light">{{titulo_actividad}}</h1>
                    </div>
                    <div class="d-flex justify-content-center col-12">
                    <p class="texto_indicaciones fs-5 text-center animate__animated animate__flipInX animate__slow "> {{texto_indicaciones}}</p> 
                    </div> 
            </div>
                    <!---Actividad validacion-->
                    <div v-if="nombre_actividad=='validacion'" class="row mt-5" style="min-height: 80vh;">
     
                                                        <div class="row d-flex ">  
                                                                    <div class="col-12 text-center">
                                                                        <img v-if="visible_flecha==true" class="flecha" src="Imagenes/flecha_etiqueta.png"></img>
                                                                        <img id="etiqueta" @click="hola" class="etiqueta" src="Imagenes/etiqueta_poliza.jpg" ></img>
                                                                        <img class="acumulador" src="Imagenes/acumulador.png"> </img>
                                                                        <label class="">FA> {{fecha_actual}} FG> {{fecha_generada}} </label>
                                                                    </div>
                                                         
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
        btn_rojo:'',
        visible_flecha:true,
        dia:0,
        mes:0,
        anio:0,
        fecha_actual:'',
        fecha_generada:'',
        direfencia_meses:''
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
        hola(){
            var date = new Date()
            console.log(date)
            var new_date = new Date(date);
            this.fecha_actual.new_data
            /*var dia=f.getDate();
            var mes=f.getMonth() +1;
            var anio=f.getFullYear();
            var new_date;
            console.log(dia+"/"+mes+"/"+anio);*/
            // Obtenemos un numero aleatorio entre 1 y 60
            var add_days = Math.floor((Math.random()*60)+1);
            // Obtenemos un numero aleatorio entre 1 y 13
            var add_months = Math.floor((Math.random()*20)+1);
            // Resta los dias
            new_date.setDate(date.getDate() - add_days);
            // Resta los meses
            new_date.setMonth(new_date.getMonth() - add_months);

            this.fecha_actual=date.getFullYear()+'-'+(date.getMonth()+1)+'-'+date.getDate()
            this.fecha_generada=new_date.getFullYear()+'-'+(new_date.getMonth()+1)+'-'+new_date.getDate()
           
             // Compara anio mes y dia
            var dateFrom = new Date(this.fecha_generada);//'2020-25-12' 
            var dateTo = new Date(this.fecha_actual);//'2021-20-12' 

            console.log(dateTo.getMonth() - dateFrom.getMonth() + (12 * (dateTo.getFullYear() - dateFrom.getFullYear()))) 
           

            var etiquetas=document.getElementById("etiqueta")
            etiquetas.className += " etiqueta_ver";
            this.visible_flecha=false


        },
        
               
          

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