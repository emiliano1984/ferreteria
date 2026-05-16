<?php
class Conexion {
    private $host = "localhost";
    private $username = "root";
    private $password = ""; 
    private $database = "ferreteria";
    private $conexion;

    public function conectar(){
try { $conexion = new PDO("mysql:host=$this->host;dbname=$this->database", $this->username, $this->password);
$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

return $conexion;
} catch (PDOException $e) {
echo "Error de conexión: " . $e->getMessage();
return null;

}



    }}









?>