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
$stmt = $conn->prepare("SELECT nombre_ac, direccion_ac, img_ac FROM almacenes_cadena");

$stmt->execute();

$stmt->bind_result($nombre_ac, $direccion_ac, $img_ac);

$gamers = array();

while ($stmt->fetch()) {
	$temp = array();
	$temp['nombre_ac'] = $nombre_ac;
	$temp['direccion_ac'] = $direccion_ac;
	$temp['img_ac'] = $img_ac;
	array_push($gamers, $temp);
}
echo json_encode($gamers);
?>