<?php
session_start();
if(!isset($_SESSION['rol'])){//Valida si existe la variable de sesion rol, esta variable es la que define si es un estudiante o un administrador
    header('location: ../index.php');//Se redirecciona a la pagina principal
    }else{
        if($_SESSION['rol']!=2){//Validacion para salber si el rol es administrador
    //        echo $_SESSION['rol'];
        header('location: ../index.php');//Se redirecciona a la pagina principal
        }
    }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="librerias/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="librerias/datatable/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="librerias/datatable/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="librerias/alertify/css/alertify.css">
    <link rel="stylesheet" type="text/css" href="librerias/alertify/css/themes/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="librerias/fontawesome/css/font-awesome.css">



    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Gestion Programa</title>
    <?php require_once "scripts.php";  ?>
    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link rel="stylesheet" type="text/css" href="librerias/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="librerias/datatable/bootstrap.css">
    

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
                <div class="col-5-lg-5">
                    <div class="table-responsive table--no-card m-b-30">
                                    <!--creacion de la tabla-->
                                    <div class="container ">
                                            <div class="row ">
                                                <div class="col-sm-12">
                                                    <div class="card text-left">
                                                        <div class="card-header">
                                                            Gestion Estudiantes
                                                        </div>
                                                        <div class="card-body">
                                                            
                                                        
                                                            <div id="tablaDatatable"></div>
                                                        </div>
                                                        <div class="card-footer text-muted">
                                                            <!--footer-->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                </div>
                            </div>
                            <!--creacion de la etiqueta como funcion de boton para redireccion de las paginas-->
                             <center><a href="eliminar_estudiante.php" class="au-btn au-btn-- au-btn--green m-b-20" style="text-align: center;">Eliminar Estudiante</a>

                              <a href="actualizar_estudiante.php" class="au-btn au-btn-- au-btn--green m-b-20" style="text-align: center;">Actualizar Estudiante</a>

                               <a href="register_usuario.php" class="au-btn au-btn-- au-btn--green m-b-20" style="text-align: center;">Añadir Estudiante</a></center>
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
    <script src="librerias/jquery.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="librerias/bootstrap/popper.min.js"></script>
    <script src="librerias/bootstrap/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    </script>
    <script src="librerias/datatable/jquery.dataTables.min.js"></script>
    <script src="librerias/datatable/dataTables.bootstrap4.min.js"></script>
    <script src="librerias/alertify/alertify.js"></script>

    <script src="vendor/animsition/animsition.min.js"></script>
    <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>

    <!-- Main JS-->

    <script src="js/main.js"></script>
</body><!--fin cuerpo de la pagina-->

<script type="text/javascript">
    $(document).ready(function(){
        $('#tablaDatatable').load('tablas/tabla_gestion_estudiantes.php');
    });
</script>
</body>

</html>
<!-- end document-->
