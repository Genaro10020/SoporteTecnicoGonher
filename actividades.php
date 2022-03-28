<?php
session_start();
if ($_SESSION["usuario"] && $_SESSION["tipo"]=="Usuario"){

    include("conexionGhoner.php");
    $usuario = $_SESSION["usuario"];
    $consulta = "SELECT * FROM Test WHERE Usuario = '$usuario'";
    $resultado=$conexion->query($consulta);
    while($datos=$resultado->fetch_array()){ 
        if($datos['TestInicial'] !="" && $datos['RespuestasTI']!="" && $datos['IntroVisto']!= "" ){
            $respuesta="continuar";
                $Prueba1=$datos['Prueba1'];
                $Prueba2=$datos['Prueba2'];
                $Prueba3=$datos['Prueba3'];
                $Prueba4=$datos['Prueba4'];
                $Prueba5=$datos['Prueba5'];//nivel
                $Prueba6=$datos['Prueba6'];//coloracion
                $Prueba7=$datos['Prueba7'];//densidad
                $Prueba8=$datos['Prueba8'];
                $Prueba9=$datos['Prueba9'];
        }else{
           $respuesta = "regresar";
        }  
    }

$actividad = $_GET['actividad'];
if($Prueba5!="" && $Prueba6==""){
    $actividad="coloracion_electrolito";
}
if($Prueba6!="" && $Prueba7==""){
    $actividad="densidad_electrolito";
}

if($respuesta=="continuar"){
    if($actividad =="validacion" && $Prueba1=="" || $actividad =="sistema" && $Prueba2=="" || $actividad =="inspeccion" && $Prueba3=="" || $actividad =="medidor" && $Prueba4=="" || 
    $actividad =="nivel_electrolito" && $Prueba5=="" || $actividad =="coloracion_electrolito" && $Prueba6=="" || $actividad =="densidad_electrolito" && $Prueba7=="" || $actividad =="prueba" && $Prueba8=="" || $actividad =="diagnostico" && $Prueba9==""){
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

    <script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>
    <!--ANIMATE-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <!--VUE 3-->
    <script src="https://unpkg.com/vue@next"></script>
    <!--Axios--> 
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <!--3D-->  
    <script type="module" 
    src="https://unpkg.com/@google/model-viewer/dist/model-viewer.min.js"
    ></script>
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>
   
    

    
</head>

<style>
    
	
/*Pequenia*/
@media (min-width: 0px)
{ 
    
    .pushablef, .pushablev, .pushablec {
        border-radius: 12px;
        border: none;
        padding: 0;
        cursor: pointer;
        outline-offset: 4px;
    }
    .frontv{background: hsl(149, 58%, 50%)} .pushablev{background: hsl(149, 58%, 20%)}
    .frontf{background: hsl(345deg 100% 47%)} .pushablef{background: hsl(340deg 100% 32%)}
    .frontc{background: hsl(44, 100%, 46%)} .pushablec{background: hsl(44, 98%, 29%)}
    .frontv, .frontf, .frontc {
        display: block;
        padding: 12px 42px;
        border-radius: 12px;
        font-size: 1.15rem;
        font-weight: bold;
        color: white;
        transform: translateY(-6px);
    }
    .pushablev:active .frontv, .pushablef:active .frontf, .pushablec:active .frontc{
        transform: translateY(-2px);
    }
    .acumulador{margin-top:50px; height: 300px; width: 350px; }
    .titulos {font-family: 'Orbitron', sans-serif;text-shadow:-1px 2px 0px black;} 
    .texto_indicaciones, .texto_indicaciones_pie{color:#9bd2ff; font-weight: bold; text-shadow:2px 2px 2px blue;}
    /*.texto_indicaciones_pie{color:#8ef6ff; font-weight: bold; text-shadow:2px 2px 2px  black;}*/
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

    /*ACTIVIDAD 2 SISTEMA ELECTRICO*/
    .voltaje{
        margin-top:-20px; margin-left:-40px; font-size:40px; font-family: 'Rowdies', cursive;
        -moz-transform:skewY(10deg);
        -webkit-transform:skewY(10deg);
        -o-transform:skewY(10deg);
        -ms-transform:skewY(10deg);
        transform:skewY(10deg);
    }
    .medidor{
        height:500px; width:250px;
    }
    /*FIN ACTIVIDAD 2 */
    /*INSPECCION FISICA*/
    .indicacion_zoom_direccion{
        font-family: 'Rowdies', cursive;
    }
    /* ACTIVIDAD 4*/
    .voltaje_medidor{
        margin-top:-50px; margin-left:-80px; font-size:40px; font-family: 'Rowdies', cursive;
        font-size: 60px;
    }
    /*FIN ACTIVIDAD 4 */
    /*DIAGNOSTICO INTERACTIVO*/
    .contenedor-lista {
	background: #dfbb07;
	box-shadow: 0px 0px 20px rgba(149, 153, 159, .16);
	border-radius: 10px;
    padding:20px;
    }


    .lista .opciones {
    color:#124d77;
    margin:10px;
    font-size:20px; font-family: 'Rowdies', cursive;
	background:white;
	display: grid;
	grid-template-columns: auto 1fr 1fr 1fr;
	align-items: center;
	padding: 2px;
	border-radius: 10px;
	margin-bottom: 5px;
    height: 100px;
    box-shadow: 2px 2px 2px 1px rgba(0, 0, 0, 0.2);
    cursor:move;
    }

    .lista .opciones.seleccionado {
        background:greenyellow;
        transform: scale(1) rotate(-1deg);
        box-shadow: 2px 2px 2px 1px rgba(blue);
    }
    .lista .opciones.fantasma {
            border: 2px solid #000;
    }
    .lista .opciones.arrastrar {
            opacity:0;
    }
    .lista:hover .opciones:hover{
        background:#e2fff9;
        transform: scale(1) rotate(-1deg);
        box-shadow: 2px 2px 2px 1px rgba(blue);
    }
    .div_icono{
        min-width: 100px;
    }
    .icono{
        box-shadow: 2px 2px 2px 1px rgba(0, 0, 0, 0.2);
        margin: 10px;
        background:#F3F5FA;
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


    /*FIN DIAGNOSTICO INTERACTIVO*/
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
    /*ACTIVIDAD 4 */
    .medidor_voltaje{
        height:600px;
        width: 550px;
    }
    /*FIN ACTIVIDAD 4 */
}
/* Large LG devices (desktops, 992px and up)*/
@media (min-width: 992px) { 



 }
/* X-Large devices (large desktops, 1200px and up)*/
@media (min-width: 1200px) { 


    /*ACTIVIDAD 2 SISTEMA ELECTRICO*/
    .voltaje{font-size:80px;margin-top:-50px;margin-left:-90px;}
    .medidor{height:600px; width:350px;}
    /*FIN ACTIVIDAD 2 */

 

 }
/* XX-Large devices (larger desktops, 1400px and up)*/
@media (min-width: 1400px) { 

     /*ACTIVIDAD 2 SISTEMA ELECTRICO*/
     .medidor{
        height:800px; width:450px;
    }
    /*FIN ACTIVIDAD 2 */
	
 }


#modelo{
    width:600px;
    height:550px;
    text-align:center;
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
                    <div class="d-flex justify-content-center col-12 text-center">
                        <h1 class="titulos animate__animated animate__pulse text-light">{{titulo_actividad}}</h1>
                    </div>
                    <div v-if="nombre_actividad=='validacion'" class="d-flex justify-content-center col-12">
                        <p class="texto_indicaciones fs-5 text-center animate__animated animate__bounceIn animate__slower  animate__repeat-2"> {{texto_indicaciones}} &nbsp;{{fecha_hoy}}<br>formato de fecha DIA/MES/AÑO</p> 
                    </div> 
                    <div v-if="nombre_actividad!='validacion'" class="d-flex justify-content-center col-12">
                        <p class="texto_indicaciones fs-5 text-center animate__animated animate__bounceIn animate__slower animate__repeat-2">{{texto_indicaciones}} </p> 
                    </div> 
            </div>
                    <!---INICIO Actividad validacion-->
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
                    <!---FIN Actividad validacion-->

                    <!---INICIO Actividad Sistema Electrico-->
                    <div v-else-if="nombre_actividad=='sistema'" class="row" style="min-height: 80vh;">
                                        
                                        <div class="row ">
                                                <div class="col-12 col-md-8 text-center">
                                                    <img class="img-fluid w-75 h-100 animate__animated animate__zoomIn" src="Imagenes/diagrama_sistema_electrico.png">
                                                </div>
                                                <div class="col-12 col-md-4 text-warning position-relative d-flex align-items-center justify-content-center ">
                                                    <img class="medidor animate__animated animate__zoomIn animate__delay-1s" src="Imagenes/medidor.png">
                                                    <label class="voltaje position-absolute top-50 start-50 animate__animated animate__zoomIn animate__delay-2s">{{voltaje}}</label>
                                                </div>
                                        </div>
                                        <div class="d-flex justify-content-end">
                                            <div class="col-xxl-2 ">
                                                <label  class="cantidad_actividad text-center">VERIFICACIÓN: {{cantidad_actividad}}/10</label>
                                                <label  class="cantidad_actividad text-center">PUNTOS: {{correctas}}</label>
                                            </div>
                                            <div class="col-xx-2 ">
                                            
                                            </div>
                                        </div>     
                                        <div class="d-flex h-full  align-items-start justify-content-center">
                                            <div class="div_botones w-100  d-flex mt-5">
                                                    <div class="col-6 text-center ">
                                                        <button id="boton1" @click="bien_o_mal('correcto')" class="pushablev"><span class="frontv" >{{btn_verde}}</span></button>
                                                    </div>
                                                    
                                                    <div class="col-6 text-center">
                                                        <button id="boton2" @click="bien_o_mal('incorrecto')" class="pushablef"><span class="frontf">{{btn_rojo}}</span></button>
                                                    </div>
                                                    
                                            </div>    
                                        </div>
                                        <div class=" text-center" style="min-height:80px;">
                                                                    <label id="correcta_incorrecta" class="correcta_incorrecta">{{correcta_incorrecta}}</label>
                                                                    
                                        </div>
                    </div>  
                    <!---FIN Actividad validacion-->

                    <!---INICIO Inpeccion Fisica-->
                    <div v-else-if="nombre_actividad=='inspeccion'"  style="min-height: 80vh;">
                                <div class="d-flex justify-content-center align-items-center ">
                                        <div class="d-none d-sm-block"><img src="Imagenes/mouse_girar.png" width="80"></div>
                                        <div class="d-none d-sm-block indicacion_zoom_direccion text-light ">Click sobre el Acumulador</div>
                                        <div class="d-none d-sm-block"><img src="Imagenes/scroll.png" width="80"></div>
                                        <div class="d-none d-sm-block indicacion_zoom_direccion text-light">Coloca el mouse sobre el acumulador para aplicar Zoom</div>
                                        <div class="d-block d-sm-none"><img src="Imagenes/movil_zoom.png" width="80"></div>
                                        <div class="d-block d-sm-none indicacion_zoom_direccion text-light ">Coloque sus dedos sobre el acumulador y abrir o cerrar según zoom</div>
                                        <div class="d-block d-sm-none"><img src="Imagenes/movil_laterales.png" width="80"></div>
                                        <div class="d-block d-sm-none indicacion_zoom_direccion text-light">Deslice a la izquierda o derecha para girar.</div>
                                </div>
               
                                    
                                   
                            <div class="row d-flex justify-content-center  align-items-center">
                                <div class="col-12 col-lg-7 d-flex  justify-content-center justify-content-lg-end">
                                        <model-viewer  id="modelo"  :src="url_acumulador3D" alt="A 3D model of a shishkebab" camera-controls></model-viewer></div>
                                <div class="col-12 col-lg-5 flex-column">
                                    <div class="d-flex justify-content-center justify-content-lg-start"><label  class="cantidad_actividad ">INSPECCIÓN: {{cantidad_actividad}}/10</label></div>
                                    <div class="d-flex justify-content-center justify-content-lg-start"><label  class="cantidad_actividad ">PUNTOS: {{correctas}}</label></div>
                                </div>
                            </div>
                            <div class="">
                                 <p  class="texto_indicaciones_pie fs-5 text-center animate__animated animate__bounceIn animate__slower animate__repeat-2">{{indicaciones_pie}}</p> 
                            </div>
                      
                              
                    
                            <div>
                                 <div v-if="iniciar==false" class="col-12 text-center">
                                    <button id="btn_iniciar" @click="metodoIniciar" class="pushablec"><span class="frontc" >{{btn_iniciar}}</span></button>
                                 </div>
                            </div>
                            <div v-if="iniciar!=false" class="d-flex h-full  align-items-start justify-content-center">
                                <div class="div_botones w-100  d-flex mt-5">
                                        <div class="col-6 text-center ">
                                            <button id="boton1" @click="bien_o_mal('sin')" class="pushablev animate__animated animate__zoomIn"><span class="frontv" >{{btn_verde}}</span></button>
                                        </div>
                                        
                                        <div class="col-6 text-center">
                                            <button id="boton2" @click="bien_o_mal('con')" class="pushablef animate__animated animate__zoomIn"><span class="frontf">{{btn_rojo}}</span></button>
                                        </div>
                                </div>    
                            </div>
                            <div class=" text-center" >
                                        <label id="correcta_incorrecta" class="correcta_incorrecta">{{correcta_incorrecta}}</label>
                            </div>

                    </div> 
                    <!---FIN Inpeccion Fisica-->
                     <!---INICIO Medidor Voltaje y CCA-->
                     <div v-else-if="nombre_actividad=='medidor'"  style="min-height: 80vh;">
                              
                            <div class="position-relative d-flex justify-content-center">
                                    <img class="medidor_voltaje animate__animated animate__zoomIn animate__slower z-index-1 img-fluid" src="Imagenes/medidor_voltaje.png">
                                    <label  id="voltaje_medidor" class="voltaje_medidor position-absolute top-50 start-50 z-index-2 animate__animated animate__zoomIn animate__delay-2s text-warning">{{voltaje}}</label>
                            </div>
                            <div class="d-flex-colum">
                            
                               
                                <div class="d-flex justify-content-center"><label  class="cantidad_actividad animate__animated animate__zoomIn animate__delay-1s">VERIFICACIÓN: {{cantidad_actividad}}/10</label></div>
                                <div  class="d-flex justify-content-center"><label  class="cantidad_actividad animate__animated animate__zoomIn animate__delay-1s">PUNTOS: {{correctas}}</label></div>    
                            </div>
                                        
                            <div  class="d-flex  align-items-start justify-content-center ">
                                <div class="div_botones w-100  d-flex mt-5">
                                        <div class="col-6 text-center ">
                                            <button id="boton1" @click="bien_o_mal('correcto')" class="pushablev animate__animated animate__zoomIn animate__delay-1s"><span class="frontv" >{{btn_verde}}</span></button>
                                        </div>
                                        
                                        <div class="col-6 text-center">
                                            <button id="boton2" @click="bien_o_mal('incorrecto')" class="pushablef animate__animated animate__zoomIn animate__delay-1s"><span class="frontf">{{btn_rojo}}</span></button>
                                        </div>
                                </div>    
                            </div>
                            <div class=" text-center" >
                                        <label id="correcta_incorrecta" class="correcta_incorrecta">{{correcta_incorrecta}}</label>
                            </div>

                    </div> 
                    <!---FIN Medidor Voltaje y CCA-->
                      <!---INICIO nivel de electrolito-->
                      <div v-else-if="nombre_actividad=='nivel_electrolito' || nombre_actividad=='coloracion_electrolito' || nombre_actividad=='densidad_electrolito' || nombre_actividad=='prueba'"  style="min-height: 80vh;">
                                <div v-if="nombre_actividad=='nivel_electrolito' || nombre_actividad=='coloracion_electrolito'" class="d-flex justify-content-center align-items-center ">
                                        <div class="d-none d-sm-block"><img src="Imagenes/mouse_girar.png" width="80"></div>
                                        <div class="d-none d-sm-block indicacion_zoom_direccion text-light ">Click sobre el Acumulador</div>
                                        <div class="d-none d-sm-block"><img src="Imagenes/scroll.png" width="80"></div>
                                        <div class="d-none d-sm-block indicacion_zoom_direccion text-light">Coloca el mouse sobre el acumulador para aplicar Zoom</div>
                                        <div class="d-block d-sm-none"><img src="Imagenes/movil_zoom.png" width="80"></div>
                                        <div class="d-block d-sm-none indicacion_zoom_direccion text-light ">Coloque sus dedos sobre el acumulador y abrir o cerrar según zoom</div>
                                        <div class="d-block d-sm-none"><img src="Imagenes/movil_laterales.png" width="80"></div>
                                        <div class="d-block d-sm-none indicacion_zoom_direccion text-light">Deslice a la izquierda o derecha para girar.</div>
                                </div>
                            <div class="row d-flex justify-content-center  align-items-center">
                                <div class="col-12 col-lg-7 d-flex  justify-content-center justify-content-lg-end">
                                        <model-viewer v-if="nombre_actividad=='nivel_electrolito' || nombre_actividad=='coloracion_electrolito'" 
                                        camera-orbit="45deg 55deg 2.5m" id="modelo"  :src="url_acumulador3D" alt="A 3D model of a shishkebab" camera-controls>
                                        </model-viewer>
                                        <img  v-if="nombre_actividad=='densidad_electrolito'" :src="url_acumulador3D" height="600" width="450">
                                        <img  v-if="nombre_actividad=='prueba'" :src="url_acumulador3D" height="600" width="600">
                                    </div>
                                    
                                <div class="col-12 col-lg-5 flex-column">
                                    <div class="d-flex justify-content-center justify-content-lg-start"><label  id="cantidad_actividad"  class="cantidad_actividad ">INSPECCIÓN: {{cantidad_actividad}}/10</label></div>
                                    <div class="d-flex justify-content-center justify-content-lg-start"><label  id="cantidad_actividad"  class="cantidad_actividad ">PUNTOS: {{correctas}}</label></div>
                                </div>
                            </div>
                            <div class="">
                                 <p  class="texto_indicaciones_pie fs-5 text-center animate__animated animate__bounceIn animate__slower animate__repeat-2">{{indicaciones_pie}}</p> 
                                 
                                 
                            </div>
                            <div>
                                 <div v-if="iniciar==false" class="col-12 text-center">
                                    <button id="btn_iniciar" @click="metodoIniciar" class="pushablec"><span class="frontc" >{{btn_iniciar}}</span></button>
                                 </div>
                            </div>
                            <div v-if="iniciar!=false" class="d-flex h-full  align-items-start justify-content-center">
                                <div class="div_botones w-100  d-flex mt-5">
                                        <div class="col-6 text-center ">
                                            <button id="boton1" @click="bien_o_mal('sin')" class="pushablev animate__animated animate__zoomIn"><span class="frontv" >{{btn_verde}}</span></button>
                                        </div>
                                        
                                        <div class="col-6 text-center">
                                            <button id="boton2" @click="bien_o_mal('con')" class="pushablef animate__animated animate__zoomIn"><span class="frontf">{{btn_rojo}}</span></button>
                                        </div>
                                </div>    
                            </div>
                            <div class=" text-center" >
                                        <label id="correcta_incorrecta" class="correcta_incorrecta">{{correcta_incorrecta}}</label>
                            </div>

                    </div> 
                    <!---FIN Nivel de Electrolito-->
                     <!---INICIO Diagnostico Interactivo-->
                     <div v-else-if="nombre_actividad=='diagnostico'"  style="min-height: 80vh;">
                            <div class="row">
                                <div class="col-12 col-md-8 contenedor-lista">
                                    <div class="lista" id="lista">
                                        <div class="d-flex opciones col-12" data-id="2">
                                                <div class="div_icono col-4">
                                                <img class="icono rounded-circle" width="90" height="90" src="Imagenes/diagrama_sistema_electrico.png" alt="">
                                                </div>
                                                <div class="col-8">
                                                Revisión del sistema eléctrico 
                                                </div>      
                                    </div>
                                        
                                        <div class="d-flex opciones col-12" data-id="5">
                                                <div class="div_icono col-4">
                                                    <img class="icono rounded-circle" width="90" height="90" src="Imagenes/densidad_electrolito3.jpg" alt="">
                                                </div>
                                                <div class="col-8">
                                                    Niveles, coloración y densidad de electrolito
                                                </div> 
                                        </div>
                                        <div class="d-flex opciones col-12" data-id="1">
                                                <div class="div_icono col-4">
                                                    <img class="icono rounded-circle" width="90" height="90" src="Imagenes/etiqueta_poliza.jpg" alt="">
                                                </div>
                                                <div class="col-8">
                                                    Revisión de póliza
                                                </div> 
                                        </div>
                                        <div class="d-flex opciones col-12" data-id="7">
                                                <div class="div_icono col-4">
                                                    <img class="icono rounded-circle" width="90" height="90" src="Imagenes/prueba_de_descarga1.jpg" alt="">
                                                </div>
                                                <div class="col-8">
                                                    Prueba de descarga
                                                </div> 
                                        </div>
                                        
                                        <div class="d-flex opciones col-12" data-id="3">
                                                <div class="div_icono col-4 ">
                                                    <img class="icono rounded-circle " width="90" height="90" src="Imagenes/acumulador.png" alt="">
                                                </div>
                                                <div class="col-8">
                                                    Inpección Fisica
                                                </div> 
                                        </div>
                                        <div class="d-flex opciones col-12" data-id="4">
                                                    <div class="div_icono col-4">
                                                        <img class="icono rounded-circle" width="90" height="90" src="Imagenes/medidor_voltaje.png" alt="">
                                                    </div>
                                                    <div class="col-8">
                                                        Toma de voltaje y CCA
                                                    </div> 
                                        </div>
                                        <div class="d-flex opciones col-12" data-id="6">
                                                <div class="div_icono col-4">
                                                    <img class="icono rounded-circle" width="90" height="90" src="Imagenes/prueba_de_descarga0.jpg" alt="">
                                                </div>
                                                <div class="col-8">
                                                    Proceso de carga
                                                </div> 
                                        </div>
                                        
                                    </div>
                                    <div class="row justify-content-center">
                                    <div id="boton" class="col-12 text-center miboton  animate__animated animate__pulse" onclick="ya_ordenado('<?php echo $actividad; ?>')" style="display:none;">Ya lo ordene.</div>
                                    </div>
                                </div>

                                <div class="col-12 col-md-4 mt-5">
                                        <img src="Imagenes/gif_rag_drop.gif" class="img-fluid"  alt=""></img>  
                                </div>
                            </div>
                    </div> 
                    <!---FIN Medidor diagnostico interactivo-->
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


var actividad = document.getElementById('actividad').value;
if (actividad == "validacion"){//ACTIVIDAD VALIDACION
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
                        const sonido = new Audio('Audios/correcto.mp3')
                        sonido.play();

                    } else if (this.meses>12 && respuesta=="sin"){
                    // console.log("correctoSin")
                        this.correcta_incorrecta="C O R R E C T A"
                        this.correctas++;
                        document.getElementById("correcta_incorrecta").style.cssText = "color:#26d73e; text-shadow: 2px 2px black;";
                        const sonido = new Audio('Audios/correcto.mp3')
                        sonido.play();

                    } else if (this.meses<=12 && respuesta=="sin"){
                        //console.log("IncorrectaSin")
                        this.correcta_incorrecta="I N C O R R E C T A"
                        document.getElementById("correcta_incorrecta").style.cssText = "color:#d64828; text-shadow: 2px 2px black;";
                        const sonido = new Audio('Audios/incorrecto.mp3')
                        sonido.play();
            


                    } else if (this.meses>12 && respuesta=="con"){
                    // console.log("IncorrectaCon")
                        this.correcta_incorrecta="I N C O R R E C T A"
                        document.getElementById("correcta_incorrecta").style.cssText = "color:#d64828; text-shadow: 2px 2px black;";
                        const sonido = new Audio('Audios/incorrecto.mp3')
                        sonido.play();
                    }   


                    axios.post('guardar_actividades.php',{
                    actividad: this.nombre_actividad,
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
        }else if (actividad == "sistema"){//ACTIVIDAD SISTEMA ELÉCTRICO--------------------------------------------------------------
            const app = {
                    data(){
                        return{
                        nombre_actividad:'',
                        titulo_actividad:'', 
                        texto_indicaciones:'',
                        btn_verde:'',
                        btn_rojo:'',
                        voltaje:0,
                        cantidad_actividad:1,
                        correctas:0,
                        correcta_incorrecta:'',
                        true_false:null,
                        }
                    },
                    mounted(){
                            var actividad = document.getElementById('actividad').value;
                            this.nombre_actividad = actividad
                            this.titulo_actividad = 'Sistema Eléctrico'
                            this.texto_indicaciones = 'Revisa el sistema eléctrico y verifica que el voltaje este dentro del rango de operación de un vehículo convencional.'
                            this.btn_verde ='Buen Voltaje'
                            this.btn_rojo ='Mal Voltaje'
                            var random=(Math.random() * (2)+13 ).toFixed(1)
                            this.voltaje =random
                            
                            
                    },
                    methods:{
                        bien_o_mal(respuesta){
                               this.true_false=this.inRange(this.voltaje,13.5, 14.5)
                                    if(this.true_false==true){
                                            if(respuesta=="correcto"){
                                                this.correctas++
                                                this.correcta_incorrecta="C O R R E C T O"
                                                document.getElementById("correcta_incorrecta").style.cssText = "color:#26d73e; text-shadow: 2px 2px black;"; 
                                                const sonido = new Audio('Audios/correcto.mp3')
                                                sonido.play();
                                                
                                            }else{
                                                this.correcta_incorrecta="I N C O R R E C T O"
                                                document.getElementById("correcta_incorrecta").style.cssText = "color:#d64828; text-shadow: 2px 2px black;";
                                                const sonido = new Audio('Audios/incorrecto.mp3')
                                                sonido.play();
                                            }
                                    }
                                    if(this.true_false==false){
                                            if(respuesta=="incorrecto"){
                                                this.correctas++
                                                this.correcta_incorrecta="C O R R E C T O"
                                                document.getElementById("correcta_incorrecta").style.cssText = "color:#26d73e; text-shadow: 2px 2px black;"; 
                                                const sonido = new Audio('Audios/correcto.mp3')
                                                sonido.play();

                                            }else{
                                                this.correcta_incorrecta="I N C O R R E C T O"
                                                document.getElementById("correcta_incorrecta").style.cssText = "color:#d64828; text-shadow: 2px 2px black;";
                                                const sonido = new Audio('Audios/incorrecto.mp3')
                                                sonido.play();
                                            }
                                    }
                                    console.log(this.nombre_actividad)
                                axios.post('guardar_actividades.php',{
                                    actividad: this.nombre_actividad,
                                    puntos: this.correctas,
                                    cantidad_activiti: this.cantidad_actividad 
                                    }).then(response =>{
                                        console.log(response.data)
                                        if(response.data=='Fin Actividad'){
                                            window.location.href="videos.php?videos_capacitacion=capacitacion"
                                        }else{
                                            if(this.cantidad_actividad<10){this.cantidad_actividad++}
                                        }


                                    }).catch(function (error){
                                            console.log(error)
                                    });
                            document.getElementById("boton1").disabled = true; 
                            document.getElementById("boton2").disabled = true;   
                            setTimeout( ()=>{
                                document.getElementById("correcta_incorrecta").style.opacity="0";
                                document.getElementById("boton1").disabled = false;
                                document.getElementById("boton2").disabled = false;
                                var randon = (Math.random() * (2)+13 ).toFixed(1)
                                this.voltaje=randon;
                            },2000)
                                      
                        },
                        inRange(x, min, max) {
                                return ((x-min)*(x-max) <= 0);
                            }  
                        }
                }   
                var mountedApp = Vue.createApp(app).mount('#app');
        }else if (actividad == "inspeccion"){//ACTIVIDAD SISTEMA INSPECCION--------------------------------------------------------------
            const app = {
                    data(){
                        return{
                        nombre_actividad:'',
                        titulo_actividad:'', 
                        texto_indicaciones:'',
                        indicaciones_pie:'',
                        btn_iniciar:'',
                        btn_verde:'',
                        btn_rojo:'',
                        voltaje:0,
                        cantidad_actividad:0,
                        correctas:0,
                        correcta_incorrecta:'',
                        true_false:null,
                        iniciar:false,
                        url_acumulador3D: '3D/acumulador0.glb',
                        numero: 0
                        }
                    },
                    mounted(){
                            var actividad = document.getElementById('actividad').value;
                            this.nombre_actividad = actividad
                            this.titulo_actividad = 'Inspección Física'
                            this.texto_indicaciones = 'Verifica que el acumulador no cuente con daños físicos.'
                            this.btn_iniciar ='Iniciar'
                            this.btn_verde ='Sin Daño'
                            this.btn_rojo ='Con Daño'
                            this.indicaciones_pie='Ejemplo: Acumulador en buenas condiciones, presione sobre el acumulador y girelo. Iniciar si está listo.'
     
                    },
                    methods:{
                            metodoIniciar(){
                                document.getElementById("btn_iniciar").className +=" animate__animated animate__zoomOut"
                               // document.getElementById("acumulador").className += " animate__animated animate__bounceOutLeft"
                               this.numero=Math.floor(Math.random() *(10-1))+1;
                               console.log(this.numero)
                               this.url_acumulador3D = '3D/acumulador'+this.numero+'.glb' 
                            setTimeout(()=>{
                                this.iniciar=true
                                this.cantidad_actividad=1
                                this.indicaciones_pie="Gire el acumulador, realice la inspección física y conteste."
                             },1000)
                              
                            },
                            bien_o_mal(respuesta){
                                console.log(this.numero)
                                
                                if(this.numero==1 && respuesta =='con'){this.correctas++;
                                    this.correcta_incorrecta="C O R R E C T O"
                                    document.getElementById("correcta_incorrecta").style.cssText = "color:#26d73e; text-shadow: 2px 2px black;";
                                    const sonido = new Audio('Audios/correcto.mp3')
                                    sonido.play();
                                }else if(this.numero==2 && respuesta =='sin'){this.correctas++;
                                    this.correcta_incorrecta="C O R R E C T O"
                                    document.getElementById("correcta_incorrecta").style.cssText = "color:#26d73e; text-shadow: 2px 2px black;";
                                    const sonido = new Audio('Audios/correcto.mp3')
                                    sonido.play();
                                }else if(this.numero==3 && respuesta =='con'){this.correctas++;
                                    this.correcta_incorrecta="C O R R E C T O"
                                    document.getElementById("correcta_incorrecta").style.cssText = "color:#26d73e; text-shadow: 2px 2px black;";
                                    const sonido = new Audio('Audios/correcto.mp3')
                                    sonido.play();
                                }else if(this.numero==4 && respuesta =='sin'){this.correctas++;
                                    this.correcta_incorrecta="C O R R E C T O"
                                    document.getElementById("correcta_incorrecta").style.cssText = "color:#26d73e; text-shadow: 2px 2px black;";
                                    const sonido = new Audio('Audios/correcto.mp3')
                                    sonido.play();
                                }else if(this.numero==5 && respuesta =='con'){this.correctas++;
                                    this.correcta_incorrecta="C O R R E C T O"
                                    document.getElementById("correcta_incorrecta").style.cssText = "color:#26d73e; text-shadow: 2px 2px black;";
                                    const sonido = new Audio('Audios/correcto.mp3')
                                    sonido.play();
                                }else if(this.numero==6 && respuesta =='con'){this.correctas++;
                                    this.correcta_incorrecta="C O R R E C T O"
                                    document.getElementById("correcta_incorrecta").style.cssText = "color:#26d73e; text-shadow: 2px 2px black;";
                                    const sonido = new Audio('Audios/correcto.mp3')
                                    sonido.play();
                                }else if(this.numero==7 && respuesta =='con'){this.correctas++;
                                    this.correcta_incorrecta="C O R R E C T O"
                                    document.getElementById("correcta_incorrecta").style.cssText = "color:#26d73e; text-shadow: 2px 2px black;";
                                    const sonido = new Audio('Audios/correcto.mp3')
                                    sonido.play();
                                }else if(this.numero==8 && respuesta =='con'){this.correctas++;
                                    this.correcta_incorrecta="C O R R E C T O"
                                    document.getElementById("correcta_incorrecta").style.cssText = "color:#26d73e; text-shadow: 2px 2px black;";
                                    const sonido = new Audio('Audios/correcto.mp3')
                                    sonido.play();
                                }else if(this.numero==9 && respuesta =='con'){this.correctas++;
                                    this.correcta_incorrecta="C O R R E C T O"
                                    document.getElementById("correcta_incorrecta").style.cssText = "color:#26d73e; text-shadow: 2px 2px black;";
                                    const sonido = new Audio('Audios/correcto.mp3')
                                    sonido.play();
                                }else if(this.numero==10 && respuesta =='con'){this.correctas++;
                                    this.correcta_incorrecta="C O R R E C T O"
                                    document.getElementById("correcta_incorrecta").style.cssText = "color:#26d73e; text-shadow: 2px 2px black;";
                                    const sonido = new Audio('Audios/correcto.mp3')
                                    sonido.play();
                                }else {
                                    this.correcta_incorrecta="I N C O R R E C T O"
                                    document.getElementById("correcta_incorrecta").style.cssText = "color:#d64828; text-shadow: 2px 2px black;";
                                    const sonido = new Audio('Audios/incorrecto.mp3')
                                    sonido.play();
                                }
                                   
                                

                                

                                console.log('Correctas'+this.correctas+'Numero:'+this.numero+'Respuesta:'+respuesta); 
                                    axios.post('guardar_actividades.php',{
                                        actividad: this.nombre_actividad,
                                        puntos: this.correctas,
                                        cantidad_activiti: this.cantidad_actividad
                                    }).then(response=>{
                                        if(response.data=='Fin Actividad'){
                                            window.location.href="videos.php?videos_capacitacion=capacitacion"
                                        }else{
                                            if(this.cantidad_actividad<10){this.cantidad_actividad++ }
                                            console.log(response.data)
                                            this.numero=Math.floor(Math.random() *(10-1))+1;
                                            this.url_acumulador3D = '3D/acumulador'+this.numero+'.glb' 
                                            console.log(this.numero)
                                        }

                                        
                                    })
                                    setTimeout( ()=>{
                                        document.getElementById("correcta_incorrecta").style.opacity="0";
                                    },2000)
                            }
                        }
                }                
                var mountedApp = Vue.createApp(app).mount('#app');
        }else if (actividad == "medidor"){//ACTIVIDAD SISTEMA MEDIDOR--------------------------------------------------------------
            const app = {
                data(){
                    return{
                        nombre_actividad:'',
                        titulo_actividad:'', 
                        texto_indicaciones:'',
                        indicaciones_pie:'',
                        btn_verde:'',
                        btn_rojo:'',
                        voltaje:0,
                        url_acumulador3D:'3D/acumulador0.glb',
                        cantidad_actividad:1,
                        correctas:0,
                        correcta_incorrecta:'',
                        true_false:null,
                        iniciar:false,
                        numero: 0
                        }
                },
                mounted(){
                            var actividad = document.getElementById('actividad').value;
                            this.nombre_actividad = actividad
                            this.titulo_actividad = 'Estado de Carga'
                            this.texto_indicaciones = 'Revise el siguiete diagnóstico y confirme si el resultado es adecuado.'
                            this.btn_verde ='Adecuado'
                            this.btn_rojo ='Recargar'
                            this.indicaciones_pie='Ejemplo: Acumulador en buenas condiciones, presione sobre el acumulador y girelo. Iniciar si está listo.'
                            var randon = (Math.random() * (1-0)+12 ).toFixed(2)
                            this.voltaje = randon
                },
                methods:{
                       bien_o_mal(respuesta){
                       
                        console.log(this.cantidad_actividad)
                        document.getElementById("boton1").disabled ="true"
                        document.getElementById("boton2").disabled ="true"
                        document.getElementById("voltaje_medidor").style.opacity =0;
                        document.getElementById("correcta_incorrecta").style.opacity = 1;

                        if(this.voltaje >= 12.65 && respuesta=="correcto"){
                            this.correctas++
                            this.correcta_incorrecta="C O R R E C T O"
                            document.getElementById("correcta_incorrecta").style.cssText = "color:#26d73e; text-shadow: 2px 2px black;";
                            const sonido = new Audio('Audios/correcto.mp3')
                            sonido.play();
                        }else if(this.voltaje < 12.65 && respuesta=="incorrecto"){
                            this.correctas++
                            this.correcta_incorrecta="C O R R E C T O"
                            document.getElementById("correcta_incorrecta").style.cssText = "color:#26d73e; text-shadow: 2px 2px black;";
                            const sonido = new Audio('Audios/correcto.mp3')
                            sonido.play();
                        }else{
                            this.correcta_incorrecta="I N C O R R E C T O"
                            document.getElementById("correcta_incorrecta").style.cssText = "color:#d64828; text-shadow: 2px 2px black;";
                            const sonido = new Audio('Audios/incorrecto.mp3')
                            sonido.play();
                        }
                       
                         axios.post('guardar_actividades.php',{
                                actividad: this.nombre_actividad,
                                puntos: this.correctas,
                                cantidad_activiti: this.cantidad_actividad
                            }).then(response =>{

                                if(response.data=='Fin Actividad'){
                                            window.location.href="videos.php?videos_capacitacion=capacitacion"
                                }else{
                                    
                                    if(this.cantidad_actividad<10){this.cantidad_actividad++ }
                                    var randon = (Math.random() * (1-0)+12).toFixed(2)
                                    this.voltaje = randon;
                                    setTimeout(function(){
                                        document.getElementById("boton1").removeAttribute("disabled");
                                        document.getElementById("boton2").removeAttribute("disabled");
                                        document.getElementById("voltaje_medidor").style.opacity = 1;
                                        document.getElementById("correcta_incorrecta").style.opacity = 0;
                                    },2000)
                                       
                                }
                                
                            })

                           
                       } 
                }
            }
            var mountedApp = Vue.createApp(app).mount('#app');
        }else if (actividad == "nivel_electrolito" || actividad == "coloracion_electrolito" || actividad == "densidad_electrolito" || actividad == "prueba"){//ACTIVIDAD NIVELES DE ELECTROLITO--------------------------------------------------------------
            const app = {
                    data(){
                        return{
                        nombre_actividad:'',
                        titulo_actividad:'', 
                        texto_indicaciones:'',
                        indicaciones_pie:'',
                        btn_iniciar:'',
                        btn_verde:'',
                        btn_rojo:'',
                        voltaje:0,
                        cantidad_actividad:0,
                        correctas:0,
                        correcta_incorrecta:'',
                        true_false:null,
                        iniciar:false,
                        url_acumulador3D: '',
                        numero: 0
                        }
                    },
                    mounted(){
                            var actividad = document.getElementById('actividad').value;
                            
                            this.nombre_actividad = actividad
                            if(actividad=='nivel_electrolito'){
                                this.url_acumulador3D = '3D/nivel_electrolito0.glb'
                                this.titulo_actividad = 'Nivel Electrolito'
                                this.texto_indicaciones = 'Revise los niveles de electrolito.'
                                this.btn_iniciar ='Iniciar'
                                this.btn_verde ='Buen Nivel'
                                this.btn_rojo ='Mal Nivel'
                                this.indicaciones_pie='Ejemplo: Nivel de electrolito adecuado.'
                            }
                            if(actividad=='coloracion_electrolito'){
                                this.url_acumulador3D = '3D/coloracion_electrolito0.glb'
                                this.titulo_actividad = 'Coloración Electrolito'
                                this.texto_indicaciones = 'Verifique coloración adecuada.'
                                this.btn_iniciar ='Iniciar'
                                this.btn_verde ='Correcta'
                                this.btn_rojo ='Incorrecta'
                                this.indicaciones_pie='Ejemplo: La coloración de electrolito debe escristalino.'
                                
                            }
                            if(actividad=='densidad_electrolito'){
                                this.url_acumulador3D = 'Imagenes/densidad_electrolito0.jpg'
                                this.titulo_actividad = 'Densidad Electrolito'
                                this.texto_indicaciones = 'Revise si la densidad esta dentro del rango.'
                                this.btn_iniciar ='Iniciar'
                                this.btn_verde ='Correcta'
                                this.btn_rojo ='Incorrecta'
                                this.indicaciones_pie='Ejemplo: Densidad adecuada.'
                            }if(actividad=='prueba'){
                                this.url_acumulador3D = 'Imagenes/prueba_de_descarga0.jpg'
                                this.titulo_actividad = 'Prueba de Descarga'
                                this.texto_indicaciones = 'Revise el voltaje de descarga.'
                                this.btn_iniciar ='Iniciar'
                                this.btn_verde ='Correcta'
                                this.btn_rojo ='Incorrecta'
                                this.indicaciones_pie='Ejemplo: Prueba de descarga dentro de lo especificado.'
                            }
   
   
                    },
                    methods:{
                            metodoIniciar(){
                                document.getElementById("btn_iniciar").className +=" animate__animated animate__zoomOut"
                               // document.getElementById("acumulador").className += " animate__animated animate__bounceOutLeft"
                               this.numero=Math.floor(Math.random() *(10-1))+1;
                               console.log(this.numero)
                               if(actividad=='nivel_electrolito'){
                                    this.url_acumulador3D = '3D/nivel_electrolito'+this.numero+'.glb' 
                                    setTimeout(()=>{
                                        this.iniciar=true
                                        this.cantidad_actividad=1
                                        this.indicaciones_pie="Gire el acumulador, para poder verificar correctamente los niveles de electrolito."
                                    },1000)
                                }
                                if(actividad=='coloracion_electrolito'){
                                    this.url_acumulador3D = '3D/coloracion_electrolito'+this.numero+'.glb' 
                                    setTimeout(()=>{
                                        this.iniciar=true
                                        this.cantidad_actividad=1
                                        this.indicaciones_pie="Analice si el color del electrolito es cristalino."
                                        },1000)
                                }
                                if(actividad=='densidad_electrolito'){
                                    this.url_acumulador3D = 'Imagenes/densidad_electrolito'+this.numero+'.jpg' 
                                    setTimeout(()=>{
                                        this.iniciar=true
                                        this.cantidad_actividad=1
                                        this.indicaciones_pie="Analice si el color del electrolito es cristalino."
                                        },1000)
                                }
                                if(actividad=='prueba'){
                                    this.url_acumulador3D = 'Imagenes/prueba_de_descarga'+this.numero+'.jpg' 
                                    setTimeout(()=>{
                                        this.iniciar=true
                                        this.cantidad_actividad=1
                                        this.indicaciones_pie="Verifique que el acumulador pase la prueba de descarga."
                                        },1000)
                                }
                            },
                            bien_o_mal(respuesta){
                                console.log(this.numero)
                                if(this.numero==1 && respuesta =='con'){this.correctas++;
                                    this.correcta_incorrecta="C O R R E C T O"
                                    document.getElementById("correcta_incorrecta").style.cssText = "color:#26d73e; text-shadow: 2px 2px black;";
                                    const sonido = new Audio('Audios/correcto.mp3')
                                    sonido.play();
                                }else if(this.numero==2 && respuesta =='sin'){this.correctas++;
                                    this.correcta_incorrecta="C O R R E C T O"
                                    document.getElementById("correcta_incorrecta").style.cssText = "color:#26d73e; text-shadow: 2px 2px black;";
                                    const sonido = new Audio('Audios/correcto.mp3')
                                    sonido.play();
                                }else if(this.numero==3 && respuesta =='con'){this.correctas++;
                                    this.correcta_incorrecta="C O R R E C T O"
                                    document.getElementById("correcta_incorrecta").style.cssText = "color:#26d73e; text-shadow: 2px 2px black;";
                                    const sonido = new Audio('Audios/correcto.mp3')
                                    sonido.play();
                                }else if(this.numero==4 && respuesta =='sin'){this.correctas++;
                                    this.correcta_incorrecta="C O R R E C T O"
                                    document.getElementById("correcta_incorrecta").style.cssText = "color:#26d73e; text-shadow: 2px 2px black;";
                                    const sonido = new Audio('Audios/correcto.mp3')
                                    sonido.play();
                                }else if(this.numero==5 && respuesta =='con'){this.correctas++;
                                    this.correcta_incorrecta="C O R R E C T O"
                                    document.getElementById("correcta_incorrecta").style.cssText = "color:#26d73e; text-shadow: 2px 2px black;";
                                    const sonido = new Audio('Audios/correcto.mp3')
                                    sonido.play();
                                }else if(this.numero==6 && respuesta =='con'){this.correctas++;
                                    this.correcta_incorrecta="C O R R E C T O"
                                    document.getElementById("correcta_incorrecta").style.cssText = "color:#26d73e; text-shadow: 2px 2px black;";
                                    const sonido = new Audio('Audios/correcto.mp3')
                                    sonido.play();
                                }else if(this.numero==7 && respuesta =='con'){this.correctas++;
                                    this.correcta_incorrecta="C O R R E C T O"
                                    document.getElementById("correcta_incorrecta").style.cssText = "color:#26d73e; text-shadow: 2px 2px black;";
                                    const sonido = new Audio('Audios/correcto.mp3')
                                    sonido.play();
                                }else if(this.numero==8 && respuesta =='con'){this.correctas++;
                                    this.correcta_incorrecta="C O R R E C T O"
                                    document.getElementById("correcta_incorrecta").style.cssText = "color:#26d73e; text-shadow: 2px 2px black;";
                                    const sonido = new Audio('Audios/correcto.mp3')
                                    sonido.play();
                                }else if(this.numero==9 && respuesta =='con'){this.correctas++;
                                    this.correcta_incorrecta="C O R R E C T O"
                                    document.getElementById("correcta_incorrecta").style.cssText = "color:#26d73e; text-shadow: 2px 2px black;";
                                    const sonido = new Audio('Audios/correcto.mp3')
                                    sonido.play();
                                }else if(this.numero==10 && respuesta =='con'){this.correctas++;
                                    this.correcta_incorrecta="C O R R E C T O"
                                    document.getElementById("correcta_incorrecta").style.cssText = "color:#26d73e; text-shadow: 2px 2px black;";
                                    const sonido = new Audio('Audios/correcto.mp3')
                                    sonido.play();
                                }else {
                                    this.correcta_incorrecta="I N C O R R E C T O"
                                    document.getElementById("correcta_incorrecta").style.cssText = "color:#d64828; text-shadow: 2px 2px black;";
                                    const sonido = new Audio('Audios/incorrecto.mp3')
                                    sonido.play();
                                }
                                   
                                console.log('Correctas'+this.correctas+'Numero:'+this.numero+'Respuesta:'+respuesta); 
                                    axios.post('guardar_actividades.php',{
                                        actividad: this.nombre_actividad,
                                        puntos: this.correctas,
                                        cantidad_activiti: this.cantidad_actividad
                                    }).then(response=>{
                                        if(response.data=='Fin Actividad'){
                                                if(actividad=='nivel_electrolito'){
                                                    window.location.href = "actividades.php?actividad=coloracion_electrolito"
                                                }
                                                if(actividad=='coloracion_electrolito'){
                                                    window.location.href = "actividades.php?actividad=densidad_electrolito"
                                                }
                                                if(actividad=='densidad_electrolito'){
                                                    window.location.href="videos.php?videos_capacitacion=capacitacion"
                                                }
                                                if(actividad=='prueba'){
                                                    window.location.href="videos.php?videos_capacitacion=capacitacion"
                                                }
                                        }else{
                                            console.log(response.data)
                                            if(this.cantidad_actividad<10){this.cantidad_actividad++}
                                                if(actividad=='nivel_electrolito'){
                                                    this.numero=Math.floor(Math.random() *(10-1))+1;
                                                    this.url_acumulador3D = '3D/nivel_electrolito'+this.numero+'.glb' 
                                                }
                                                if(actividad=='coloracion_electrolito'){
                                                    this.numero=Math.floor(Math.random() *(10-1))+1;
                                                    this.url_acumulador3D = '3D/coloracion_electrolito'+this.numero+'.glb' 
                                                }
                                                if(actividad=='densidad_electrolito'){
                                                    this.numero=Math.floor(Math.random() *(10-1))+1;
                                                    this.url_acumulador3D = 'Imagenes/densidad_electrolito'+this.numero+'.jpg' 
                                                }
                                                if(actividad=='prueba'){
                                                    this.numero=Math.floor(Math.random() *(10-1))+1;
                                                    this.url_acumulador3D = 'Imagenes/prueba_de_descarga'+this.numero+'.jpg' 
                                                }
                                                console.log("Numero"+this.numero+"CANTIDAD DE ACTIVIDAD"+this.cantidad_actividad)
                                        }
                                    })
                                        setTimeout( ()=>{
                                            document.getElementById("correcta_incorrecta").style.opacity="0";
                                        },2000)
                            }
                        }
                }                
                var mountedApp = Vue.createApp(app).mount('#app');
        }else if (actividad == "diagnostico"){

           
            const app = {
                data(){
                    return{
                        nombre_actividad:'',
                        titulo_actividad:'', 
                        texto_indicaciones:'',
                        indicaciones_pie:'',
                        }
                },
                mounted(){
                            var actividad = document.getElementById('actividad').value;
                            this.nombre_actividad = actividad
                            this.titulo_actividad = 'Secuencia del Diagnóstico'
                            this.texto_indicaciones = 'Ordene la secuencia de diagnóstico.'
                },
                methods:{
    
                }
            }
            var mountedApp = Vue.createApp(app).mount('#app');
        }
  
</script>

<script>
    var actividad = document.getElementById('actividad').value;
    var lista = document.getElementById('lista');
    Sortable.create(lista, {
        
        animation:150,
        chosenClass: 'seleccionado',
        ghostClass: 'fantasma',
        dragClass: 'arrastrar',
        onEnd: () =>{
                console.log('soltado');
        },
        group: "lista-opciones",
        store: {

           
            //guardando opciones
            set: (sortable)=>{
                const orden = sortable.toArray();
                var respuesta = orden[0]+orden[1]+orden[2]+orden[3]+orden[4]+orden[5]+orden[6];
                console.log(respuesta);
                var suma_puntos=0;
                if(orden[0]==1){suma_puntos+=2;}
                if(orden[1]==2){suma_puntos+=2;}
                if(orden[2]==3){suma_puntos+=2;}
                if(orden[3]==4){suma_puntos+=2;}
                if(orden[4]==5){suma_puntos+=2;}
                if(orden[5]==6){suma_puntos+=2;}
                if(orden[6]==7){suma_puntos+=2;}
                var calificacion = suma_puntos-4;
                if(calificacion<0){calificacion=0; }
                console.log(calificacion);
                //console.log(respuesta);
                document.getElementById('boton').style.display="block";

                        axios.post('guardar_actividades.php',{
                                        actividad: actividad,
                                        puntos: calificacion

                                    }).then(response=>{
                                        console.log(response.data);
                                    })
            }

        }
    });

    function ya_ordenado(){
        window.location.href="videos.php?videos_capacitacion=capacitacion"
    }


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