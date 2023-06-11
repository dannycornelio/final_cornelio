<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require '../../modelos/Calificaciones.php';
require '../../modelos/RelacionMatAlum.php';
    try {
        $id = $_GET['id_calificaciones'];
        $calificacion = new Calificacion($_GET);
        $relacionmatalum = new RelacionMatAlum([
            'calf_materia' => $id
        ]);

        $calificaciones = $calificacion->buscar();
        $materias = $relacionmatalum->buscar();
        echo "<pre>";
        var_dump($calificaciones);
        echo "</pre>";
        echo "<pre>";
        var_dump($materias);
        echo "</pre>";
        exit;
        // $error = "NO se guardó correctamente";
    } catch (PDOException $e) {
        $error = $e->getMessage();
    } catch (Exception $e2){
        $error = $e2->getMessage();
    }
?>