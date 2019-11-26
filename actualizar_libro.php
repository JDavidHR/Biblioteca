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
<html lang="es">

<head>
    <!-- metas requeridos-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- titulo de pagina-->
    <title>Actualizar Libro</title>

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
<!--cuerpo de la pagina-->
<body class="animsition">
     <?php 
     //funcion php
    require_once 'modelo/MySQL.php';//llamamos a la pagina mysql.php donde se encuentra la conexion a la base de datos

    $mysql = new MySQL; //se crea un nuevo musql

    $mysql->conectar(); //se ejecuta la funcion almacenda en mysql.php
    //ejecicion de las diferentes consultas
    $seleccionlibro =$mysql->efectuarConsulta("SELECT id11714256_biblioteca3.libros.id_libro,id11714256_biblioteca3.libros.titulo_libro from libros where id11714256_biblioteca3.libros.estado = 1");

    $mysql->desconectar(); //se ejecuta la funcion alamacenada en mysql.php
    ?>
    <div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            <a href="#">
                                <h1 class="fas fa-book"  href="index_Bibliotecario.php"> Biblioteca</h1>
                            </a>
                        </div>
                        <div class="login-form">
                            <!--formulario-->
                            <form action="actualizar_libro_part2.php" method="POST">
                                <h1 align="center" class="au-input au-input--full">Bienvenido Bibliotecario</h1>
                                <br>
                                <!--etiqueta para centrar todo lo que hay dentro de ella-->
                                <center>
                                <label>Seleccione el libro a actualizar</label>
                                <br>
                                <!--select donde se utiliza el php para mostrar los datos de la bd dentro del select-->
                                <select name="seleccion_libro">
                                     <option value="0" disabled="" id="seleccion">Seleccione:</option>
                                        <?php
                                          //se hace el recorrido de la consulta establecida en la parte superior para mostrar los datos en el respectivo select
                                          while ($valores1 = mysqli_fetch_assoc($seleccionlibro)) {
                                            ?>
                                            <!--se traen los datos a mostrar en el select-->
                                            <option value="<?php echo $valores1['id_libro']?>"><?php echo $valores1['titulo_libro']?></option>';
                                            <?php
                                          }
                                        ?>
                                </select>
                                </center><!--fin etiqueta center-->
                                <br><br>
                                <!--boton-->
                                <button type="submit" name="actualizar" class="au-btn au-btn--block au-btn--green m-b-20">Actualizar Libro</button>

                            </form><!--fin formulario-->
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