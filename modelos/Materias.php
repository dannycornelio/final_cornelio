<?php
require_once 'Conexion.php';
    
    class Materia extends Conexion{
        public $id_materias;
        public $ma_nombre;
        public $detalle_situacion;
    
        public function __construct($args = [] )
        {
            $this->id_materias = $args['id_materias'] ?? null;
            $this->ma_nombre = $args['ma_nombre'] ?? '';
            $this->detalle_situacion = $args['detalle_situacion'] ?? '1';
        }
    
        public function guardar(){
            $sql = "INSERT INTO materias(ma_nombre) VALUES ('$this->ma_nombre')";
            $resultado = self::ejecutar($sql);
            return $resultado;
        }
    
        public function buscar(){
            $sql = "SELECT * FROM materias WHERE detalle_situacion = 1";
    
            if($this->id_materias != null){
                $sql .= " AND id_materias = '$this->id_materias'";
            }
    
            $resultado = self::servir($sql);
            return $resultado;
        }
    
        public function modificar(){
            $sql = "UPDATE materias SET ma_nombre = '$this->ma_nombre' WHERE id_materias = $this->id_materias";
            
            $resultado = self::ejecutar($sql);
            return $resultado;
        }
    
        public function eliminar() {
            $sql = "UPDATE materias SET detalle_situacion = '0' WHERE id_materias = $this->id_materias";
            
            $resultado = self::ejecutar($sql);
            return $resultado;
        }
    }