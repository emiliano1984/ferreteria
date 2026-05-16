
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="css/estilos.css" rel="stylesheet"> <!-- ✅ AGREGAR ESTA LÍNEA -->


<nav class="navbar navbar-dark bg-dark px-4">
    <a class="navbar-brand" href="index.php">Ferretería El Canario</a>
    <div>
         <a href="index.php" class="btn btn-outline-light btn-sm me-2">Dashboard</a>
        <a href="index.php?controller=producto&action=listar" class="btn btn-outline-light btn-sm me-2">Productos</a>
        <a href="index.php?controller=categoria&action=listar" class="btn btn-outline-light btn-sm me-2">Categorías</a>
        <a href="index.php?controller=movimiento&action=listar" class="btn btn-outline-light btn-sm">Movimientos</a>
         <a href="index.php?controller=usuario&action=listar" class="btn btn-outline-light btn-sm">Usuarios</a>
        
    </div>
</nav>

<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Lista de Movimientos</h1>
        <a href="index.php?controller=movimiento&action=crear" class="btn btn-primary">
            Nuevo Movimiento
        </a>
    </div>
    <table class="table table-bordered table-hover">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Producto</th>
                <th>Tipo</th>
                <th>Cantidad</th>
                <th>Fecha</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php if (isset($movimientos)): ?>
                <?php foreach ($movimientos as $movimiento): ?>
                    <tr>
                        <td><?= htmlspecialchars($movimiento['id_movimiento']) ?></td>
                        <td><?= htmlspecialchars($movimiento['nombre_producto']) ?></td>
                        <td>
                            <?php
                                $tipo  = $movimiento['tipo'];
                                $badge = $tipo === 'Compra' ? 'success' : ($tipo === 'Venta' ? 'danger' : 'warning');
                            ?>
                            <span class="badge bg-<?= $badge ?>"><?= htmlspecialchars($tipo) ?></span>
                        </td>
                        <td><?= htmlspecialchars($movimiento['cantidad']) ?></td>
                        <td><?= htmlspecialchars($movimiento['fecha']) ?></td>
                        <td>
                            <a href="index.php?controller=movimiento&action=editar&id_movimiento=<?= $movimiento['id_movimiento'] ?>"
                                class="btn btn-warning btn-sm">Editar</a>
                            <a href="index.php?controller=movimiento&action=eliminar&id_movimiento=<?= $movimiento['id_movimiento'] ?>"
                                class="btn btn-danger btn-sm"
                                onclick="return confirm('¿Desea eliminar este movimiento?')">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</div>