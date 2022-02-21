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
				text-shadow:-1px 2px 0px black;
            } 
	/* Small devices (landscape phones, 576px and up)*/
	.opciones{
        font-family: 'Righteous', cursive;
    }
/*Pequenia*/
@media (min-width: 0px) { 
	.titulos{margin-top:130px; margin-left: 0px; font-size:30px;}
	.circulos, .circulos_deshabilitados{height:90px; min-height:90px; width:90px; min-width:90px;}
	.opciones{font-size:1em}
	.circuito_uno, .circuito_dos, .circuito_tres, .circuito_cuatro{max-width: 120px; max-height: 120px;}
	.divconector{max-width:80px}
	.contorno_perilla{height:300px;}
	.perilla_gira{position:absolute; height:200px; margin-top:50px; margin-left:0px}
	.contorno_certificado{height:200px; margin-top: 0px;}
	.icono_certificado{position:absolute; height:100px;  margin-top: 65px; margin-left: -50px; margin-right: 40px;}
	 /* Chrome, Opera 15+, Safari 3.1+ */ /* IE 9 *//* Firefox 16+, IE 10+, Opera */
	.circuito_uno{-webkit-transform : rotate(10deg) scaleY(-1); -ms-transform:rotate(10deg) scaleY(-1); transform : rotate(10deg) scaleY(-1);}
	.circuito_dos{-webkit-transform : rotate(10deg) scaleY(-1); -ms-transform:rotate(10deg) scaleY(-1); transform : rotate(10deg) scaleY(-1);}
	.circuito_tres{-webkit-transform : rotate(10deg) scaleY(-1); -ms-transform:rotate(10deg) scaleY(-1); transform : rotate(160deg) scaleX(1);}
	.circuito_cuatro{-webkit-transform : rotate(160deg) scaleX(1); -ms-transform:rotate(160deg) scaleX(1); transform : rotate(160deg) scaleX(1);}
	


}
/*SM*/	
@media (min-width: 576px) { 
	.circuito_uno, .circuito_dos, .circuito_tres, .circuito_cuatro{max-width: 130px; max-height: 130px;}
	.divconector{max-width:150px}
	.titulos{margin-top:170px;margin-left: 0px; font-size:40px;}
	.circulos, .circulos_deshabilitados{height:90px; min-height:90px; width:90px; min-width:90px;}
	.opciones{font-size:1.5em; text-shadow:-1px 2px 0px black; }
	.contorno_perilla{height:400px; margin-top:-50px;}
	.perilla_gira{height:250px; margin-top:0px;margin-left: 0px; margin-top:26px;}
	.icono_certificado{position:absolute; height:100px; margin-left: -30px;  margin-top: 20px; }
	.contorno_certificado{height:180px;margin-top:-50px;}
	.circuito_uno{-webkit-transform : rotate(10deg) scaleY(-1); -ms-transform:rotate(10deg) scaleY(-1); transform : rotate(10deg) scaleY(-1);}
	.circuito_dos{-webkit-transform : rotate(10deg) scaleY(-1); -ms-transform:rotate(10deg) scaleY(-1); transform : rotate(10deg) scaleY(-1); }
	.circuito_tres{-webkit-transform : rotate(10deg) scaleY(-1); -ms-transform:rotate(10deg) scaleY(-1); transform : rotate(160deg) scaleX(1);}
	.circuito_cuatro{-webkit-transform : rotate(160deg) scaleX(1); -ms-transform:rotate(160deg) scaleX(1); transform : rotate(160deg) scaleX(1);}
}

/* Medium MD devices (tablets, 768px and up)*/
@media (min-width: 768px) {  
	.opciones{font-size:1.7em}
	.divconector{height:120px}
	.contorno_perilla{height:300px; margin-top:0px}
	.perilla_gira{height:200px; margin-top:50px; margin-left: 0px;}
	.contorno_certificado{height:200px;}
	.icono_certificado{position:absolute; height:100px; margin-left: -40px;  margin-top: 40px; }
	.circulos, .circulos_deshabilitados{min-width:100px; min-height:100px; height:100px; width:100px;}
	.circuito_uno, .circuito_dos, .circuito_tres, .circuito_cuatro{max-width: 180px; max-height: 180px; min-height:180px; min-width:180px; }
	.circuito_uno{transform: rotate(90deg); }
	.circuito_dos{transform: rotate(70deg); }
	.circuito_tres{transform: rotate(55deg); }
	.circuito_cuatro{transform: rotate(35deg); }
	.titulos{margin-top:130px;margin-left: 400px; font-size:50px;}
}

