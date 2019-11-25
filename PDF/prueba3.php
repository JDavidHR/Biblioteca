<?php

require('pdf_mc_table3.php');

 require_once '../modelo/MySQL.php';

$pdf = new PDF_MC_Table('L','mm','A4');
$mysql = new MySQL;//nuevo mysql

$mysql->conectar();//funcion de conectar a la BD ubicada en mysql.php


$datos = $mysql->efectuarConsulta("SELECT id11714256_biblioteca3.prestamos.fecha_prestamo, id11714256_biblioteca3.bibliotecario.nombre as nombre2, id11714256_biblioteca3.estudiantes.nombre, id11714256_biblioteca3.libros.titulo_libro FROM prestamos 
	join estudiantes on id11714256_biblioteca3.estudiantes.id_estudiante = id11714256_biblioteca3.prestamos.estudiantes_id_estudiante 
	join bibliotecario on id11714256_biblioteca3.bibliotecario.id_bibliotecario = id11714256_biblioteca3.prestamos.bibliotecario_id_bibliotecario 
	join libros on id11714256_biblioteca3.libros.id_libro = id11714256_biblioteca3.prestamos.libros_id_libro where id11714256_biblioteca3.prestamos.fecha_prestamo < DATE_FORMAT(NOW(), '%Y-%m-%d')");

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
		utf8_decode($item['nombre2']),
		utf8_decode($item['nombre']),
		utf8_decode($item['titulo_libro'])
	));
}

$pdf->AliasNbPages();
$pdf->Output();

?>