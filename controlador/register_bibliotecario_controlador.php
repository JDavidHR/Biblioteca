<!DOCTYPE html>
<html lang="en">

<head>  
    <meta charset="UTF-8">
    <!-- Bootstrap CSS-->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link type="text/css" href="../css/theme.css" rel="stylesheet" media="all">
    <link type="text/css" href="../css/bootstrap.min.css" rel="stylesheet" media="all">
</head>

<body>
    <div class="col-lg-offset-3 col-lg-6">
<?php
require_once '../modelo/MySQL.php';
//condicion donde se rectifica que los campos no esten vacios y que esten definidos
if(isset($_POST['registrarb']) && !empty($_POST['nombreb']) && !empty($_POST['apellidob']) && !empty($_POST['documentob']) && !empty($_POST['contraseñab']) && !empty($_POST['estado_civilb']) && !empty($_POST['tipo_documentob'])){
    //declaracion de variables llamadas por el metodo post
        $nombreb=$_POST["nombreb"];
        $apellidob=$_POST["apellidob"];
        $ndocumentob=$_POST["documentob"];
        $passb=md5($_POST["contraseñab"]);
        $estadob=$_POST["estado_civilb"];
        $documentob=$_POST["tipo_documentob"];


    $mysql = new MySQL;//nuevo mysql
    $mysql->conectar();//funcion llamada desde mysql.php

    $consultadoc =$mysql->efectuarConsulta("SELECT numero_documento FROM id11714256_biblioteca3.estudiantes WHERE numero_documento = ".$ndocumentob."");

    //consulta almacenada en una variable junto a la funcion de de mysql.php
    $consulta =$mysql->efectuarConsulta("SELECT numero_documento FROM id11714256_biblioteca3.bibliotecario WHERE numero_documento = ".$ndocumentob."");

    //condicion para ver si el documento a registrar existe, si el valor es mayor a 1 es porque encontro un resultado en la BD, y si es cero es porque no encontro nada
    if(mysqli_num_rows($consultadoc)){
         //echo"<script type=\"text/javascript\">alert('El documento a registrar ya se encuentra registrado como un estudiante'); window.location='../register_bibliotecario.php';</script>";
        echo"<div class=\"alert alert-warning  role=\"alert\"><a href=\"../register_bibliotecario.php\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a><strong>!El documento a registrar ya se encuentra registrado como un estudiante!</strong></div>";

        header("refresh:1;url=../register_bibliotecario.php");
    }else{

        if(mysqli_num_rows($consulta)>0){
        //mensaje de salida (alert) en caso de que el documento ya exista junto con su redireccion
         //echo"<script type=\"text/javascript\">alert('El documento ya se encuentra registrado'); window.location='../register_bibliotecario.php';</script>";
        echo"<div class=\"alert alert-warning  role=\"alert\"><a href=\"../register_bibliotecario.php\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a><strong>!El documento ya se encuentra registrado!</strong></div>";

        header("refresh:1;url=../register_bibliotecario.php");
    }else{
            //declaracion de variable que almacena la consulta de insercion a la BD junto a la respectiva funcion de mysql.php y su redireccion de pagina
            $sql=$mysql->efectuarConsulta("insert into id11714256_biblioteca3.bibliotecario(nombre,apellido,numero_documento,contrasena,estado_civil_id_estado,tipo_documento_id_tipo,estado) VALUES ('".$nombreb."','".$apellidob."',".$ndocumentob.",'".$passb."','".$estadob."','".$documentob."',1)");
            //mensaje de salida (alert) en caso de que el documento no exista junto con su redireccion
            //echo"<script type=\"text/javascript\">alert('Se registro correctamente!'); window.location='../gestion_Bibliotecarios.php';</script>";
            echo"<div class=\"alert alert-success  role=\"alert\"><a href=\"../gestion_Bibliotecarios.php\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a><strong>!Se registro correctamente!</strong></div>";

            header("refresh:2;url=../gestion_Bibliotecarios.php");

    }
}
}
?>
</div>
    <!-- Main JS-->
    <script src="../js/main.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>