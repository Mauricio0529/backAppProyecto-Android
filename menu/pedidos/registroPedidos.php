<?php
include 'conexion.php';
//if($_SERVER['REQUEST_METHOD'] == 'POST'){
   //AQUÍ ESTÁ LA PRINCIPAL DIFERENCIA, CON ESTE IF ME DEJÓ DE SALIR ERRORES.
$nombre_usuario = $_POST['nombre_usuario'];
$correo_usuario = $_POST['correo_usuario'];

$nombre_repartidor = $_POST['nombre_repartidor'];
$telefono_repartidor = $_POST['telefono_repartidor'];
$productos = $_POST['productos'];
$precio_unidad = $_POST['precio_unidad'];
$cantidad = $_POST['cantidad'];

$total = $_POST['total'];
$direccion = $_POST['direccion'];
$img_producto = $_POST['img_producto'];

$consulta = "insert into pedidos values ('".$nombre_usuario."', '".$correo_usuario."', '".$nombre_repartidor."', 
                                        '".$telefono_repartidor."', '".$productos."', '".$precio_unidad."',
                                        '".$cantidad."', '".$total."', '".$direccion."', '".$img_producto."')";
mysqli_query($conexion,$consulta) or die (mysqli_error()); 
mysqli_close($conexion);
//}
?>