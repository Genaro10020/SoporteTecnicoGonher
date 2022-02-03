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
	/* Small devices (landscape phones, 576px and up)*/
	.opciones{
        font-family: 'Righteous', cursive;
    }

@media (min-width: 0px) { 
	.titulos{margin-top:120px; margin-left: 15px; font-size:30px;}
	.circulos{height:90px; min-height:90px; width:90px; min-width:90px;}
	.opciones{font-size:1em}
	.contorno_perilla{height:300px;}
	.perilla_gira{position:absolute; height:200px; margin-top:41px; margin-left:13px}
	.contorno_certificado{height:200px;}
	.icono_certificado{position:absolute; height:100px; margin-right:40px; margin-top: 70px; }
	 /* Chrome, Opera 15+, Safari 3.1+ */ /* IE 9 *//* Firefox 16+, IE 10+, Opera */
	.circuito_uno{-webkit-transform : rotate(10deg) scaleY(-1); -ms-transform:rotate(10deg) scaleY(-1); transform : rotate(10deg) scaleY(-1);
				max-width: 100px; max-height: 100px; min-width: 100px; min-height:100px;}
	.circuito_dos{-webkit-transform : rotate(10deg) scaleY(-1); -ms-transform:rotate(10deg) scaleY(-1); transform : rotate(10deg) scaleY(-1); 
		max-width:  100px; max-height:  100px; min-width: 100px; min-height: 100px; }
	.circuito_tres{-webkit-transform : rotate(10deg) scaleY(-1); -ms-transform:rotate(10deg) scaleY(-1); transform : rotate(160deg) scaleX(1);
		max-width:  100px; max-height:  100px; min-width: 100px; min-height: 100px;}
	.circuito_cuatro{-webkit-transform : rotate(160deg) scaleX(1); -ms-transform:rotate(160deg) scaleX(1); transform : rotate(160deg) scaleX(1);
		max-width:  100px; max-height:  100px; min-width: 100px; min-height: 100px;}
	


}
/*SM*/	
@media (min-width: 576px) { 
	.titulos{margin-top:160px;margin-left: 15px; font-size:50px;}
	.circulos{height:90px; min-height:90px; width:90px; min-width:90px;}
	.opciones{font-size:1.5em}
	.contorno_perilla{height:400px;}
	.perilla_gira{height:250px; margin-top:62px;margin-left: 19px;}
	.icono_certificado{position:absolute; height:100px; margin-right:40px; margin-top: 80px; }
	.contorno_certificado{height:200px;}
	.circuito_uno{-webkit-transform : rotate(10deg) scaleY(-1); -ms-transform:rotate(10deg) scaleY(-1); transform : rotate(10deg) scaleY(-1);
				max-width: 130px; max-height: 130px; min-width: 130px; min-height:130px;}
	.circuito_dos{-webkit-transform : rotate(10deg) scaleY(-1); -ms-transform:rotate(10deg) scaleY(-1); transform : rotate(10deg) scaleY(-1); 
		max-width: 130px; max-height: 130px; min-width: 130px; min-height:130px; }
	.circuito_tres{-webkit-transform : rotate(10deg) scaleY(-1); -ms-transform:rotate(10deg) scaleY(-1); transform : rotate(160deg) scaleX(1);
		max-width: 130px; max-height: 130px; min-width: 130px; min-height:130px;}
	.circuito_cuatro{-webkit-transform : rotate(160deg) scaleX(1); -ms-transform:rotate(160deg) scaleX(1); transform : rotate(160deg) scaleX(1);
		max-width: 130px; max-height: 130px; min-width: 130px; min-height:130px;}
	
	
}

/* Medium MD devices (tablets, 768px and up)*/
@media (min-width: 768px) {  

	.opciones{font-size:1.7em}
	.divconector{height:120px}
	.contorno_perilla{height:300px;}
	.perilla_gira{height:200px; margin-top:40px; margin-left: 19px;}
	.contorno_certificado{height:200px;}
	.icono_certificado{position:absolute; height:100px; margin-right:30px; margin-top: 80px; }
	.circulos{min-width:100px; min-height:100px; height:100px; width:100px;}
	.circuito_uno{transform: rotate(90deg); max-width: 150px; max-height: 150px; min-width:150px; min-height:150px;}
	.circuito_dos{transform: rotate(70deg); max-width: 150px; max-height: 150px; min-width:150px; min-height:150px;}
	.circuito_tres{transform: rotate(55deg); max-width: 150px; max-height: 150px; min-width:150px; min-height:150px;}
	.circuito_cuatro{transform: rotate(35deg); max-width: 150px; max-height: 150px; min-width:150px; min-height:150px;}
	.titulos{margin-top:130px;margin-left: 400px; font-size:50px;}
}

/* Large LG devices (desktops, 992px and up)*/
@media (min-width: 992px) { 
	.divconector{height:100%}
	.contorno_perilla{height:400px;}
	.contorno_certificado{height:200px;}
	.perilla_gira{height:250px; margin-top:60px; margin-left: 19px;}
	.titulos{margin-top:190px;margin-left: 450px; font-size:40px;}
 }

