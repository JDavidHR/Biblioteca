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
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Actualizar Prestamo</title>

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
      <?php //funcion php
    require_once 'modelo/MySQL.php';//llamamos a la pagina mysql.php donde se encuentra la conexion a la base de datos

    $mysql = new MySQL; //se crea un nuevo musql

    $mysql->conectar(); //se ejecuta la funcion almacenda en mysql.php
    //ejecicion de las diferentes consultas
    $seleccionprestamo =$mysql->efectuarConsulta("SELECT id11714256_biblioteca3.estudiantes.id_estudiante,id11714256_biblioteca3.estudiantes.nombre from estudiantes join prestamos on id11714256_biblioteca3.prestamos.estudiantes_id_estudiante = id11714256_biblioteca3.estudiantes.id_estudiante where id11714256_biblioteca3.prestamos.estado = 1");

    $mysql->desconectar(); //se ejecuta la funcion alamacenada en mysql.php
    ?>
    <div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            <a href="#">
                                <h1 class="fas fa-book"  href="index_Bibliotecario.html"> Biblioteca</h1>
                            </a>
                        </div>
                        <div class="login-form">
                            <form action="actualizar_prestamo_part2.php" method="POST">
                                <h1 align="center" class="au-input au-input--full">Bienvenido Bibliotecario</h1>
                                <br>
                                <center>
                                <label>Seleccione el usuario que tiene el prestamo a actualizar</label>
                                <br>
                                <select name="seleccionprestamo">
                                        <?php
                                          //se hace el recorrido de la consulta establecida en la parte superior para mostrar los datos en el respectivo select
                                          while ($valores1 = mysqli_fetch_assoc($seleccionprestamo)) {
                                            ?>
                                            <!--se traen los datos a mostrar en el select-->
                                            <option value=""><?php echo $valores1 ['nombre']?> 
                                            </option>;
                                            <?php
                                          }
                                        ?>
                                </select>
                                </center>
                                <br><br>
                                <button type="submit" name="actualizar" class="au-btn au-btn--block au-btn--green m-b-20">Actualizar prestamo</button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="vendor/slick/slick.min.js">
    </script>
    <script src="vendor/wow/wow.min.js"></script>
    <script src="vendor/animsition/animsition.min.js"></script>
    <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="vendor/circle-progress/circle-progress.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="js/main.js"></script>

</body>

</html>
<!-- end document-->