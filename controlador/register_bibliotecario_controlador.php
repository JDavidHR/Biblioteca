<?php
//condicion donde se rectifica que los campos no esten vacios y que esten definidos
if(isset($_POST['registrarb']) && !empty($_POST['nombreb']) && !empty($_POST['apellidob']) && !empty($_POST['documentob']) && !empty($_POST['contraseñab']) && !empty($_POST['estado_civilb']) && !empty($_POST['tipo_documentob'])){

        require_once '../modelo/MySQL.php';//se llama la pagina mysql.php para hacer la respectiva conexion con la BD
        //declaracion de las variables donde se almacenan los datos de los respectivos campos llenados del formulario
        $nombreb=$_POST["nombreb"];
        $apellidob=$_POST["apellidob"];
        $ndocumentob=$_POST["documentob"];
        $passb=md5($_POST["contraseñab"]);
        $estadob=$_POST["estado_civilb"];
        $documentob=$_POST["tipo_documentob"];
        


        $mysql = new MySQL;//nuevo mysql
        $mysql->conectar();//funcion almacendad en mysql.php
        //consulta de la insercion de datos en la base de datos, donde hace las respectivas consultas
        $sql=$mysql->efectuarConsulta("insert into biblioteca3.bibliotecario(nombre,apellido,numero_documento,contrasena,estado_civil_id_estado,tipo_documento_id_tipo) VALUES ('".$nombreb."','".$apellidob."',".$ndocumentob.",'".$passb."','".$estadob."','".$documentob."')");

       // $sql=$mysql->efectuarconsulta("insert into biblioteca3.estudiantes values ('','ndocuemnto','$nombre','$apellido','pass','documento','estado','programa')");

        //$cs=mysql_query($sql,$cn);
        //condiciones de redirecionamiento a las respectivas paginas
        if($sql){
            echo "<script>alert('Se registro correctamente');</script>";
            header("location: ../login_bibliotecario.php");
        }else{
            echo "<script>alert('Se produjo un error');</script>";
            header("location: ../register_bibliotecario.php");
        }
        
         
}
?>