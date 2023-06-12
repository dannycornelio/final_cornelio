<?php
require_once 'Conexion.php';

class RelacionMatAlum extends Conexion{
    public $id_mat_alum;
    public $ma_alumno;
    public $ma_materia;

    public function __construct($args = [] ){
        $this->id_mat_alum = $args['id_mat_alum'] ?? null;
        $this->ma_alumno = $args['ma_alumno'] ?? '';
        $this->ma_materia = $args['ma_materia'] ?? '';
    }

    public function guardar(){
        $sql = "INSERT INTO relacion_mat_alum(ma_alumno, ma_materia) VALUES ($this->ma_alumno, $this->ma_materia)";
        $resultado = self::ejecutar($sql);
        return $resultado;
    }

    public function buscar(){
        $sql = "SELECT * FROM relacion_mat_alum WHERE 1=1";
    
        if($this->id_mat_alum != null){
            $sql .= " AND id_mat_alum = $this->id_mat_alum";
        }
    
        if($this->ma_alumno != ''){
            $sql .= " AND ma_alumno = $this->ma_alumno";
        }
    
        if($this->ma_materia != ''){
            $sql .= " AND ma_materia = $this->ma_materia";
        }
    
        $resultado = self::servir($sql);
        return $resultado;
    }
    public function modificar(){
        $sql = "UPDATE relacion_mat_alum SET ma_alumno = $this->ma_alumno, ma_materia = $this->ma_materia WHERE id_mat_alum = $this->id_mat_alum";
        
        $resultado = self::ejecutar($sql);
        return $resultado;
    }

    public function eliminar(){
        $sql = "DELETE FROM relacion_mat_alum WHERE id_mat_alum = $this->id_mat_alum";
        
        $resultado = self::ejecutar($sql);
        
        return $resultado;
    }
}
?>