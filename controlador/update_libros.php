<?php
//condicion donde se rectifica que los campos no esten vacios y que esten definidos
if(isset($_POST['actualizar']) && !empty($_POST['seleccion_libro'])){

        require_once '../modelo/MySQL.php';//se llama la pagina mysql.php para hacer la respectiva conexion con la BD
        //declaracion de las variables donde se almacenan los datos de los respectivos campos llenados del formulario
        $seleccion=$_POST["seleccion_libro"];

        

        $mysql = new MySQL;//nuevo mysql
        $mysql->conectar();//funcion almacendad en mysql.php
        //consulta de la insercion de datos en la base de datos, donde hace las respectivas consultas
        $sql=$mysql->efectuarConsulta("update biblioteca3.libros set (titulo_libro = seleccion_libro) where id_libro = 2");

       // $sql=$mysql->efectuarconsulta("insert into biblioteca3.estudiantes values ('','ndocuemnto','$nombre','$apellido','pass','documento','estado','programa')");

        //$cs=mysql_query($sql,$cn);
        //condiciones de redirecionamiento a las respectivas paginas
        if($sql){
            echo "<script>alert('Se registro correctamente');</script>";
            header("location: ../inventario_Bibliotecario.php");
        }else{
            echo "<script>alert('Se produjo un error');</script>";
            //header("location: ../añadir_libro.php");
        }
        
         
}
?>