<!DOCTYPE html>
<?php
$servidor='localhost';
$usuario='root';
$contrasenha='';
$BD='biblioteca3';

$conexion=mysqli_connect($servidor,$usuario,$contrasenha,$BD);
if(!$conexion){
        die('<strong> no puede conectarse con la BD:</stong>'.mysql_error());
    }else{
        $base=mysqli_select_db ($conexion,$BD);
        if(!$base){
            echo "conectado a la base de datos";
        }
    }

$bibliotecario="SELECT * FROM libros";
$resbibliotecario=$conexion->query($bibliotecario);
?>
<html lang="es">

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
    <div class="page-wrapper">


        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            
            <div class="logo">
                <a href="#">
                    <h1 class="fas fa-book"  href="index_Bibliotecario.php"> Biblioteca</h1>
                </a>
            </div>
            
            
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li class="active has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-home"></i>Inicio</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="inventario_Bibliotecario.php">Gestionar Inventario</a>
                                </li>
                                <li>
                                    <a href="prestamo_Bibliotecario.php">Gestionar Prestamos</a>
                                </li>
                                <li>
                                    <a href="gestion_estudiantes.php">Gestionar Estudiantes</a>
                                </li>
                                <li>
                                    <a href="gestion_Bibliotecarios.php">Gestionar Bibliotecarios</a>
                                </li>
                                <li>
                                    <a href="gestion_programa.php">Gestionar Programa</a>
                                </li>
                            </ul>
                        </li>

                    </ul>
                </nav>
            </div>
            
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                           


                            <form class="form-header" action="" method="POST">
                                <!--barra de busqueda-->
    
                            </form>


                            
                            <div class="header-button ">
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                       
                                        <div class="content">
                                            <a class="js-acc-btn" href="#">Bibliotecario</a> <!--nombre de la BD invocar-->
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                               
                                                <div class="content">
                                                    <h5 class="name">
                                                        <a href="#">Bibliotecario</a>
                                                    </h5>
                                                    <span class="email">Bibliotecario@cotecnova.com</span>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__body">
                                                <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-settings"></i>Configuración</a>
                                                </div>
                                                
                                            </div>
                                            <div class="account-dropdown__footer">
                                                <a href="login.php">
                                                    <i class="zmdi zmdi-power"></i>Cerrar Sesion</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
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
                                            while ($registrobibliotecario = $resbibliotecario->fetch_array(MYSQLI_BOTH)){

                                                        echo '<tr>
                                                        <td>'.$registrobibliotecario['id_libro'].'</td>
                                                        <td>'.$registrobibliotecario['titulo_libro'].'</td>
                                                        <td>'.$registrobibliotecario['editorial'].'</td>
                                                        <td>'.$registrobibliotecario['autor'].'</td>
                                                        <td>'.$registrobibliotecario['fecha_publicacion'].'</td>
                                                        <tr>';
                                                }
                                            ?>
                                        </tbody>
                                        <!--<tbody>
                                            <tr>
                                                <td>01</td>
                                                <td>Cien años de soledad</td>
                                                <td>Planeta</td>
                                                <td >Gabriel Garcia Marquez</td>
                                                <td >1997</td>

                                            </tr>
                                            <tr>
                                                <td>02</td>
                                                <td>Principito</td>
                                                <td>Editions Gallimard</td>
                                                <td >Antonie de Saint</td>
                                                <td >1994</td>

                                            </tr>
                                            <tr>
                                                <td>03</td>
                                                <td>Niño con el pijama de rayas</td>
                                                <td>David Fickling Books</td>
                                                <td >Jhon Boyne</td>
                                                <td >1942</td>

                                            </tr>
                                            <tr>
                                                <td>04</td>
                                                <td>Maria</td>
                                                <td>NA</td>
                                                <td >Jorge Isaacs</td>
                                                <td >1867</td>

                                            </tr>
                                            
                                            
                                        </tbody>-->
                                    </table>
                                </div>
                            </div>
                             <a href="eliminar_libro.php" class="au-btn au-btn--block au-btn--green m-b-20" style="text-align: center;">Eliminar Libro</a>

                              <a href="actualizar_libro.php" class="au-btn au-btn--block au-btn--green m-b-20" style="text-align: center;">Actualizar Libro</a>

                              <a href="añadir_libro.php" class="au-btn au-btn--block au-btn--green m-b-20" style="text-align: center;">Añadir Libro</a>
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
