<?php

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'bd_domilapp');

$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if(mysqli_connect_errno()){
echo "Fallo al conectar con MySQL: " . mysqli_connect_error();
die();
}

//include 'conexion.php';
$stmt = $conn->prepare("SELECT nombre_f, direccion_f, img_f FROM farmacias");

$stmt->execute();

$stmt->bind_result($nombre_f, $direccion_f, $img_f);

$gamers = array();

while ($stmt->fetch()) {
	$temp = array();
	$temp['nombre_f'] = $nombre_f;
	$temp['direccion_f'] = $direccion_f;
	$temp['img_f'] = $img_f;
	array_push($gamers, $temp);
}
echo json_encode($gamers);
?>