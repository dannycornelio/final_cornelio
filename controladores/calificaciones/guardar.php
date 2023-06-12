<?php
require_once '../../modelos/Calificaciones.php';
require_once '../../modelos/RelacionMatAlum.php';

function nota_literal($nota){
    if($nota >= 70){
        return "Gano";
    }else{
        return "Perdio";
    }
}
if(isset($_POST)){

    if($_POST['calif_alumno'] != '' && $_POST['calif_materia'] != '' && $_POST['calif_punteo'] != ''){

        $calif_alumno = $_POST['calif_alumno'];
        $calif_materia = $_POST['calif_materia'];
        $calif_punteo = $_POST['calif_punteo'];
        $calif_resultado = nota_literal($calif_punteo);

        $arg = [
            'calif_alumno' => $calif_alumno,
            'calif_materia' => $calif_materia,
            'calif_punteo' => $calif_punteo,
            'calif_resultado' => $calif_resultado
        ];
        
        try {
            $calificacion = new Calificacion($arg);
            $resultado = $calificacion->guardar();
            $error = "NO se guardó correctamente";
        } catch (PDOException $e) {
            $error = $e->getMessage();
        } catch (Exception $e2){
            $error = $e2->getMessage();
        }
    }else{
        $error = "Debe llenar todos los datos";
    }

}else{
    $error = "No se recibieron datos";
}

?>
<?php include_once '../../includes/header.php'?>
<?php include_once '../../includes/navbar.php'?>

    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-6">
                <?php if($resultado): ?>
                    <div class="alert alert-success" role="alert">
                        Guardado exitosamente!
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
                <a href="/final_cornelio/vistas/calificaciones/index.php" class="btn btn-info">Volver al formulario</a>
            </div>
        </div>
    </div>
    <?php include_once '../../includes/footer.php'?>
