<?php
session_start();
if ($_SESSION["usuario"] && $_SESSION["tipo"]=="Usuario"){

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Inicial</title>
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
    <link href="https://fonts.googleapis.com/css2?family=Chakra+Petch:wght@300;400&family=Rowdies:wght@300&display=swap" rel="stylesheet">
    <!--ANIMATE-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <!--VUE 3-->
    <script src="https://unpkg.com/vue@next"></script>
    <!--Axios--> 
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</head>
<style>
    .mensajemoviemiento{
        color:red;
        animation: shakeX; /* referring directly to the animation's @keyframe declaration */
        animation-duration: 3s; /* don't forget to set a duration! */
        animation-iteration-count: infinite;

    }

    .calificacion {
    animation: fadeIn; /* referring directly to the animation's @keyframe declaration */
    animation-duration: 1s; /* don't forget to set a duration! */
    }

  
    /*Pequenia*/
    @media (min-width: 0px) { 
        .calificacion{ font-family: 'Orbitron', sans-serif;text-shadow:-1px 2px 0px black;} 
            .titulos { font-family: 'Orbitron', sans-serif;text-shadow:-1px 2px 0px black;} 
            .mensajes{ font-size:0.6em; font-weight:bold}
            .miboton {
                    height:50px;
                    width:200px;
                    position:absolute;
                    z-index: 1;
                    font-family: 'Rowdies', cursive;
                    background: rgb(0,97,135);
                    background: linear-gradient(31deg, rgba(255,255,255,0) 10%, rgba( 2,0,36,1 ) 5%, rgba(2,0,36,1) 90%, rgba(255,255,255,0) 10%); 
                    border-radius:6px;
                
                    cursor:pointer;
                    color:#CEECF5;
                    font-size:20px;
                    padding:7px 14px;
                    text-decoration:none;
                    }
                .miboton:hover {
                    background: rgb(23,0,94);
                    background: linear-gradient(0deg, rgba(23,0,94,1) 0%, rgba(10,16,102,1) 17%, rgba(0,22,99,1) 58%, rgba(0,12,23,1) 98%);
                }
                .pregunta{
                    animation: rubberBand;
                    animation-duration: 2s;
                    text-shadow: 1px 1px 0px black;
                    color:#b2cae6;
                    
                    
                }
                .respuestas{
                    color: #bfab78;
                    margin-left:4px; 
                    animation: fadeInDown;
                    animation-duration: 2s;
                    text-shadow: 1px 1px 0px black;
                }

                
                .formulario{height:1300px; width:100%; z-index:0;  }
                /*.formulario_rectangular{height:100%; width:100%; z-index:0;}*/
                .pie,.respuestas{font-size:0.7em;}
                .div_boton{ height:25px;width: 400px;}
                .encabezado1, .encabezado2, .encabezado3, .encabezado4, .encabezado5, .encabezado6, .encabezado7, .encabezado8,.encabezado9, .encabezado10   {
                    font-family: 'Rowdies', cursive;
                    border-radius: 0px 10px 0px 0px;
                    font-size:0.6em;
                    z-index:1;
                    background: rgb(2,0,36);
                    background: linear-gradient(31deg, rgba(255,255,255,0) 5%, rgba( 2,0,36,1 ) 5%, rgba(2,0,36,1) 95%, rgba(2,0,36,1) 97%); 
                    height:25px;
                    width: 400px;

                  
                }   
                .divrespuesta1, .divrespuesta2, .divrespuesta3, .divrespuesta4, .divrespuesta5, .divrespuesta6, .divrespuesta7, .divrespuesta8, .divrespuesta9, .divrespuesta10{
                    font-family: 'Rowdies', cursive;
                    border-radius: 0px 0px 10px 10px;
                    z-index:1;
                    margin-bottom: 20px;
                    margin-left: 27px;
                    height:75px;
                    width: 373px;
                    background: #0b2848;                    
                }
                .mensajes, .calificacion{
                    margin-top:-10px;
                    z-index:1; 
                }
        
    }
    /*SM*/	
    @media (min-width: 576px) {  
        .mensajes{ font-size:1em; font-weight:bold}
        .encabezado1, .encabezado2, .encabezado3,.encabezado4, .encabezado5, .encabezado6, .encabezado7, .encabezado8,.encabezado9, .encabezado10{
            font-size:0.8em;
            width: 500px;
        }
        .divrespuesta1, .divrespuesta2, .divrespuesta3, .divrespuesta4, .divrespuesta5, .divrespuesta6, .divrespuesta7, .divrespuesta8, .divrespuesta9, .divrespuesta10{
            width: 473px;
        }
    }

    /*MD Medium MD devices (tablets, 768px and up)*/
    @media (min-width: 768px) {
        .formulario{height:1300px;width:700px;}
        
        .encabezado1, .encabezado2, .encabezado3,.encabezado4, .encabezado5, .encabezado6, .encabezado7, .encabezado8,.encabezado9, .encabezado10  {
            font-size:0.9em;
            width: 600px;
        }
        .divrespuesta1, .divrespuesta2, .divrespuesta3, .divrespuesta4, .divrespuesta5, .divrespuesta6, .divrespuesta7, .divrespuesta8, .divrespuesta9, .divrespuesta10{
            width: 568px;
            margin-left: 32px;
        }  
    }

    /*LG Large LG devices (desktops, 992px and up)*/
    @media (min-width: 992px) { 
        .pie{font-size:0.8em;}
        

        .encabezado1, .encabezado2, .encabezado3,.encabezado4, .encabezado5, .encabezado6, .encabezado7, .encabezado8,.encabezado9, .encabezado10  {
            font-size:1em;
        }

    
    }

    /*XL X-Large devices (large desktops, 1200px and up)*/
    @media (min-width: 1200px) { 
        .formulario{ height:1550px;width:900px; }
        .encabezado1, .encabezado2, .encabezado3,.encabezado4, .encabezado5, .encabezado6, .encabezado7, .encabezado8,.encabezado9, .encabezado10  {
                width: 805px;
                margin-right: 50px;
        }
        .divrespuesta1, .divrespuesta2, .divrespuesta3, .divrespuesta4, .divrespuesta5, .divrespuesta6, .divrespuesta7, .divrespuesta8, .divrespuesta9, .divrespuesta10{
            font-size:1.5em;
            height:100px;
            width: 764px;
            margin-right: 50px;
           
        }
    }

    /*XXL XX-Large devices (larger desktops, 1400px and up)*/
    @media (min-width: 1400px) { 
        .div_boton{ height:25px; width: 805px;margin-right: 40px;}

    }



</style>


<body style="background: rgb(32,141,152); background: radial-gradient(circle, rgba(32,141,152,1) 0%, rgba(39,196,205,1) 0%, rgba(9,11,121,1) 90%, rgba(0,19,68,1) 100%);
 background-repeat: no-repeat; background-size: 100%">

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
			</div>

			<div  class="row " style="min-height: 80vh;">
                <div class="h-90 col-12 col-xl-9 col-xxl-8 flex-column  align-items-center align-items-xxl-end d-flex align-content-center justify-content-center  text-center  mt-5 mt-lg-1 mt-5 mt-xl-0">
                    
             
                        <div class="encabezado1 "><p class="pregunta">1.- ¿Que es una acumulador? &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;<label class="text-info"> </label></p></div>
                        <div class="divrespuesta1 text-start ">
                             <label><p id="x1" class="respuestas m-0 ms-2 lh-sm"><input type="radio" @click="resetmessage" name="respuesta1" value="1" v-model="respuestaUno" :disabled="deshabilitar"> Es un dispositivo que por medio de una reacción química, almacena energía y la libera en energía eléctrica cuando es requerida.</p></label><!--Correcta-->
                            <label><p id="x2" class="respuestas m-0 ms-2 lh-sm"><input type="radio"  @click="resetmessage" name="respuesta1" value="2" v-model="respuestaUno" :disabled="deshabilitar"> Es un dispositivo que por medio de una reacción física, almacena energía y la libera en energía eléctrica cuando es requerida.</p></label>
                        </div>
                        <div class="encabezado2 "><p class="pregunta">2.- ¿Cual es la función principal del acumulador de arranque? &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;<label class="text-info"></label></p></div>
                        <div class="divrespuesta2 text-start">
                            <label><p id="x3" class="respuestas m-0 ms-2"><input type="radio"  @click="resetmessage" name="respuesta2" value="1" v-model="respuestaDos"  :disabled="deshabilitar"> Liberar energía para mantener encendidos los accesorios. </p></label><br>
                            <label> <p id="x4" class="respuestas m-0 ms-2"><input type="radio" @click="resetmessage" name="respuesta2" value="2" v-model="respuestaDos" :disabled="deshabilitar"> Liberar energía para arrancar el motor. </p></label>
                        </div>
                        <div class="encabezado3 "><p class="pregunta">3.- ¿Menciona algunos componentes del acumulador? &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;<label class="text-info"></label></p></div>
                        <div class="divrespuesta3  text-start">
                            <label><p id="x5" class="respuestas m-0 ms-2"><input type="radio" @click="resetmessage" name="respuesta3" value="1"  v-model="respuestaTres":disabled="deshabilitar"> Caja/tapa, acido sulfúrico, placas, conectores y etiquetas.</p></label><br>
                            <label> <p  id="x6" class="respuestas m-0 ms-2"><input type="radio"  @click="resetmessage" name="respuesta3" value="2" v-model="respuestaTres" :disabled="deshabilitar"> Caja/tapa, cables, regulador, conectores y etiquetas.</p></label>
                        </div>
                        <div class="encabezado4 "><p class="pregunta">4.- ¿Cuántas celdas o vasos tienen los acumuladores de 12 voltios? &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;<label class="text-info"></label></p></div>
                        <div class="divrespuesta4  text-start">
                            <label><p id="x7" class="respuestas m-0 ms-2"><input type="radio"  @click="resetmessage" name="respuesta4" value="1" v-model="respuestaCuatro" :disabled="deshabilitar"> 6 Celdas.</p></label><br>
                            <label> <p id="x8" class="respuestas m-0 ms-2"><input type="radio"  @click="resetmessage" name="respuesta4" value="2" v-model="respuestaCuatro" :disabled="deshabilitar"> 4 Celdas.</p></label>
                        </div>
                        <div class="encabezado5 "><p class="pregunta">5.- Para asignar el número a las celdas ¿Cuál es la forma correcta? &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;<label class="text-info"></label></p></div>
                        <div class="divrespuesta5  text-start">
                             <label><p id="x9" class="respuestas m-0 ms-2"><input type="radio"  @click="resetmessage" name="respuesta5" value="1" v-model="respuestaCinco" :disabled="deshabilitar"> Enumerar la celda #1 de positivo a negativo.</p></label><br>
                            <label> <p id="x10" class="respuestas m-0 ms-2"><input type="radio"  @click="resetmessage" name="respuesta5" value="2" v-model="respuestaCinco" :disabled="deshabilitar"> Enumerar la celda #1 de negativo a positivo.</p></label>
                        </div>
                        <div class="encabezado6 "><p class="pregunta">6.- ¿Cómo están conectadas las celdas en el interior del acumulador? &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;<label class="text-info"></label></p></div>
                        <div class="divrespuesta6  text-start">
                             <label><p id="x11" class="respuestas m-0 ms-2"><input type="radio"  @click="resetmessage" name="respuesta6" value="1" v-model="respuestaSeis" :disabled="deshabilitar"> Conexión en paralelo</p></label><br>
                            <label> <p id="x12" class="respuestas m-0 ms-2"><input type="radio"  @click="resetmessage" name="respuesta6" value="2" v-model="respuestaSeis" :disabled="deshabilitar"> Conexión en serie</p></label>
                        </div>
                        <div class="encabezado7 "><p class="pregunta">7.- ¿Cuáles son las 4 subsistemas del sistema eléctronico automotriz? &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;<label class="text-info"></label></p></div>
                        <div class="divrespuesta7  text-start">
                            <label><p id="x13" class="respuestas m-0 ms-2"><input type="radio"  @click="resetmessage" name="respuesta7" value="1" v-model="respuestaSiete" :disabled="deshabilitar"> Marcha, generador/alternador, regulador de voltaje y acumulador.</p></label><br>
                            <label> <p id="x14" class="respuestas m-0 ms-2"><input type="radio" @click="resetmessage"  name="respuesta7" value="2" v-model="respuestaSiete" :disabled="deshabilitar"> Marcha, generador/alternador, compresor y acumulador.</p></label>
                        </div>
                        <div class="encabezado8 "><p class="pregunta">8.- ¿Cuando un acumulador esta al 100% cargado, qué voltaje representa? &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;<label class="text-info"></label></p></div>
                        <div class="divrespuesta8  text-start">
                             <label><p id="x15" class="respuestas  m-0 ms-2"><input type="radio"  @click="resetmessage" name="respuesta8" value="1" v-model="respuestaOcho"  :disabled="deshabilitar"> 12.75 Volts.</p></label><br>
                             <label> <p id="x16" class="respuestas  m-0 ms-2"><input type="radio" @click="resetmessage"  name="respuesta8" value="2" v-model="respuestaOcho" :disabled="deshabilitar"> 12.55 Volts.</p></label>
                        </div>
                        <div class="encabezado9 "><p class="pregunta">9.- ¿Qué voltaje presenta normalmente un acumulador que tiene corto en una celda? &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;<label class="text-info"></label></p></div>
                        <div class="divrespuesta9  text-start">
                            <label><p id="x17" class="respuestas  m-0 ms-2"><input type="radio"  @click="resetmessage" name="respuesta9" value="1"  v-model="respuestaNueve" :disabled="deshabilitar"> 11.90 Volts</p></label><br>
                            <label> <p id="x18" class="respuestas  m-0 ms-2"><input type="radio"  @click="resetmessage" name="respuesta9" value="2" v-model="respuestaNueve" :disabled="deshabilitar"> 10.5 Volts</p></label>
                        </div>
                        <div class="encabezado10 "><p class="pregunta">10.- ¿Cómo esta compuesto el electrolito? &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;<label class="text-info"></label></p></div>
                        <div class="divrespuesta10  text-start">
                             <label><p id="x19" class="respuestas  m-0 ms-2" ><input type="radio"  @click="resetmessage" name="respuesta10" value="1" v-model="respuestaDiez" :disabled="deshabilitar"> 35% agua/65%acido</p></label><br>
                            <label> <p id="x20" class="respuestas  m-0 ms-2" ><input type="radio" @click="resetmessage"  name="respuesta10" value="2" v-model="respuestaDiez" :disabled="deshabilitar" > 65% agua/35%acido</p></label>
                        </div>
                        <div class="div_boton d-flex justify-content-center" >
                                 <div id="mensaje" class="mensajes text-info me-2">{{mensaje}}</div>
                                 <div class="calificacion text-warning text-info" v-if="calificacion!=''">TU CALIFICACIÓN:  &nbsp; <label  class="text-success fs-4">{{calificacion}} ACIERTOS<label></div>
                                 <div v-if="respuesta=='no realizado'" @click="guardarRespuestas" id="boton" class="miboton animate__animated animate__pulse mt-4">Guardar</div>
                        </div>

                       
                    <img class="formulario position-absolute" src="Imagenes/formulario.png" alt="">
                </div>
              

                <div class="col-12 col-xl-3 col-xxl-4 my-auto d-flex justify-content-center justify-content-xxl-start ">
                     <h1 class="titulos animate__animated animate__pulse text-center text-xxl-start ms-xxl-0 text-light mt-5 ">TEST INICIAL</h1>
                     
                </div> 
            </div>  

            <div class="row justify-content-between" style="min-height: 10vh; ">	
                <div class=" col-9 text-light d-flex align-items-end">
                <p class="pie">Soporte Técnico (Curso de capacitación)</p>
                </div>
            </div>
	      
    </div>
</body>
<script>


    const app ={
        data(){
            return{
                
                campo_respuestas: '',
                respuestaUno: '',
                respuestaDos: '',
                respuestaTres: '',
                respuestaCuatro: '',
                respuestaCinco: '',
                respuestaSeis: '',
                respuestaSiete: '',
                respuestaOcho: '',
                respuestaNueve: '',
                respuestaDiez: '', 
                suma: 0,
                respuesta: null,
                mensaje: '',
                calificacion: '',
                deshabilitar: false,
            }
        },
        mounted(){
            axios.post('verificar_guardar_ti.php',{
                accion: 'verificar'
            }).then(response=>{
                this.campo_respuestas=response.data[1]
                if(this.campo_respuestas==''){
                    //console.log("no realizado")
                    this.respuesta= 'no realizado'
                }else{
                    //this.color="red"
                    
                    
                    console.log(response.data)
                    this.calificacion= response.data[1]
                    this.respuestaUno= response.data[2]
                    this.respuestaDos= response.data[3]
                    this.respuestaTres= response.data[4]
                    this.respuestaCuatro= response.data[5]
                    this.respuestaCinco= response.data[6]
                    this.respuestaSeis= response.data[7]
                    this.respuestaSiete= response.data[8]
                    this.respuestaOcho= response.data[9]
                    this.respuestaNueve= response.data[10]
                    this.respuestaDiez= response.data[11]
                    if(response.data[2]==response.data[12]){ document.getElementById("x1").style.color="green"; }else{document.getElementById("x2").style.color="#b52c0f";}
                    if(response.data[3]==response.data[13]){ document.getElementById("x4").style.color="green"; }else{document.getElementById("x3").style.color="#b52c0f";}
                    if(response.data[4]==response.data[12]){ document.getElementById("x5").style.color="green"; }else{document.getElementById("x6").style.color="#b52c0f";}
                    if(response.data[5]==response.data[12]){ document.getElementById("x7").style.color="green"; }else{document.getElementById("x8").style.color="#b52c0f";}
                    if(response.data[6]==response.data[12]){ document.getElementById("x9").style.color="green"; }else{document.getElementById("x10").style.color="#b52c0f";}
                    if(response.data[7]==response.data[13]){ document.getElementById("x12").style.color="green"; }else{document.getElementById("x11").style.color="#b52c0f";}
                    if(response.data[8]==response.data[12]){ document.getElementById("x13").style.color="green"; }else{document.getElementById("x14").style.color="#b52c0f";}
                    if(response.data[9]==response.data[12]){ document.getElementById("x15").style.color="green"; }else{document.getElementById("x16").style.color="#b52c0f";}
                    if(response.data[10]==response.data[13]){ document.getElementById("x18").style.color="green";}else{document.getElementById("x17").style.color="#b52c0f"; }
                    if(response.data[11]==response.data[13]){ document.getElementById("x20").style.color="green"; }else{document.getElementById("x19").style.color="#b52c0f";}
                    this.deshabilitar=true

                }
            }).catch(function (error){
					console.log(error)
			});
        },
        methods:{
            async guardarRespuestas(){
               if(this.respuestaUno !='' && this.respuestaDos !='' && this.respuestaTres !='' && this.respuestaCuatro!='' && this.respuestaCinco!='' && this.respuestaSeis!='' && this.respuestaSiete!='' && this.respuestaOcho!='' && this.respuestaNueve!='' && this.respuestaDiez!=''){ 
                    //console.log('todas estan contestadadas')
                    this.mensaje=''; 
                    axios.post('verificar_guardar_ti.php',{
                        accion: 'guardar',
                        respuesta1: this.respuestaUno,
                        respuesta2: this.respuestaDos,
                        respuesta3: this.respuestaTres,
                        respuesta4: this.respuestaCuatro,
                        respuesta5: this.respuestaCinco,
                        respuesta6: this.respuestaSeis,
                        respuesta7: this.respuestaSiete,
                        respuesta8: this.respuestaOcho,
                        respuesta9: this.respuestaNueve,
                        respuesta10: this.respuestaDiez
                    }).then(respuesta =>{
                        console.log(respuesta.data)
                            if(respuesta.data[0]=='Guardado' || respuesta.data[0]=='Ya Contestado'){
                                
                                this.respuesta= 'si realizado'
                                this.calificacion= respuesta.data[1]
                                this.respuestaUno= respuesta.data[2]
                                this.respuestaDos= respuesta.data[3]
                                this.respuestaTres= respuesta.data[4]
                                this.respuestaCuatro= respuesta.data[5]
                                this.respuestaCinco= respuesta.data[6]
                                this.respuestaSeis= respuesta.data[7]
                                this.respuestaSiete= respuesta.data[8]
                                this.respuestaOcho= respuesta.data[9]
                                this.respuestaNueve= respuesta.data[10]
                                this.respuestaDiez= respuesta.data[11]
                                if(respuesta.data[2]==respuesta.data[12]){ document.getElementById("x1").style.color="green"; }else{document.getElementById("x2").style.color="#b52c0f";}
                                if(respuesta.data[3]==respuesta.data[13]){ document.getElementById("x4").style.color="green"; }else{document.getElementById("x3").style.color="#b52c0f";}
                                if(respuesta.data[4]==respuesta.data[12]){ document.getElementById("x5").style.color="green"; }else{document.getElementById("x6").style.color="#b52c0f";}
                                if(respuesta.data[5]==respuesta.data[12]){ document.getElementById("x7").style.color="green"; }else{document.getElementById("x8").style.color="#b52c0f";}
                                if(respuesta.data[6]==respuesta.data[12]){ document.getElementById("x9").style.color="green"; }else{document.getElementById("x10").style.color="#b52c0f";}
                                if(respuesta.data[7]==respuesta.data[13]){ document.getElementById("x12").style.color="green"; }else{document.getElementById("x11").style.color="#b52c0f";}
                                if(respuesta.data[8]==respuesta.data[12]){ document.getElementById("x13").style.color="green"; }else{document.getElementById("x14").style.color="#b52c0f";}
                                if(respuesta.data[9]==respuesta.data[12]){ document.getElementById("x15").style.color="green"; }else{document.getElementById("x16").style.color="#b52c0f";}
                                if(respuesta.data[10]==respuesta.data[13]){ document.getElementById("x18").style.color="green";}else{document.getElementById("x17").style.color="#b52c0f"; }
                                if(respuesta.data[11]==respuesta.data[13]){ document.getElementById("x20").style.color="green"; }else{document.getElementById("x19").style.color="#b52c0f";}
                                this.deshabilitar=true
                            }
                    })
               }else{
                        if(this.respuestaUno==''){this.mensaje = "Conteste la pregunta No. 1"; var mensaje = document.getElementById("mensaje"); mensaje.classList.add("mensajemoviemiento");}else{
                            if(this.respuestaDos==''){this.mensaje = "Conteste la pregunta No. 2"; var mensaje = document.getElementById("mensaje"); mensaje.classList.add("mensajemoviemiento");}else{
                                if(this.respuestaTres==''){this.mensaje = "Conteste la pregunta No. 3"; var mensaje = document.getElementById("mensaje"); mensaje.classList.add("mensajemoviemiento");}else{
                                    if(this.respuestaCuatro==''){this.mensaje = "Conteste la pregunta No. 4"; var mensaje = document.getElementById("mensaje"); mensaje.classList.add("mensajemoviemiento");}else{
                                        if(this.respuestaCinco==''){this.mensaje = "Conteste la pregunta No. 5"; var mensaje = document.getElementById("mensaje"); mensaje.classList.add("mensajemoviemiento");}else{
                                            if(this.respuestaSeis==''){this.mensaje = "Conteste la pregunta No. 6"; var mensaje = document.getElementById("mensaje"); mensaje.classList.add("mensajemoviemiento");}else{
                                                if(this.respuestaSiete==''){this.mensaje = "Conteste la pregunta No. 7"; var mensaje = document.getElementById("mensaje"); mensaje.classList.add("mensajemoviemiento");}else{
                                                    if(this.respuestaOcho==''){this.mensaje = "Conteste la pregunta No. 8"; var mensaje = document.getElementById("mensaje"); mensaje.classList.add("mensajemoviemiento");}else{
                                                        if(this.respuestaNueve==''){this.mensaje = "Conteste la pregunta No. 9"; var mensaje = document.getElementById("mensaje"); mensaje.classList.add("mensajemoviemiento");}else{
                                                            if(this.respuestaDiez==''){this.mensaje = "Conteste la pregunta No. 10"; var mensaje = document.getElementById("mensaje"); mensaje.classList.add("mensajemoviemiento");}
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
               }
            },//fin guardarRespuesta
            resetmessage(){
                this.mensaje = ''
            }
        }//fin methods
    }

    var mountedApp = Vue.createApp(app).mount('#app');

</script>

</html>
<?php
}else{
	header("Location: index.php");
};
?>