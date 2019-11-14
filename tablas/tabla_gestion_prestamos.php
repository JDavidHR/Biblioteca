
<?php 

require_once "../modelo/MySQL.php";
$obj= new MySQL();
$conexion=$obj->conectar();

$sql="SELECT biblioteca3.prestamos.id_prestamo,biblioteca3.prestamos.fecha_prestamo,biblioteca3.estudiantes.nombre as nombreestudiante ,biblioteca3.libros.titulo_libro, biblioteca3.bibliotecario.nombre as nombrebibliotecario
from prestamos 
join estudiantes 
on biblioteca3.estudiantes.id_estudiante = biblioteca3.prestamos.estudiantes_id_estudiante 
join libros 
on biblioteca3.libros.id_libro = biblioteca3.prestamos.libros_id_libro  
join bibliotecario 
on biblioteca3.bibliotecario.id_bibliotecario = biblioteca3.prestamos.bibliotecario_id_bibliotecario where biblioteca3.prestamos.estado = 1";
$result=mysqli_query($conexion,$sql);


?>


<div>
	<table class="table table-hover table-condensed table-bordered  m-b-20" id="iddatatable">
		<thead style="background-color: #dc3545;color: white; font-weight: bold;">
			<tr>
				<td>ID</td>
				<td>Fecha</td>
				<td>Estudiante</td>
				<td>Libro</td>
				<td>Bibliotecario</td>
			</tr>
		</thead>
		<tfoot style="background-color: #ccc;color: white; font-weight: bold;">
			<tr>
				<td>ID</td>
				<td>Fecha</td>
				<td>Estudiante</td>
				<td>Libro</td>
				<td>Bibliotecario</td>
			</tr>
		</tfoot>
		<tbody >
			<?php 
			while ($mostrar=mysqli_fetch_assoc($result)) {
				?>
				<tr >
					<td><?php echo utf8_decode($id=$mostrar['id_prestamo'])  ?></td>
					<td><?php echo utf8_encode($fecha=$mostrar['fecha_prestamo']) ?></td>
					<td><?php echo utf8_encode($estudiante=$mostrar['nombreestudiante']) ?></td>
					<td><?php echo utf8_encode($libro=$mostrar['titulo_libro']) ?></td>
					<td><?php echo utf8_encode($bibliotecario=$mostrar['nombrebibliotecario']) ?></td>
				</tr>
				<?php 
			}
			?>
		</tbody>
	</table>
</div>

<script type="text/javascript">
	$(document).ready(function() {
		$('#iddatatable').DataTable();
	} );
</script>