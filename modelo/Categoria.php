<?php

require_once __DIR__ . "/../config/conexion.php";
class Categoria{

    private $conexion;

    public function __construct(){

        $db = new Conexion();

        $this->conexion = $db->conectar();
    }

    public function listar(){

        $sql = "SELECT * FROM categorias";

        $consulta = $this->conexion->prepare($sql);

        $consulta->execute();

        return $consulta->fetchAll(PDO::FETCH_ASSOC);
    }

    public function guardar($nombre_categoria){

        $sql = "INSERT INTO categorias(nombre_categoria)
                VALUES(?)";

        $consulta = $this->conexion->prepare($sql);

        return $consulta->execute([
            $nombre_categoria
        ]);
    }

    public function buscarPorId($id){

        $sql = "SELECT * FROM categorias
                WHERE id_categoria = ?";

        $consulta = $this->conexion->prepare($sql);

        $consulta->execute([$id]);

        return $consulta->fetch(PDO::FETCH_ASSOC);
    }

    public function actualizar($id, $nombre_categoria){

        $sql = "UPDATE categorias
                SET nombre_categoria = ?
                WHERE id_categoria = ?";

        $consulta = $this->conexion->prepare($sql);

        return $consulta->execute([
            $nombre_categoria,
            $id
        ]);
    }

    public function eliminar($id){

        $sql = "DELETE FROM categorias
                WHERE id_categoria = ?";

        $consulta = $this->conexion->prepare($sql);

        return $consulta->execute([$id]);
    }
}