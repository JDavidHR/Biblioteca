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
//mensaje de salida utilizado para ver si la consulta esta correcta      
echo "UPDATE biblioteca3.libros SET titulo_libro ='".$titulo."',editorial = '".$editorial."',autor = '".$autor."',fecha_publicacion = '".$fecha."' WHERE id_libro = ".$id."";
        //condiciones de redirecionamiento a las respectivas paginas
        if($sql){
            //mensaje de salida (alert) en caso de la consulta sea exitosa con su respectiva redireccion de pagina
            echo"<script type=\"text/javascript\">alert('Se actualizo correctamente!'); window.location='../inventario_Bibliotecario.php';</script>";
        }else{
            //mensaje de salida en caso de que la consulta falle con su respectiva redireccion de pagina
            echo"<script type=\"text/javascript\">alert('Se produjo un error!'); window.location='../actualizar_libro.php';</script>";
        } 
        
         
}
?>