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

                <div class="card-header bg-warning">
                    <h3>Editar Producto</h3>
                </div>

                <div class="card-body">
                    <form action="index.php?controller=producto&action=editar" method="POST">

                        <input type="hidden" name="id_producto" value="<?= $datos['id_producto'] ?>">

                        <div class="mb-3">
                            <label class="form-label">Nombre</label>
                            <input type="text" name="nombre" class="form-control"
                                value="<?= htmlspecialchars($datos['nombre']) ?>" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Descripción</label>
                            <textarea name="descripcion" class="form-control" required>
                                <?= htmlspecialchars($datos['descripcion']) ?>
                            </textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Precio Compra</label>
                            <input type="number" step="0.01" name="precio_compra" class="form-control"
                                value="<?= htmlspecialchars($datos['precio_compra']) ?>" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Precio Venta</label>
                            <input type="number" step="0.01" name="precio_venta" class="form-control"
                                value="<?= htmlspecialchars($datos['precio_venta']) ?>" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Stock</label>
                            <input type="number" name="stock" class="form-control"
                                value="<?= htmlspecialchars($datos['stock']) ?>" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Categoría</label>
                            <select name="id_categoria" class="form-select" required>
                                <option value="">Seleccione una categoría</option>
                                <?php foreach ($categorias as $categoria): ?>
                                    <option value="<?= $categoria['id_categoria'] ?>"
                                        <?= $categoria['id_categoria'] == $datos['id_categoria'] ? 'selected' : '' ?>>
                                        <?= htmlspecialchars($categoria['nombre_categoria']) ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="index.php?controller=producto&action=listar" class="btn btn-secondary">
                                Volver
                            </a>
                            <button type="submit" class="btn btn-warning">
                                Actualizar
                            </button>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>
</div>