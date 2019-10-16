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
            echo"<script type=\"text/javascript\">alert('Se elimino correctamente!'); window.location='../gestion_estudiantes.php';</script>";
        }else{
            //mensaje de salida en caso de que la consulta falle con su respectiva redireccion de pagina
            echo"<script type=\"text/javascript\">alert('Se produjo un error'); window.location='../eliminar_estudiante.php';</script>";
        }
?>