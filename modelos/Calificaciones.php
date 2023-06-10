<?php
require_once 'Conexion.php';

class Detalle extends Conexion{
    public $id_calificaciones;
    public $calif_alumno;
    public $calif_materia;
    public $calif_punteo;
    public $calif_resultado;
    public $detalle_situacion;

    public function __construct($args = [] )
    {
        $this->id_calificaciones = $args['id_calificaciones'] ?? null;
        $this->calif_alumno = $args['calif_alumno'] ?? '';
        $this->calif_materia = $args['calif_materia'] ?? '';
        $this->calif_punteo = $args['calif_punteo'] ?? '';
        $this->calif_resultado = $args['calif_resultado'] ?? '';
        $this->detalle_situacion = $args['detalle_situacion'] ?? '';
    }

    public function guardar(){
        $sql = "INSERT INTO calificaciones(calif_alumno, calif_materia, calif_punteo, calif_resultado, detalle_situacion) 
                VALUES ('$this->calif_alumno', '$this->calif_materia', '$this->calif_punteo', '$this->calif_resultado', '$this->detalle_situacion')";
        $resultado = self::ejecutar($sql);
        return $resultado;
    }

    public function buscar(){
        $sql = "SELECT alumnos.alu_nombre || ' ' || alumnos.alu_apellido AS Nombre, materias.ma_nombre, AVG(calificaciones.calif_punteo) AS Promedio
                FROM calificaciones
                JOIN alumnos ON calificaciones.calif_alumno = alumnos.id_alumnos
                JOIN materias ON calificaciones.calif_materia = materias.id_materias
                WHERE calificaciones.detalle_situacion = '1'
                GROUP BY alumnos.alu_nombre, alumnos.alu_apellido, materias.ma_nombre";

        $resultado = self::servir($sql);
        return $resultado;
    }
}
?>