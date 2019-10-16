<?php
//condicion donde se rectifica que los campos no esten vacios y que esten definidos
if(isset($_POST['añadir']) && !empty($_POST['titulo']) && !empty($_POST['editorial']) && !empty($_POST['autor']) && !empty($_POST['fecha'])){

        require_once '../modelo/MySQL.php';//se llama la pagina mysql.php para hacer la respectiva conexion con la BD
        //declaracion de las variables donde se almacenan los datos de los respectivos campos llenados del formulario con el metodo post
        $titulo=$_POST["titulo"];
        $editorial=$_POST["editorial"];
        $autor=$_POST["autor"];
        $fecha=$_POST["fecha"];
        

        $mysql = new MySQL;//nuevo mysql
        $mysql->conectar();//funcion almacenada en mysql.php
        //consulta de la insercion de datos en la base de datos, donde hace las respectivas consultas almacenada en un variable declarada y la funcion llamada de mysql.php
        $sql=$mysql->efectuarConsulta("insert into biblioteca3.libros(titulo_libro,editorial,autor,fecha_publicacion,estado) VALUES ('".$titulo."','".$editorial."','".$autor."','".$fecha."',1)");

        //condiciones de redirecionamiento a las respectivas paginas
        if($sql){
            //mensaje de salida en caso de que la consulta sea exitosa con su respectiva redireccion de pagina
            echo"<script type=\"text/javascript\">alert('Se registro correctamente!'); window.location='../inventario_Bibliotecario.php';</script>";
        }else{
            //mensaje de salida en caso de que la consulta falle con su respectiva redireccion de pagina
            echo"<script type=\"text/javascript\">alert('Se produjo un error'); window.location='../añadir_libro.php';</script>";
        }
        
         
}
?>