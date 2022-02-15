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
    <title>Menú</title>
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
            } 

/*Pequenia*/
@media (min-width: 0px) { 
    .formulario{display:none;}

    .pie{font-size:0.5em;}
   
    .encabezado1, .encabezado2, .encabezado3, .encabezado4, .encabezado5, .encabezado6, .encabezado7, .encabezado8,.encabezado9, .encabezado10  {
        font-size:0.6em;
        z-index:1;
        color:white;
        background: rgb(2,0,36);
        background: linear-gradient(31deg, rgba(255,255,255,0) 5%, rgba(14,12,90,1) 5%, rgba(2,0,36,1) 95%, rgba(2,0,36,1) 97%); 
        height:30px;
        width: 400px;
    }   
    .divrespuesta1, .divrespuesta2, .divrespuesta3, .divrespuesta4, .divrespuesta5, .divrespuesta6, .divrespuesta7, .divrespuesta8, .divrespuesta9, .divrespuesta10{
        z-index:1;
        margin-bottom: 0px;
        margin-left: 27px;
        height:30px;
        width: 373px;
        background: rgb(255,255,255);
background: linear-gradient(0deg, rgba(255,255,255,0) 0%, rgba(9,150,223,1) 0%, rgba(24,20,102,1) 9%, rgba(16,11,135,1) 97%); 
        
    }
    
}
/*SM*/	
@media (min-width: 576px) { 
     .formulario{height:89%; width:620px; z-index:0; }
    .encabezado1, .encabezado2, .encabezado3,.encabezado4, .encabezado5, .encabezado6, .encabezado7, .encabezado8,.encabezado9, .encabezado10  {
        font-size:0.8em;
        width: 500px;
    }
    .divrespuesta1, .divrespuesta2, .divrespuesta3, .divrespuesta4, .divrespuesta5, .divrespuesta6, .divrespuesta7, .divrespuesta8, .divrespuesta9, .divrespuesta10{
        width: 473px;
    }
    

}

/*MD Medium MD devices (tablets, 768px and up)*/
@media (min-width: 768px) {
    
    .formulario{height:720px; width:750px;display:block;}
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
    .formulario{height:90%;width:790px;}

    .encabezado1, .encabezado2, .encabezado3,.encabezado4, .encabezado5, .encabezado6, .encabezado7, .encabezado8,.encabezado9, .encabezado10  {
        font-size:0.9em;
    }
    .divrespuesta1, .divrespuesta2, .divrespuesta3, .divrespuesta4, .divrespuesta5, .divrespuesta6, .divrespuesta7, .divrespuesta8, .divrespuesta9, .divrespuesta10{
   
    }  
   
 }

/*XL X-Large devices (large desktops, 1200px and up)*/
@media (min-width: 1200px) { 
  
 }

/*XXL XX-Large devices (larger desktops, 1400px and up)*/
@media (min-width: 1400px) { 
    .formulario{ height:96%; width:800px;}

 }



</style>


<body style=" background: rgb(11,171,184);
background: radial-gradient(circle, rgba(11,171,184,1) 8%, rgba(21,133,170,1) 36%, rgba(14,61,141,1) 69%, rgba(4,31,78,1) 100%); 
 background-repeat: no-repeat; background-size: 100%"  >
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
			</div>

			<div class="row " style="height: 80vh;">
                <div class="h-90 col-12 col-xl-9 col-xxl-9 flex-column align-items-center d-flex align-content-center justify-content-center align-content-center text-center ">
                    <div class="encabezado1 "><p>¿Que es una acumulador?</p></div>
                    <div class="divrespuesta1"></div>
                    <div class="encabezado2"><p>¿Cual es la función principal del acumulador de arranque?</p></div>
                    <div class="divrespuesta2"></div>
                    <div class="encabezado3"><p>¿Menciona algunos componentes del acumulador?</p></div>
                    <div class="divrespuesta3"></div>
                    <div class="encabezado4"><p>¿Cuántas celdas o vasos tienen los acumuladores de 12 Voltios?</p></div>
                    <div class="divrespuesta4"></div>
                    <div class="encabezado5"><p>Para asignar el número a las celdas ¿Cuál es la forma correcta ?</p></div>
                    <div class="divrespuesta5"></div>
                    <div class="encabezado6"><p>¿Cómo están conectadas las celdas en el interior del acumulador?</p></div>
                    <div class="divrespuesta6"></div>
                    <div class="encabezado7"><p>¿Cuáles son las 4 subsistemas del sistema eléctronico automotriz?</p></div>
                    <div class="divrespuesta7"></div>
                    <div class="encabezado8"><p>¿Cuando un acumulador esta al 100% cargado, qué voltaje representa?</p></div>
                    <div class="divrespuesta8"></div>
                    <div class="encabezado9"><p>¿Qué voltaje presenta normalmente un acumulador que tiene corto en una celda?</p></div>
                    <div class="divrespuesta9"></div>
                    <div class="encabezado10"><p>¿Cómo esta compuesto el electrolito?</p></div>
                    <div class="divrespuesta10"></div>

                    <img class="formulario position-absolute" src="Imagenes/formulario.png" alt="">
                </div>
              

                <div class="col-12 col-xl-3 col-xxl-3 my-auto d-flex justify-content-center justify-content-xxl-start  ">
                     <h1 class="titulos animate__animated animate__pulse text-center text-xxl-start ms-xxl-0 text-light">TEST INICIAL</h1>
                </div> 
            </div>  

            <div class="row justify-content-between" style="height: 10vh; ">	
                <div class=" col-9 text-light d-flex align-items-end">
                <p class="pie"> Técnico (Curso de capacitación)</p>
                </div>
            </div>
	      

</body>
<script>

const app = {
	data(){
		return{

		}
	},
	mounted(){
	}
}

var mountedApp = Vue.createApp(app).mount('#app');
</script>

</html>
<?php
}else{
	header("Location: index.php");
};
?>