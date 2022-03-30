
<?php 
include "conexionGhoner.php";
session_start();
if ($_SESSION["usuario"] && $_SESSION["tipo"]=="Usuario"){
	$usuariotest=$_SESSION["usuario"];

	
	$query = "SELECT * FROM UsuariosServicio WHERE Usuario = '$usuariotest'";
	$resultado=mysqli_query($conexion,$query);
	while($datos=mysqli_fetch_array($resultado)){
		$nombre_usuario=$datos['Nombre'];
		 $nombre_usuario= mb_strtoupper($nombre_usuario,'utf-8');
	}
	date_default_timezone_set('UTC');
    date_default_timezone_set("America/Mexico_City");
	$hoy = date("d-m-Y");  
	$separando = explode("-",$hoy);
    if($separando[1]=="01"){$mes="Enero";}
	if($separando[1]=="02"){$mes="Febrero";}
	if($separando[1]=="03"){$mes="Marzo";}
	if($separando[1]=="04"){$mes="Abril";}
	if($separando[1]=="05"){$mes="Mayo";}
	if($separando[1]=="06"){$mes="Junio";}
	if($separando[1]=="07"){$mes="Julio";}
	if($separando[1]=="08"){$mes="Agosto";}
	if($separando[1]=="09"){$mes="Septiembre";}
	if($separando[1]=="10"){$mes="Octubre";}
	if($separando[1]=="11"){$mes="Noviembre";}
	if($separando[1]=="12"){$mes="Diciembre";}
	$reacomodando="día ".$separando[0]." de ".$mes." de ".$separando[2];
	
	require 'fpdf/fpdf.php';//ruta del pfdf
	$pdf=new FPDF('L','mm','A4');
	//$pdf= new FPDF('P','mm'arrya(50,100));//aliniacion de la hoja P, (mm cc pp),tamaño,array ml o cm segun.
	$pdf->AddPage();
	$pdf->Image('Imagenes/marco_pdf.png',1,1,295,208);
	$pdf->Image('Imagenes/enerya_logo.png',40,30,60);
	$pdf->Image('Imagenes/gonher_logo.png',200,30,60);
	$pdf->setFont('Arial','',20);
	$pdf->setTextColor(176,176,176);
	$pdf->Cell(0,110,'Otorgan la presente constancia a:',0,0,'C');
	$pdf->Ln(20);
	$pdf->setFont('Arial','B',24);
	$pdf->setTextColor(0,0,0);
	$pdf->Cell(0,110,utf8_decode($nombre_usuario),0,0,'C');
	$pdf->Ln(20);
	$pdf->setFont('Arial','',16);
	$pdf->setTextColor(0,0,0);
	$pdf->Cell(0,110,'Por haber concluido satisfactoriamente el curso:',0,0,'C');
	$pdf->Ln(10);
	$pdf->setFont('Arial','B',18);
	$pdf->Cell(0,110,utf8_decode("Capacitación Virtual en Diagnóstico de Acumuladores"),0,0,'C');
	$pdf->Ln(10);
	$pdf->setFont('Arial','',16);
	$pdf->setTextColor(0,0,0);
	$pdf->Cell(0,110,utf8_decode("Integrado por 10 módulos de aprendizaje realizados el ".$reacomodando),0,0,'C');
	$pdf->Ln(90);
	$pdf->Cell(114,20,'',0,'C',0);$pdf->Cell(50,0,'',1,'C',1);
	$pdf->Ln(5);
	$pdf->setFont('Times','',12);
	$pdf->setTextColor(0,0,0);
	$pdf->Cell(0,1,'Jefe de Servicio',0,0,'C');
	$pdf->Ln(5);
	$pdf->Cell(0,1,utf8_decode("y Soporte Técnico a Clientes Enerya"),0,0,'C');
	$pdf->Ln(10);
	$pdf->setFont('Arial','',16);
	$pdf->setTextColor(0,0,0);
	$pdf->Cell(0,1,utf8_decode("A ".$reacomodando),0,0,'C');
	$pdf->Image('Imagenes/f.png',142,142,10);

	/*$pdf->Image('img/misventas.png',5,5,30);//posicion X,posicion Y, tamaño
			$pdf->setFont('Arial','b',20);//tres parametros 
			$pdf->Cell(30);
			$pdf->Cell(120,10,'TICKET',0,0,'C');
			$pdf->Ln(20);

			$pdf->setFont('Arial','b',10);//tres parametros tipo, estilo B,I,S,B
			$pdf->Cell(100,6,$_GET['numero'],0,0,'C');
			$pdf->Ln(20);
	$pdf->setFillColor(255,255,255);//tres parametros 
	$pdf->SetX(25);//Alineacion de las celdas
		$pdf->Cell(20,6,'Cantidad',1,0,'C',1);
		$pdf->Cell(70,6,'Descripcion',1,0,'C',1);
		$pdf->Cell(20,6,'Precio',1,0,'C',1);
		$pdf->Cell(20,6,'Subtotal',1,1,'C',1);
		$pdf->setFont('Arial','i',6);//tres 
	while($row=mysqli_fetch_array($resultado)){
			$pdf->SetX(25);//Alineacion de las celdas
			$pdf->Cell(20,6,$row['cantidad'],1,0,'C',1);//largo, alto, texto,borde de celda, salto ln, alineacion.
			$pdf->Cell(70,6,$row['descripcion'],1,0,'C',1);
			$pdf->Cell(20,6,'$'.$row['precio'],1,0,'C',1);
			$pdf->Cell(20,6,'$'.$row['total'],1,0,'C',1);
			$pdf->Ln();
			$totalapagar=$row['totalapagar'];
		}
	$pdf->setFillColor(235,235,235);//tres parametros 
	$pdf->SetX(25);//Alineacion de las celdas
		$pdf->setFont('Arial','b',10);//tres parametros tipo, estilo B,I,S,B
	$pdf->Cell(130,6,'TOTAL    $'.$totalapagar.'            ',1,0,'R',1);
			$pdf->SetY(260);
			$pdf->setFont('Arial','I',8);// 
			$pdf->Cell(0,10,'Pagina ',$pdf->PageNo().'/{nb}',0,1,'C');*/
	//$pdf->Output();
	$pdf->Output('F', 'constancia/'.mb_strtoupper($nombre_usuario,'utf-8').'.pdf');//descarga servidor
	$pdf->Output('D', 'constancia_'.mb_strtoupper($nombre_usuario,'utf-8').'.pdf');//descaga cliente
	$pdf->Output('I', '');//muestra.




	
	

}//fin SESSION

 ?>
<script type="text/javascript">	
//alert("asdasd");
//var w = window.open(pdf);
//w.print();
//w.close();
</script>