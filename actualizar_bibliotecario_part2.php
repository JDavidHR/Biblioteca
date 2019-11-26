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
<?php
 require_once 'modelo/MySQL.php';//llamamos a la pagina mysql.php donde se encuentra la conexion a la base de datos

    $mysql = new MySQL; //se crea un nuevo musql

    $mysql->conectar(); //se ejecuta la funcion almacenda en mysql.php

//declaracion de variables metodo post
$id = $_REQUEST['seleccionbibliotecario'];


$mostrardatos =$mysql->efectuarConsulta("SELECT id11714256_biblioteca3.bibliotecario.nombre,id11714256_biblioteca3.bibliotecario.apellido,id11714256_biblioteca3.estado_civil.estado,id11714256_biblioteca3.bibliotecario.numero_documento,id11714256_biblioteca3.tipo_documento.tipo
 from bibliotecario 
join tipo_documento on id11714256_biblioteca3.tipo_documento.id_tipo = id11714256_biblioteca3.bibliotecario.tipo_documento_id_tipo 
join estado_civil on id11714256_biblioteca3.estado_civil.id_estado = id11714256_biblioteca3.bibliotecario.estado_civil_id_estado 
WHERE id11714256_biblioteca3.bibliotecario.id_bibliotecario = ".$id."");



//se inicia el recorrido para mostrar los datos de la BD
while ($valores1 = mysqli_fetch_assoc($mostrardatos)){
//declaracion de variables
$nombre = $valores1['nombre'];
$apellido = $valores1['apellido'];
$estado = $valores1['estado'];
$documento = $valores1['numero_documento'];
$tipo = $valores1['tipo'];

    }
$mysql->desconectar();//funcion llamada desde mysql.php
?>
<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Actualizar Bibliotecario</title>

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
    $seleccionestado =$mysql->efectuarConsulta("SELECT id11714256_biblioteca3.estado_civil.id_estado, id11714256_biblioteca3.estado_civil.estado from estado_civil");
    $selecciondocumento =$mysql->efectuarConsulta("SELECT id11714256_biblioteca3.tipo_documento.id_tipo,id11714256_biblioteca3.tipo_documento.tipo from tipo_documento");
    $mysql->desconectar(); //se ejecuta la funcion alamacenada en mysql.php
    ?>
    <div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">

                        <div class="login-form">
                            <form action="controlador/update_bibliotecario.php" method="post">
                                <div class="form-group">
                                   <input class="au-input au-input--full" type="hidden"  name="id" placeholder="Editorial" value="<?php echo $id ?>">

                                    <label>Nombre Completo</label>
                                    <input class="au-input au-input--full" type="text" name="nombre" placeholder="Nombre" value="<?php echo $nombre ?>">
                                
                                    <label>Apellido Completo</label>
                                    <input class="au-input au-input--full" type="text" name="apellido" placeholder="Apellido" value="<?php echo $apellido ?>">


                                       <label>Documento</label>
                                    <input class="au-input au-input--full" type="text" name="documento" placeholder="Documento" disabled="" value="<?php echo $documento ?>">
                                
                                    <label>Estado Civil</label>
                                        <select name="estado_civil" value="<?php echo $estado ?>">
                                        <option value="0">Seleccione:</option>
                                            <?php
                                          //se hace el recorrido de la consulta establecida en la parte superior para mostrar los datos en el respectivo select
                                          while ($valores2 = mysqli_fetch_assoc($seleccionestado)) {
                                            ?>
                                            <!--se traen los datos a mostrar en el select-->
                                            <option value="<?php echo $valores2['id_estado']?>"><?php echo $valores2['estado']?></option>';
                                            <?php
                                          }
                                        ?>
                                        </select>

                                </div>

                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit" name="actualizar">Actualizar Bibliotecario</button>
                                
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