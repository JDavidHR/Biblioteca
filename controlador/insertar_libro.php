<?php
//condicion donde se rectifica que los campos no esten vacios y que esten definidos
if(isset($_POST['añadir']) && !empty($_POST['titulo']) && !empty($_POST['editorial']) && !empty($_POST['autor']) && !empty($_POST['fecha'])){

        require_once '../modelo/MySQL.php';//se llama la pagina mysql.php para hacer la respectiva conexion con la BD
        //declaracion de las variables donde se almacenan los datos de los respectivos campos llenados del formulario
        $titulo=$_POST["titulo"];
        $editorial=$_POST["editorial"];
        $autor=$_POST["autor"];
        $fecha=$_POST["fecha"];
        

        $mysql = new MySQL;//nuevo mysql
        $mysql->conectar();//funcion almacendad en mysql.php
        //consulta de la insercion de datos en la base de datos, donde hace las respectivas consultas
        $sql=$mysql->efectuarConsulta("insert into biblioteca3.libros(titulo_libro,editorial,autor,fecha_publicacion) VALUES ('".$titulo."','".$editorial."','".$autor."','".$fecha."')");

       // $sql=$mysql->efectuarconsulta("insert into biblioteca3.estudiantes values ('','ndocuemnto','$nombre','$apellido','pass','documento','estado','programa')");

        //$cs=mysql_query($sql,$cn);
        //condiciones de redirecionamiento a las respectivas paginas
        if($sql){
            echo"<script type=\"text/javascript\">alert('Se registro correctamente!'); window.location='../inventario_Bibliotecario.php';</script>";

            /*echo "<script>alert('Se registro correctamente');</script>";
            header("location: ../inventario_Bibliotecario.php");*/
        }else{
            echo"<script type=\"text/javascript\">alert('Se produjo un error'); window.location='../añadir_libro.php';</script>";
            /*echo "<script>alert('Se produjo un error');</script>";*/
            //header("location: ../añadir_libro.php");
        }
        
         
}
?>