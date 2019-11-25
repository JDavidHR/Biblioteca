
<?php 

require_once "../modelo/MySQL.php";
$obj= new MySQL();
$conexion=$obj->conectar();

$sql="SELECT id11714256_biblioteca3.bibliotecario.numero_documento,id11714256_biblioteca3.bibliotecario.nombre,id11714256_biblioteca3.bibliotecario.apellido
from bibliotecario where id11714256_biblioteca3.bibliotecario.estado = 1";
$result=mysqli_query($conexion,$sql);


?>


<div>
	<table class="table table-hover table-condensed table-bordered  m-b-20" id="iddatatable">
		<thead style="background-color: #dc3545;color: white; font-weight: bold;">
			<tr>
				<td>Numero Documento</td>
				<td>Nombre</td>
				<td>Apellido</td>
			</tr>
		</thead>
		<tfoot style="background-color: #ccc;color: white; font-weight: bold;">
			<tr>
				<td>Numero Documento</td>
				<td>Nombre</td>
				<td>Apellido</td>
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