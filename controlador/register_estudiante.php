<?php
require_once '../modelo/MySQL.php';
//condicion donde se rectifica que los campos no esten vacios y que esten definidos
if(isset($_POST['registrar']) && !empty($_POST['nombre']) && !empty($_POST['apellido']) && !empty($_POST['contraseña']) && !empty($_POST['tipo_documento']) && !empty($_POST['documento']) && !empty($_POST['estado_civil']) && !empty($_POST['programa'])){

        $nombre=$_POST["nombre"];
        $apellido=$_POST["apellido"];
        $pass=md5($_POST["contraseña"]);
        $documento=$_POST["tipo_documento"];
        $ndocumento=$_POST["documento"];
        $estado=$_POST["estado_civil"];
        $programa=$_POST["programa"];


    $mysql = new MySQL;//nuevo mysql
    $mysql->conectar();


    $consulta =$mysql->efectuarConsulta("SELECT numero_documento FROM biblioteca3.estudiantes WHERE numero_documento = ".$ndocumento."");
    //echo "SELECT * FROM biblioteca3.bibliotecario WHERE biblioteca3.bibliotecario.numero_documento = ".$ndocumentob."";
    //$resultado = mysqli_query($mysql,$consulta);


    if(mysqli_num_rows($consulta)>0){
         echo"<script type=\"text/javascript\">alert('El documento ya se encuentra registrado'); window.location='../register_estudiante.php';</script>";
    }else{
            $sql=$mysql->efectuarConsulta("insert into biblioteca3.estudiantes(numero_documento,nombre,apellido,contrasena,tipo_documento_id_tipo,estado_civil_id_estado,programa_id_programa) VALUES (".$ndocumento.",'".$nombre."','".$apellido."','".$pass."','".$documento."','".$estado."','".$programa."')");

            echo"<script type=\"text/javascript\">alert('Se registro correctamente!'); window.location='../login_usuario.php';</script>";
            //echo"<script type=\"text/javascript\">alert('okay'); window.location='controlador/register_bibliotecario_controlador.php';</script>";
    }
}


?>





