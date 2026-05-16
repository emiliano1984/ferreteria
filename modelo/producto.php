<?php

require_once __DIR__ . "/../config/conexion.php";

class Producto
{

    private $conexion;

    public function __construct()
    {
        $db = new Conexion();
        $this->conexion = $db->conectar();
    }
    public function listar()
    {
        $sql = "SELECT 
                productos.*,
                categorias.nombre_categoria
            FROM productos
            LEFT JOIN categorias                  -- ✅ LEFT en vez de INNER
            ON productos.id_categoria = categorias.id_categoria";

        $datos = $this->conexion->prepare($sql);
        $datos->execute();
        return $datos->fetchAll(PDO::FETCH_ASSOC);
    }
    public function guardar(
        $nombre,
        $descripcion,
        $precio_compra,
        $precio_venta,
        $stock,
        $id_categoria
    ) {

        $sql = "INSERT INTO productos(
                nombre,
                descripcion,
                precio_compra,
                precio_venta,
                stock,
                id_categoria
            )
            VALUES(?, ?, ?, ?, ?, ?)";

        $consulta = $this->conexion->prepare($sql);

        return $consulta->execute([
            $nombre,
            $descripcion,
            $precio_compra,
            $precio_venta,
            $stock,
            $id_categoria
        ]);
    }
    public function buscarPorId($id)
    {

        $sql = "SELECT * FROM productos WHERE id_producto = ?";

        $datos = $this->conexion->prepare($sql);

        $datos->execute([$id]);

        return $datos->fetch(PDO::FETCH_ASSOC);
    }


    public function actualizar(
        $id,
        $nombre,
        $descripcion,
        $precio_compra,
        $precio_venta,
        $stock,
        $id_categoria
    ) {

        $sql = "UPDATE productos SET
                nombre = ?,
                descripcion = ?,
                precio_compra = ?,
                precio_venta = ?,
                stock = ?,
                id_categoria = ?
            WHERE id_producto = ?";

        $datos = $this->conexion->prepare($sql);

        return $datos->execute([
            $nombre,
            $descripcion,
            $precio_compra,
            $precio_venta,
            $stock,
            $id_categoria,
            $id
        ]);
    }

    public function eliminar($id)
    {

        $sql = "DELETE FROM productos
            WHERE id_producto = ?";

        $datos = $this->conexion->prepare($sql);

        return $datos->execute([$id]);
    }
}