/* Large LG devices (desktops, 992px and up)*/
@media (min-width: 992px) { 
	.circuito_uno, .circuito_dos, .circuito_tres, .circuito_cuatro{margin-left:0px }
	.divconector{min-height:120px}
	.contorno_perilla{height:400px;}
	.contorno_certificado{height:200px;}
	.perilla_gira{height:250px; margin-top:75px; margin-left: 0px;}
	.titulos{margin-top:190px;margin-left: 450px; font-size:40px;}
 }

/* X-Large devices (large desktops, 1200px and up)*/
@media (min-width: 1200px) { 
	.circuito_uno, .circuito_dos, .circuito_tres, .circuito_cuatro{max-width: 200px; max-height: 200px; min-height:200px; min-width:200px; margin-left:-40px }
	.divconector{max-height:150px}
	.contorno_perilla{height:450px;}
	.perilla_gira{height:280px; margin-top:85px; margin-left: 0px;}
	.contorno_certificado{height:250px;}
	.icono_certificado{position:absolute; height:130px; margin-left:-40px;  margin-right:40px;  margin-top: 50px; }
	.titulos{margin-top:190px; margin-left: 650px; font-size:80px;}
 }

/* XX-Large devices (larger desktops, 1400px and up)*/
@media (min-width: 1400px) { 
	.divtextoycirculos{font-size:1.2em;}
	.contorno_perilla{height:600px;}
	.perilla_gira{height:280px; margin-top:155px; margin-left: 0px;}
	.contorno_certificado{height:280px; margin-right:0px;}
	.icono_certificado{position:absolute; height:130px; margin-left:-60px; margin-right:60px; }
	.titulos{margin-top:600px; margin-left: 0px; font-size:60px;}
 }

 /*.circuito_uno, .circuito_dos ,.circuito_tres, .circuito_cuatro{
	 display: none;
 }*/

	.circulos_deshabilitados{
		border-radius:100px;  background: rgb(60,60,60);
background: radial-gradient(circle, rgba(60,60,60,1) 0%, rgba(143,143,143,1) 100%, rgba(119,119,119,1) 100%); 
	}
	.circulos{
	border-radius:100px; background: rgb(11,0,196); background: radial-gradient(circle, rgba(11,0,196,1) 0%, rgba(4,4,101,1) 56%, rgba(8,8,47,1) 99%, rgba(11,1,37,1) 100%);
	transform: scale(1);
	}
	.circulos:hover{
		background: rgb(22,17,111);
		background: radial-gradient(circle, rgba(22,17,111,1) 40%, rgba(5,23,183,1) 74%, rgba(9,9,121,1) 92%, rgba(0,104,255,1) 100%); 
		transform: scale(1.1);

	 }

 




@keyframes rotate {
	from {transform: rotate(360deg);}
    to {transform: rotate(0deg);}}
@-webkit-keyframes rotate {
  from {-webkit-transform: rotate(360deg);}
  to {-webkit-transform: rotate(0deg);}}
.contorno_perilla{
    -webkit-animation: 40s rotate linear infinite;
    animation: 40s rotate linear infinite;
    -webkit-transform-origin: 50% 50%;
    transform-origin: 50% 50%;
}

.circuito_uno, .circuito_dos, .circuito_tres, .circuito_cuatro {
	visibility: hidden;
}
.aparecer {
	visibility: visible;	
}


</style>


<body style="background: rgb(32,141,152); background: radial-gradient(circle, rgba(32,141,152,1) 0%, rgba(39,196,205,1) 0%, rgba(9,11,121,1) 90%, rgba(0,19,68,1) 100%);
 background-repeat: no-repeat; background-size: 100%"  >
 <div class="container-fluid" style="background-image: url(Imagenes/fondosuperior.png); background-repeat:no-repeat; background-position:center ;
-webkit-background-size: cover;
-moz-background-size: cover;
-o-background-size: cover;
background-size: cover;" >
 
			<div class="row" style="height: 5vh;">
				<div class=" col-4 col-sm-3 col-md-3 col-lg-1 p-0 ">
					<img src="Imagenes/logoenerya.png" style="width:100px; background:white; border-radius: 0px 0px 50px 0px; padding:5px;" >
				</div>
			</div>
