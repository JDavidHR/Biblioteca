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
    <title>Actualizar Estudiante</title>

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
                            <form action="gestion_estudiantes.php" method="post">
                                <div class="form-group">
                                    <label>Nombre Completo</label>
                                    <input class="au-input au-input--full" type="text" name="nombre" placeholder="Nombre">
                                
                                    <label>Apellido Completo</label>
                                    <input class="au-input au-input--full" type="text" name="apellido" placeholder="Apellido">
                                
                                    <label>Contraseña</label>
                                    <input class="au-input au-input--full" type="text" name="contraseña" placeholder="Contraseña">
                                    
                                    <label>Tipo Documento</label>
                                    <select class="au-input au-input--full" disabled="">
                                        <option>Cedula</option>
                                        <option>Tarjeta Identidad</option>
                                        <option>Cedula Extranjera</option>
                                    </select>


                                    <label>Documento</label>
                                    <input class="au-input au-input--full" type="text" name="documento" placeholder="Documento" disabled="">
                                
                                    <label>Estado Civil</label>
                                        <input type="radio" name="soltero" value="1">Soltero
                                        <input type="radio" name="casado" value="2">Casado
                                        <input type="radio" name="union_libre" value="2">Unión libre
                                    <label>Programa</label>

                                    <select class="au-input au-input--full">
                                        <option>Ingenieria de sistemas</option>
                                        <option>Contabilidad</option>
                                        <option>Administracion de empresas</option>
                                        <option>turismo y hoteleria</option>
                                    </select>
                                </div>

                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">Actualizar Estudiante</button>
                                
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