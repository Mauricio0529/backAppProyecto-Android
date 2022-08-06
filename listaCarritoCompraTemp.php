<?php
$conn = new PDO("mysql:host=localhost;dbname=id17248609_bd_domilapp", "id17248609_root2", "Root2-web_services");

if(mysqli_connect_errno()){
echo "Fallo al conectar con MySQL: " . mysqli_connect_error();
die();
}

//include 'conexion.php';
$gamers = array();
$temp = array();

$stmt = $conn->prepare("SELECT nombreProducto, precio_unidad, img FROM carritoCompraTemp;");

$stmt->execute();

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
	$nombreProducto = $row['nombreProducto'];
	$precio_unidad = $row['precio_unidad'];
    $img = $row['img'];
	$temp['nombreProducto'] = $nombreProducto;
	$temp['precio_unidad'] = $precio_unidad;
    $temp['img'] = $img;
	array_push($gamers, $temp);
}
echo json_encode($gamers);
?>