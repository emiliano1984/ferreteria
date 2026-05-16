<?php

require_once __DIR__ . "/../modelo/Movimiento.php";
require_once __DIR__ . "/../modelo/producto.php";

class MovimientoControlador
{
    public function listar()
    {
        $movimiento  = new Movimiento();
        $movimientos = $movimiento->listar();
        require __DIR__ . "/../vista/movimiento/listar.php";
    }

    public function crear()
    {
        if ($_POST) {
            $id_producto = $_POST['id_producto'];
            $tipo        = $_POST['tipo'];
            $cantidad    = $_POST['cantidad'];
            $fecha       = $_POST['fecha'];

            $movimiento = new Movimiento();
            $movimiento->guardar($id_producto, $tipo, $cantidad, $fecha);

            header("Location: index.php?controller=movimiento&action=listar");
            exit();
        }

        $producto  = new Producto();
        $productos = $producto->listar();

        require __DIR__ . "/../vista/movimiento/crear.php";
    }

    public function editar()
    {
        $movimiento = new Movimiento();

        if ($_POST) {
            $id          = $_POST['id_movimiento'];
            $id_producto = $_POST['id_producto'];
            $tipo        = $_POST['tipo'];
            $cantidad    = $_POST['cantidad'];
            $fecha       = $_POST['fecha'];

            $movimiento->actualizar($id, $id_producto, $tipo, $cantidad, $fecha);

            header("Location: index.php?controller=movimiento&action=listar");
            exit();
        }

        if (!isset($_GET['id_movimiento'])) {
            die("Error: no se recibió id_movimiento");
        }

        $id    = $_GET['id_movimiento'];
        $datos = $movimiento->buscarPorId($id);

        if (!$datos) {
            die("Error: movimiento no encontrado con id = " . $id);
        }

        $producto  = new Producto();
        $productos = $producto->listar();

        require __DIR__ . "/../vista/movimiento/editar.php";
    }

    public function eliminar()
    {
        if (isset($_GET['id_movimiento'])) {
            $id = $_GET['id_movimiento'];
            $movimiento = new Movimiento();
            $movimiento->eliminar($id);
            header("Location: index.php?controller=movimiento&action=listar");
            exit();
        }
    }
}