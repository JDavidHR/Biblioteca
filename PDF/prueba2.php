<?php

require('pdf_mc_table2.php');

 require_once '../modelo/MySQL.php';

$pdf = new PDF_MC_Table('L','mm','A4');
$mysql = new MySQL;//nuevo mysql

$mysql->conectar();//funcion de conectar a la BD ubicada en mysql.php

$id = $_POST['seleccionestudiante'];

$datos = $mysql->efectuarConsulta("SELECT biblioteca3.prestamos.fecha_prestamo, biblioteca3.prestamos.id_prestamo, biblioteca3.bibliotecario.nombre as nombre2, biblioteca3.libros.titulo_libro FROM prestamos 
	join estudiantes on biblioteca3.estudiantes.id_estudiante = biblioteca3.prestamos.estudiantes_id_estudiante 
	join bibliotecario on biblioteca3.bibliotecario.id_bibliotecario = biblioteca3.prestamos.bibliotecario_id_bibliotecario 
	join libros on biblioteca3.libros.id_libro = biblioteca3.prestamos.libros_id_libro where biblioteca3.estudiantes.id_estudiante = ".$id."");

$mysql->desconectar();

$titulo = 'REPORTE EN PDF';
$pdf->SetTitle($titulo);
$pdf->AddPage();
$pdf->SetFont('Arial','',14);

$pdf->SetWidths(Array(50,50,50,80));
$pdf->SetLineHeight(10); 
$pdf->SetAligns(Array('C','C','C','C'));


foreach ($datos as $item) 
{
	$pdf->Row(Array(
		utf8_decode($item['fecha_prestamo']),
		utf8_decode($item['id_prestamo']),
		utf8_decode($item['nombre2']),
		utf8_decode($item['titulo_libro'])
	));
}

$pdf->AliasNbPages();
$pdf->Output();

?>
