<?php

require('pdf_mc_table4.php');

 require_once '../modelo/MySQL.php';

$pdf = new PDF_MC_Table('L','mm','A4');
$mysql = new MySQL;//nuevo mysql

$mysql->conectar();//funcion de conectar a la BD ubicada en mysql.php

$id = $_POST['seleccionestudiante'];

$datos = $mysql->efectuarConsulta("SELECT biblioteca3.prestamos.id_prestamo, biblioteca3.estudiantes.nombre, biblioteca3.programa.programa FROM prestamos JOIN estudiantes on biblioteca3.estudiantes.id_estudiante = biblioteca3.prestamos.estudiantes_id_estudiante JOIN programa on biblioteca3.programa.id_programa = biblioteca3.estudiantes.programa_id_programa where biblioteca3.estudiantes.id_estudiante = ".$id."");

$mysql->desconectar();

$titulo = 'REPORTE EN PDF';
$pdf->SetTitle($titulo);
$pdf->AddPage();
$pdf->SetFont('Arial','',14);

$pdf->SetWidths(Array(50,50,80));
$pdf->SetLineHeight(10); 
$pdf->SetAligns(Array('C','C','C','C'));


foreach ($datos as $item) 
{
	$pdf->Row(Array(
		utf8_decode($item['id_prestamo']),
		utf8_decode($item['nombre']),
		utf8_decode($item['programa'])
	));
}

$pdf->AliasNbPages();
$pdf->Output();

?>