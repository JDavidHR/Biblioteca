<?php
//condicion para ver si los campos estan vacios
if(isset($_POST['documento']) && !empty($_POST['documento']) && isset($_POST['password']) && !empty($_POST['password'])){

    

    require_once '../modelo/MySQL.php'; //se llama la pagina donde se encuentra la conexion para la base de datos
    //declaracion de variables
    $documento = $_POST['documento'];
    $pass = md5($_POST['password']);
    $mysql = new MySQL(); //se declara un nuevo array
    $mysql->conectar();
    
    //consulta donde hace la comparacion de lo que el usuario ingresa con lo almacenado en la base de datos
    //$usuarios = $mysql->efectuarConsulta("SELECT * FROM estudiantes WHERE numero_documento='".$documento."' AND Contrasena='".$pass."'");
    $usuarios = $mysql->efectuarConsulta("SELECT biblioteca3.estudiantes.numero_documento,biblioteca3.estudiantes.contrasena FROM biblioteca3.estudiantes WHERE biblioteca3.estudiantes.numero_documento='".$documento."' AND biblioteca3.estudiantes.contrasena='".$pass."'");
    
    $mysql->desconectar();
}


    
//condicion donde si la consulta encuentra el valor ingresado, es decir si no encuentra nada el valor sera 0 y si encuentra algo sera 1
 if (mysqli_num_rows($usuarios) > 0){
     
     require_once '../modelo/usuarios.php';//se llama la pagina donde se estan almacenando los usuarios ingresados
       $mysql->conectar();
        session_start();//inicio de sesion

        $usuario = new Usuario();//declaracion del nuevo array
        //este while hace lo mismo que el foreach, recorre los datos
 while ($resultado= mysqli_fetch_assoc($usuarios)){
        $documento= $resultado["numero_documento"];

        $contrasena=  $resultado["contrasena"];
    
             $usuario->setdocumento($documento); //llama el metodo del documento usuarios
             
             $usuario->setcontrasena($contrasena);//llama el metodo del documento usuarios
       }
       //declaracion de variables
        $_SESSION['usuario'] = $usuario;
        $_SESSION['acceso'] = true; //variable logica
         
        header("Location: ../prestamo_Usuario.php");//ubicacion si el usuario ingresado existe
       

        
    }
    else{
     header("Location: ../login_usuario.php"); //ubicacion si el usuario ingresado no existe

    }


?>