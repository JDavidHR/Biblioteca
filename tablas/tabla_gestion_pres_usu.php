
<?php 

session_start();
if(!isset($_SESSION['rol'])){//Valida si existe la variable de sesion rol, esta variable es la que define si es un docente o un estudiante
    header('location: ../index.php');//Se redirecciona a docente.php
    }else{
        if($_SESSION['rol']!=1){//Validacion para salber si el rol es estudiante
    //        echo $_SESSION['rol'];
        header('location: ../index.php');//Se redirecciona a docente.php
        }
    }

require_once "../modelo/MySQL.php";
$obj= new MySQL();
$conexion=$obj->conectar();

$id_estudiante = $_SESSION['id_est'];

$sql="SELECT id11714256_biblioteca3.prestamos.id_prestamo,id11714256_biblioteca3.prestamos.fecha_prestamo,id11714256_biblioteca3.estudiantes.nombre as nombreestudiante ,id11714256_biblioteca3.libros.titulo_libro, id11714256_biblioteca3.bibliotecario.nombre as nombrebibliotecario
from prestamos 
join estudiantes 
on id11714256_biblioteca3.estudiantes.id_estudiante = id11714256_biblioteca3.prestamos.estudiantes_id_estudiante 
join libros 
on id11714256_biblioteca3.libros.id_libro = id11714256_biblioteca3.prestamos.libros_id_libro  
join bibliotecario 
on id11714256_biblioteca3.bibliotecario.id_bibliotecario = id11714256_biblioteca3.prestamos.bibliotecario_id_bibliotecario
where id11714256_biblioteca3.estudiantes.id_estudiante = ".$id_estudiante."";


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
					<td><?php echo $libro=$mostrar['titulo_libro'] ?></td>
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