<?php
try {
    $conexion = new PDO("mysql:host=localhost;dbname=id17248609_bd_domilapp", "id17248609_root2", "Root2-web_services");
} catch (PDOException $message) {
    echo $message->getMessage();
}

$consulta = $conexion->prepare("TRUNCATE TABLE carritoCompraTemp");

$response["success"] = false;
if($consulta->execute()){
    $response["success"] = true;
    $response["mensaje"] = "Datos borrados";
} else {
    $response["success"] = false;
    $response["mensaje"] = "Los datos no fueron borrados";
}

echo json_encode($response);
?>