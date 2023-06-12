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
        <h1 class="text-center">Modificar Materias</h1>
        <div class="row justify-content-center">
            <form action="/final_cornelio/controladores/materias/modificar.php" method="POST" class="col-lg-8 border bg-light p-3">
                <input type="hidden" name="id_materias" value="<?= $materias[0]['id_materias'] ?>" >
                <div class="row mb-3">
                    <div class="col">
                        <label for="ma_nombre">Nombre del materia</label>
                        <input type="text" name="ma_nombre" id="ma_nombre" class="form-control" value="<?= $materias[0]['ma_nombre'] ?>">
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