<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Gestion Estudiantes</title>

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition"><!--cuerpo de la pagina-->
<?php
//funcion php 

    require_once 'modelo/MySQL.php';//llamamos a la pagina mysql.php donde se encuentra la conexion a la base de datos

    $mysql = new MySQL; //se crea un nuevo musql

    $mysql->conectar(); //se ejecuta la funcion almacenda en mysql.php


//consulta y funcion almacenada en una variable declarada
$seleccionestudiante =$mysql->efectuarConsulta("SELECT biblioteca3.estudiantes.numero_documento,biblioteca3.estudiantes.nombre,biblioteca3.estudiantes.apellido,biblioteca3.programa.programa,biblioteca3.libros.titulo_libro
from prestamos
join estudiantes
on biblioteca3.estudiantes.id_estudiante = biblioteca3.prestamos.estudiantes_id_estudiante
join programa 
on biblioteca3.programa.id_programa = biblioteca3.estudiantes.programa_id_programa
join libros
on biblioteca3.libros.id_libro = biblioteca3.prestamos.libros_id_libro");


   
$mysql->desconectar();//funcion llamada desde mysql.php

?>
    <div class="page-wrapper">


        <!-- MENU SIDEBAR-->
        <?php
        //funcion php donde se encuentra el menu superior de la pagina del bibliotecario
           include("header_usuario_menu_lateral_bibliotecario.php");
          ?>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
        <?php
        //funcion php donde se encuentra el menu lateral del bibliotecario

          include("header_usuario_menu_cierre_bibliotecario.php");
          ?> 
            </header>
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="table-responsive table--no-card m-b-30">
                                    <!--creacion de la tabla-->
                                    <table class="table table-borderless table-striped table-earning">
                                        <thead><!--cabecera de la tabla-->
                                            <tr>
                                                <th>Numero Documento</th>
                                                <th>Nombre</th>
                                                <th>Apellido</th>
                                                <th >Programa Cursa</th>
                                                <th >Libro Prestado</th>
                                            </tr>
                                        </thead><!--fin cabecera de la tabla-->
                                        <tbody><!--cuerpo de la tabla-->
                                        <?php
                                          //se hace el recorrido de la consulta establecida en la parte superior para mostrar los datos en el respectivo select
                                           while ($resultado=mysqli_fetch_assoc($seleccionestudiante)) {
                                                echo '<tr>
                                                <td>'.$numero_documento=$resultado['numero_documento'].'</td>
                                                <td>'.$nombre=$resultado['nombre'].'</td>
                                                <td>'.$apellido=$resultado['apellido'].'</td>
                                                <td>'.$programa=$resultado['programa'].'</td>
                                                <td>'.$titulo_libro=$resultado['titulo_libro'].'</td>
                                                <tr>';
                                            }
                                        ?>
                                        </tbody><!--fin cuerpo de la tabla-->
                                    </table><!--fin tabla-->
                                </div>
                            </div>
                            <!--creacion de la etiqueta como funcion de boton para redireccion de las paginas-->
                             <a href="eliminar_estudiante.php" class="au-btn au-btn--block au-btn--green m-b-20" style="text-align: center;">Eliminar Estudiante</a>

                              <a href="actualizar_estudiante.php" class="au-btn au-btn--block au-btn--green m-b-20" style="text-align: center;">Actualizar Estudiante</a>

                               <a href="register_usuario.php" class="au-btn au-btn--block au-btn--green m-b-20" style="text-align: center;">Añadir Estudiante</a>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="copyright">
                                    <?php//funcion php donde se llama al footer de la pagina
                                    include("footer.php");
                                    ?>
                                </div>
                            </div>
                        </div>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

    </div>

   <!-- Jquery JS-->
    <script src="vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    </script>
    <script src="vendor/animsition/animsition.min.js"></script>
    <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    </script>
    </script>
    <!-- Main JS-->
    <script src="js/main.js"></script>
</body>

</html>
<!-- end document-->
