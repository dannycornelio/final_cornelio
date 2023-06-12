<?php include_once '../../includes/header.php'?>
<?php include_once '../../includes/navbar.php'?>

    <div class="container mt-5">
        <h1 class="text-center">Ingreso de materias</h1>
        <div class="row justify-content-center">
            <form action="/final_cornelio/controladores/materias/guardar.php" method="POST" class="col-lg-8 border bg-light p-3">
                <div class="row mb-3">
                    <div class="col">
                        <label for="ma_nombre">Ingrese el nombre del materias</label>
                        <input type="text" name="ma_nombre" id="ma_nombre" class="form-control">
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