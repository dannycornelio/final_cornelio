
<?php
require_once 'Conexion.php';

class Calificacion extends Conexion{
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
        $this->detalle_situacion = $args['detalle_situacion'] ?? '1';
    }

    public function guardar(){
        $sql = "INSERT INTO calificaciones(calif_alumno, calif_materia, calif_punteo, calif_resultado) VALUES ($this->calif_alumno, $this->calif_materia, $this->calif_punteo, '$this->calif_resultado')";
        $resultado = self::ejecutar($sql);
        return $resultado;
    }

    public function buscar(){
        $sql = "SELECT * FROM calificaciones WHERE detalle_situacion = '1'";

        if($this->id_calificaciones != null){
            $sql .= " AND id_calificaciones = $this->id_calificaciones";
        }

        if($this->calif_alumno != ''){
            $sql .= " AND calif_alumno = $this->calif_alumno";
        }

        if($this->calif_materia != ''){
            $sql .= " AND calif_materia = $this->calif_materia";
        }

        $resultado = self::servir($sql);
        return $resultado;
    }

    public function buscar2(){
        $sql = "SELECT materias.ma_nombre as calif_materia, 
        calificaciones.calif_punteo as calif_punteo, 
        calificaciones.calif_resultado as calif_resultado  
        FROM calificaciones INNER JOIN materias ON 
        materias.id_materias = calificaciones.calif_materia 
        WHERE calificaciones.detalle_situacion = '1'";

        if($this->calif_alumno != ''){
            $sql .= " AND calificaciones.calif_alumno = $this->calif_alumno";
        }

        $resultado = self::servir($sql);
        return $resultado;
    }

    public function modificar(){
        $sql = "UPDATE calificaciones SET calif_punteo = $this->calif_punteo, calif_resultado = '$this->calif_resultado' WHERE id_calificaciones = $this->id_calificaciones";
        
        $resultado = self::ejecutar($sql);
        return $resultado;
    }

    public function eliminar(){
        $sql = "UPDATE calificaciones SET detalle_situacion = '0' WHERE id_calificaciones = $this->id_calificaciones";
        
        $resultado = self::ejecutar($sql);
        return $resultado;
    }

    public function promedio(){
        $sql = "SELECT AVG(calif_punteo) as promedio FROM calificaciones WHERE calif_alumno = $this->calif_alumno AND detalle_situacion = '1'";
        
        $resultado = self::servir($sql);
        return $resultado;
    }
}