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
<body style="background: rgb(32,141,152); background: radial-gradient(circle, rgba(32,141,152,1) 0%, rgba(39,196,205,1) 0%, rgba(9,11,121,1) 90%, rgba(0,19,68,1) 100%); background-repeat: no-repeat; background-size: 100%" >
   
    <div class="container-flud"  style="background-image: url(Imagenes/fondosuperior.png); background-repeat: no-repeat; background-size: 100%" >

    <div class="row">
        <div class="row">
            <div class="col-4 col-sm-3 col-md-3 col-lg-1">
                 <img src="Imagenes/logoenerya.png" style="width:80px;" >
            </div>
        </div>
		<div class="col-md-4 mt-5 bg-danger">
			<div class="row justify-content-end">
                <div class="col-4 bg-warning justify-content-end d-flex align-items-center">
                    <h4 id="" class="opciones text-light">TEST INICIAL</h4>
                </div>
                <div class="col-3 d-flex justify-content-start">
                    <div class="border border-info border-3 " style=" min-width:100px; min-height:100px; height:100px; width:100px; border-radius:100px; background: rgb(11,0,196); background: radial-gradient(circle, rgba(11,0,196,1) 0%, rgba(4,4,101,1) 56%, rgba(8,8,47,1) 99%, rgba(11,1,37,1) 100%);" >
                        <img src="Imagenes/testprueba.png" alt="" class="img-fluid w-50 my-4 mx-4">
                    </div>
				</div>
			</div>
			<div class="row justify-content-end">
                <div class="col-4 bg-warning justify-content-end d-flex align-items-center">
                    <h4 id="" class="opciones text-light">TEST INICIAL</h4>
                </div>
                <div class="col-3 d-flex justify-content-start">
                    <div class="border border-info border-3 " style=" min-width:100px; min-height:100px; height:100px; width:100px; border-radius:100px; background: rgb(11,0,196); background: radial-gradient(circle, rgba(11,0,196,1) 0%, rgba(4,4,101,1) 56%, rgba(8,8,47,1) 99%, rgba(11,1,37,1) 100%);" >
                        <img src="Imagenes/testprueba.png" alt="" class="img-fluid w-50 my-4 mx-4">
                    </div>
				</div>
			</div>
			<div class="row justify-content-end">
                <div class="col-4 bg-warning justify-content-end d-flex align-items-center">
                    <h4 id="" class="opciones text-light">TEST INICIAL</h4>
                </div>
                <div class="col-3 d-flex justify-content-start">
                    <div class="border border-info border-3 " style=" min-width:100px; min-height:100px; height:100px; width:100px; border-radius:100px; background: rgb(11,0,196); background: radial-gradient(circle, rgba(11,0,196,1) 0%, rgba(4,4,101,1) 56%, rgba(8,8,47,1) 99%, rgba(11,1,37,1) 100%);" >
                        <img src="Imagenes/testprueba.png" alt="" class="img-fluid w-50 my-4 mx-4">
                    </div>
				</div>
			</div>
			<div class="row justify-content-end">
                <div class="col-4 bg-warning justify-content-end d-flex align-items-center">
                    <h4 id="" class="opciones text-light">TEST INICIAL</h4>
                </div>
                <div class="col-3 d-flex justify-content-start">
                    <div class="border border-info border-3 " style=" min-width:100px; min-height:100px; height:100px; width:100px; border-radius:100px; background: rgb(11,0,196); background: radial-gradient(circle, rgba(11,0,196,1) 0%, rgba(4,4,101,1) 56%, rgba(8,8,47,1) 99%, rgba(11,1,37,1) 100%);" >
                        <img src="Imagenes/testprueba.png" alt="" class="img-fluid w-50 my-4 mx-4">
                    </div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<h2>
						título
					</h2>
					<p>
						Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui.
					</p>
					<p>
						<a class="btn" href="#">Ver detalles "</a>
					</p>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="row">
				<div class="col-md-4">
				</div>
				<div class="col-md-8">
				</div>
			</div>
			<div class="row">
				<div class="col-md-4">
				</div>
				<div class="col-md-8">
				</div>
			</div>
			<div class="row">
				<div class="col-md-4">
				</div>
				<div class="col-md-8">
				</div>
			</div>
			<div class="row">
				<div class="col-md-4">
				</div>
				<div class="col-md-8">
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="row">
				<div class="col-md-12">
				</div>
			</div>
		</div>
	</div>
  
    </div>

</body>
</html>