<?php
require_once '../modelo/MySQL.php'; //llamado de pagina donde se encuentra la conexion a la BD

$mysql = new MySQL;//nuevo mysql
$mysql->conectar();//funcion de conectar a la BD ubicada en mysql.php

//declaracion de variables metodo post
$programa = $_POST['seleccion_programa'];

//declaracion de la variable donde se almacena la funcion de mysql.php donde se hara la respectiva consulta
$consulta =$mysql->efectuarConsulta("UPDATE programa SET estado = 0 where id_programa = ".$programa."");

if($consulta){
//mensaje de salida en caso de que la consulta sea exitosa con su respectiva redireccion de pagina
echo"<script type=\"text/javascript\">alert('Se elimino correctamente!'); window.location='../gestion_programa.php';</script>";
}else{
//mensaje de salida en caso de que la consulta falle con su respectiva redireccion de pagina
echo"<script type=\"text/javascript\">alert('Se produjo un error'); window.location='../eliminar_programa.php';</script>";
}
?>