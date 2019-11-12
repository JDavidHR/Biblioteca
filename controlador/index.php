<!DOCTYPE html>
<html lang="es">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">


    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
    <meta name="keywords" content="" />

    <!-- Title Page-->
    <title>Gestion Estudiantes</title>

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400italic,700italic,400,300,700' rel='stylesheet' type='text/css'>

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

<body class="animsition"><!--cuerpo-->
    <div class="page-wrapper">


        <!-- MENU SIDEBAR-->
        <?php
        //funcion php del menu superior del bibliotecario
                    include("header_usuario_menu_lateral_bibliotecario.php");
          ?>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
        <?php
        //funcion php del menu lateral del bibliotecario

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
                            <div class="contact">
                                <div class="contact-main">
                                    <!--creacion de la tabla-->
                                    <form method="post">
                                        <h3>Correo Electrónico</h3>
                                        <input type="email" placeholder="your@email.com" class="hola"  name="customer_email" required />
                                        <?php
                                            if (isset($_POST['send'])){
                                                include("sendemail.php");//Mando a llamar la funcion que se encarga de enviar el correo electronico
                                                
                                                /*Configuracion de variables para enviar el correo*/
                                                $mail_username="bibliotecacotecnova@gmail.com";//Correo electronico saliente ejemplo: tucorreo@gmail.com
                                                $mail_userpassword="1006291396";//Tu contraseña de gmail
                                                $mail_addAddress=$_POST['customer_email'];//correo electronico que recibira el mensaje
                                                $template="email_template.html";//Ruta de la plantilla HTML para enviar nuestro mensaje
                                                
                                                /*Inicio captura de datos enviados por $_POST para enviar el correo */
                                                $mail_setFromEmail='bibliotecacotecnova@gmail.com';
                                                $mail_setFromName='Administrador';
                                                $txt_message='Bienvenido, te invitamos a visitar nuestra plataforma, ingresa ya! http://localhost/Biblioteca/login.php';
                                                $mail_subject='Correo de Invitacion';
                                                
                                                sendemail($mail_username,$mail_userpassword,$mail_setFromEmail,$mail_setFromName,$mail_addAddress,$txt_message,$mail_subject,$template);//Enviar el mensaje
                                            }
                                        ?>
                                    </div>
                                    <div class="enviar">
                                        <div class="contact-check">
                                            
                                        </div>
                                        <div class="contact-enviar">
                                          <input type="submit" value="Enviar mensaje" name="send">
                                        </div>
                                        <div class="clear"> </div>
                                    </form>
                                </div>
                            </div>
                        
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
