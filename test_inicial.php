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
    .formulario{height:600px}
    
}
/*SM*/	
@media (min-width: 576px) { 
    

}

/*MD Medium MD devices (tablets, 768px and up)*/
@media (min-width: 768px) {  
   
}

/*LG Large LG devices (desktops, 992px and up)*/
@media (min-width: 992px) { 
   
 }

/*XL X-Large devices (large desktops, 1200px and up)*/
@media (min-width: 1200px) { 
  
 }

/*XXL XX-Large devices (larger desktops, 1400px and up)*/
@media (min-width: 1400px) { 
    .formulario{ max-width:1000px;}
 }



</style>


<body style="background: rgb(32,141,255); background: radial-gradient(circle, rgba(32,141,182,1) 0%, rgba(39,196,205,1) 0%, rgba(9,11,100,1) 90%, rgba(0,19,68,100) 100%);
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
 
			<div class="row d-flex " style="height: 80vh;">
                <div class="h-90 col-12 col-xl-9 col-xxl-9 text-center text-xxl-end">
                    <img class="formulario w-100 " src="Imagenes/formulario.png" alt="">
                </div>
                <div class="col-12 col-xl-3 col-xxl-3 my-auto d-flex justify-content-center justify-content-xxl-start  ">
                     <h1 class="titulos animate__animated animate__pulse text-center text-xxl-start ms-xxl-0 text-light">TEST INICIAL</h1>
                </div> 
            </div>  

            <div class="row justify-content-between" style="height: 10vh; ">	
                <div class="col-9 text-light d-flex mt-5">
                Soporte Técnico (Curso de capacitación)
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