<?php
session_start();
if(isset($_SESSION['rol'])){//Valida si existe la variable de sesion rol, esta variable es la que define si es un estudiante o un administrador
    if($_SESSION['rol']==2){//Validacion para saber si el rol es administrador
        header('location: ../index_Bibliotecario.php');
    //Se redirecciona a la pagina principal
    }else{
        if($_SESSION['rol']==1){//Validacion para salber si el rol es estudiante
    //        echo $_SESSION['rol'];
        header('location: ../prestamo_Usuario.php');//Se redirecciona a la pagina principal
        }
    }
}
//condicion para ver si los campos estan vacios
if(isset($_POST['documento']) && !empty($_POST['documento']) && isset($_POST['password']) && !empty($_POST['password'])){

    require_once '../modelo/MySQL.php'; //se llama la pagina donde se encuentra la conexion para la base de datos
    //declaracion de variables con el metodo post
    $documento = $_POST['documento'];
    $pass = md5($_POST['password']);//md5 es para encriptar la contraseña
    $mysql = new MySQL(); //se declara un nuevo array
    $mysql->conectar();//funcion llamada desde mysql.php
    
    //consulta donde hace la comparacion de lo que el usuario ingresa con lo almacenado en la base de datos
    $usuarios = $mysql->efectuarConsulta("SELECT id11714256_biblioteca3.bibliotecario.numero_documento,id11714256_biblioteca3.bibliotecario.contrasena FROM id11714256_biblioteca3.bibliotecario WHERE id11714256_biblioteca3.bibliotecario.numero_documento='".$documento."' AND id11714256_biblioteca3.bibliotecario.contrasena='".$pass."'");
    
    $mysql->desconectar();//funcion llamada desde mysql.php
}


if($usuarios){ 
//condicion donde si la consulta encuentra el valor ingresado, es decir si no encuentra nada el valor sera 0 y si encuentra algo sera 1
 if (mysqli_num_rows($usuarios) > 0){
     
     require_once '../modelo/usuarios.php';//se llama la pagina donde se estan almacenando los usuarios ingresados
       $mysql->conectar();//funcion llamada desde mysql.php
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
        $_SESSION['rol']=2;

        header("Location: ../index_Bibliotecario.php");//ubicacion si el usuario ingresado existe
       

        
    }
    }else{
     header("Location: ../login_bibliotecario.php"); //ubicacion si el usuario ingresado no existe

    }


?>