/* X-Large devices (large desktops, 1200px and up)*/
@media (min-width: 1200px) { 
	
	.contorno_perilla{height:450px;}
	.perilla_gira{height:280px; margin-top:72px; margin-left: 30px;}
	.contorno_certificado{height:250px;}
	.icono_certificado{position:absolute; height:130px; margin-right:40px; margin-top: 100px; }
	.titulos{margin-top:190px; margin-left: 650px; font-size:80px;}
 }

/* XX-Large devices (larger desktops, 1400px and up)*/
@media (min-width: 1400px) { 
	.contorno_perilla{height:500px;}
	.perilla_gira{height:280px; margin-top:95px; margin-left: 30px;}
	.contorno_certificado{height:280px;}
	.icono_certificado{position:absolute; height:130px; margin-right:55px; margin-top: 120px; }
	.titulos{margin-top:220px;margin-left: 700px; font-size:80px;}
	
	
 }


@keyframes rotate {from {transform: rotate(0deg);}
    to {transform: rotate(360deg);}}
@-webkit-keyframes rotate {from {-webkit-transform: rotate(0deg);}
  to {-webkit-transform: rotate(360deg);}}
.contorno_perila{
    -webkit-animation: 20s rotate linear infinite;
    animation: 20s rotate linear infinite;
    -webkit-transform-origin: 50% 50%;
    transform-origin: 50% 50%;
}
#imgr2 {
     -webkit-animation-direction: reverse;
     animation-direction: reverse;
}
</style>
<body style="background: rgb(32,141,152); background: radial-gradient(circle, rgba(32,141,152,1) 0%, rgba(39,196,205,1) 0%, rgba(9,11,121,1) 90%, rgba(0,19,68,1) 100%);
 background-repeat: no-repeat; background-size: 100%"  >
 <div class="container-fluid" style="background-image: url(Imagenes/fondosuperior.png); background-repeat:no-repeat; background-position:center ;
