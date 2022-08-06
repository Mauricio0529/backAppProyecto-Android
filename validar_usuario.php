<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){
//include 'conexion.php';
//include 'formulario.php';
try{
    $conexion = new PDO("mysql:host=localhost;dbname=id17248609_bd_domilapp", "id17248609_root2", "Root2-web_services");
} catch(PDOException $message){
    echo $message->getMessage();
}

$email = $_POST['email'];
$pass = $_POST['pass'];
$contador = 0;
// $statement = mysqli_prepare($conexion, "SELECT * FROM ejemplo WHERE email=?");

$consulta = $conexion->prepare("SELECT * FROM usuario WHERE email = :email");
$consulta->execute(array(':email' => $email));
//$numeroDeElCorreo = $consulta->fetchColumn();
$response = array();
$response["success"] = false;

    while($consultaUsuario=$consulta->fetch(PDO::FETCH_ASSOC)){
        if(password_verify($pass, $consultaUsuario['pass'])){
            $response["success"] = true;
            $nombre = $consultaUsuario['nombre'];
            $response['nombre'] = $nombre;
          //  $contador++;
        }
    }

 /*   if($response == true){
        $login['status'] = "Ok";
        $login['msg'] = "Bienvenido";
       // $login["nombre"] = $nombre;
    } else {
        $login['status'] = "Error";
        $login['msg'] = "No esta registrado este usuario";
    }
*/

} else {
    $login['status'] = "400";
    $login['msg'] = "Solo se aceptan peticiones por POST";
}
echo json_encode($login);
?>