<!-- <div class="d-none d-md-none d-sm-block bg-secondary fw-bolder text-center ">ESTAS EN SM</div>
 <div class="d-none d-lg-none d-md-block bg-danger fw-bolder text-center ">ESTAS EN MD</div>
 <div class="d-none d-xl-none d-lg-block bg-dark text-danger  fw-bolder text-center ">ESTAS EN LG</div>
 <div class="d-none d-xxl-none d-xl-block bg-warning fw-bolder text-center ">ESTAS EN XL</div>
 <div class="d-none d-xxl-block bg-primary fw-bolder text-center ">ESTAS EN XXL</div>-->
 
			<div id="app" v-on="BuscarInformacion"  class="row" style="min-height: 85vh;">
				
			<div class="row d-flex justify-content-center text-warning">TEST INICIAL ES{{test_inicial}}</div>
			
					<div class="col-12 col-sm-12 col-md-3 col-lg-4 col-xl-4 col-xxl-4 my-auto"><!--Opciones y Circulos-->
						<div  class="row  divtextoycirculos">
							
							<div class="col-3 col-md-12 col-lg-10 col-xl-10   col-xxl-11 p-0 offset-md-0 offset-lg-2 offset-xl-3 offset-xxl-1 my-lg-5  my-md-4 justify-content-end d-lg-flex align-items-center">
							
								<div class=" col-12 col-md-12 col-md-12 mt-3 mt-md-0  text-center justify-content-end d-lg-flex ">
									<h3 id="" class="opciones animate__animated animate__lightSpeedInLeft text-light">Test Inicial</h3>
								</div>
								<div class="col-12 col-md-12 col-lg-5 col-xl-6	 col-xxl-3 d-flex  justify-content-md-center" >
									<a href="test_inicial.php">
										<div  @mouseout="(conectado1 = false)"  @mouseover="(conectado1 = true)" class="circulos animate__animated animate__zoomIn border border-info border-3 mx-auto"  >
											<img src="Imagenes/testprueba.png" alt="" class="img-fluid w-50 my-4 mx-4">
										</div>
									</a>
								</div>
							</div>

							<div class="col-3  col-md-12 col-lg-10  col-xl-10 col-xxl-9 p-0  offset-md-0 offset-lg-0 offset-xl-1  offset-xxl-1 my-lg-5 my-md-4 justify-content-end d-lg-flex align-items-center">
								<div class="col-12 col-md-12  text-center justify-content-end d-lg-flex ">
									<h3 id="" class="opciones animate__animated animate__lightSpeedInLeft text-light">Capacitación</h3>
								</div>
								<div class="col-12 col-md-12 col-lg-5 col-xl-6 col-xxl-3 d-flex justify-content-md-center">
									<a v-if="test_inicial !=''" href="capacitacion.php">
										<div  @mouseout="(conectado2 = false)"  @mouseover="(conectado2 = true)" class="circulos border animate__animated animate__zoomIn border-info border-3 mx-auto" >
											<img src="Imagenes/capacitacion.png" alt="" class="img-fluid w-50 my-4 mx-4">
										</div>
								    </a>
									<a v-else>
										<div class="circulos_deshabilitados border animate__animated animate__zoomIn border-info border-3 mx-auto" >
											<img src="Imagenes/capacitacion.png" alt="" class="img-fluid w-50 my-4 mx-4">
										</div>
								    </a>
									
								</div>
							</div>

							<div class="col-3 offset-md-0  col-md-12 col-lg-10 col-xl-10 col-xxl-9 p-0 offset-lg-0  offset-xl-1 offset-xxl-1 my-lg-5 my-md-4 justify-content-end d-lg-flex align-items-center">
								<div class="col-12 col-md-12  text-center justify-content-end d-lg-flex">
									<h3 id="" class="opciones animate__animated animate__lightSpeedInLeft text-light">Ver videos</h3>
								</div>
								<div  class="col-12 col-md-12 col-lg-5 col-xl-6 col-xxl-3 d-flex justify-content-md-center">
								<a href="videos.php">
									<div  @mouseout="(conectado3 = false)"  @mouseover="(conectado3 = true)" class="circulos animate__animated animate__zoomIn border border-info border-3 mx-auto"  >
										<img src="Imagenes/video.png" alt="" class="img-fluid w-50 my-4 mx-4">
									</div>
								</a>
								</div>
							</div>

							<div class="col-3 offset-md-0  col-md-12 col-lg-10  col-xl-10 col-xxl-11 p-0 offset-lg-2 offset-xl-3 offset-xxl-1  my-lg-5 my-md-4 justify-content-end d-lg-flex align-items-center">
								<div class=" col-12 col-md-12 mt-3 mt-md-0 text-center justify-content-end d-lg-flex">
									<h3 id="" class="opciones animate__animated animate__lightSpeedInLeft text-light">Test Final</h3>
								</div>
								<div  class="col-12 col-md-12 col-lg-5 col-xl-6 col-xxl-3 d-flex justify-content-md-center">
									<a href="test_final.php">
										<div  @mouseout="(conectado4 = false)"  @mouseover="(conectado4 = true)" class="circulos animate__animated animate__zoomIn border border-info border-3 mx-auto"  >
											<img  src="Imagenes/testprueba.png" alt="" class="img-fluid w-50 my-4 mx-4">
										</div>
									</a>
								</div>
							</div>
						</div>
					</div>
					
					<div class="col-12 col-sm-12 col-md-2 col-lg-2 col-xl-1 col-xxl-1 d-flex align-items-sm-center align-items-md-center"><!--Conectores-->
							<div class="row d-flex align-items-center align-items-lg-center mx-auto mx-md-0 mb-xl-5">
									<div class="divconector  col-3  col-sm-3  text-start col-md-12 text-xl-end text-xxl-end p-0 mt-5 mt-md-0 mt-lg-3  ms-md-4" >
											<img src="Imagenes/conector.png" alt="" class="circuito_uno" :class="{ aparecer: conectado1 }">
									</div>
									<div class="divconector  col-3 col-sm-3 col-md-12 text-start  text-xxl-center text-xl-start  p-0">
											<img src="Imagenes/conector.png" alt="" class="circuito_dos" :class="{aparecer: conectado2 }" >
									</div>
									<div class="divconector  col-3 col-sm-3 col-md-12 text-xxl-center text-xl-start  p-0 " >
											<img src="Imagenes/conector.png" alt=""  class="circuito_tres" :class="{aparecer: conectado3}" >
									</div>
									<div class="divconector col-3 col-sm-3 col-md-12 text-md-end mb-md-5  text-lg-end text-xl-end text-xxl-end b-4 p-0  mt-5  mb-lg-5 me-lg-n5 ms-xl-5 ms-xxl-5" >
											<img src="Imagenes/conector.png" alt="" class="circuito_cuatro" :class="{aparecer: conectado4}">
									</div>
							</div>
					</div>
	

						<div class="col-12 mt-3 col-sm-12 col-md-5 col-lg-4 col-xl-3 col-xl-1 col-xxl-4  d-flex align-items-center justify-content-center justify-content-md-start"><!--perrilla-->
							<div class="row  ms-xxl-1">
								<div class="col-12 d-flex justify-content-center">
									<img class="contorno_perilla" src="Imagenes/circulo.png" height="300px">
									<img class="perilla_gira" src="Imagenes/perilla_gira.png" >
									
									<h1 class="titulos animate__animated animate__pulse  text-light position-absolute">MENÚ</h1>
						
									
								</div>
							</div>
						</div>
						
		
					<div class="col-12  col-sm-12 col-md-2 col-lg-2 col-xl-3 col-xxl-3 d-flex align-items-end"><!--Certificado-->
							<div class="col-12 justify-content-end d-flex">
							
							<img class="icono_certificado"  src="Imagenes/icono_certificado.png"/>
							<img class="contorno_certificado"  src="Imagenes/certificado_contorno.png" height="300px"/>
							
							</div>
					</div>
				</div>

				<div class="row text-light d-flex align-items-end" style="height: 10vh; ">	
					<div class="col-12  ">
						<p class="font-monospace text-info">Soporte Técnico (Curso de capacitación)</p>
					</div>
				</div>

				<input id="user" type="hidden" name="action" value="<?php echo $_SESSION['usuario'];?>"> 
	</div>  

