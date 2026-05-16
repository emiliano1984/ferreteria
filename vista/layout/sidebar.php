<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ferretería</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="css/estilos.css" rel="stylesheet">
</head>
<body>

<!-- TOPBAR -->
<nav class="navbar navbar-dark px-3 topbar">
    <button class="btn btn-link text-white fs-4 p-0 me-3" id="sidebarToggle">
        <i class="bi bi-list"></i>
    </button>
    <a class="navbar-brand fw-bold" href="index.php">
        <i class="bi bi-tools me-2"></i>Ferretería
    </a>
</nav>

<div class="wrapper">

    <!-- SIDEBAR -->
    <nav id="sidebar">
        <div class="sidebar-header">
            <h5 class="mb-0"><i class="bi bi-tools me-2"></i>Menú</h5>
        </div>
        <ul class="sidebar-menu">
            <li>
                <a href="index.php" class="<?= (!isset($_GET['controller'])) ? 'active' : '' ?>">
                    <i class="bi bi-speedometer2"></i> Dashboard
                </a>
            </li>
            <li>
                <a href="index.php?controller=producto&action=listar" class="<?= (isset($_GET['controller']) && $_GET['controller'] === 'producto') ? 'active' : '' ?>">
                    <i class="bi bi-box-seam"></i> Productos
                </a>
            </li>
            <li>
                <a href="index.php?controller=categoria&action=listar" class="<?= (isset($_GET['controller']) && $_GET['controller'] === 'categoria') ? 'active' : '' ?>">
                    <i class="bi bi-tags"></i> Categorías
                </a>
            </li>
            <li>
                <a href="index.php?controller=movimiento&action=listar" class="<?= (isset($_GET['controller']) && $_GET['controller'] === 'movimiento') ? 'active' : '' ?>">
                    <i class="bi bi-arrow-left-right"></i> Movimientos
                </a>
            </li>
            <li>
                <a href="index.php?controller=usuario&action=listar" class="<?= (isset($_GET['controller']) && $_GET['controller'] === 'usuario') ? 'active' : '' ?>">
                    <i class="bi bi-people"></i> Usuarios
                </a>
            </li>
        </ul>
    </nav>

    <!-- CONTENIDO -->
    <div id="content">