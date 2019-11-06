<h2 align="center">REPORTE EN EXCEL</h2>

<?php

	header('Content-type:application/xls');//coversion al formato excel
	header('Content-Disposition: attachment; filename = archivo.xls');//se le asigna el nombre al archivo creado

	require_once '../../modelo/MySQL.php';//llamado del modelo donde se encuentra la conexion (clases)
	//declaracion de variables
	$conn = new MySQL();			
	$link = $conn->conectar();
$id = $_REQUEST['seleccionestudiante'];

										
//consulta para mostrar los prestamos del estudiante que pertenezcan a cualquier programa
$result = mysqli_query($link,"SELECT biblioteca3.prestamos.id_prestamo, biblioteca3.estudiantes.nombre, biblioteca3.programa.programa FROM prestamos 
	JOIN estudiantes on biblioteca3.estudiantes.id_estudiante = biblioteca3.prestamos.estudiantes_id_estudiante 
	JOIN programa on biblioteca3.programa.id_programa = biblioteca3.estudiantes.programa_id_programa where biblioteca3.estudiantes.id_estudiante = ".$id."");


?>

<!--creacion de la tabla-->
<table border="1">
	<tr>
		<th>id_prestamo</th>
		<th>estudiante</th>
		<th>programa</th>
	</tr>
	<?php
		//recorrido para mostrar los valores de la consulta que se almacenan en la variable correspondiente ($row)
		while ($row=mysqli_fetch_assoc($result)) {
	?>
		<tr align="center">
			<!--se muestran los valores almacenados en la variable declarada en la consulta-->
			<td><?php echo $row['id_prestamo'];?></td>
			<td><?php echo $row['nombre'];?></td>
			<td><?php echo $row['programa'];?></td>					
		</tr>

		<?php

	}		
?>	
</table>