-webkit-background-size: cover;
-moz-background-size: cover;
-o-background-size: cover;
background-size: cover;" >
 
			<div class="row" style="height: 4vh;">
				<div class="col-4 col-sm-3 col-md-3 col-lg-1">
					<img src="Imagenes/logoenerya.png" style="width:80px;" >
				</div>
			</div>
 <!--<div class="d-none d-md-none d-sm-block bg-secondary fw-bolder text-center ">ESTAS EN SM</div>
 <div class="d-none d-lg-none d-md-block bg-danger fw-bolder text-center ">ESTAS EN MD</div>
 <div class="d-none d-xl-none d-lg-block bg-dark text-danger  fw-bolder text-center ">ESTAS EN LG</div>
 <div class="d-none d-xxl-none d-xl-block bg-warning fw-bolder text-center ">ESTAS EN XL</div>
 <div class="d-none d-xxl-block bg-primary fw-bolder text-center ">ESTAS EN XXL</div>-->
			<div class="row" style="height: 85vh;">
				
					<div class="col-12 col-sm-12 col-md-3 col-lg-4 col-xl-3 col-xxl-4 my-auto"><!--Opciones y Circulos-->
						<div class="row ">
						
							<div class="col-3 col-md-12 col-lg-10 col-xl-10   col-xxl-10 p-0 offset-md-0 offset-lg-2 offset-xl-4 offset-xxl-3 my-lg-5  my-md-4 justify-content-end d-lg-flex align-items-center">
								<div class=" col-12 col-md-12 col-md-12 mt-3 mt-md-0  text-center justify-content-end d-lg-flex ">
									<h3 id="" class="opciones text-light">Test Inicial</h3>
								</div>
								<div class="col-12 col-md-12 col-lg-5 col-xl-6	 col-xxl-3 d-flex  justify-content-md-center" >
									<div class="circulos border border-info border-3 mx-auto" style=" border-radius:100px; background: rgb(11,0,196); background: radial-gradient(circle, rgba(11,0,196,1) 0%, rgba(4,4,101,1) 56%, rgba(8,8,47,1) 99%, rgba(11,1,37,1) 100%);" >
										<img src="Imagenes/testprueba.png" alt="" class="img-fluid w-50 my-4 mx-4">
									</div>
								</div>
							</div>

							<div class="col-3  col-md-12 col-lg-10  col-xl-10 col-xxl-10 p-0  offset-md-0 offset-lg-0 offset-xl-2  offset-xxl-1 my-lg-5 my-md-4 justify-content-end d-lg-flex align-items-center">
								<div class="col-12 col-md-12  text-center justify-content-end d-lg-flex ">
									<h3 id="" class="opciones text-light">Capacitación</h3>
								</div>
								<div class="col-12 col-md-12 col-lg-5 col-xl-6 col-xxl-3 d-flex justify-content-md-center">
									<div class="circulos border border-info border-3 mx-auto" style="border-radius:100px; background: rgb(11,0,196); background: radial-gradient(circle, rgba(11,0,196,1) 0%, rgba(4,4,101,1) 56%, rgba(8,8,47,1) 99%, rgba(11,1,37,1) 100%);" >
										<img src="Imagenes/capacitacion.png" alt="" class="img-fluid w-50 my-4 mx-4">
									</div>
								</div>
							</div>

							<div class="col-3 offset-md-0  col-md-12 col-lg-10 col-xl-10 col-xxl-10 p-0 offset-lg-0  offset-xl-2 offset-xxl-1 my-lg-5 my-md-4 justify-content-end d-lg-flex align-items-center">
								<div class="col-12 col-md-12  text-center justify-content-end d-lg-flex">
									<h3 id="" class="opciones text-light">Ver videos</h3>
								</div>
								<div class="col-12 col-md-12 col-lg-5 col-xl-6 col-xxl-3 d-flex justify-content-md-center">
									<div class="circulos border border-info border-3 mx-auto" style=" border-radius:100px; background: rgb(11,0,196); background: radial-gradient(circle, rgba(11,0,196,1) 0%, rgba(4,4,101,1) 56%, rgba(8,8,47,1) 99%, rgba(11,1,37,1) 100%);" >
										<img src="Imagenes/video.png" alt="" class="img-fluid w-50 my-4 mx-4">
									</div>
								</div>
							</div>

							<div class="col-3 offset-md-0  col-md-12 col-lg-10  col-xl-10 col-xxl-10 p-0 offset-lg-2 offset-xl-4 offset-xxl-3  my-lg-5 my-md-4 justify-content-end d-lg-flex align-items-center">
								<div class="col-12 col-md-12 mt-3 mt-md-0 text-center justify-content-end d-lg-flex">
									<h3 id="" class="opciones text-light">Test Final</h3>
								</div>
								<div class="col-12 col-md-12 col-lg-5 col-xl-6 col-xxl-3 d-flex justify-content-md-center">
									<div class="circulos border border-info border-3 mx-auto" style=" border-radius:100px; background: rgb(11,0,196); background: radial-gradient(circle, rgba(11,0,196,1) 0%, rgba(4,4,101,1) 56%, rgba(8,8,47,1) 99%, rgba(11,1,37,1) 100%);" >
										<img src="Imagenes/testprueba.png" alt="" class="img-fluid w-50 my-4 mx-4">
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="col-12 col-sm-12 col-md-2 col-lg-2 col-xl-2 col-xxl-1   d-flex align-items-sm-center align-items-md-center "><!--Conectores-->
							<div class="row align-items-center mx-auto mx-md-0 my-md-5">
									<div class="divconector col-3  col-sm-3 col-md-12 text-xl-end text-xxl-end p-0 mt-5 mt-md-0  ms-md-4" >
											<img src="Imagenes/conector.png" alt="" class="circuito_uno">
									</div>
									<div class="divconector col-3 col-sm-3 col-md-12  text-xxl-center text-xl-start  p-0" >
											<img src="Imagenes/conector.png" alt="" class="circuito_dos">
									</div>
									<div class="divconector col-3 col-sm-3 col-md-12 text-xxl-center text-xl-start  p-0" >
											<img src="Imagenes/conector.png" alt=""  class="circuito_tres">
									</div>
									<div class="divconector col-3 col-sm-3 col-md-12 text-xl-end text-xxl-end b-4 p-0  mt-5 mt-md-0  ms-md-4" >
											<img src="Imagenes/conector.png" alt="" class="circuito_cuatro">
									</div>
							</div>
					</div>
	

						<div class="col-12 mt-3 col-sm-12 col-md-5 col-lg-4 col-xl-4 col-xl-4 col-xxl-4  d-flex align-items-center justify-content-center justify-content-md-start"><!--perrilla-->
							<div class="row  ms-xxl-1">
								<div class="col-12 d-flex justify-content-center">
									<img class="contorno_perilla" src="Imagenes/contorno.png" height="300px">
									<img class="perilla_gira" src="Imagenes/perilla_gira.png" >
									<h1 class="titulos animate__animated animate__pulse text-light position-absolute">MENÚ</h1>
								</div>
							</div>
							
									
							
								
						</div>
						


		
					<div class="col-12  col-sm-12 col-md-2 col-lg-2 col-xl-3 col-xxl-3   d-flex align-items-end"><!--Certificado-->
							<div class="col-12 justify-content-end d-flex">
							
							<img class="icono_certificado"  src="Imagenes/icono_certificado.png"/>
							<img class="contorno_certificado"  src="Imagenes/certificado_contorno.png" height="300px"/>
							
							</div>
					</div>
				</div>

				<div class="row justify-content-between" style="height: 10vh; ">	
					<div class="col-9 text-light d-flex mt-3">
					Soporte Técnico (Curso de capacitación)
					</div>
					<div class="col-3 text-light d-flex mt-3">
					
					</div>
				</div>
	</div>  

</body>
</html>