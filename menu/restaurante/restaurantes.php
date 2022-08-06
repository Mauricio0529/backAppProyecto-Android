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

$stmt = $conn->prepare("SELECT nombre_r, direccion_r, img_r FROM restaurantes");

$stmt->execute();

$stmt->bind_result($nombre_r, $direccion_r, $img_r);

$gamers = array();

while ($stmt->fetch()) {
	$temp = array();
	$temp['nombre_r'] = $nombre_r;
	$temp['direccion_r'] = $direccion_r;
	$temp['img_r'] = $img_r;
	array_push($gamers, $temp);
}
echo json_encode($gamers);
?>