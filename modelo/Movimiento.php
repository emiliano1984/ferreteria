<?php

require_once __DIR__ . "/../config/conexion.php";

class Movimiento
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
                    movimientos.*,
                    productos.nombre AS nombre_producto
                FROM movimientos
                LEFT JOIN productos ON movimientos.id_producto = productos.id_producto
                ORDER BY movimientos.fecha DESC";

        $consulta = $this->conexion->prepare($sql);
        $consulta->execute();
        return $consulta->fetchAll(PDO::FETCH_ASSOC);
    }

    public function guardar($id_producto, $tipo, $cantidad, $fecha)
    {
        $sql = "INSERT INTO movimientos(id_producto, tipo, cantidad, fecha)
                VALUES(?, ?, ?, ?)";

        $consulta = $this->conexion->prepare($sql);
        return $consulta->execute([$id_producto, $tipo, $cantidad, $fecha]);
    }

    public function buscarPorId($id)
    {
        $sql = "SELECT * FROM movimientos WHERE id_movimiento = ?";
        $consulta = $this->conexion->prepare($sql);
        $consulta->execute([$id]);
        return $consulta->fetch(PDO::FETCH_ASSOC);
    }

    public function actualizar($id, $id_producto, $tipo, $cantidad, $fecha)
    {
        $sql = "UPDATE movimientos SET
                    id_producto = ?,
                    tipo = ?,
                    cantidad = ?,
                    fecha = ?
                WHERE id_movimiento = ?";

        $consulta = $this->conexion->prepare($sql);
        return $consulta->execute([$id_producto, $tipo, $cantidad, $fecha, $id]);
    }

    public function eliminar($id)
    {
        $sql = "DELETE FROM movimientos WHERE id_movimiento = ?";
        $consulta = $this->conexion->prepare($sql);
        return $consulta->execute([$id]);
    }
}