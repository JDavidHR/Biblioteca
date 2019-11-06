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
if(isset($_POST['actualizar_libro']) && !empty($_POST['titulo']) && !empty($_POST['editorial']) && !empty($_POST['autor']) && !empty($_POST['fecha'])){

        require_once '../modelo/MySQL.php';//se llama la pagina mysql.php para hacer la respectiva conexion con la BD
        //declaracion de las variables donde se almacenan los datos de los respectivos campos llenados del formulario con el metodo post
        $titulo = $_POST["titulo"];
        $editorial = $_POST["editorial"];
        $autor = $_POST["autor"];
        $fecha = $_POST["fecha"];
        $id = $_POST['id'];
        

        $mysql = new MySQL;//nuevo mysql
        $mysql->conectar();//funcion almacendad en mysql.php
        //consulta de la insercion de datos en la base de datos, donde hace las respectivas consultas almacenadas en una variable
        $sql=$mysql->efectuarConsulta("UPDATE biblioteca3.libros SET titulo_libro ='".$titulo."',editorial = '".$editorial."',autor = '".$autor."',fecha_publicacion = '".$fecha."' WHERE id_libro = ".$id."");     

        //condiciones de redirecionamiento a las respectivas paginas
        if($sql){
            //mensaje de salida (alert) en caso de la consulta sea exitosa con su respectiva redireccion de pagina
            //echo"<script type=\"text/javascript\">alert('Se actualizo correctamente!'); window.location='../inventario_Bibliotecario.php';</script>";
            echo"<div class=\"alert alert-success  role=\"alert\"><a href=\"../inventario_Bibliotecario.php\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a><strong>!Se actualizo correctamente!</strong></div>";

            header("refresh:1;url=../inventario_Bibliotecario.php");
        }else{
            //mensaje de salida en caso de que la consulta falle con su respectiva redireccion de pagina
            //echo"<script type=\"text/javascript\">alert('Se produjo un error!'); window.location='../actualizar_libro.php';</script>";
            echo"<div class=\"alert alert-danger  role=\"alert\"><a href=\"../actualizar_libro.php\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a><strong>!Se produjo un error!</strong></div>";

            header("refresh:1;url=../actualizar_libro.php");
        } 
        
         
}
?>
</div>
    <!-- Main JS-->
    <script src="../js/main.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>