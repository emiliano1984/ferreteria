<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

$controller = "DashboardControlador"; // ✅ dashboard por defecto
$action     = "index";                // ✅ acción por defecto

if (isset($_GET['controller'])) {
    $controller = ucfirst($_GET['controller']) . "Controlador";
}

if (isset($_GET['action'])) {
    $action = $_GET['action'];
}

$rutaControlador = "controlador/" . $controller . ".php";

if (file_exists($rutaControlador)) {
    require $rutaControlador;

    if (class_exists($controller)) {
        $objetoControlador = new $controller();

        if (method_exists($objetoControlador, $action)) {
            $objetoControlador->$action();
        } else {
            die("La acción no existe");
        }
    } else {
        die("El controlador no existe");
    }
} else {
    die("El archivo del controlador no existe");
}