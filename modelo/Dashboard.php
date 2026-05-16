<?php

require_once __DIR__ . "/../config/conexion.php";

class Dashboard
{
    private $conexion;

    public function __construct()
    {
        $db = new Conexion();
        $this->conexion = $db->conectar();
    }

    public function totalProductos()
    {
        $sql = "SELECT COUNT(*) AS total FROM productos";
        $consulta = $this->conexion->prepare($sql);
        $consulta->execute();
        return $consulta->fetch(PDO::FETCH_ASSOC)['total'];
    }

    public function totalCategorias()
    {
        $sql = "SELECT COUNT(*) AS total FROM categorias";
        $consulta = $this->conexion->prepare($sql);
        $consulta->execute();
        return $consulta->fetch(PDO::FETCH_ASSOC)['total'];
    }

    public function totalMovimientos()
    {
        $sql = "SELECT COUNT(*) AS total FROM movimientos";
        $consulta = $this->conexion->prepare($sql);
        $consulta->execute();
        return $consulta->fetch(PDO::FETCH_ASSOC)['total'];
    }

    public function totalUsuarios()
    {
        $sql = "SELECT COUNT(*) AS total FROM usuarios";
        $consulta = $this->conexion->prepare($sql);
        $consulta->execute();
        return $consulta->fetch(PDO::FETCH_ASSOC)['total'];
    }

    public function movimientosRecientes()
    {
        $sql = "SELECT 
                    movimientos.*,
                    productos.nombre AS nombre_producto
                FROM movimientos
                LEFT JOIN productos ON movimientos.id_producto = productos.id_producto
                ORDER BY fecha DESC
                LIMIT 5";
        $consulta = $this->conexion->prepare($sql);
        $consulta->execute();
        return $consulta->fetchAll(PDO::FETCH_ASSOC);
    }

    public function productosBajoStock($limite = 5)
    {
        $sql = "SELECT id_producto, nombre, stock FROM productos
                WHERE stock <= ?
                ORDER BY stock ASC";
        $consulta = $this->conexion->prepare($sql);
        $consulta->execute([$limite]);
        return $consulta->fetchAll(PDO::FETCH_ASSOC);
    }
}