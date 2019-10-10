<?php
require_once '../modelo/MySQL.php';
//condicion donde se rectifica que los campos no esten vacios y que esten definidos
if(isset($_POST['registrarb']) && !empty($_POST['nombreb']) && !empty($_POST['apellidob']) && !empty($_POST['documentob']) && !empty($_POST['contraseñab']) && !empty($_POST['estado_civilb']) && !empty($_POST['tipo_documentob'])){

        $nombreb=$_POST["nombreb"];
        $apellidob=$_POST["apellidob"];
        $ndocumentob=$_POST["documentob"];
        $passb=md5($_POST["contraseñab"]);
        $estadob=$_POST["estado_civilb"];
        $documentob=$_POST["tipo_documentob"];


    $mysql = new MySQL;//nuevo mysql
    $mysql->conectar();


    $consulta =$mysql->efectuarConsulta("SELECT numero_documento FROM biblioteca3.bibliotecario WHERE numero_documento = ".$ndocumentob."");
    //echo "SELECT * FROM biblioteca3.bibliotecario WHERE biblioteca3.bibliotecario.numero_documento = ".$ndocumentob."";
    //$resultado = mysqli_query($mysql,$consulta);


    if(mysqli_num_rows($consulta)>0){
         echo"<script type=\"text/javascript\">alert('El documento ya se encuentra registrado'); window.location='../register_bibliotecario.php';</script>";
    }else{
            $sql=$mysql->efectuarConsulta("insert into biblioteca3.bibliotecario(nombre,apellido,numero_documento,contrasena,estado_civil_id_estado,tipo_documento_id_tipo) VALUES ('".$nombreb."','".$apellidob."',".$ndocumentob.",'".$passb."','".$estadob."','".$documentob."')");

            echo"<script type=\"text/javascript\">alert('Se registro correctamente!'); window.location='../login_bibliotecario.php';</script>";
            //echo"<script type=\"text/javascript\">alert('okay'); window.location='controlador/register_bibliotecario_controlador.php';</script>";
    }
}


?>