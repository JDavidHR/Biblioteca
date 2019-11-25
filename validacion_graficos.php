<?php
header('Content-Type: application/json');

//llamamos la clase
require_once 'modelo/MySQL.php';
//pasamos las funciones de la clase a una nueva variable
$mysql = new MySQL;
 //realizamos la conexion a la bd
$mysql->conectar();

//$consulta = $mysql ->efectuarConsulta("SELECT count(id11714256_biblioteca3.estudiantes.programa_id) as cantidad, id11714256_biblioteca3.programa.programa_nombre FROM id11714256_biblioteca3.estudiantes inner join id11714256_biblioteca3.programa on id11714256_biblioteca3.programa.programa_id =id11714256_biblioteca3.estudiantes.programa_id group by id11714256_biblioteca3.programa.programa_nombre");

$consulta = $mysql ->efectuarConsulta("SELECT count(id11714256_biblioteca3.estudiantes.estado_civil_id_estado) as cantidad, id11714256_biblioteca3.estado_civil.estado FROM id11714256_biblioteca3.estudiantes inner join id11714256_biblioteca3.estado_civil on id11714256_biblioteca3.estado_civil.id_estado = id11714256_biblioteca3.estudiantes.estado_civil_id_estado group by id11714256_biblioteca3.estado_civil.estado");


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