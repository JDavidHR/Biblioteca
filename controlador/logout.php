<?php
//funcion php (sirve para destruir la sesion del usuario cuando le da en cerrar sesion)
	@session_start();//funcion de la sesion
	session_destroy();//funcion para destruir la sesion
	header("Location: ../login.php");//redireccion cuando se destruyala sesion
?>