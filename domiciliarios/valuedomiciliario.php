<?php
include 'conexion.php';
//$con = mysqli_connect("localhost", "root", "", "bd_domilapp");

$reemail=$_POST['reemail'];
$repass=$_POST['repass'];

//$usu_usuario="aroncal@gmail.com";
//$usu_password="12345678";

$statement = mysqli_prepare($conexion, "SELECT * FROM repartidor WHERE reemail=? AND repass=?");
mysqli_stmt_bind_param($statement, "ss", $reemail, $repass);
mysqli_stmt_execute($statement);

mysqli_stmt_store_result($statement);
mysqli_stmt_bind_result($statement, $cedula, $nombre, $apellido, $reemail, $repass, $retelefono);

$response = array();
$response["success"] = false;

while(mysqli_stmt_fetch($statement)){
    $response["success"] = true;
    $response["cedula"] = $cedula;
    $response["renombre"] = $nombre;
    $response["reapellido"] = $apellido;
    $response["reemail"] = $reemail;
    $response["repass"] = $repass;
    $response["retelefono"] = $retelefono;
}
    echo json_encode($response);
?>