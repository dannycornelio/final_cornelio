<?php
require '../../modelos/Alumnos.php';
    try {
        $alumno = new Alumno($_GET);

        $alumnos = $alumno->buscar();
       
    } catch (PDOException $e) {
        $error = $e->getMessage();
    } catch (Exception $e2){
        $error = $e2->getMessage();
    }
?>
<?php include_once '../../includes/header.php'?>
    <div class="container">
        <h1 class="text-center">Modificar alumnos</h1>
        <div class="row justify-content-center">
            <form action="/final_cornelio/controladores/alumnos/guardar.php" method="POST" class="col-lg-8 border bg-light p-3">
                <input type="hidden" name="cliente_id">
                <div class="row mb-3">
                    <div class="col">
                        <label for="cliente_nombre">Nombre del alumno</label>
                        <input type="text" name="cliente_nombre" id="cliente_nombre" class="form-control" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="cliente_nit">Nit del alumno</label>
                        <input type="text" name="cliente_nit" id="cliente_nit" class="form-control" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <button type="submit" class="btn btn-warning w-100">Modificar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php include_once '../../includes/footer.php'?>