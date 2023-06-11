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
                        <label for="alu_nombre">Nombre del alumno</label>
                        <input type="text" name="alu_nombre" id="alu_nombre" class="form-control" required>
                    </div>
                    <div class="col">
                        <label for="alu_apellido">Apellido del alumno</label>
                        <input type="text" name="alu_apellido" id="alu_apellido" class="form-control" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="alu_grado">Grado del alumno</label>
                        <input type="text" name="alu_grado" id="alu_grado" class="form-control" required>
                    </div>
                    <div class="col">
                        <label for="alu_arma">Arma del alumno</label>
                        <input type="text" name="alu_arma" id="alu_arma" class="form-control" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="alu_nac">Nacionalidad del alumno</label>
                        <input type="text" name="alu_nac" id="alu_nac" class="form-control" required>
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