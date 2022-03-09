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
    <link href="https://fonts.googleapis.com/css2?family=Rowdies:wght@300&display=swap" rel="stylesheet"> <!--PREGUNTAS-->
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
        font-weight: bold;
        color: white;
        transform: translateY(-6px);
    }
    .pushablev:active .frontv, .pushablef:active .frontf {
        transform: translateY(-2px);
    }
    .acumulador{margin-top:50px; height: 300px; width: 350px; }
    .titulos {font-family: 'Orbitron', sans-serif;text-shadow:-1px 2px 0px black;} 
    .texto_indicaciones{color:#9bd2ff; font-weight: bold; text-shadow:-1px 2px 0px blue;}
    .etiqueta{width: 50px; height: 50px; position:absolute; margin-top:220px; margin-left:15px; cursor: pointer;z-index: 1;  
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

    .fecha_poliza{
        position:absolute;
        font-family: 'Rowdies', cursive;
        margin-top:305px;
        margin-left:230px;
        z-index: 4;
        font-size: 20px;
    }
    .cantidad_actividad{
        color:#eebe0e;
        font-size: 2em;
        font-family:'Rowdies', cursive;
        text-shadow: 1px 1px black;
        
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
    .fecha_poliza{
        position:absolute;
        font-family: 'Rowdies', cursive;
        margin-top:485px;
        margin-left:365px;
        z-index: 4;
        font-size: 30px;
        opacity: 0;
    }
    
    .correcta_incorrecta{
        font-family: 'Rowdies', cursive;
        font-size: 40px;
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
                    <p class="texto_indicaciones fs-5 text-center animate__animated animate__flipInX animate__slow "> {{texto_indicaciones}} &nbsp;{{fecha_hoy}}<br>formato de fecha DIA/MES/AÑO</p> 
                    </div> 
            </div>
                    <!---Actividad validacion-->
                    <div v-if="nombre_actividad=='validacion'" class="row " style="min-height: 80vh;">
     
                                                    <div class="row d-flex ">  
                                                                    
                                                                    <div class="col-12 text-center">
                                                                    <div class="d-flex justify-content-between justify-content-md-around justify-content-xxl-evenly">
                                                                        <div class="">
                                                                            <label v-if="cantidad_actividad<=1"  class="cantidad_actividad text-center">POLIZAS: 1/10</label>
                                                                            <label  v-else class="cantidad_actividad text-center">POLIZAS: {{cantidad_actividad}}/10</label>
                                                                        </div>
                                                                        <div class="">
                                                                            <label  class="cantidad_actividad text-center">PUNTOS: {{correctas}}</label>
                                                                        </div>
                                                                    </div>
                                                                    
                                                                        <label id="fecha_poliza" class="fecha_poliza" >{{fechas_polizas}}</label>
                                                                        <img v-if="visible_flecha==true" class="flecha" src="Imagenes/flecha_etiqueta.png"></img>
                                                                        <img id="etiqueta" @click="generar_Fecha" class="etiqueta" src="Imagenes/etiqueta_poliza.jpg" ></img>
                                                                        <img id="acumulador" class="acumulador" src="Imagenes/acumulador.png"> </img>
                                                                        
                                                                    </div>
                                                         
                                                    </div>
                                                    <div class="d-flex h-full  align-items-end justify-content-center " style=" min-height:200px">
                                                            <div class="div_botones w-100  d-flex mt-5">
                                                                    <div class="col-6 text-center ">
                                                                        <button id="boton1" @click="bien_o_mal('con')" class="pushablev" disabled="true"><span class="frontv" >{{btn_verde}}</span></button>
                                                                    </div>
                                                                    
                                                                    <div class="col-6 text-center">
                                                                        <button id="boton2" @click="bien_o_mal('sin')" class="pushablef" disabled="true"><span class="frontf">{{btn_rojo}}</span></button>
                                                                    </div>
                                                                    
                                                            </div>    
                                                    </div>
                                                    <div class=" text-center" style="min-height:80px;">
                                                                    <label id="correcta_incorrecta" class="correcta_incorrecta">{{correcta_incorrecta}}</label>
                                                    </div>
                                                    
                                    
                    </div>

                    <!---Actividad validacion-->
                    <div v-else-if="nombre_actividad=='sistema'" class="row  mt-5" style="min-height: 80vh;">
                            <h3 class="text-warning">BLOQUE 2</h3>
                    </div>  

            <div class="row " style="height: 10vh;">	
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
        fecha_hoy:'',
        fechas_polizas:'',
        fecha_actual:'',
        fecha_generada:'',
        direfencia_meses:'',
        cantidad_actividad:0,
        meses:0,
        correcta_incorrecta:'',
        correctas:0,
		}
	},
	mounted(){
		var actividad = document.getElementById('actividad').value;
        if (actividad == "validacion"){
            var date = new Date()
            this.fecha_hoy=date.getDate()+'/'+(date.getMonth()+1)+'/'+date.getFullYear()
            this.nombre_actividad = actividad
            this.titulo_actividad = 'Validación de Póliza'
            this.texto_indicaciones = 'Verifica que los acumuladores estén dentro del periodo de garantía, tome en cuenta fecha actual es: '
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
        generar_Fecha(){
    
                this.cantidad_actividad++
           
            var date = new Date()
            var new_date = new Date(date);
            // Obtenemos un numero aleatorio entre 1 y 60
            var add_days = Math.floor((Math.random()*60)+1);
            // Obtenemos un numero aleatorio entre 1 y 20
            var add_months = Math.floor((Math.random()*20)+1);
            // Resta los dias
            new_date.setDate(date.getDate() - add_days);
            // Resta los meses
            new_date.setMonth(date.getMonth() - add_months);

            this.fecha_actual=date.getFullYear()+'-'+(date.getMonth()+1)+'-'+date.getDate()
            this.fecha_generada=new_date.getFullYear()+'-'+(new_date.getMonth()+1)+'-'+new_date.getDate()
            

             // Compara anio mes y dia
            var dateFrom = new Date(this.fecha_generada);//'2020-25-12' 
            var dateTo = new Date(this.fecha_actual);//'2021-20-12' 
            //calculo mese de diferencia
            this.meses = dateTo.getMonth() - dateFrom.getMonth() + (12 * (dateTo.getFullYear() - dateFrom.getFullYear())) 
            //verifico si cuenta con garantia
            if(this.meses < 12){
                console.log(this.fecha_generada+"menor a 12 menor"+this.fecha_actual+"con "+this.meses+" meses TIENE GARANTIA")
            }else{
                console.log(this.fecha_generada+"mayor a 12 meses"+this.fecha_actual+"con "+this.meses+" meses NO TIENE GARANTIA")
            }

            var label_poliza = document.getElementById("fecha_poliza")
            setTimeout(function(){
                label_poliza.style.opacity ="1"
            },2000)
            this.fechas_polizas = new_date.getDate()+"/"+(new_date.getMonth()+1)+"/"+ new_date.getFullYear();
           
            

            var boton1 = document.getElementById("boton1")
            var boton2 = document.getElementById("boton2")
            boton1.removeAttribute("disabled");
            boton2.removeAttribute("disabled");
            var etiquetas=document.getElementById("etiqueta")
            etiquetas.className += " etiqueta_ver";
            this.visible_flecha=false
        },
        bien_o_mal(respuesta){
            const prefix = 'animate__'
            const animation = 'bounceOutLeft'
            const animationName = `${prefix}${animation}`;
            
            document.getElementById("acumulador").className += " animate__animated animate__bounceOutLeft"
            setTimeout(function(){
                document.getElementById("acumulador").classList.remove(`${prefix}animated`, animationName);
                document.getElementById("acumulador").className +=" animate__animated animate__backInRight" 
            },1000)

            document.getElementById("correcta_incorrecta").style.opacity="1";
            if(this.meses<=12 && respuesta=="con"){
                //console.log("correctoCon")
                this.correcta_incorrecta="C O R R E C T A"
                this.correctas++;
                document.getElementById("correcta_incorrecta").style.cssText = "color:#26d73e; text-shadow: 2px 2px black;";
                
                

               
            } else if (this.meses>12 && respuesta=="sin"){
               // console.log("correctoSin")
                this.correcta_incorrecta="C O R R E C T A"
                this.correctas++;
                document.getElementById("correcta_incorrecta").style.cssText = "color:#26d73e; text-shadow: 2px 2px black;";
   


               
            } else if (this.meses<=12 && respuesta=="sin"){
                //console.log("IncorrectaSin")
                this.correcta_incorrecta="I N C O R R E C T A"
                document.getElementById("correcta_incorrecta").style.cssText = "color:#d64828; text-shadow: 2px 2px black;";
     


            } else if (this.meses>12 && respuesta=="con"){
               // console.log("IncorrectaCon")
                this.correcta_incorrecta="I N C O R R E C T A"
                document.getElementById("correcta_incorrecta").style.cssText = "color:#d64828; text-shadow: 2px 2px black;";
               

            }   


            axios.post('guardar_actividad_validacion_poliza.php',{
               puntos: this.correctas,
               cantidad_activiti: this.cantidad_actividad 
            }).then(response =>{
                if(response.data=='Fin Actividad'){
                    window.location.href="videos.php?videos_capacitacion=capacitacion"
                }


            }).catch(function (error){
					console.log(error)
		    });
            
                document.getElementById("etiqueta").classList.remove("etiqueta_ver")
                document.getElementById("etiqueta").style.opacity="0"
                document.getElementById("boton1").disabled="true"
                document.getElementById("boton2").disabled="true"
                document.getElementById("fecha_poliza").style.opacity="0"
                
                setTimeout(function(){
                    document.getElementById("correcta_incorrecta").style.opacity="0";
                   
                
                },2000)

                setTimeout( ()=> {
                    document.getElementById("etiqueta").style.opacity="1"
                    this.visible_flecha=true
                    }, 2000)

                this.cantidad_respuestas++
                
        }
        
               
          

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