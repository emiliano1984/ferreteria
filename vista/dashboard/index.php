<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
<link href="css/estilos.css" rel="stylesheet"> <!-- ✅ AGREGAR ESTA LÍNEA -->

<nav class="navbar navbar-dark bg-dark px-4">
    <a class="navbar-brand" href="index.php">Ferretería El Canario</a>
    <div>
        <a href="index.php" class="btn btn-outline-light btn-sm me-2">Dashboard</a>
        <a href="index.php?controller=producto&action=listar" class="btn btn-outline-light btn-sm me-2">Productos</a>
        <a href="index.php?controller=categoria&action=listar" class="btn btn-outline-light btn-sm me-2">Categorías</a>
        <a href="index.php?controller=movimiento&action=listar" class="btn btn-outline-light btn-sm me-2">Movimientos</a>
        <a href="index.php?controller=usuario&action=listar" class="btn btn-outline-light btn-sm">Usuarios</a>
    </div>
</nav>

<div class="container mt-5">

    <h1 class="mb-4">Dashboard</h1>

    <!-- TARJETAS -->
    <div class="row g-4 mb-5">

        <div class="col-md-3">
            <div class="card text-white bg-primary shadow">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="card-title">Total Productos</h6>
                        <h2 class="mb-0"><?= $totalProductos ?></h2>
                    </div>
                    <i class="bi bi-box-seam fs-1"></i>
                </div>
                <div class="card-footer">
                    <a href="index.php?controller=producto&action=listar" class="text-white text-decoration-none small">Ver productos →</a>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card text-white bg-success shadow">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="card-title">Total Categorías</h6>
                        <h2 class="mb-0"><?= $totalCategorias ?></h2>
                    </div>
                    <i class="bi bi-tags fs-1"></i>
                </div>
                <div class="card-footer">
                    <a href="index.php?controller=categoria&action=listar" class="text-white text-decoration-none small">Ver categorías →</a>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card text-white bg-warning shadow">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="card-title">Total Movimientos</h6>
                        <h2 class="mb-0"><?= $totalMovimientos ?></h2>
                    </div>
                    <i class="bi bi-arrow-left-right fs-1"></i>
                </div>
                <div class="card-footer">
                    <a href="index.php?controller=movimiento&action=listar" class="text-white text-decoration-none small">Ver movimientos →</a>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card text-white bg-danger shadow">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <h6 class="card-title">Total Usuarios</h6>
                        <h2 class="mb-0"><?= $totalUsuarios ?></h2>
                    </div>
                    <i class="bi bi-people fs-1"></i>
                </div>
                <div class="card-footer">
                    <a href="index.php?controller=usuario&action=listar" class="text-white text-decoration-none small">Ver usuarios →</a>
                </div>
            </div>
        </div>

    </div>

    <!-- TABLAS -->
    <div class="row g-4">

        <!-- MOVIMIENTOS RECIENTES -->
        <div class="col-md-7">
            <div class="card shadow">
                <div class="card-header bg-dark text-white">
                    <h5 class="mb-0">Movimientos Recientes</h5>
                </div>
                <div class="card-body p-0">
                    <table class="table table-hover mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Producto</th>
                                <th>Tipo</th>
                                <th>Cantidad</th>
                                <th>Fecha</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($movimientosRecientes)): ?>
                                <tr>
                                    <td colspan="4" class="text-center text-muted py-3">Sin movimientos registrados</td>
                                </tr>
                            <?php else: ?>
                                <?php foreach ($movimientosRecientes as $mov): ?>
                                    <tr>
                                        <td><?= htmlspecialchars($mov['nombre_producto']) ?></td>
                                        <td>
                                            <?php
                                                $tipo  = $mov['tipo'];
                                                $badge = $tipo === 'Compra' ? 'success' : ($tipo === 'Venta' ? 'danger' : 'warning');
                                            ?>
                                            <span class="badge bg-<?= $badge ?>"><?= htmlspecialchars($tipo) ?></span>
                                        </td>
                                        <td><?= htmlspecialchars($mov['cantidad']) ?></td>
                                        <td><?= htmlspecialchars($mov['fecha']) ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
                <div class="card-footer text-end">
                    <a href="index.php?controller=movimiento&action=listar" class="btn btn-sm btn-dark">Ver todos</a>
                </div>
            </div>
        </div>

        <!-- PRODUCTOS CON BAJO STOCK -->
        <div class="col-md-5">
            <div class="card shadow">
                <div class="card-header bg-danger text-white">
                    <h5 class="mb-0">Productos con Bajo Stock</h5>
                </div>
                <div class="card-body p-0">
                    <table class="table table-hover mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Producto</th>
                                <th>Stock</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($productosBajoStock)): ?>
                                <tr>
                                    <td colspan="2" class="text-center text-muted py-3">Sin productos con bajo stock</td>
                                </tr>
                            <?php else: ?>
                                <?php foreach ($productosBajoStock as $prod): ?>
                                    <tr>
                                        <td><?= htmlspecialchars($prod['nombre']) ?></td>
                                        <td>
                                            <span class="badge bg-danger"><?= htmlspecialchars($prod['stock']) ?></span>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
                <div class="card-footer text-end">
                    <a href="index.php?controller=producto&action=listar" class="btn btn-sm btn-danger">Ver todos</a>
                </div>
            </div>
        </div>

    </div>
</div>