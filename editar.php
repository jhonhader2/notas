<!-- HEADER -->
<?php include('template/header.php'); ?>

<?php

if (empty($_GET)) {
    header('Location: index.php?mensaje=nodata');
    exit();
} else {
    include_once('model/conexion.php');
    $id = $_GET['id'];

    $query   = "SELECT * FROM personas WHERE id = ?";
    $prepare = $db->prepare($query);
    $prepare->execute([$id]);
    
    $persona = $prepare->fetch(PDO::FETCH_OBJ);
}

?>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <p>Editar datos:</p>
                </div>
                <form class="p-4" action="editarProceso.php" method="POST" autocomplete="off">
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" name="nombre" value="<?php echo $persona->nombre ?>" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label for="edad" class="form-label">Edad</label>
                        <input type="number" class="form-control" name="edad" min="1" max="120" value="<?php echo $persona->edad ?>"required>
                    </div>
                    <div class="mb-3">
                        <label for="signo" class="form-label">Signo</label>
                        <input type="text" class="form-control" name="signo" value="<?php echo $persona->signo ?>"required>
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="id" value="<?php echo $persona->id ?>">
                        <button type="submit" class="btn btn-sm btn-outline-primary">Guardar</button>
                    </div>
                    <div class="d-grid mt-3">
                        <a class="btn btn-sm btn-outline-warning " href="index.php">Regresar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- FOOTER -->
<?php include('template/footer.php'); ?>