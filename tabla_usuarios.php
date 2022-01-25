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

                                <th scope="col">Correo</th>

                                <th scope="col">Contraseña</th>

                                <th scope="col">Detalles</th>

                                <th scope="col">Eliminar</th>

                                </tr>

                            </thead >

                            <tbody>

                                        <?php 

                                                $cantidad=1;

                                                $consultaF4="SELECT * FROM `UsuariosServicio` ORDER BY id DESC";

                                                $ejecutarF4=mysqli_query($conexion,$consultaF4) or die (mysqli_error($conexion));

                                                foreach($ejecutarF4 as $opciones)

                                                    {   $Usuario=$opciones['Usuario'];
                                                        $Correo=$opciones['Correo'];
                                                        $Clave=$opciones['Clave']; ?>

                                            <tr id="lineatabla">

                                                <td><?php   echo $cantidad; ?></td>
                                                <td><?php   echo $Usuario;?></td>
                                                <td><?php   echo $Correo;?></td>
                                                <td><?php   echo $Clave;?></td>
                                                <td>
                                                    <button id="detalles" class="btn btn-success" type="button" data-bs-toggle="modal" data-bs-target="#myModalDetalles" onclick="detalles('<?php echo $Usuario ?>')" >
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-book" viewBox="0 0 16 16">
                                                            <path d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811V2.828zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z"/>
                                                            </svg>
                                                    </button>
                                                </td>
                                                <td>
                                                    <?php
                                                        if ($opciones['tipo']=="admin"){

                                                        }else{ 
                                                    ?>
                                                    <button id="eliminar" type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#myModal" onclick="confirmar('<?php echo $Usuario ?>')">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                                            </svg>
                                                    </button>
                                                    <?php
                                                            }
                                                    ?>
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