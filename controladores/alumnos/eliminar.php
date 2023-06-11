<?php
require '../../modelos/Alumnos.php';
require '../../modelos/RelacionMatAlum.php';

try {

    if (isset($_GET['id_alumnos'])) {
        // Crear una instancia de la clase Alumno con el ID del alumno a eliminar
        $alumno = new Alumno(['id_alumnos' => $_GET['id_alumnos']]);

        // Eliminar el alumno
        $resultado_alumno = $alumno->eliminar();

        // Crear una instancia de la clase RelacionMatAlum con el ID del alumno a eliminar
        $relacion = new RelacionMatAlum(['ma_alumno' => $_GET['id_alumnos']]);

        // Eliminar las relaciones entre el alumno y las materias
        $resultado_relacion = $relacion->eliminar();

        // Verificar si tanto el alumno como las relaciones se eliminaron correctamente
        if ($resultado_alumno && $resultado_relacion) {
            $resultado = true;
        } else {
            $resultado = false;
        }
    } else {
        $resultado = false;
        $error .= "ID de alumno no proporcionado";
    }

} catch (Exception $e2) {
    $error .= $e2->getMessage();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Resultados</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <?php if($resultado): ?>
                    <div class="alert alert-success" role="alert">
                        Alumno eliminado exitosamente!
                    </div>
                <?php else :?>
                    <div class="alert alert-danger" role="alert">
                        Ocurrió un error: <?= $error ?>
                    </div>
                <?php endif ?>
              
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <a href="/final_cornelio/controladores/alumnos/buscar.php" class="btn btn-info">Volver al formulario</a>
            </div>
        </div>
    </div>
</body>
</html>