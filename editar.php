<!-- Incluyendo el header -->
<?php include('./template/header.php'); ?>

<?php 

    if(!isset($_GET['codigo'])) {
        header('Location: index.php?mensaje=error');
        exit();
    }

    include_once 'model/conexion.php';
    $codigo = $_GET['codigo'];

    $sentencia = $bd->prepare('SELECT * FROM empleados WHERE codigo = ?;');
    $sentencia->execute([$codigo]);
    $persona = $sentencia->fetch(PDO::FETCH_OBJ);

?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-5">

            <div class="card">
                <div class="card-header">
                    Editar datos:
                </div>

                <form class="p-4" method="POST" action="./editarProceso.php">
                    <div class="mb-3">
                        <label for="" class="form-label">Nombre:</label>
                        <input type="text" class="form-control" name="inputNombre" autocomplete="off" required value="<?php echo $persona->nombre ?>">
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Edad:</label>
                        <input type="number" name="inputEdad" id="" class="form-control" autocomplete="off" required value="<?php echo $persona->edad ?>">
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Signo:</label>
                        <input type="text" name="inputSigno" id="" class="form-control" autocomplete="off" required value="<?php echo $persona->signo ?>">
                    </div>

                    <div class="d-grid">
                        <input type="hidden" name="codigo" value="<?php echo $persona->codigo ?>">
                        <input type="submit" value="Editar datos" class="btn btn-warning">
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>



<?php include('./template/footer.php'); ?>