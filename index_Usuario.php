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
    <title>Home</title>

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

<body class="animsition">
     <?php

    require_once 'modelo/MySQL.php';//llamamos a la pagina mysql.php donde se encuentra la conexion a la base de datos

    $mysql = new MySQL; //se crea un nuevo musql

    $mysql->conectar(); //se ejecuta la funcion almacenda en mysql.php


   
$seleccionlibro =$mysql->efectuarConsulta("SELECT biblioteca3.libros.id_libro,biblioteca3.libros.titulo_libro,biblioteca3.libros.editorial,biblioteca3.libros.autor, biblioteca3.libros.fecha_publicacion
from libros
join estudiantes");
   
$mysql->desconectar();

?>
    <div class="page-wrapper">


        <!-- MENU SIDEBAR-->
         <?php
          include("header_usuario_menu_cierre.php");
          ?>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
          <?php
          include("header_usuario_menu_lateral_usuario.php");
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
                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Titulo</th>
                                                <th>Editorial</th>
                                                <th >Autor</th>
                                                <th >Fecha</th>
                                            </tr>

                                            
                                        </thead>

                                        <tbody>
                                          <?php
                                           while ($resultado=mysqli_fetch_assoc($seleccionlibro)) {
                                                echo '<tr>
                                                <td>'.$id=$resultado['id_libro'].'</td>
                                                <td>'.$titulo=$resultado['titulo_libro'].'</td>
                                                <td>'.$editorial=$resultado['editorial'].'</td>
                                                <td>'.$autor=$resultado['autor'].'</td>
                                                <td>'.$fecha=$resultado['fecha_publicacion'].'</td>
                                                <tr>';
                                            }
                                        ?>
                                        </tbody>

                                    </table>
                                </div>
                            </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="copyright">
                                    <?php
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
