<!-- Incluyendo el header -->
<?php include('./template/header.php'); ?>

<?php

include_once "model/conexion.php";
$sentencia = $bd->query("SELECT * FROM empleados");
$persona = $sentencia->fetchAll(PDO::FETCH_OBJ);
// print_r($persona);


?>


<!-- Construyendo el cuerpo del sitio web -->
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-7">

            <!-- Inicio de la Alerta -->
            <?php
            if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'falta') {
            ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

                    <strong>ERROR!</strong> Por favor comprueba que todos los campos del formulario contengan datos.
                </div>
            <?php
            }
            ?>

            <?php
            if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'registrado') {
            ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

                    <strong>REGISTRADO!</strong> El empleado ha sido registrado en la base de datos con éxito.
                </div>
            <?php
            }
            ?>


            <?php
            if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'error') {
            ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

                    <strong>ERROR!</strong> Vuelve a intentarlo.
                </div>
            <?php
            }
            ?>

            <?php
            if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'editado') {
            ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

                    <strong>EDITADO!</strong> Los datos del empleado fueron actualizados.
                </div>
            <?php
            }
            ?>

            <?php
            if (isset($_GET['mensaje']) and $_GET['mensaje'] == 'eliminado') {
            ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

                    <strong>ELIMINADO!</strong> El empleado ha sido eliminado con éxito.
                </div>
            <?php
            }
            ?>
            <!-- Fin de la Alerta -->



            <div class="card">
                <div class="card-header">
                    Lista de Empleados
                </div>
                <div class="p-4">
                    <table class="table align-middle">
                        <thead>
                            <!-- Encabezados de la tabla -->
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Edad</th>
                                <th scope="col">Signo</th>
                                <th scope="col" colspan="2">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Registros de la BD -->
                            <?php
                            foreach ($persona as $dato) {

                            ?>
                                <tr>
                                    <td scope="row"><?php echo $dato->codigo ?></td>
                                    <td><?php echo $dato->nombre ?></td>
                                    <td><?php echo $dato->edad ?></td>
                                    <td><?php echo $dato->signo ?></td>
                                    <td><a class="text-info" href="./editar.php?codigo=<?php echo $dato->codigo ?>"><i class="bi bi-pencil-square"></i></a></td>
                                    <td><a class="text-danger" onclick="return confirm('Estas seguro de eliminar este empleado?');" href="./eliminar.php?codigo=<?php echo $dato->codigo ?>"><i class="bi bi-trash3"></i></a></td>
                                </tr>

                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


        <div class="col-md-5">
            <div class="card">
                <div class="card-header">
                    Ingresar datos:
                </div>

                <form class="p-4" method="POST" action="./registrar.php">
                    <div class="mb-3">
                        <label for="" class="form-label">Nombre:</label>
                        <input type="text" class="form-control" name="inputNombre" autofocus autocomplete="off" required>
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Edad:</label>
                        <input type="number" name="inputEdad" id="" class="form-control" autocomplete="off" required>
                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Signo:</label>
                        <input type="text" name="inputSigno" id="" class="form-control" autocomplete="off" required>
                    </div>

                    <div class="d-grid">
                        <input type="hidden" name="oculto" value="1">
                        <input type="submit" value="Registrar" class="btn btn-primary">
                    </div>

            </div>
            </form>
        </div>
    </div>
</div>
</div>






<?php include('./template/footer.php'); ?>