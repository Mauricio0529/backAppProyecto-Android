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

$stmt = $conn->prepare("SELECT nombre_cf, direccion_cf, img_cf FROM canasta_familiar");

$stmt->execute();

$stmt->bind_result($nombre_cf, $direccion_cf, $img_cf);

$gamers = array();

while ($stmt->fetch()) {
	$temp = array();
	$temp['nombre_cf'] = $nombre_cf;
	$temp['direccion_cf'] = $direccion_cf;
	$temp['img_cf'] = $img_cf;
	array_push($gamers, $temp);
}
echo json_encode($gamers);
?>