<?php

require_once __DIR__ . "/../modelo/Usuario.php";

class UsuarioControlador
{
    public function listar()
    {
        $usuario  = new Usuario();
        $usuarios = $usuario->listar();
        require __DIR__ . "/../vista/usuario/listar.php";
    }

    public function crear()
    {
        if ($_POST) {
            $nombre   = $_POST['nombre'];
            $correo   = $_POST['correo'];
            $password = $_POST['password'];

            $usuario = new Usuario();
            $usuario->guardar($nombre, $correo, $password);

            header("Location: index.php?controller=usuario&action=listar");
            exit();
        }

        require __DIR__ . "/../vista/usuario/crear.php";
    }

    public function editar()
    {
        $usuario = new Usuario();

        if ($_POST) {
            $id     = $_POST['id_usuario'];
            $nombre = $_POST['nombre'];
            $correo = $_POST['correo'];

            $usuario->actualizar($id, $nombre, $correo);

            if (!empty($_POST['password'])) {
                $usuario->actualizarPassword($id, $_POST['password']);
            }

            header("Location: index.php?controller=usuario&action=listar");
            exit();
        }

        if (!isset($_GET['id_usuario'])) {
            die("Error: no se recibió id_usuario");
        }

        $id    = $_GET['id_usuario'];
        $datos = $usuario->buscarPorId($id);

        if (!$datos) {
            die("Error: usuario no encontrado con id = " . $id);
        }

        require __DIR__ . "/../vista/usuario/editar.php";
    }

    public function eliminar()
    {
        if (isset($_GET['id_usuario'])) {
            $id = $_GET['id_usuario'];
            $usuario = new Usuario();
            $usuario->eliminar($id);
            header("Location: index.php?controller=usuario&action=listar");
            exit();
        }
    }
}