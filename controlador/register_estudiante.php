<?php
require_once '../modelo/MySQL.php'; //llamado de pagina donde se encuentra la conexion a la BD
//condicion donde se rectifica que los campos no esten vacios y que esten definidos
if(isset($_POST['registrar']) && !empty($_POST['nombre']) && !empty($_POST['apellido']) && !empty($_POST['contraseña']) && !empty($_POST['tipo_documento']) && !empty($_POST['documento']) && !empty($_POST['estado_civil']) && !empty($_POST['programa'])){
        //declaracion de variables, llamadas por el metodo post
        $nombre=$_POST["nombre"];
        $apellido=$_POST["apellido"];
        $pass=md5($_POST["contraseña"]);
        $documento=$_POST["tipo_documento"];
        $ndocumento=$_POST["documento"];
        $estado=$_POST["estado_civil"];
        $programa=$_POST["programa"];


    $mysql = new MySQL;//nuevo mysql
    $mysql->conectar();//funcion de conectar a la BD ubicada en mysql.php


    $consultadoc =$mysql->efectuarConsulta("SELECT numero_documento FROM biblioteca3.bibliotecario WHERE numero_documento = ".$ndocumento."");


    //declaracion de la variable donde se almacena la funcion de mysql.php donde se hara la respectiva consulta
    $consulta =$mysql->efectuarConsulta("SELECT numero_documento FROM biblioteca3.estudiantes WHERE numero_documento = ".$ndocumento."");

    //condicion donde se rectifica si el documento ingresado ya existe, si el valor es 1 es porque encontro un resultado en la BD y si es menor a 1 es porque no encontro nada.
    if(mysqli_num_rows($consultadoc)){
         echo"<script type=\"text/javascript\">alert('El documento a registrar ya se encuientra registrado como un bibliotecario'); window.location='../register_usuario.php';</script>";
    }else{
        if(mysqli_num_rows($consulta)>0){
            //mensaje de salida (alerta) junto a su redireccion de pagina
             echo"<script type=\"text/javascript\">alert('El documento ya se encuentra registrado'); window.location='../register_usuario.php';</script>";
        }else{
                //sin no encontro ningun resultado se procede con el insertar, almacenado en una variable junto a la funcion ubicada en mysql.php
                $sql=$mysql->efectuarConsulta("insert into biblioteca3.estudiantes(numero_documento,nombre,apellido,contrasena,tipo_documento_id_tipo,estado_civil_id_estado,programa_id_programa, estado) VALUES (".$ndocumento.",'".$nombre."','".$apellido."','".$pass."','".$documento."','".$estado."','".$programa."',1)");
                //mensaje de salida (alerta) junto a su redireccion de pagina
                echo"<script type=\"text/javascript\">alert('Se registro correctamente!'); window.location='../gestion_estudiantes.php';</script>";
        }
    }
}


?>





