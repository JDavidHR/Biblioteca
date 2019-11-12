
<!DOCTYPE html>
<html lang="es">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>registro</title>

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

<body class="animsition"> <!--cuerpo de la pagina-->
     <?php 
     //funcion php
    require_once 'modelo/MySQL.php';//llamamos a la pagina mysql.php donde se encuentra la conexion a la base de datos

    $mysql = new MySQL; //se crea un nuevo musql

    $mysql->conectar(); //se ejecuta la funcion almacenda en mysql.php
    //ejecicion de las diferentes consultas
    $selecciondocumentob =$mysql->efectuarConsulta("SELECT biblioteca3.tipo_documento.id_tipo,biblioteca3.tipo_documento.tipo from tipo_documento");
   
    $seleccionestadob =$mysql->efectuarConsulta("SELECT biblioteca3.estado_civil.id_estado, biblioteca3.estado_civil.estado from estado_civil");

    $mysql->desconectar(); //se ejecuta la funcion alamacenada en mysql.php
    ?>
    <div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">

                        <div class="login-form">
                             <!--Formulario para recoger los datos de registro por medio del metodo POST y la accion redirige a la pagina de inicio de sesion de bibliotecario-->
                            <form action="controlador/register_bibliotecario_controlador.php" method="post">
                                <div class="form-group">
                                    <!--creacion de los inputs y labels que se veran en la parte grafica-->
                                    <label>Nombre Completo</label>
                                    <input class="au-input au-input--full" type="text" name="nombreb" placeholder="Nombre" onkeypress="return soloLetras(event)">
                                
                                    <label>Apellido Completo</label>
                                    <input class="au-input au-input--full" type="text" name="apellidob" placeholder="Apellido" onkeypress="return soloLetras(event)">
                                
                                    <label>Contraseña</label>
                                    <input class="au-input au-input--full" type="password" name="contraseñab" placeholder="Contraseña">
                                
                                    <label>Documento</label>
                                    <input class="au-input au-input--full" type="text" name="documentob" placeholder="Documento" onkeypress="return soloNumeros(event)">

                                    <label>Tipo Documento</label>
                                    <select name="tipo_documentob">
                                        <option value="0">Seleccione:</option>
                                        <?php
                                          //se hace el recorrido de la consulta establecida en la parte superior para mostrar los datos en el respectivo select
                                          while ($valores1b = mysqli_fetch_assoc($selecciondocumentob)) {
                                            ?>
                                            <!--se traen los datos a mostrar en el select-->
                                            <option value="<?php echo $valores1b['id_tipo']?>"><?php echo $valores1b['tipo']?></option>';
                                            <?php
                                          }
                                        ?>
                                      </select>
                                
                                    <label>Estado Civil</label>
                                     <select name="estado_civilb">
                                        <option value="0">Seleccione:</option>
                                        <?php
                                          //se hace el recorrido de la consulta establecida en la parte superior para mostrar los datos en el respectivo select
                                          while ($valores2b= mysqli_fetch_assoc($seleccionestadob)) {
                                            ?>
                                            <!--se traen los datos a mostrar en el select-->
                                            <option value="<?php echo $valores2b['id_estado']?>"><?php echo $valores2b['estado']?></option>';
                                            <?php
                                          }
                                        ?>
                                      </select>
                                      <label>_________________________________________________</label>

                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit" name="registrarb">Crear Bibliotecario</button>
                                
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
    <script src="js/validaciones.js"></script> <!--validaciones de los inputs, nombre solo letras, documento solo numeros-->

</body> <!--fin cuerpo de la pagina-->

</html>
<!-- end document-->