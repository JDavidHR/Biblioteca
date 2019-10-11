<!DOCTYPE html>
<html lang="en">

<?php
 require_once 'modelo/MySQL.php';//llamamos a la pagina mysql.php donde se encuentra la conexion a la base de datos

    $mysql = new MySQL; //se crea un nuevo musql

    $mysql->conectar(); //se ejecuta la funcion almacenda en mysql.php


$id = $_POST['seleccion_libro'];
$mostrardatos =$mysql->efectuarConsulta("SELECT biblioteca3.libros.titulo_libro, biblioteca3.libros.editorial, biblioteca3.libros.autor, biblioteca3.libros.fecha_publicacion FROM libros WHERE biblioteca3.libros.id_libro = ".$id."");

 while ($valores1 = mysqli_fetch_assoc($mostrardatos)) {

$titulo_libro = $valores1['titulo_libro'];
$editorial = $valores1['editorial'];
$autor = $valores1['autor'];
$fecha = $valores1['fecha_publicacion'];

    }
$mysql->desconectar();
?>

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
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

<body class="animsition">
    <div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">

                        <div class="login-form">
                            <form action="controlador/update_libros.php" method="post">
                                <div class="form-group">
                                      
                                        <input class="au-input au-input--full" type="hidden"  name="id" placeholder="Editorial" value="<?php echo $id ?>">
                                    <label>Titulo Libro</label>

                                    <input class="au-input au-input--full" type="text" name="titulo" placeholder="Titulo" value="<?php echo $titulo_libro ?>">
                                
                                    <label>Editorial</label>
                                    <input class="au-input au-input--full" type="text" name="editorial" placeholder="Editorial" value="<?php echo $editorial ?>">
                                
                                    <label>Autor</label>
                                    <input class="au-input au-input--full" type="text" name="autor" placeholder="Autor Libro" value="<?php echo $autor ?>">
                                    
                                    <label>Fecha Publicacion</label>
                                    <input type="date" name="fecha" class="au-input au-input--full"value="<?php echo $fecha ?>">



                                </div>

                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit" name="actualizar_libro">Actualizar Libro</button>
                                
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