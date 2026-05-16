<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
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
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header bg-warning">
                    <h3>Editar Usuario</h3>
                </div>
                <div class="card-body">
                    <form action="index.php?controller=usuario&action=editar" method="POST">

                        <input type="hidden" name="id_usuario" value="<?= $datos['id_usuario'] ?>">

                        <div class="mb-3">
                            <label class="form-label">Nombre</label>
                            <input type="text" name="nombre" class="form-control"
                                value="<?= htmlspecialchars($datos['nombre']) ?>" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Correo</label>
                            <input type="email" name="correo" class="form-control"
                                value="<?= htmlspecialchars($datos['correo']) ?>" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Nueva Contraseña <small class="text-muted">(dejar vacío para no cambiar)</small></label>
                            <input type="password" name="password" class="form-control">
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="index.php?controller=usuario&action=listar" class="btn btn-secondary">Volver</a>
                            <button type="submit" class="btn btn-warning">Actualizar</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>