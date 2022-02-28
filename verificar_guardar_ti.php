<?php
error_reporting(0);
session_start();
if ($_SESSION["usuario"] && $_SESSION["tipo"]=="Usuario"){
    header("Content-Type: application/json");
    $arreglo=json_decode(file_get_contents("php://input"),true);
    include "conexionGhoner.php";
    $usuariotest=$_SESSION["usuario"];
   $accion =$arreglo['accion'];
   

    $consulta = "SELECT * FROM Test WHERE Usuario = '$usuariotest'";
    $query = $conexion->query($consulta);
    while($datos = $query->fetch_array()){


                        if($datos['TestInicial']=="" && $datos['RespuestasTI']==""){
                                
                          if($accion=="guardar"){
                                    $calificacion=0;
                                    $respueta1=$arreglo['respuesta1'];
                                    $respueta2=$arreglo['respuesta2'];
                                    $respueta3=$arreglo['respuesta3'];
                                    $respueta4=$arreglo['respuesta4'];
                                    $respueta5=$arreglo['respuesta5'];
                                    $respueta6=$arreglo['respuesta6'];
                                    $respueta7=$arreglo['respuesta7'];
                                    $respueta8=$arreglo['respuesta8'];
                                    $respueta9=$arreglo['respuesta9'];
                                    $respueta10=$arreglo['respuesta10'];
                                    if($respueta1=="1"){$calificacion++;$R1=1;}else{$R1=0;}
                                    if($respueta2=="2"){$calificacion++;$R2=1;}else{$R2=0;}
                                    if($respueta3=="1"){$calificacion++;$R3=1;}else{$R3=0;}
                                    if($respueta4=="1"){$calificacion++;$R4=1;}else{$R4=0;}
                                    if($respueta5=="1"){$calificacion++;$R5=1;}else{$R5=0;}
                                    if($respueta6=="2"){$calificacion++;$R6=1;}else{$R6=0;}
                                    if($respueta7=="1"){$calificacion++;$R7=1;}else{$R7=0;}
                                    if($respueta8=="1"){$calificacion++;$R8=1;}else{$R8=0;}
                                    if($respueta9=="2"){$calificacion++;$R9=1;}else{$R9=0;}
                                    if($respueta10=="2"){$calificacion++;$R10=1;}else{$R10=0;}
                                
                                    $cadenaRespuestas = $R1." ".$R2." ".$R3." ".$R4." ".$R5." ".$R6." ".$R7." ".$R8." ".$R9." ".$R10;

                                    $actualizar = "UPDATE Test SET  TestInicial='$calificacion', RespuestasTI='$cadenaRespuestas' WHERE Usuario = '$usuariotest'";
                                        if($conexion->query($actualizar)){
                                            $respuesta[0] = "Guardado";
                                            $respuesta[1] = $calificacion;
                                            $respuesta[2] = $respueta1;
                                            $respuesta[3] = $respueta2;
                                            $respuesta[4] = $respueta3;
                                            $respuesta[5] = $respueta4;
                                            $respuesta[6] = $respueta5;
                                            $respuesta[7] = $respueta6;
                                            $respuesta[8] = $respueta7;
                                            $respuesta[9] = $respueta8;
                                            $respuesta[10] = $respueta9;
                                            $respuesta[11] = $respueta10;
                                            $respuesta[12]="1";
                                            $respuesta[13]="2";
                                        }else{
                                            $respuesta[0] = "No Guardado";
                                        }
                                }
                         if($accion == "verificar"){
                                         $respuesta[0] = "No Contestado";
                                         $respuesta[1] = $datos['TestInicial'];
                            }
                        }else{
                        
                            if($accion=="verificar"){
                                        $respuesta[0] = "Ya Contestado";
                                        $respuesta[1] = $datos['TestInicial'];
                                        $separandoRespuetas= explode(" ",$datos['RespuestasTI']);  
                                        if($separandoRespuetas[0]=="1"){ $respuesta[2]="1";}else{$respuesta[2]="2";}
                                        if($separandoRespuetas[1]=="1"){ $respuesta[3]="2";}else{$respuesta[3]="1";}
                                        if($separandoRespuetas[2]=="1"){ $respuesta[4]="1";}else{$respuesta[4]="2";}
                                        if($separandoRespuetas[3]=="1"){ $respuesta[5]="1";}else{$respuesta[5]="2";}
                                        if($separandoRespuetas[4]=="1"){ $respuesta[6]="1";}else{$respuesta[6]="2";}
                                        if($separandoRespuetas[5]=="1"){ $respuesta[7]="2";}else{$respuesta[7]="1";}
                                        if($separandoRespuetas[6]=="1"){ $respuesta[8]="1";}else{$respuesta[8]="2";}
                                        if($separandoRespuetas[7]=="1"){ $respuesta[9]="1";}else{$respuesta[9]="2";}
                                        if($separandoRespuetas[8]=="1"){ $respuesta[10]="2";}else{$respuesta[10]="1";}
                                        if($separandoRespuetas[9]=="1"){ $respuesta[11]="2";}else{$respuesta[11]="1";}
                                        $respuesta[12]="1";
                                        $respuesta[13]="2";
                                }
                        }
                        
            
    } 

    echo json_encode($respuesta);
 

}else{
	header("Location: index.php");
}
?>