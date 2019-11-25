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
//condicion donde se rectifica que los campos no esten vacios y que esten definidos
if(isset($_POST['actualizar']) && !empty($_POST['nombre']) && !empty($_POST['apellido'])){
    
require_once '../modelo/MySQL.php';//se llama la pagina mysql.php para hacer la respectiva conexion con la BD

//declaracion de las variables donde se almacenan los datos de los respectivos campos llenados del formulario con el metodo post
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $estado = $_POST['estado_civil'];
        $id = $_POST['id'];
        
        $mysql = new MySQL;//nuevo mysql
        $mysql->conectar();//funcion almacendad en mysql.php

        //consulta de la insercion de datos en la base de datos, donde hace las respectivas consultas almacenadas en una variable
        $sql=$mysql->efectuarConsulta("UPDATE id11714256_biblioteca3.bibliotecario SET nombre ='".$nombre."',apellido = '".$apellido."',estado_civil_id_estado =".$estado." WHERE id_bibliotecario = ".$id."");


        //condiciones de redirecionamiento a las respectivas paginas
        if($sql){
            //mensaje de salida (alert) en caso de la consulta sea exitosa con su respectiva redireccion de pagina
            //echo"<script type=\"text/javascript\">alert('Se actualizo correctamente!'); window.location='../gestion_Bibliotecarios.php';</script>";
            echo"<div class=\"alert alert-success  role=\"alert\"><a href=\"../gestion_Bibliotecarios.php\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a><strong>!Se actualizo correctamente!</strong></div>";

            header("refresh:2;url=../gestion_Bibliotecarios.php");
        }else{
            //mensaje de salida en caso de que la consulta falle con su respectiva redireccion de pagina
            //echo"<script type=\"text/javascript\">alert('Se produjo un error!'); window.location='../actualizar_bibliotecario.php';</script>";
            echo"<div class=\"alert alert-danger  role=\"alert\"><a href=\"../actualizar_bibliotecario.php\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a><strong>!Se produjo un error!</strong></div>";

            header("refresh:2;url=../actualizar_bibliotecario.php");
        } 
        
         
}
?>
</div>
    <!-- Main JS-->
    <script src="../js/main.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>