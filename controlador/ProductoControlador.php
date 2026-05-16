<?php

require_once __DIR__ . "/../modelo/producto.php";

class ProductoControlador
{
    public function listar()
    {
        $producto = new Producto();
        $datos = $producto->listar();
        require __DIR__ . "/../vista/producto/listar.php";
    }

    public function crear()
{
    if ($_POST) {
        $nombre        = $_POST['nombre'];
        $descripcion   = $_POST['descripcion'];
        $precio_compra = $_POST['precio_compra'];
        $precio_venta  = $_POST['precio_venta'];
        $stock         = $_POST['stock'];
        $id_categoria  = $_POST['id_categoria'];

        $producto = new Producto();
        $producto->guardar($nombre, $descripcion, $precio_compra, $precio_venta, $stock, $id_categoria);

        header("Location: index.php?controller=producto&action=listar");
        exit();
    }

    // ✅ Cargar categorías ANTES de mostrar el formulario
    require_once __DIR__ . "/../modelo/Categoria.php";
    $categoria  = new Categoria();
    $categorias = $categoria->listar();

    require __DIR__ . "/../vista/producto/crear.php";
}

    public function editar()
    {
        $producto = new Producto();

        if ($_POST) {
            $id            = $_POST['id_producto'];
            $nombre        = $_POST['nombre'];
            $descripcion   = $_POST['descripcion'];
            $precio_compra = $_POST['precio_compra'];
            $precio_venta  = $_POST['precio_venta'];
            $stock         = $_POST['stock'];
            $id_categoria  = $_POST['id_categoria'];

            $producto->actualizar($id, $nombre, $descripcion, $precio_compra, $precio_venta, $stock, $id_categoria);

            header("Location: index.php?controller=producto&action=listar");
            exit();
        }

        if (!isset($_GET['id_producto'])) {
            die("Error: no se recibió id_producto");
        }

        $id    = $_GET['id_producto'];
        $datos = $producto->buscarPorId($id);

        if (!$datos) {
            die("Error: producto no encontrado con id = " . $id);
        }

        require __DIR__ . "/../vista/producto/editar.php";
    }

    public function eliminar()
    {
        if (isset($_GET['id_producto'])) {
            $id       = $_GET['id_producto'];
            $producto = new Producto();
            $producto->eliminar($id);
            header("Location: index.php?controller=producto&action=listar");
            exit();
        }
    }
}