<?php

/*session_start();

if($_SESSION['tipo']=="admin"){*/

include "conexionGhoner.php";
?>
                <table class="table table-striped table-hover">

                                        <thead  style="color:white; background: linear-gradient(90deg, rgba(2,80,80,1) 0%, rgba(9,121,20,1) 100%, rgba(0,212,255,1) 100%);">

                                            <tr>

                                            <th scope="col">#</th>

                                            <th scope="col">Usuario</th>
                                            <th scope="col">Fecha Inicial</th>
                                            <th scope="col">Fecha Final</th>

                                            <th scope="col">Eliminar</th>

                                            </tr>

                                        </thead >

                                        <tbody>
                                              <?php 
                                                $cantidad=1;

                                                $consultaF4="SELECT * FROM `Test`  ORDER BY id DESC  ";

                                                $ejecutarF4=mysqli_query($conexion,$consultaF4) or die (mysqli_error($conexion));

                                                foreach($ejecutarF4 as $opciones)

                                                    {  ?>

                                            <tr id="lineatabla">

                                                <td><?php echo $cantidad; ?></td>

                                                <td><div class="Planta2"><?php   echo $opciones['Usuario']; ?></div></td>
                                                <td><div class="Planta2"><?php   echo $opciones['FechaActual'];?></div></td>
                                                <td><div class="Planta2"><?php   echo $opciones['FechaFinalizado'];?></div></td>


                                                <td>


                                                    <button id="eliminar" type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#myModal" onclick="confirmar('<?php echo $opciones['Usuario']; ?>')">

                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">

                                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>

                                                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>

                                                            </svg>

                                                    </button>

                                                </td>

                                            </tr>

                                                <?php $cantidad++; } 

                                        ?>

                        </tbody>

                        </table>

<?php
     /*}else{

        header("location:index.php");

    }*/

?>
