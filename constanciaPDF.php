
<?php 
include "conexionGhoner.php";
session_start();
/*if ($_SESSION["usuario"] && $_SESSION["tipo"]=="Usuario"){
	$usuariotest=$_SESSION["usuario"];*/

	$usuario=$_GET['usuario'];
	$query = "SELECT * FROM UsuariosServicio WHERE Usuario = '$usuario'";
	$resultado=mysqli_query($conexion,$query);
	while($datos=mysqli_fetch_array($resultado)){
		$nombre_usuario=$datos['Nombre'];
		$correo_usuario=$datos['Correo'];
		// $nombre_usuario= mb_strtoupper($nombre_usuario,'utf-8');
	}
	//$nombre_usuario="Genaro Villanueva Pérez";
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
	$pdf->Ln(92);
	$pdf->Cell(0,5,'_____________________________',0,0,'C');
	$pdf->Ln(10);
	$pdf->setFont('Times','',12);
	$pdf->setTextColor(0,0,0);
	$pdf->Cell(0,1,'Jefe de Servicio',0,0,'C');
	$pdf->Ln(5);
	$pdf->Cell(0,1,utf8_decode("y Soporte Técnico a Clientes Enerya"),0,0,'C');
	$pdf->Ln(10);
	$pdf->setFont('Arial','',16);
	$pdf->setTextColor(0,0,0);
	$pdf->Cell(0,1,utf8_decode("A ".$reacomodando),0,0,'C');
	$pdf->Image('Imagenes/f.png',142,147,10);

	//$pdf->Output();
	//$pdf->Output('F', 'constancia/'.mb_strtoupper($nombre_usuario,'utf-8').'.pdf');//descarga servidor
	$pdf->Output('F', 'constancia/'.$nombre_usuario.'.pdf');//descarga servidor
	//$pdf->Output('D', 'constancia/'.mb_strtoupper($nombre_usuario,'utf-8').'.pdf');//descaga cliente
	//$pdf->Output('I', '');//muestra.
//include 'contanciaPDF_View.php';
//header('Location: constanciaPDF_View.php?nombre='.$nombre_usuario);
/*}*///fin SESSION



use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once 'PHPMailVendor/vendor/autoload.php';

$mail = new PHPMailer(true);

try {
    // Configure PHPMailer
    $mail->isSMTP();
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;

    // Configure SMTP Server
    $mail->Host = 'mx98.hostgator.mx';
    $mail->Username = 'soporte@vvnorth.com';
    $mail->Password = 'eBZ6_$H2Sl-z';

    // Configure Email
    $envia =  utf8_decode('Soporte Técnico');
    $mail->setFrom('soporte@vvnorth.com', $envia);
    $mail->addAddress('atencionaclientes@enerya.com');
    $mail->AddCC($correo_usuario);
    $mail->addAttachment('constancia/documento.pdf','documento.pdf');
    $asunto = 'Constancia capacitación';
    $mail->Subject = utf8_decode($asunto);
    $mail->isHTML(true);
    $Body = '<strong>Felicidades</strong> por realizár el curso de Capacitación, se adjunto constancia en PDF. en correo: '.$correo_usuario;
    $mail->Body=utf8_decode($Body);
    // send mail
    $mail->Send();
    echo 'ENVIADO A TU CORREO';
} catch (Exception $e) {
    echo 'NO PUDIMOS ENVIARLO A TU CORREO: ' . $mail->ErrorInfo;
}


 ?>
<script type="text/javascript">	
window.location.replace("constanciaPDF_View.php?nombre=<?php echo $nombre_usuario?>");
setTimeout(function(){
	window.location.replace("menu_cliente.php");
},500)
//window.location.href ="constanciaPDF_view.php";
//alert("asdasd");
//var w = window.open(pdf);
//w.print();
//w.close();
</script>