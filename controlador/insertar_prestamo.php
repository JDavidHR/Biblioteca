<?php
//condicion donde se rectifica que los campos no esten vacios y que esten definidos
if(isset($_POST['añadir']) && !empty($_POST['titulo']) && !empty($_POST['bibliotecario']) && !empty($_POST['estudiante']) && !empty($_POST['fecha'])){

        require_once '../modelo/MySQL.php';//se llama la pagina mysql.php para hacer la respectiva conexion con la BD
        //declaracion de las variables donde se almacenan los datos de los respectivos campos llenados del formulario por el metodo post
        $titulo=$_POST["titulo"];
        $bibliotecario=$_POST["bibliotecario"];
        $estudiante=$_POST["estudiante"];
        $fecha=$_POST["fecha"];
        $fecha = date('Y-m-d H:i'); //como la fecha en la BD esta como datetime se le da el formato en el sublime para que almacene tan la hora y la fecha, ya que sin esto almacenara todo con ceros


        $mysql = new MySQL;//nuevo mysql
        $mysql->conectar();//funcion almacendad en mysql.php
        //consulta de la insercion de datos en la base de datos, donde hace las respectivas consultas almacenadas en una variable
        $sql=$mysql->efectuarConsulta("insert into biblioteca3.prestamos(fecha_prestamo,bibliotecario_id_bibliotecario,estudiantes_id_estudiante,libros_id_libro) VALUES ('".$fecha."','".$bibliotecario."','".$estudiante."','".$titulo."')");

        //condiciones de redirecionamiento a las respectivas paginas
        if($sql){
            //mensaje de salida (alert) en caso de que la consulta sea exitosa con su respectiva redireccion de pagina
            echo"<script type=\"text/javascript\">alert('Se registro correctamente!'); window.location='../prestamo_Bibliotecario.php';</script>";
        }else{
            //mensaje de salida (alert) en caso que algo pase o falle la consulta con su respectiva redireccion de pagina
            echo"<script type=\"text/javascript\">alert('Se produjo un error'); window.location='../añadir_prestamo.php';</script>";
        }
        
         
}
?>