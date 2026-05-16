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
    <h1 class="mb-4">Lista de Productos</h1>
    <a href="index.php?controller=producto&action=crear" class="btn btn-primary mb-3">
        Nuevo Producto
    </a>
    <table class="table table-bordered table-hover">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Precio Venta</th>
                <th>Stock</th>
                <th>Categoría</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php if (isset($datos)): ?>
                <?php foreach ($datos as $producto): ?>
                    <tr>
                        <td><?= htmlspecialchars($producto['id_producto']) ?></td>
                        <td><?= htmlspecialchars($producto['nombre']) ?></td>
                        <td><?= htmlspecialchars($producto['precio_venta']) ?></td>
                        <td><?= htmlspecialchars($producto['stock']) ?></td>
                        <td><?= htmlspecialchars($producto['nombre_categoria'] ?? 'Sin categoría') ?></td>
                        <td>
                            <a href="index.php?controller=producto&action=editar&id_producto=<?= $producto['id_producto'] ?>"
                                class="btn btn-warning btn-sm">Editar</a>
                            <a href="index.php?controller=producto&action=eliminar&id_producto=<?= $producto['id_producto'] ?>"
                                class="btn btn-danger btn-sm"
                                onclick="return confirm('¿Desea eliminar este producto?')">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</div>