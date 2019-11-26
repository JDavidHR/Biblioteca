
<?php 

require_once "../modelo/MySQL.php";
$obj= new MySQL();
$conexion=$obj->conectar();

$sql="SELECT * FROM libros where id11714256_biblioteca3.libros.estado = 1";
$result=mysqli_query($conexion,$sql);


?>


<div>
	<table class="table table-hover table-condensed table-bordered  m-b-20" id="iddatatable">
		<thead style="background-color: #dc3545;color: white; font-weight: bold;">
			<tr>
				<td>ID</td>
				<td>Titulo</td>
				<td>Editorial</td>
				<td>Autor</td>
				<td>Fecha</td>
			</tr>
		</thead>
		<tfoot style="background-color: #ccc;color: white; font-weight: bold;">
			<tr>
				<td>ID</td>
				<td>Titulo</td>
				<td>Editorial</td>
				<td>Autor</td>
				<td>Fecha</td>
			</tr>
		</tfoot>
		<tbody >
			<?php 
			while ($mostrar=mysqli_fetch_assoc($result)) {
				?>
				<tr >
					<td><?php echo $id=$mostrar['id_libro']  ?></td>
					<td><?php echo $titulo=$mostrar['titulo_libro'] ?></td>
					<td><?php echo $editorial=$mostrar['editorial'] ?></td>
					<td><?php echo $autor=$mostrar['autor'] ?></td>
					<td><?php echo $fecha=$mostrar['fecha_publicacion'] ?></td>
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