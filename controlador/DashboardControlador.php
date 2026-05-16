<?php

require_once __DIR__ . "/../modelo/Dashboard.php";

class DashboardControlador
{
    public function index()
    {
        $dashboard = new Dashboard();

        $totalProductos   = $dashboard->totalProductos();
        $totalCategorias  = $dashboard->totalCategorias();
        $totalMovimientos = $dashboard->totalMovimientos();
        $totalUsuarios    = $dashboard->totalUsuarios();
        $movimientosRecientes = $dashboard->movimientosRecientes();
        $productosBajoStock   = $dashboard->productosBajoStock();

        require __DIR__ . "/../vista/dashboard/index.php";
    }
}