</body>
<script>

const app = {
	data(){
		return{
			conectado1: false,
			conectado2: false,
			conectado3: false,
			conectado4: false,
			usuario: '',
			test_inicial: null,
			info: null
		}
	},
	mounted(){
				this.usuario=document.getElementById("user").value;
				//console.log(this.usuario)
				axios.post('dato_menu_cliente.php', {
					usu:  this.usuario
				}).then(response => {
					this.test_inicial =response.data.TestInicial
				}).catch(function (error){
					console.log(error)
					});
	},
	methods:{

	}
}

var mountedApp = Vue.createApp(app).mount('#app');


	let perilla = document.querySelectorAll('.perilla_gira')
	console.log(perilla);
    document.onmousemove = function(event){
        perilla.forEach((item, index) => {
            var x = item.offsetLeft + item.clientWidth / 2; // La coordenada x de la perilla
            var y = item.offsetTop + item.clientHeight / 2; // La coordenada y de la perilla
            var rad = Math.atan2(event.pageX - x, event.pageY - y); // La distancia de coordenadas entre el mouse y el ojo, y luego use la función atan2 para calcular el arco entre el punto y el punto (0, 0)
            var rot = (rad * (180 / Math.PI) * -1) + 222; // Convertir a ángulo
            item.style.transform = 'rotate(' + rot + 'deg)'
        })
    }

</script>

</html>
<?php
}else{
	header("Location: index.php");
};
?>