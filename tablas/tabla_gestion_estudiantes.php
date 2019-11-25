
<?php 

require_once "../modelo/MySQL.php";
$obj= new MySQL();
$conexion=$obj->conectar();

$sql="SELECT id11714256_biblioteca3.estudiantes.numero_documento,id11714256_biblioteca3.estudiantes.nombre,id11714256_biblioteca3.estudiantes.apellido,id11714256_biblioteca3.programa.programa,id11714256_biblioteca3.libros.titulo_libro
from prestamos
join estudiantes
on id11714256_biblioteca3.estudiantes.id_estudiante = id11714256_biblioteca3.prestamos.estudiantes_id_estudiante
join programa 
on id11714256_biblioteca3.programa.id_programa = id11714256_biblioteca3.estudiantes.programa_id_programa
join libros
on id11714256_biblioteca3.libros.id_libro = id11714256_biblioteca3.prestamos.libros_id_libro where id11714256_biblioteca3.estudiantes.estado = 1";
$result=mysqli_query($conexion,$sql);


?>


<div>
	<table class="table table-hover table-condensed table-bordered  m-b-20" id="iddatatable">
		<thead style="background-color: #dc3545;color: white; font-weight: bold;">
			<tr>
				<td>Numero Documento</td>
				<td>Nombre</td>
				<td>Apellido</td>
				<td>Programa Cursa</td>
				<td>Libro Prestado</td>
			</tr>
		</thead>
		<tfoot style="background-color: #ccc;color: white; font-weight: bold;">
			<tr>
				<td>Numero Documento</td>
				<td>Nombre</td>
				<td>Apellido</td>
				<td>Programa Cursa</td>
				<td>Libro Prestado</td>
			</tr>
		</tfoot>
		<tbody >
			<?php 
			while ($mostrar=mysqli_fetch_assoc($result)) {
				?>
				<tr >
					<td><?php echo utf8_decode($documento=$mostrar['numero_documento'])  ?></td>
					<td><?php echo utf8_encode($nombre=$mostrar['nombre']) ?></td>
					<td><?php echo utf8_encode($apellido=$mostrar['apellido']) ?></td>
					<td><?php echo utf8_encode($programa=$mostrar['programa']) ?></td>
					<td><?php echo utf8_encode($apellido=$mostrar['titulo_libro']) ?></td>
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