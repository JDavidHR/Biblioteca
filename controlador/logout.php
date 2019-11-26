<?php
//funcion php (sirve para destruir la sesion del usuario cuando le da en cerrar sesion)
	@session_start();//funcion de la sesion
	session_unset();//libera todas las variables de sesión actualmente registradas
	session_destroy();//funcion para destruir la sesion
	header("Location: ../index.php");//redireccion cuando se destruyala sesion
?>