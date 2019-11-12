<?php
header('Content-Type: application/json');

//llamamos la clase
require_once 'modelo/MySQL.php';
//pasamos las funciones de la clase a una nueva variable
$mysql = new MySQL;
 //realizamos la conexion a la bd
$mysql->conectar();

//$consulta = $mysql ->efectuarConsulta("SELECT count(biblioteca3.estudiantes.programa_id) as cantidad, biblioteca3.programa.programa_nombre FROM biblioteca3.estudiantes inner join biblioteca3.programa on biblioteca3.programa.programa_id =biblioteca3.estudiantes.programa_id group by biblioteca3.programa.programa_nombre");

$consulta = $mysql ->efectuarConsulta("SELECT count(biblioteca3.estudiantes.estado_civil_id_estado) as cantidad, biblioteca3.estado_civil.estado FROM biblioteca3.estudiantes inner join biblioteca3.estado_civil on biblioteca3.estado_civil.id_estado = biblioteca3.estudiantes.estado_civil_id_estado group by biblioteca3.estado_civil.estado");


$data = array();
foreach ($consulta as $row) {
        $data[] = $row;
}

/*$data1 = array();
foreach ($consulta1 as $row) {
        $data1[] = $row;
}*/

$mysql->desconectar();

echo json_encode($data);
?>