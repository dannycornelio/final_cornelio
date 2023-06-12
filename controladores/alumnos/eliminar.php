<?php
require '../../modelos/Alumnos.php';
require '../../modelos/RelacionMatAlum.php';

try {

    if (isset($_GET['id_alumnos'])) {
        // Crear una instancia de la clase Alumno con el ID del alumno a eliminar
        $alumno = new Alumno(['id_alumnos' => $_GET['id_alumnos']]);

        // Eliminar el alumno
        if($alumno->eliminar()){

            $resultado = true;

        }else{
            $resultado = false;
            throw new Exception("Error al eliminar el alumno");
        }

        // Crear una instancia de la clase RelacionMatAlum con el ID del alumno a eliminar
        $relacion = new RelacionMatAlum(['ma_alumno' => $_GET['id_alumnos']]);

        // Eliminar las relaciones entre el alumno y las materias
        if($relacion->eliminar()){

            $resultado = true;
            
        }else{
            
            $resultado = false;
            throw new Exception("Error al eliminar las relaciones entre el alumno y las mater");
            
        }

    } else {
        $resultado = false;
        $error .= "ID de alumno no proporcionado";
    }

}catch (PDOException $ex){
    $error .= $ex->getMessage();

}catch (Exception $e2) {
    $error .= $e2->getMessage();
}
?>

<?php include_once '../../includes/header.php'?>
<?php include_once '../../includes/navbar.php'?>

    <div class="container mt-5">
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
    <?php include_once '../../includes/footer.php'?>