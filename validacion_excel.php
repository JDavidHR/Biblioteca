<?php

	header('Content-type:application/xls');
	header('Content-Disposition: attachment; filename = archivo.xls');

	require_once 'modelo/MySQL.php';

	$conn = new MySQL();
	$link = $conn->conectar();


	
	$result = mysqli_query($link,"SELECT * FROM estudiantes");
?>


<table>
	<tr>
		<th>numero_documento</th>
		<th>nombre</th>
		<th>apellido</th>
		<th>contrasena</th>
		<th>estado_civil_id_estado</th>
		<th>programa_id_programa</th>
	</tr>
	<?php
		while ($row=mysqli_fetch_assoc($result)) {
	?>
		<tr>
			<td><?php echo $row['numero_documento']; ?></td>
			<td><?php echo $row['nombre']; ?></td>
			<td><?php echo $row['apellido']; ?></td>
			<td><?php echo $row['contrasena']; ?></td>
			<td><?php echo $row['estado_civil_id_estado']; ?></td>
			<td><?php echo $row['programa_id_programa']; ?></td>
		</tr>

		<?php

	}		
?>	
</table>