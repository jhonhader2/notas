<!-- HEADER -->
<?php include('template/header.php'); ?>
<!-- !HEADER -->

<?php

include_once('model/conexion.php');

$query    = $db->query("SELECT * FROM personas");
$personas = $query->fetchAll(PDO::FETCH_OBJ);

?>

<div class="container my-5">
    <div class="row justify-content-center">
        <!-- Alerta Inicio -->
        <?php

        if (isset($_GET['mensaje'])) {
            if ($_GET['mensaje'] == 'nodata') {
        ?>
                <div class="row">
                    <div class="col">
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            <strong>Alerta:</strong> no se enviaron los datos correctamente.
                        </div>
                    </div>
                </div>
            <?php
            } elseif ($_GET['mensaje'] == 'success') {
            ?>
                <div class="row">
                    <div class="col">
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            <strong>Mensaje:</strong> se ha registrado correctamente los datos.
                        </div>
                    </div>
                </div>
            <?php
            } elseif ($_GET['mensaje'] == 'error') {
            ?>
                <div class="row">
                    <div class="col">
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            <strong>Error:</strong> No se pudo guardar los datos correctamente.
                        </div>
                    </div>
                </div>
        <?php
            } elseif ($_GET['mensaje'] == 'delete') {
                ?>
                    <div class="row">
                        <div class="col">
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                <strong>Mensaje:</strong> Se eliminaron los datos correctamente.
                            </div>
                        </div>
                    </div>
            <?php
                }
        }
        ?>
        <!-- Alerta Fin -->
        <div class="col-md-7">
            <div class="card">
                <div class="card-header">
                    <p>Lista de Personas</p>
                </div>
                <div class="p-4">
                    <div class="table-responsive">
                        <table class="table table-responsive table-striped align-middle">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Edad</th>
                                    <th scope="col">Signo</th>
                                    <th scope="col" colspan="2">Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $pos = 1;
                                if ($personas) {
                                    foreach ($personas as $persona) {
                                ?>
                                        <tr>
                                            <td scope="row"><?php echo $pos ?></td>
                                            <td><?php echo $persona->nombre ?></td>
                                            <td><?php echo $persona->edad ?></td>
                                            <td><?php echo $persona->signo ?></td>
                                            <td>
                                                <a href="editar.php?id=<?php echo $persona->id; ?>">
                                                    <i class="bi bi-pencil-square text-warning"></i>
                                                </a>
                                            </td>
                                            <td>
                                                <a href="eliminar.php?id=<?php echo $persona->id; ?>" <i class="bi bi-trash text-danger"></i>
                                                </a>
                                            </td>
                                        </tr>

                                    <?php
                                        $pos++;
                                    }
                                } else {
                                    ?>
                                    <tr class="text-center">
                                        <td colspan=6>No hay Datos</td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <p>Ingresar datos:</p>
                </div>
                <form class="p-4" action="registrar.php" method="POST" autocomplete="off">
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" name="nombre" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label for="edad" class="form-label">Edad</label>
                        <input type="number" class="form-control" name="edad" min="1" max="120" required>
                    </div>
                    <div class="mb-3">
                        <label for="signo" class="form-label">Signo</label>
                        <input type="text" class="form-control" name="signo" required>
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="hidden" value="1">
                        <button type="submit" class="btn btn-sm btn-outline-primary">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- FOOTER -->
<?php include('template/footer.php'); ?>