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
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h3>Nuevo Movimiento</h3>
                </div>
                <div class="card-body">
                    <form action="index.php?controller=movimiento&action=crear" method="POST">

                        <div class="mb-3">
                            <label class="form-label">Producto</label>
                            <select name="id_producto" class="form-select" required>
                                <option value="">Seleccione un producto</option>
                                <?php foreach ($productos as $producto): ?>
                                    <option value="<?= $producto['id_producto'] ?>">
                                        <?= htmlspecialchars($producto['nombre']) ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Tipo</label>
                            <select name="tipo" class="form-select" required>
                                <option value="">Seleccione un tipo</option>
                                <option value="Compra">Compra</option>
                                <option value="Venta">Venta</option>
                                <option value="Ajuste">Ajuste</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Cantidad</label>
                            <input type="number" name="cantidad" class="form-control" min="1" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Fecha</label>
                            <input type="date" name="fecha" class="form-control" required>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="index.php?controller=movimiento&action=listar" class="btn btn-secondary">Volver</a>
                            <button type="submit" class="btn btn-success">Guardar</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>