<?php
include 'conexion.php';
//if($_SERVER['REQUEST_METHOD'] == 'POST'){
   //AQUÍ ESTÁ LA PRINCIPAL DIFERENCIA, CON ESTE IF ME DEJÓ DE SALIR ERRORES.
$usu_nombre = $_POST['usu_nombre'];
$usu_apellido = $_POST['usu_apellido'];
$usu_email = $_POST['usu_email'];
$usu_password = $_POST['usu_password'];

$consulta = "insert into usuarios values ('".$usu_nombre."', '".$usu_apellido."', '".$usu_email."', '".$usu_password."')";
mysqli_query($conexion,$consulta) or die (mysqli_error()); 
mysqli_close($conexion);
//}
?>