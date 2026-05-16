<?php

require_once __DIR__ . "/../config/conexion.php";

class Usuario
{
    private $conexion;

    public function __construct()
    {
        $db = new Conexion();
        $this->conexion = $db->conectar();
    }

    public function listar()
    {
        $sql = "SELECT id_usuario, nombre, correo FROM usuarios";
        $consulta = $this->conexion->prepare($sql);
        $consulta->execute();
        return $consulta->fetchAll(PDO::FETCH_ASSOC);
    }

    public function guardar($nombre, $correo, $password)
    {
        $sql = "INSERT INTO usuarios(nombre, correo, password)
                VALUES(?, ?, ?)";
        $consulta = $this->conexion->prepare($sql);
        return $consulta->execute([
            $nombre,
            $correo,
            password_hash($password, PASSWORD_DEFAULT)
        ]);
    }

    public function buscarPorId($id)
    {
        $sql = "SELECT id_usuario, nombre, correo FROM usuarios WHERE id_usuario = ?";
        $consulta = $this->conexion->prepare($sql);
        $consulta->execute([$id]);
        return $consulta->fetch(PDO::FETCH_ASSOC);
    }

    public function buscarPorCorreo($correo)
    {
        $sql = "SELECT * FROM usuarios WHERE correo = ?";
        $consulta = $this->conexion->prepare($sql);
        $consulta->execute([$correo]);
        return $consulta->fetch(PDO::FETCH_ASSOC);
    }

    public function actualizar($id, $nombre, $correo)
    {
        $sql = "UPDATE usuarios SET
                    nombre = ?,
                    correo = ?
                WHERE id_usuario = ?";
        $consulta = $this->conexion->prepare($sql);
        return $consulta->execute([$nombre, $correo, $id]);
    }

    public function actualizarPassword($id, $password)
    {
        $sql = "UPDATE usuarios SET password = ? WHERE id_usuario = ?";
        $consulta = $this->conexion->prepare($sql);
        return $consulta->execute([
            password_hash($password, PASSWORD_DEFAULT),
            $id
        ]);
    }

    public function eliminar($id)
    {
        $sql = "DELETE FROM usuarios WHERE id_usuario = ?";
        $consulta = $this->conexion->prepare($sql);
        return $consulta->execute([$id]);
    }
}