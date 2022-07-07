<?php
//archivo que contontiene las 
class Producto extends Conectar
{
    public function get_producto()
    {
        $conectar = parent::connection();
        parent::set_names();
        $sql = "SELECT  id,nombre,marca,descripcion,precio FROM producto WHERE estado=1";
        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }

    // Recuperar solo un registro de la tabla
    public function get_productoId($id)
    {
        $conectar = parent::connection();
        parent::set_names();
        $sql = "SELECT id,nombre,marca,descripcion,precio FROM producto WHERE estado = 1 AND id = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $id);

        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }
    //insertar un nuevo producto
    public function insert_producto($nombre, $marca, $descripcion, $precio)
    {
        $conectar = parent::connection();
        parent::set_names();
        $sql = "INSERT INTO producto ( id, nombre, marca, descripcion, precio, estado) VALUES (NULL, ?, ?, ?, ?, '1')";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $nombre);
        $sql->bindValue(2, $marca);
        $sql->bindValue(3, $descripcion);
        $sql->bindValue(4, $precio);

        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }
    // actualizar datos de la bd
    public function update_producto($id, $nombre, $marca, $descripcion, $precio)
    {
        $conectar = parent::connection();
        parent::set_names();

        $sql = " UPDATE producto SET nombre=?,marca=?,descripcion=?,precio=? WHERE id =?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $nombre);
        $sql->bindValue(2, $marca);
        $sql->bindValue(3, $descripcion);
        $sql->bindValue(4, $precio);
        $sql->bindValue(5, $id);

        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }
    // actualizar datos de la bd
    public function delete_producto($id)
    {
        $conectar = parent::connection();
        parent::set_names();

        $sql = " UPDATE producto SET estado =0 WHERE id =?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $id);

        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }
    public function get_sucursales()
    {
        $conectar = parent::connection();
        parent::set_names();
        $sql = "SELECT * FROM sucursales";
        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
    }
}
