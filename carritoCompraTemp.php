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
   $id_usuarioCarrito = $_POST['id_usuarioCarrito'];
   $nombreProducto = $_POST['nombreProducto'];
   $precio_unidad = $_POST['precio_unidad'];
   $precioCarritoTotal = $_POST['precioCarritoTotal'];
   $cantidadProducto = $_POST['cantidadProducto'];
   $img = $_POST['img'];
   /* Variables POST */

   
    $registro = $conexion->prepare("INSERT INTO carritoCompraTemp (id_usuarioCarrito, nombreProducto, precio_unidad, precioCarritoTotal, cantidadProducto, img) VALUES (:id_usuarioCarrito, :nombreProducto, :precio_unidad, :precioCarritoTotal, :cantidadProducto, :img)");
      
    if ($registro->execute(array(':id_usuarioCarrito' => $id_usuarioCarrito, ':nombreProducto' => $nombreProducto, ':precio_unidad' => $precio_unidad, 
                                   ':precioCarritoTotal' => $precioCarritoTotal, ':cantidadProducto' => $cantidadProducto, ':img' => $img))) {
         //carrito temporal registrado
      $login['status'] = 'Ok';
      $login['msg'] = "Usuario registrado con éxito";
    } else {
       $login['status'] = 'Error';
        $login['msg'] = "Hubo un error en la base de datos y no se pudo registrar, intente más tarde";
    }
   
} else {
   $login['status'] = "400";
   $login['msg'] = "Solo se aceptan peticiones por POST";
}

echo json_encode($login);