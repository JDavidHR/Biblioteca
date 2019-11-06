<h2 align="center">REPORTE EN EXCEL</h2>

<?php

	header('Content-type:application/xls');//coversion al formato excel
	header('Content-Disposition: attachment; filename = archivo.xls');//se le asigna el nombre al archivo creado

	require_once '../../modelo/MySQL.php';//llamado del modelo donde se encuentra la conexion (clases)
	//declaracion de variables
	$conn = new MySQL();			
	$link = $conn->conectar();		
									
	$id = $_REQUEST['seleccionestudiante'];//la variable id almacena lo que se selecciona en el select de generar_excel.php

//consulta para mostrar los prestamos de un usuarios cualquiera
$result = mysqli_query($link,"SELECT biblioteca3.prestamos.fecha_prestamo, biblioteca3.prestamos.id_prestamo, biblioteca3.bibliotecario.nombre as nombre2, biblioteca3.libros.titulo_libro FROM prestamos 
	join estudiantes on biblioteca3.estudiantes.id_estudiante = biblioteca3.prestamos.estudiantes_id_estudiante 
	join bibliotecario on biblioteca3.bibliotecario.id_bibliotecario = biblioteca3.prestamos.bibliotecario_id_bibliotecario 
	join libros on biblioteca3.libros.id_libro = biblioteca3.prestamos.libros_id_libro where biblioteca3.estudiantes.id_estudiante = ".$id."");
?>

<!--creacion de la tabla-->
<table border="1">
	<tr>
		<th>fecha_prestamo</th>
		<th>id_prestamos</th>
		<th>bibliotecario</th>
		<th>libro</th>
	</tr>
	<?php
		//recorrido para mostrar los valores de la consulta que se almacenan en la variable correspondiente ($row)
		while ($row=mysqli_fetch_assoc($result)) {
	?>
		<tr align="center">
			<!--se muestran los valores almacenados en la variable declarada en la consulta-->
			<td><?php echo $row['fecha_prestamo'];?></td>
			<td><?php echo $row['id_prestamo'];?></td>
			<td><?php echo $row['nombre2'];?></td>
			<td><?php echo $row['titulo_libro'];?></td>					
		</tr>

		<?php

	}		
?>	
</table>