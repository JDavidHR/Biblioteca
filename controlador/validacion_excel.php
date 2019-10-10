<h2 align="center">biblioteca3_reporte de datos</h2>	

<br>		

<?php

	header('Content-type:application/xls');
	header('Content-Disposition: attachment; filename = archivo.xls');

	require_once '../modelo/MySQL.php';

	$conn = new MySQL();			//se debe pasar el codigo a modelo vista controlador
	$link = $conn->conectar();		//arreglar la parte de tipo de documento de la tabla estudiantes
									//las 2 ultimas tablas de la bd no son requeridas 

	
	$result = mysqli_query($link,"SELECT * FROM estudiantes");
?>


<table border="1">
	<tr>
		<th>id_estudiante</th>
		<th>numero_documento</th>
		<th>nombre</th>
		<th>apellido</th>
		<th>tipo_documento_id_tipo</th>
		<th>estado_civil_id_estado</th>
		<th>programa_id_programa</th>
	</tr>
	<?php
		while ($row=mysqli_fetch_assoc($result)) {
	?>
		<tr align="center">
			<td><?php echo $row['id_estudiante']; ?></td>
			<td><?php echo $row['numero_documento']; ?></td>
			<td><?php echo $row['nombre']; ?></td>
			<td><?php echo $row['apellido']; ?></td>
			<td><?php echo $row['tipo_documento_id_tipo']; ?></td>
			<td><?php echo $row['estado_civil_id_estado']; ?></td>
			<td><?php echo $row['programa_id_programa']; ?></td>
		</tr>

		<?php

	}		
?>	
</table>

<br><br>

<?php

	header('Content-type:application/xls');
	header('Content-Disposition: attachment; filename = archivo.xls');

	require_once '../modelo/MySQL.php';

	$conn = new MySQL();
	$link = $conn->conectar();


	
	$result2 = mysqli_query($link,"SELECT * FROM bibliotecario");
?>


<table border="1">
	<tr>
		<th>id_bibliotecario</th>
		<th>nombre</th>
		<th>apellido</th>
		<th>numero_documento</th>
		<th>estado_civil_id_estado</th>
		<th>tipo_documento_id_tipo</th>
	</tr>
	<?php
		while ($row=mysqli_fetch_assoc($result2)) {
	?>
		<tr align="center">
			<td><?php echo $row['id_bibliotecario']; ?></td>
			<td><?php echo $row['nombre']; ?></td>
			<td><?php echo $row['apellido']; ?></td>
			<td><?php echo $row['numero_documento']; ?></td>
			<td><?php echo $row['estado_civil_id_estado']; ?></td>
			<td><?php echo $row['tipo_documento_id_tipo']; ?></td>
		</tr>

		<?php

	}		
?>	
</table>

<br><br>

<?php

	header('Content-type:application/xls');
	header('Content-Disposition: attachment; filename = archivo.xls');

	require_once '../modelo/MySQL.php';

	$conn = new MySQL();
	$link = $conn->conectar();


	
	$result3 = mysqli_query($link,"SELECT * FROM estado_civil");
?>


<table border="1">
	<tr>
		<th>id_estado</th>
		<th>estado</th>
	</tr>
	<?php
		while ($row=mysqli_fetch_assoc($result3)) {
	?>
		<tr align="center">
			<td><?php echo $row['id_estado']; ?></td>
			<td><?php echo $row['estado']; ?></td>
		</tr>

		<?php

	}		
?>	
</table>

<br><br>

<?php

	header('Content-type:application/xls');
	header('Content-Disposition: attachment; filename = archivo.xls');

	require_once '../modelo/MySQL.php';

	$conn = new MySQL();
	$link = $conn->conectar();


	
	$result4 = mysqli_query($link,"SELECT * FROM libros");
?>


<table border="1">
	<tr>
		<th>id_libro</th>
		<th>titulo_libro</th>
		<th>editorial</th>
		<th>autor</th>
		<th>fecha_publicacion</th>
	</tr>
	<?php
		while ($row=mysqli_fetch_assoc($result4)) {
	?>
		<tr align="center">
			<td><?php echo $row['id_libro']; ?></td>
			<td><?php echo $row['titulo_libro']; ?></td>
			<td><?php echo $row['editorial']; ?></td>
			<td><?php echo $row['autor']; ?></td>
			<td><?php echo $row['fecha_publicacion']; ?></td>
		</tr>

		<?php

	}		
?>	
</table>

<br><br>

<?php

	header('Content-type:application/xls');
	header('Content-Disposition: attachment; filename = archivo.xls');

	require_once '../modelo/MySQL.php';

	$conn = new MySQL();
	$link = $conn->conectar();


	
	$result5 = mysqli_query($link,"SELECT * FROM prestamos");
?>


<table border="1">
	<tr>
		<th>id_prestamo</th>
		<th>fecha_prestamo</th>
		<th>bibliotecario_id_bibliotecario</th>
		<th>estudiantes_id_estudiante</th>
		<th>libros_id_libro</th>
	</tr>
	<?php
		while ($row=mysqli_fetch_assoc($result5)) {
	?>
		<tr align="center">
			<td><?php echo $row['id_prestamo']; ?></td>
			<td><?php echo $row['fecha_prestamo']; ?></td>
			<td><?php echo $row['bibliotecario_id_bibliotecario']; ?></td>
			<td><?php echo $row['estudiantes_id_estudiante']; ?></td>
			<td><?php echo $row['libros_id_libro']; ?></td>
		</tr>

		<?php

	}		
?>	
</table>