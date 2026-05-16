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
                    <h3 class="mb-0">Crear Producto</h3>
                </div>

                <div class="card-body">

                    <form action="index.php?controller=producto&action=crear" method="POST">


                        <div class="mb-3">

                            <label class="form-label">
                                Nombre del Producto
                            </label>

                            <input
                                type="text"
                                name="nombre"
                                class="form-control"
                                placeholder="Ingrese el nombre"
                                required>

                        </div>

                        <div class="mb-3">

                            <label class="form-label">
                                Precio de Venta
                            </label>

                            <input
                                type="number"
                                step="0.01"
                                name="precio_venta"
                                class="form-control"
                                placeholder="Ingrese el precio"
                                required>

                        </div>

                        <div class="mb-3">

                            <label class="form-label">
                                Stock
                            </label>

                            <input
                                type="number"
                                name="stock"
                                class="form-control"
                                placeholder="Ingrese el stock"
                                required>

                        </div>
                        <div class="mb-3">

                            <label class="form-label">
                                Descripción
                            </label>

                            <textarea
                                name="descripcion"
                                class="form-control"
                                required></textarea>

                        </div>

                        <div class="mb-3">

                            <label class="form-label">
                                Precio Compra
                            </label>

                            <input
                                type="number"
                                step="0.01"
                                name="precio_compra"
                                class="form-control"
                                required>

                        </div>

                        <div class="mb-3">

                            <label class="form-label">
                                Categoría
                            </label>

                            <select name="id_categoria"
                                class="form-select"
                                required>

                                <option value="">
                                    Seleccione una categoría
                                </option>
                                <?php if (isset($categorias)): ?>

                                    <?php foreach ($categorias as $categoria): ?>

                                        <option value="<?= $categoria['id_categoria'] ?>">

                                            <?= $categoria['nombre_categoria'] ?>

                                        </option>

                                    <?php endforeach; ?>

                                <?php endif ?>
                            </select>

                        </div>

                        <div class="d-flex justify-content-between">

                            <a href="index.php?controller=producto&action=listar"
                                class="btn btn-secondary">
                                Volver
                            </a>

                            <button type="submit" class="btn btn-success">
                                Guardar Producto
                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>