<?php
require_once '../modelo/MySQL.php';
//condicion donde se rectifica que los campos no esten vacios y que esten definidos
if(isset($_POST['registrarb']) && !empty($_POST['nombreb']) && !empty($_POST['apellidob']) && !empty($_POST['documentob']) && !empty($_POST['contraseñab']) && !empty($_POST['estado_civilb']) && !empty($_POST['tipo_documentob'])){
    //declaracion de variables llamadas por el metodo post
        $nombreb=$_POST["nombreb"];
        $apellidob=$_POST["apellidob"];
        $ndocumentob=$_POST["documentob"];
        $passb=md5($_POST["contraseñab"]);
        $estadob=$_POST["estado_civilb"];
        $documentob=$_POST["tipo_documentob"];


    $mysql = new MySQL;//nuevo mysql
    $mysql->conectar();//funcion llamada desde mysql.php

    //consulta almacenada en una variable junto a la funcion de de mysql.php
    $consulta =$mysql->efectuarConsulta("SELECT numero_documento FROM biblioteca3.bibliotecario WHERE numero_documento = ".$ndocumentob."");

    //condicion para ver si el documento a registrar existe, si el valor es mayor a 1 es porque encontro un resultado en la BD, y si es cero es porque no encontro nada
    if(mysqli_num_rows($consulta)>0){
        //mensaje de salida (alert) en caso de que el documento ya exista junto con su redireccion
         echo"<script type=\"text/javascript\">alert('El documento ya se encuentra registrado'); window.location='../register_bibliotecario.php';</script>";
    }else{
            //declaracion de variable que almacena la consulta de insercion a la BD junto a la respectiva funcion de mysql.php y su redireccion de pagina
            $sql=$mysql->efectuarConsulta("insert into biblioteca3.bibliotecario(nombre,apellido,numero_documento,contrasena,estado_civil_id_estado,tipo_documento_id_tipo,estado) VALUES ('".$nombreb."','".$apellidob."',".$ndocumentob.",'".$passb."','".$estadob."','".$documentob."',1)");
            //mensaje de salida (alert) en caso de que el documento no exista junto con su redireccion
            echo"<script type=\"text/javascript\">alert('Se registro correctamente!'); window.location='../gestion_Bibliotecarios.php';</script>";

    }
}


?>