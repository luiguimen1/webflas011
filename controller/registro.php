<?php

require "../class/Datos.php";
require "../class/Conectar.php";

header('Access-Control-Allow-Origin: *');
$json = file_get_contents("php://input");
$json = json_decode($json);

$bd = new Conectar();
$sql = "insert into persona (nombre,apellido,cc,telefono,email,tipo,fecnac) "
        . "values (?,?,?,?,?,?,?);";

$conn = $bd->getMysqli();
$smtp = $conn->prepare($sql);
$smtp->bind_param("sssssss", $json->nombre, $json->apellido, $json->numero,$json->tele, $json->email, $json->tipo, $json->fecNac);

$res[] = Array();
if ($smtp->execute()) {
    $res["success"] = "ok";
} else {
    $res["success"] = "no";
}

$smtp->close();
$conn->close();
echo json_encode($res);



