<?php
// para que php reconoscq que se va a intercambiar archivos JSON
header('Content-Type: aplication/json');
require_once "../config/conexion.php";
require_once "../models/Producto.php";

$body = json_decode(file_get_contents("php://input"), true);

$producto = new Producto();
switch ($_GET["opcion"]) {
    case 'getAll':
        $datos = $producto->get_producto();
        echo json_encode($datos);
        break;

    case "get":
        $datos = $producto->get_productoId($body["id"]); // id de la tabla a consultar
        echo json_encode($datos);
        break;

    case "insert":
        $datos = $producto->insert_producto($body["nombre"], $body["marca"], $body["descripcion"], $body["precio"]); // id de la tabla a consultar
        echo json_encode("Datos Insertados Correctamente UwU");
        break;

    case "update":
        $datos = $producto->update_producto($body["id"], $body["nombre"], $body["marca"], $body["descripcion"], $body["precio"]); // id de la tabla a consultar
        echo json_encode("Datos Actualizado Correctamente   🎉UwU🎉");
        break;

        // para hacer un borrado logico de un registro
    case "delete":
        $datos = $producto->delete_producto($body["id"]); // id de la tabla a consultar
        echo json_encode("Datos Eliminado  Correctamente   🎉UwU🎉");
        break;

    case 'getSucursales':
        $datos = $producto->get_sucursales();
        echo json_encode($datos);
        break;

    default:
        echo "Ups Hubo un error";
        break;
}
