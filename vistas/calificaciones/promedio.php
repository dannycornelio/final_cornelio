<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//require '../../modelos/Venta.php';
require '../../modelos/Calificaciones.php';
require '../../modelos/Alumnos.php';
    try {
        $id = $_GET['id_calificacies'];
        $calificacion = new Calificacion();

        $promedio = $calificacion->promedio($id);

 
        $subpromedio = 0;
        $nota = 0;
    } catch (PDOException $e) {
        $error = $e->getMessage();
    } catch (Exception $e2){
        $error = $e2->getMessage();
    }
?>
<?php include_once '../../includes/header.php'?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>FACTURA</title>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 table-responsive">
            <table class="table table-bordered">
    <thead>
        <tr class="text-center table-dark">
            <th colspan="3">DETALLE DE LA FACTURA.</th>
        </tr>
    </thead>
    <tbody>
               <tr>
            <td><strong>NOMBRE:</strong></td>
            <?php foreach ($promedio as $key => $calificacion) : ?>
                <td><?= $calificacion['ALU_NOMBRE'] . ' ' . $calificacion['ALU_APELLIDO'] ?></td>
            <?php endforeach ?>
        </tr>
        <tr>
            <td><strong>GRADO:</strong></td>
            <?php foreach ($promedio as $key => $calificacion) : ?>
                <td><?= $calificacion['ALU_GRADO'] ?></td>
            <?php endforeach ?>
        </tr>
        <tr>
            <td><strong>ARMA:</strong></td>
            <?php foreach ($promedio as $key => $calificacion) : ?>
                <td><?= $calificacion['ALU_ARMA'] ?></td>
            <?php endforeach ?>
        </tr>
        <tr>
            <td><strong>NACIONALIDAD:</strong></td>
            <?php foreach ($promedio as $key => $calificacion) : ?>
                <td><?= $calificacion['ALU_NAC'] ?></td>
            <?php endforeach ?>
        </tr>
        <?php if (count($promedio) == 0) : ?>
            <tr>
                <td colspan="3">NO EXISTEN REGISTROS</td>
            </tr>
        <?php endif ?>
    </tbody>
</table>
            </div>
        </div>

        <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 table-responsive">
                <table class="table table-bordered">
                    <thead >
                        <tr class="text-center table-dark">
                            <th colspan="7">MATERIAS</th>
                        </tr>
                    <thead class="table-dark">
                        <tr>
                            <th>NO.</th>
                            <th>MATERIA</th>
                            <th>PUNTEO</th>
                            <th>GANO/PERDIO</th>
                       </tr>
                    </thead>
                    <tbody>
                        <?php if (count($promedio) > 0) : ?>
                            <?php foreach ($promedio as $key => $calificacion) : ?>
                                <tr>
                                    <td><?= $key + 1 ?></td>
                                    <td><?= $calificacion ['MA_NOMBRE'] ?></td>
                                    <td><?= $calificacion['CALIF_PUNTEO'] ?></td>
                                    <td><?= $calificacion['CALIF_RESULTADO'] ?></td>                 
                                </tr>
                            <?php endforeach ?>
                        <?php else : ?>
                            <tr>
                                <td colspan="8">NO EXISTEN REGISTROS</td>
                            </tr>
                        <?php endif ?>
                        <tr>
                        <td colspan="4">PROMEDIO:</td>
                        <td><?= $calificacion['PROMEDIO'] ?></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-4">
                <a href="/final_cornelio/vistas/calificaciones/buscar.php" class="btn btn-info w-100">Volver al formulario</a>
            </div>
        </div>
    </div>
</body>
</html>