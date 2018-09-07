<?php

require "../class/Datos.php";
require "../class/Conectar.php";
header('Access-Control-Allow-Origin: *');
$json = file_get_contents("php://input");
$json = json_decode($json);
$bd = new Conectar();
$conn = $bd->getMysqli();
$sql = "";
if ($json->item == 1) {
    $sql = "select * from persona;";
    $smtp = $conn->prepare($sql);
} else {
    $sql = "select * from persona where " . $json->item . " like ?;";
    $smtp = $conn->prepare($sql);
    $json->criterio = "%" . $json->criterio . "%";
    $smtp->bind_param("s", $json->criterio);
}
$smtp->execute();
$data = $smtp->get_result();
$res = array();
$res["success"] = "no";
$res["row"] = $data->num_rows;
while ($fila = $data->fetch_assoc()) {
    $res["result"][] = $fila;
    $res["success"] = "ok";
}
$smtp->close();
$conn->close();
echo json_encode($res);
