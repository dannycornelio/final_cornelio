<?php
require '../../modelos/Alumnos.php';


if($_POST['id_alumnos'] != '' && $_POST['alu_nombre'] != '' && $_POST['alu_apellido'] != '' && $_POST['alu_grado'] != '' && $_POST['alu_arma'] != '' && $_POST['alu_nac'] != ''){



    try {
        $alumno = new Alumno($_POST);
        
        $resultado = $alumno->modificar();

    } catch (PDOException $e) {
        $error = $e->getMessage();

    } catch (Exception $e2){
        $error = $e2->getMessage();
    }
}else{
    $error = "Faltaron campos por llenar";
}

?>
<?php include_once '../../includes/header.php'?>
<?php include_once '../../includes/navbar.php'?>

    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-6">
                <?php if($resultado): ?>
                    <div class="alert alert-success" role="alert">
                        La modificacion se realizo sin novedad!
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
                <a href="/final_cornelio/controladores/alumnos/buscar.php?alu_nombre=<?= $_POST['alu_nombre'] ?>" class="btn btn-info">Volver al formulario</a>
            </div>
        </div>
    </div>
    <?php include_once '../../includes/footer.php'?>