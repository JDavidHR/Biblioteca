
<?php 

require_once "../modelo/MySQL.php";
$obj= new MySQL();
$conexion=$obj->conectar();

$sql="SELECT id11714256_biblioteca3.programa.id_programa,id11714256_biblioteca3.programa.programa
from programa where estado = 1";
$result=mysqli_query($conexion,$sql);


?>


<div>
	<table class="table table-hover table-condensed table-bordered  m-b-20" id="iddatatable">
		<thead style="background-color: #dc3545;color: white; font-weight: bold;">
			<tr>
				<td>id_programa</td>
				<td>programa</td>
			</tr>
		</thead>
		<tfoot style="background-color: #ccc;color: white; font-weight: bold;">
			<tr>
				<td>id_programa</td>
				<td>programa</td>
			</tr>
		</tfoot>
		<tbody >
			<?php 
			while ($mostrar=mysqli_fetch_assoc($result)) {
				?>
				<tr >
					<td><?php echo $id_programa=$mostrar['id_programa']  ?></td>
					<td><?php echo $programa=$mostrar['programa'] ?></td>
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