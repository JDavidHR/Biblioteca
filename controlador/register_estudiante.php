<?php
//condicion donde se rectifica que los campos no esten vacios y que esten definidos
if(isset($_POST['registrar']) && !empty($_POST['nombre']) && !empty($_POST['apellido']) && !empty($_POST['contraseña']) && !empty($_POST['tipo_documento']) && !empty($_POST['documento']) && !empty($_POST['estado_civil']) && !empty($_POST['programa'])){

        require_once '../modelo/MySQL.php';//se llama la pagina mysql.php para hacer la respectiva conexion con la BD
        //declaracion de las variables donde se almacenan los datos de los respectivos campos llenados del formulario
        $nombre=$_POST["nombre"];
        $apellido=$_POST["apellido"];
        $pass=md5($_POST["contraseña"]);
        $documento=$_POST["tipo_documento"];
        $ndocumento=$_POST["documento"];
        $estado=$_POST["estado_civil"];
        $programa=$_POST["programa"];

        $mysql = new MySQL;//nuevo mysql
        $mysql->conectar();//funcion almacendad en mysql.php
        //consulta de la insercion de datos en la base de datos, donde hace las respectivas consultas
        $sql=$mysql->efectuarConsulta("insert into biblioteca3.estudiantes(numero_documento,nombre,apellido,contrasena,tipo_documento_id_tipo,estado_civil_id_estado,programa_id_programa) VALUES (".$ndocumento.",'".$nombre."','".$apellido."','".$pass."','".$documento."','".$estado."','".$programa."')");

       // $sql=$mysql->efectuarconsulta("insert into biblioteca3.estudiantes values ('','ndocuemnto','$nombre','$apellido','pass','documento','estado','programa')");

        //$cs=mysql_query($sql,$cn);
        //condiciones de redirecionamiento a las respectivas paginas
        if($sql){
            echo "<script>alert('Se registro correctamente');</script>";
            header("location: ../login_usuario.php");
        }else{
            echo "<script>alert('Se produjo un error');</script>";
            header("location: ../register_usuario.php");
        }
        
         
}
?>