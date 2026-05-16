<?php

require_once __DIR__ . "/../modelo/Categoria.php";

class CategoriaControlador
{
    public function listar()
{
  
    $categoria  = new Categoria();
   
    $categorias = $categoria->listar();
    
    

    require __DIR__ . "/../vista/categoria/listar.php";
}
    public function crear()
    {
        if ($_POST) {
            $nombre_categoria = $_POST['nombre_categoria'];
            $categoria = new Categoria();
            $categoria->guardar($nombre_categoria);
            header("Location: index.php?controller=categoria&action=listar");
            exit();
        }
        require __DIR__ . "/../vista/categoria/crear.php";
    }

    public function editar()
    {
        $categoria = new Categoria();

        if ($_POST) {
            $id               = $_POST['id_categoria'];
            $nombre_categoria = $_POST['nombre_categoria'];
            $categoria->actualizar($id, $nombre_categoria);
            header("Location: index.php?controller=categoria&action=listar");
            exit();
        }

        if (!isset($_GET['id_categoria'])) {
            die("Error: no se recibió id_categoria");
        }

        $id = $_GET['id_categoria'];
        $datos = $categoria->buscarPorId($id);

        require __DIR__ . "/../vista/categoria/editar.php";
    }

    public function eliminar()
    {
        if (isset($_GET['id_categoria'])) {
            $id = $_GET['id_categoria'];
            $categoria = new Categoria();
            $categoria->eliminar($id);
            header("Location: index.php?controller=categoria&action=listar");
            exit();
        }
    }
}