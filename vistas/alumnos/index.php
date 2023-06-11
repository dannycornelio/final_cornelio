<?php include_once '../../includes/header.php'?>
<?php include_once '../../includes/navbar.php'?>
    <div class="container">
        <h1 class="text-center">Formulario de ingreso del alumno</h1>
        <div class="row justify-content-center">
            <form action="/practica_9/controladores/clientes/guardar.php" method="POST" class="col-lg-8 border bg-light p-3">
                <div class="row mb-3">
                    <div class="col">
                        <label for="cliente_nombre">Nombre del alumno</label>
                        <input type="text" name="cliente_nombre" id="cliente_nombre" class="form-control" required>
                    </div>
                    <div class="col">
                        <label for="cliente_apellido">Apellido del alumno</label>
                        <input type="text" name="cliente_apellido" id="cliente_apellido" class="form-control" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="cliente_nit">Grado del alumno</label>
                        <input type="text" name="cliente_nit" id="cliente_nit" class="form-control" required>
                    </div>
                    <div class="col">
                        <label for="cliente_nit">Arma del alumno</label>
                        <input type="text" name="cliente_nit" id="cliente_nit" class="form-control" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="cliente_nit">Nacionalidad del alumno</label>
                        <input type="text" name="cliente_nit" id="cliente_nit" class="form-control" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <button type="submit" class="btn btn-primary w-100">Guardar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php include_once '../../includes/footer.php'?>