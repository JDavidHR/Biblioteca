<?php
//condicion donde se rectifica que los campos no esten vacios y que esten definidos
if(isset($_POST['añadir']) && !empty($_POST['titulo']) && !empty($_POST['bibliotecario']) && !empty($_POST['estudiante']) && !empty($_POST['fecha'])){

        require_once '../modelo/MySQL.php';//se llama la pagina mysql.php para hacer la respectiva conexion con la BD
        //declaracion de las variables donde se almacenan los datos de los respectivos campos llenados del formulario
        $titulo=$_POST["titulo"];
        $bibliotecario=$_POST["bibliotecario"];
        $estudiante=$_POST["estudiante"];
        $fecha=$_POST["fecha"];


        $mysql = new MySQL;//nuevo mysql
        $mysql->conectar();//funcion almacendad en mysql.php
        //consulta de la insercion de datos en la base de datos, donde hace las respectivas consultas
        $sql=$mysql->efectuarConsulta("insert into biblioteca3.prestamos(fecha_prestamo,bibliotecario_id_bibliotecario,estudiantes_id_estudiante,libros_id_libro) VALUES (".$fecha.",'".$bibliotecario."','".$estudiante."','".$titulo."')");

       // $sql=$mysql->efectuarconsulta("insert into biblioteca3.estudiantes values ('','ndocuemnto','$nombre','$apellido','pass','documento','estado','programa')");

        //$cs=mysql_query($sql,$cn);
        //condiciones de redirecionamiento a las respectivas paginas
        if($sql){
            echo "<script>alert('Se registro correctamente');</script>";
            header("location: ../prestamo_Bibliotecario.php");
        }else{
            echo "<script>alert('Se produjo un error');</script>";
            //header("location: ../register_usuario.php");
        }
        
         
}
?>