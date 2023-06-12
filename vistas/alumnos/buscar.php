<?php include_once '../../includes/header.php'?>
<?php include_once '../../includes/navbar.php'?>

    <div class="container mt-5">
        <h1 class="text-center">Buscar alumnos</h1>
        <div class="row justify-content-center">
            <form action="/final_cornelio/controladores/alumnos/buscar.php" method="GET" class="col-lg-8 border bg-light p-3">
                <div class="row mb-3">
                    <div class="col">
                        <label for="alu_nombre">Nombre</label>
                        <input type="text" name="alu_nombre" id="alu_nombre" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="alu_apellido">Apellido</label>
                        <input type="text" name="alu_apellido" id="alu_apellido" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <button type="submit" class="btn btn-info w-100">Buscar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


    
    <?php include_once '../../includes/footer.php'?>