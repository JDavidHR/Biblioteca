<?php
//condicion donde se rectifica que los campos no esten vacios y que esten definidos
if(isset($_POST['actualizar']) && !empty($_POST['nombre']) && !empty($_POST['apellido'])){

require_once '../modelo/MySQL.php';//se llama la pagina mysql.php para hacer la respectiva conexion con la BD
//declaracion de las variables donde se almacenan los datos de los respectivos campos llenados del formulario con el metodo post
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$estado = $_POST['estado_civil'];
$programa = $_POST['programa'];


$id = $_POST['id'];
        

        $mysql = new MySQL;//nuevo mysql
        $mysql->conectar();//funcion almacendad en mysql.php
        //consulta de la insercion de datos en la base de datos, donde hace las respectivas consultas almacenadas en una variable
        $sql=$mysql->efectuarConsulta("UPDATE biblioteca3.estudiantes SET nombre ='".$nombre."',apellido = '".$apellido."',estado_civil_id_estado =".$estado.",programa_id_programa =".$programa." WHERE id_estudiante = ".$id."");


        //condiciones de redirecionamiento a las respectivas paginas
        if($sql){
            //mensaje de salida (alert) en caso de la consulta sea exitosa con su respectiva redireccion de pagina
            echo"<script type=\"text/javascript\">alert('Se actualizo correctamente!'); window.location='../gestion_estudiantes.php';</script>";
        }else{
            //mensaje de salida en caso de que la consulta falle con su respectiva redireccion de pagina
            echo"<script type=\"text/javascript\">alert('Se produjo un error!'); window.location='../actualizar_estudiante_part2.php?seleccionestudiante=".$id."';</script>";

        } 
        $mysql->desconectar();
         
}
?>