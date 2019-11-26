
<?php 

require_once "../modelo/MySQL.php";
$obj= new MySQL();
$conexion=$obj->conectar();

$sql="SELECT id11714256_biblioteca3.estudiantes.numero_documento,id11714256_biblioteca3.estudiantes.nombre,id11714256_biblioteca3.estudiantes.apellido,id11714256_biblioteca3.programa.programa,id11714256_biblioteca3.tipo_documento.tipo,id11714256_biblioteca3.estado_civil.estado
from estudiantes

join programa 
on id11714256_biblioteca3.programa.id_programa = id11714256_biblioteca3.estudiantes.programa_id_programa
join tipo_documento
on id11714256_biblioteca3.tipo_documento.id_tipo = id11714256_biblioteca3.estudiantes.tipo_documento_id_tipo
join estado_civil
on id11714256_biblioteca3.estado_civil.id_estado = id11714256_biblioteca3.estudiantes.estado_civil_id_estado

where id11714256_biblioteca3.estudiantes.estado = 1";
$result=mysqli_query($conexion,$sql);


?>

<meta charset="UTF-8">
<div>
	<table class="table table-hover table-condensed table-bordered  m-b-20" id="iddatatable">
		<thead style="background-color: #dc3545;color: white; font-weight: bold;">
			<tr>
				<td>Numero Documento</td>
				<td>Nombre</td>
				<td>Apellido</td>
				<td>Programa Cursa</td>
				<td>Tipo Documento</td>
				<td>Estado Civil</td>
			</tr>
		</thead>
		<tfoot style="background-color: #ccc;color: white; font-weight: bold;">
			<tr>
				<td>Numero Documento</td>
				<td>Nombre</td>
				<td>Apellido</td>
				<td>Programa Cursa</td>
				<td>Tipo Documento</td>
				<td>Estado Civil</td>
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
					<td><?php echo $programa=$mostrar['programa'] ?></td>
					<td><?php echo $tipo_documento=$mostrar['tipo'] ?></td>
					<td><?php echo $estado_civil=$mostrar['estado'] ?></td>
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