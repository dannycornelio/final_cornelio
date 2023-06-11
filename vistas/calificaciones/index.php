<?php
require_once '../../modelos/Alumnos.php';
require_once '../../modelos/Materias.php';

try {
    $alumno = new Alumno();
    $materia = new Materia();
    $alumnos = $alumno->buscar2();
    $materias = $materia->buscar();
} catch (PDOException $e) {
    $error = $e->getMessage();
} catch (Exception $e2){
    $error = $e2->getMessage();
}
?>

<?php include_once '../../includes/header.php'?>
<?php include_once '../../includes/navbar.php'?>

<div class="container">
    <h1 class="text-center">Formulario de ingreso de calificaciones</h1>
    <div class="row justify-content-center">
        <form action="/final_cornelio/controladores/calificaciones/guardar.php" method="POST" class="col-lg-8 border bg-light p-3">
            <div class="row mb-3">
                <div class="col">
                    <label for="calif_alumno">Alumno</label>
                    <select name="calif_alumno" id="calif_alumno" class="form-control">
                        <option value="">SELECCIONE...</option>
                        <?php foreach ($alumnos as $key => $alumno) : ?>
                            <option value="<?= $alumno['ID_ALUMNOS'] ?>"><?= $alumno['ALU_NOMBRE'] . ' ' . $alumno['ALU_APELLIDO'] ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
            </div>
            <hr>
            <h2>Detalle de materias</h2>
            <div class="row mb-3">
                <div class="col-lg-8">
                    <label for="materia1">Materia</label>
                    <select name="materia[]" id="materia1" class="form-control">
                        <option value="">SELECCIONE...</option>
                        <?php foreach ($materias as $key => $materia) : ?>
                            <option value="<?= $materia['ID_MATERIAS'] ?>"><?= $materia['MA_NOMBRE'] ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="col-lg-4">
                    <label for="calificacion1">Punteo</label>
                    <input type="number" step="any" name="calif_punteo[]" id="calificacion1" class="form-control">
                </div>
            </div>
            <!-- <div class="row mb-3">
                <div class="col-lg-4">
                    <label for="resultado1">Resultado</label>
                    <select name="calif_resultados[]" id="resultado1" class="form-control">
                        <option value="">SELECCIONE...</option>
                        <option value="gano">Ganó</option>
                        <option value="perdio">Perdió</option>
                    </select>
                </div>
            </div> -->
            <!-- <button type="submit" class="btn btn-primary">Guardar</button>
        </form> -->
    </div>
</div>
                <!-- <div class="row mb-3">
                    <div class="col-lg-8">
                        <label for="materia2">Segunda materia</label>
                        <select name="materia[]" id="materia2" class="form-control">
                            <option value="">SELECCIONE...</option>
                            <?php foreach ($materias as $key => $materia) : ?>
                                <option value="<?= $materia['ID_MATERIAS'] ?>"><?= $materia['MA_NOMBRE'] ?></option>
                            <?php endforeach?>
                        </select>
                    </div>
                    <div class="col-lg-4">
                        <label for="calificacion2">Calificacion</label>
                        <input type="number" step="any" name="calif_punteo[]" id="calificacion2" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-lg-8">
                        <label for="materia3">Tercera materia</label>
                        <select name="materia[]" id="materia3" class="form-control">
                            <option value="">SELECCIONE...</option>
                            <?php foreach ($materias as $key => $materia) : ?>
                                <option value="<?= $materia['ID_MATERIAS'] ?>"><?= $materia['MA_NOMBRE']?></option>
                            <?php endforeach?>
                        </select>
                    </div>
                    <div class="col-lg-4">
                        <label for="calificacion3">Calificacion</label>
                        <input type="number" step="any" name="calif_punteo[]" id="calificacion3" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-lg-8">
                        <label for="materia4">Cuarta materia</label>
                        <select name="materia[]" id="materia4" class="form-control">
                            <option value="">SELECCIONE...</option>
                            <?php foreach ($materias as $key => $materia) : ?>
                                <option value="<?= $materia['ID_MATERIAS'] ?>"><?= $materia['MA_NOMBRE'] ?></option>
                            <?php endforeach?>
                        </select>
                    </div>
                    <div class="col-lg-4">
                        <label for="calificacion4">Calificacion</label>
                        <input type="number" step="any" name="calif_punteo[]" id="calificacion4" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-lg-8">
                        <label for="materia5">Quinta materia</label>
                        <select name="materia[]" id="materia5" class="form-control">
                            <option value="">SELECCIONE...</option>
                            <?php foreach ($materias as $key => $materia) : ?>
                                <option value="<?= $materia['ID_MATERIAS'] ?>"><?= $materia['MA_NOMBRE'] ?></option>
                            <?php endforeach?>
                        </select>
                    </div>
                    <div class="col-lg-4">
                        <label for="calificacion5">Calificacion</label>
                        <input type="number" step="any" name="calif_punteo[]" id="calificacion5" class="form-control">
                    </div>
                </div> -->
                <div class="row mb-3">
                    <div class="col">
                        <button type="submit" class="btn btn-primary w-100">Guardar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php include_once '../../includes/footer.php'?>