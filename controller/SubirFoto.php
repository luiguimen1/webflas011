<?php
require '../class/Datos.php';
require '../class/Conectar.php';

header('Access-Control-Allow-Origin: *');
$json = file_get_contents("php://input");
$post = json_decode(json_encode($_POST));
$post->nombre = md5(time()) . ".jpg";

$bd = new Conectar();
$sql = "update persona set foto=? where id =?;";

$conn = $bd->getMysqli();
$smtp = $conn->prepare($sql);
$smtp->bind_param("si", $post->nombre, $post->id);

$res[] = Array();
if ($smtp->execute()) {
    move_uploaded_file($_FILES["ionicfile"]["tmp_name"], "../img/" . $post->nombre);
    $res["success"] = "ok";
} else {
    $res["success"] = "no";
}

$smtp->close();
$conn->close();
echo json_encode($res);
