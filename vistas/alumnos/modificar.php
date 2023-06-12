<?php
require '../../modelos/Alumnos.php';
    try {
        $alumno = new Alumno($_GET);

        $alumnos = $alumno->buscar2();
       
    } catch (PDOException $e) {
        $error = $e->getMessage();
    } catch (Exception $e2){
        $error = $e2->getMessage();
    }
?>
<?php include_once '../../includes/header.php'?>
<?php include_once '../../includes/navbar.php'?>

    <div class="container mt-5">
        <h1 class="text-center">Modificar alumnos</h1>
        <div class="row justify-content-center">
            <form action="/final_cornelio/controladores/alumnos/modificar.php" method="POST" class="col-lg-8 border bg-light p-3">
                <!-- <input type="hidden" name="cliente_id"> -->
                <input type="hidden" name="id_alumnos"  value="<?= $alumnos[0]['ID_ALUMNOS'] ?>" >

                <div class="row mb-3">
                <div class="col">
                        <label for="alu_nombre">Nombre del alumno</label>
                        <input type="text" name="alu_nombre" id="alu_nombre" class="form-control" value="<?= $alumnos[0]['ALU_NOMBRE'] ?>" required>
                    </div>
                    <div class="col">
                        <label for="alu_apellido">Apellido del alumno</label>
                        <input type="text" name="alu_apellido" id="alu_apellido" value="<?= $alumnos[0]['ALU_APELLIDO'] ?>" class="form-control" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="alu_grado">Grado del alumno</label>
                        <input type="text" name="alu_grado" id="alu_grado" value="<?= $alumnos[0]['ALU_GRADO'] ?>" class="form-control" required>
                    </div>
                    <div class="col">
                        <label for="alu_arma">Arma del alumno</label>
                        <input type="text" name="alu_arma" id="alu_arma" value="<?= $alumnos[0]['ALU_ARMA'] ?>" class="form-control" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="alu_nac">Nacionalidad del alumno</label>
                        <input type="text" name="alu_nac" id="alu_nac" value="<?= $alumnos[0]['ALU_NAC'] ?>" class="form-control" required>
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

