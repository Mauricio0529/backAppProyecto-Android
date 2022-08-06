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
$stmt = $conn->prepare("SELECT nombre_repartidor FROM pedidos;");

$stmt->execute();

$stmt->bind_result($renombre);

$gamers = array();

while ($stmt->fetch()) {
	$temp = array();
	$temp['nombre_repartidor'] = $renombre;
	array_push($gamers, $temp);
}
echo json_encode($gamers);
?>