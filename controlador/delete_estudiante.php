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
require_once '../modelo/MySQL.php'; //llamado de pagina donde se encuentra la conexion a la BD

$mysql = new MySQL;//nuevo mysql
$mysql->conectar();//funcion de conectar a la BD ubicada en mysql.php

//declaracion de variables metodo post
$estudiante = $_POST['seleccion_estudiante'];

//declaracion de la variable donde se almacena la funcion de mysql.php donde se hara la respectiva consulta
$consulta =$mysql->efectuarConsulta("UPDATE estudiantes SET estado = 0 where id_estudiante = ".$estudiante."");

if($consulta){
            //mensaje de salida en caso de que la consulta sea exitosa con su respectiva redireccion de pagina
            //echo"<script type=\"text/javascript\">alert('Se elimino correctamente!'); window.location='../gestion_estudiantes.php';</script>";
			echo"<div class=\"alert alert-success  role=\"alert\"><a href=\"../gestion_estudiantes.php\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a><strong>!Se elimino correctamente!</strong></div>";

            header("refresh:1;url=../gestion_estudiantes.php");
        }else{
            //mensaje de salida en caso de que la consulta falle con su respectiva redireccion de pagina
            //echo"<script type=\"text/javascript\">alert('Se produjo un error'); window.location='../eliminar_estudiante.php';</script>";
            echo"<div class=\"alert alert-danger  role=\"alert\"><a href=\"../eliminar_estudiante.php\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a><strong>!Se produjo un error!</strong></div>";

            header("refresh:1;url=../eliminar_estudiante.php");
        }
?>
</div>
    <!-- Main JS-->
    <script src="../js/main.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>