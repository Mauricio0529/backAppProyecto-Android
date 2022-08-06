<?php
include 'conexion.php';
//if($_SERVER['REQUEST_METHOD'] == 'POST'){
   //AQUÍ ESTÁ LA PRINCIPAL DIFERENCIA, CON ESTE IF ME DEJÓ DE SALIR ERRORES.
$cedula = $_POST['cedula'];
$renombre = $_POST['renombre'];
$reapellido = $_POST['reapellido'];
$reemail = $_POST['reemail']; 
$repass = $_POST['repass'];
$retelefono = $_POST['retelefono']; 

$consulta = "insert into repartidor values ('".$cedula."', '".$renombre."', '".$reapellido."', '".$reemail."', '".$repass."', '".$retelefono."')";
mysqli_query($conexion,$consulta) or die (mysqli_error()); 
mysqli_close($conexion);
//}
?>