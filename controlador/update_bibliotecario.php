<?php
//condicion donde se rectifica que los campos no esten vacios y que esten definidos
if(isset($_POST['Actualizar_Bibliotecario']) && !empty($_POST['nombre']) && !empty($_POST['apellido']) && !empty($_POST['Contraseña']) && !empty($_POST['tipo_documento_id_tipo']) && !empty($_POST['numero_documento']) && !empty($_POST['estado'])){

        require_once '../modelo/MySQL.php';//se llama la pagina mysql.php para hacer la respectiva conexion con la BD
        //declaracion de las variables donde se almacenan los datos de los respectivos campos llenados del formulario con el metodo post
        $nombre = $valores1['nombre'];
        $apellido = $valores1['apellido'];
        $Contraseña = $valores1['Contraseña'];
        $tipo_documento = $valores1['tipo_documento_id_tipo'];
        $numero_documento = $valores1['numero_documento'];
        $estado = $valores1['estado'];
        $id = $_POST['id'];
        

        $mysql = new MySQL;//nuevo mysql
        $mysql->conectar();//funcion almacendad en mysql.php
        //consulta de la insercion de datos en la base de datos, donde hace las respectivas consultas almacenadas en una variable
        $sql=$mysql->efectuarConsulta("UPDATE biblioteca3.bibliotecario SET nombre ='".$nombre."',apellido = '".$apellido."',Contraseña = '".$Contraseña."',tipo_documento_id_tipo = '".$tipo_documento."',mumero_documento = '".$numero_documento."', estado = '".$estado."' WHERE id_bibliotecario = ".$id."");
//mensaje de salida utilizado para ver si la consulta esta correcta      
//echo "UPDATE biblioteca3.libros SET titulo_libro ='".$titulo."',editorial = '".$editorial."',autor = '".$autor."',fecha_publicacion = '".$fecha."' WHERE id_libro = ".$id."";
        //condiciones de redirecionamiento a las respectivas paginas
        if($sql){
            //mensaje de salida (alert) en caso de la consulta sea exitosa con su respectiva redireccion de pagina
            echo"<script type=\"text/javascript\">alert('Se actualizo correctamente!'); window.location='../gestion_Bibliotecarios.php';</script>";
        }else{
            //mensaje de salida en caso de que la consulta falle con su respectiva redireccion de pagina
            echo"<script type=\"text/javascript\">alert('Se produjo un error!'); window.location='../actualizar_bibliotecario.php';</script>";
        } 
        
         
}
?>