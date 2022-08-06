<?php
//AQUÍ ESTÁ LA PRINCIPAL DIFERENCIA, CON ESTE IF ME DEJÓ DE SALIR ERRORES.
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

   /* La conexión se hace en el metodo POST */
   //New PDO
   try {
      $conexion = new PDO("mysql:host=localhost;dbname=id17248609_bd_domilapp", "id17248609_root2", "Root2-web_services");
   } catch (PDOException $message) {
      echo $message->getMessage();
   }

   /* Variables POST */
   $cedula = $_POST['cedula'];
   //$id_usuario = $_POST['id_usuario'];
   $nombre = $_POST['nombre'];
   $apellido = $_POST['apellido'];
   $celular = $_POST['celular'];
   $email = $_POST['email'];
   $pass = $_POST['pass'];
   /* Variables POST */

   

   //Sentencia para validar que no haiga cedulas repetidas
   $consultaPorCedula = $conexion->prepare("SELECT COUNT(*) FROM usuario WHERE cedula = :cedula");
   // el Count siver para ver cuantas veces esta la variable CEDULA
   $consultaPorCedula->execute(array(':cedula' => $cedula));
   $numeroDeLaConsultaCedula = $consultaPorCedula->fetchColumn();
   //Sentencia

   if ($numeroDeLaConsultaCedula > 0) {
      //No existe usuario
      $login['status'] = "Usuario existente";
      $login['msg'] = "El usuario ya se encuentra registrado";
   } else {
      //password_hash($pass, PASSWORD_DEFAULT, ['cost' => 10]);
      $pass_cifrado = password_hash($pass, PASSWORD_DEFAULT); // LA SAL SE GENERA AUTOMATICAMENTE

      $registro = $conexion->prepare("INSERT INTO usuario (cedula, nombre, apellido, celular, email, pass) VALUES (:cedula, :nombre, :apellido, :celular, :email, :pass)");
     
      if ($registro->execute(array(':cedula' => $cedula, ':nombre' => $nombre, ':apellido' => $apellido,
       ':celular' => $celular, ':email' => $email, ':pass' => $pass_cifrado))) {
         //Usuario registrado
         $login['status'] = 'Ok';
         $login['msg'] = "Usuario registrado con éxito";
         $login['hased'] = $pass2;
      } else {
         $login['status'] = 'Error';
         $login['msg'] = "Hubo un error en la base de datos y no se pudo registrar, intente más tarde";
      }
   }
} else {
   $login['status'] = "400";
   $login['msg'] = "Solo se aceptan peticiones por POST";
}

echo json_encode($login);