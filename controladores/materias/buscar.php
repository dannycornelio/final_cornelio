<?php
require '../../modelos/Materias.php';
try {
    $materia = new Materia($_GET);
    
    $materias = $materia->buscar();
} catch (PDOException $e) {
    $error = $e->getMessage();
} catch (Exception $e2){
    $error = $e2->getMessage();
}

?>
<?php include_once '../../includes/header.php'?>
<?php include_once '../../includes/navbar.php'?>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <table class="table table-bordered table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>NO. </th>
                            <th>NOMBRE</th>
                            <th>MODIFICAR</th>
                            <th>ELIMINAR</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(count($materias) > 0):?>
                        <?php foreach($materias as $key => $materia) : ?>
                        <tr>
                            <td><?= $key + 1 ?></td>
                            <td><?= $materia['MA_NOMBRE'] ?></td>
                            <td><a class="btn btn-warning w-100" href="/final_cornelio/vistas/materias/modificar.php?id_materias=<?= $materia['ID_MATERIAS']?>">Modificar</a></td>
                            <td><a class="btn btn-danger w-100" href="/final_cornelio/controladores/materias/eliminar.php?id_materias=<?= $materia['ID_MATERIAS']?>">Eliminar</a></td>
                        </tr>
                        <?php endforeach ?>
                        <?php else :?>
                            <tr>
                                <td colspan="3">NO EXISTEN REGISTROS</td>
                            </tr>
                        <?php endif?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-4">
                <a href="/final_cornelio/vistas/materias/buscar.php" class="btn btn-info w-100">Volver al formulario</a>
            </div>
        </div>
    </div>
    <?php include_once '../../includes/footer.php'?>