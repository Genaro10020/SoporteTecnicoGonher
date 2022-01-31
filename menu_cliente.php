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
    .opciones{
        font-family: 'Righteous', cursive;
    }
</style>
<body style="background: rgb(32,141,152); background: radial-gradient(circle, rgba(32,141,152,1) 0%, rgba(39,196,205,1) 0%, rgba(9,11,121,1) 90%, rgba(0,19,68,1) 100%); background-repeat: no-repeat; background-size: 100%"  >
 <div class="container-fluid" style="background-image: url(Imagenes/fondosuperior.png); background-repeat:no-repeat; background-position:center ;
-webkit-background-size: cover;
-moz-background-size: cover;
-o-background-size: cover;
background-size: cover;" >
 
				<div class="row" style="height: 10vh;">
					<div class="col-4 col-sm-3 col-md-3 col-lg-1">
						<img src="Imagenes/logoenerya.png" style="width:80px;" >
					</div>
				</div>
				<div class="row d-flex align-items-center" style="height: 80vh;">

					<div class="col-4 col-md-4"><!--Opciones y Circulos-->
						<div class="row justify-content-end my-5">
							<div class="col-4 justify-content-end d-flex align-items-center">
								<h3 id="" class="opciones text-light">Test Inicial</h3>
							</div>
							<div class="col-3 d-flex justify-content-start">
								<div class="border border-info border-3 " style=" min-width:100px; min-height:100px; height:100px; width:100px; border-radius:100px; background: rgb(11,0,196); background: radial-gradient(circle, rgba(11,0,196,1) 0%, rgba(4,4,101,1) 56%, rgba(8,8,47,1) 99%, rgba(11,1,37,1) 100%);" >
									<img src="Imagenes/testprueba.png" alt="" class="img-fluid w-50 my-4 mx-4">
								</div>
							</div>
						</div>
						<div class="row justify-content-end my-5 me-5">
							<div class="col-4 justify-content-end d-flex align-items-center">
								<h3 id="" class="opciones text-light">Capacitación</h3>
							</div>
							<div class="col-3 d-flex justify-content-start">
								<div class="border border-info border-3 " style=" min-width:100px; min-height:100px; height:100px; width:100px; border-radius:100px; background: rgb(11,0,196); background: radial-gradient(circle, rgba(11,0,196,1) 0%, rgba(4,4,101,1) 56%, rgba(8,8,47,1) 99%, rgba(11,1,37,1) 100%);" >
									<img src="Imagenes/capacitacion.png" alt="" class="img-fluid w-50 my-4 mx-4">
								</div>
							</div>
						</div>
						<div class="row justify-content-end my-5 me-5">
							<div class="col-4 justify-content-end d-flex align-items-center">
								<h3 id="" class="opciones text-light">Ver videos</h3>
							</div>
							<div class="col-3 d-flex justify-content-start">
								<div class="border border-info border-3 " style=" min-width:100px; min-height:100px; height:100px; width:100px; border-radius:100px; background: rgb(11,0,196); background: radial-gradient(circle, rgba(11,0,196,1) 0%, rgba(4,4,101,1) 56%, rgba(8,8,47,1) 99%, rgba(11,1,37,1) 100%);" >
									<img src="Imagenes/video.png" alt="" class="img-fluid w-50 my-4 mx-4">
								</div>
							</div>
						</div>
						<div class="row justify-content-end my-5">
							<div class="col-4 justify-content-end d-flex align-items-center">
								<h3 id="" class="opciones text-light">Test Final</h3>
							</div>
							<div class="col-3 d-flex justify-content-start">
								<div class="border border-info border-3 " style=" min-width:100px; min-height:100px; height:100px; width:100px; border-radius:100px; background: rgb(11,0,196); background: radial-gradient(circle, rgba(11,0,196,1) 0%, rgba(4,4,101,1) 56%, rgba(8,8,47,1) 99%, rgba(11,1,37,1) 100%);" >
									<img src="Imagenes/testprueba.png" alt="" class="img-fluid w-50 my-4 mx-4">
								</div>
							</div>
						</div>
					</div>

					<div class="col-3 col-md-3 "><!--Conectores-->
						<div class="row">
							<div class="col-12 ">
								
								<div class="row d-flex justify-content-start mx-0 " style="max-height: 150px;">
									<div class="col-12">
											<img src="Imagenes/conector.png" alt="" class="img-fluid w-50"
											style="transform: rotate(80deg); max-width: 150px; max-height: 150px; min-width:150px; min-height:150px; position: relative;
											margin-top:-40px; margin-bottom:10px;">
									</div>
								</div>
								<div class="row d-flex justify-content-start" style="max-height: 150px;">
									<div class="col-12 ">
											<img src="Imagenes/conector.png" alt="" class="img-fluid w-50" 
											style="transform: rotate(70deg); max-width: 150px; max-height: 150px; min-width:150px; min-height:150px; position: relative;
											margin-top:-50px; margin-left:-40px; margin-bottom:50px;">
									</div>
								</div>
								<div class="row d-flex justify-content-start" style="max-height: 150px;">
									<div class="col-12">
											<img src="Imagenes/conector.png" alt="" class="img-fluid w-50" 
											style="transform: rotate(55deg); max-width: 150px; max-height: 150px; min-width:150px; min-height:150px; position: relative;
											margin-top:-60px; margin-left:-40px; margin-bottom:40px;">
									</div>
								</div>
								<div class="row d-flex justify-content-start mx-0" style="max-height: 150px;">
									<div class="col-12">
											<img src="Imagenes/conector.png" alt="" class="img-fluid w-50" 
											style="transform: rotate(45deg); max-width: 150px; max-height: 150px; min-width:150px; min-height:150px; position: relative;
											margin-top:-70px; margin-bottom:20px; margin-left:-20px;">
									</div>
								</div>
								
							
							</div>
						</div>
					</div>


						<div class="col-2 col-md-2"><!--perrilla-->
							<div class="row" >
								<div class="col-12 d-flex justify-content-start">
								<img class="position-absolute top-50 start-50 translate-middle " src="Imagenes/contorno.png" style=" max-width:25%; min-width:25%;">
									<!--<img src="Imagenes/contorno.png" style="width:600px; position:relative; margin-left:-100px">-->
								</div>
							</div>
						</div>


				
					<div class="col-3 col-md-3">
						<div class="row">
							<div class="col align-self-end bg-primary">
									<img src="Imagenes/certificado_contorno.png" style="position:absolute; width:20%;"/>
							</div>
						</div>
					</div>
				</div>

				<div class="row bg-success " style="height: 10vh; ">
					<div class="col-6">
					Soporte Técnico (Curso de capacitación)
					</div>
					<div class="col-6">
					Soporte Técnico (Curso de capacitación)
					</div>
				</div>
		</div>  

</body>
</html>