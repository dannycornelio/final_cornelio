<?php
require_once 'Conexion.php';


class Alumno extends Conexion{
    public $id_alumnos;
    public $alu_nombre;
    public $alu_apellido;
    public $alu_grado;
    public $alu_arma;
    public $alu_nac;
    public $detalle_situacion;

    public function __construct($args = [] )
    {
        $this->id_alumnos = $args['id_alumnos'] ?? null;
        $this->alu_nombre = $args['alu_nombre'] ?? '';
        $this->alu_apellido = $args['alu_apellido'] ?? '';
        $this->alu_grado = $args['alu_grado'] ?? '';
        $this->alu_arma = $args['alu_arma'] ?? '';
        $this->alu_nac = $args['alu_nac'] ?? '';
        $this->detalle_situacion = $args['detalle_situacion'] ?? '1';
    }

    public function guardar(){
        $sql = "INSERT INTO alumnos(alu_nombre, alu_apellido, alu_grado, alu_arma, alu_nac) VALUES ('$this->alu_nombre', '$this->alu_apellido', '$this->alu_grado', '$this->alu_arma', '$this->alu_nac')";
        $resultado = self::ejecutar($sql);
        return $resultado;
    }

    public function buscar(){
        $sql = "SELECT * FROM alumnos where detalle_situacion != 0 ";

        if($this->alu_nombre != null && $this->alu_nombre != ''){
            $sql .= "AND alu_nombre = '$this->alu_nombre'";
        }

        if($this->alu_apellido != null && $this->alu_apellido != ''){
            $sql .= " AND alu_apellido = '$this->alu_apellido'";
        }

        $resultado = self::servir($sql);
        return $resultado;
    }


    public function buscar2(){
        $sql = "SELECT * FROM alumnos WHERE ";

        if($this->id_alumnos != null){
            $sql .= " id_alumnos = $this->id_alumnos";
        }
        $resultado = self::servir($sql);
        return $resultado;
    }

    public function modificar(){
        $sql = "UPDATE alumnos SET alu_nombre = '$this->alu_nombre', alu_apellido = '$this->alu_apellido', alu_grado = '$this->alu_grado', alu_arma = '$this->alu_arma', alu_nac = '$this->alu_nac' where id_alumnos = '$this->id_alumnos'";

      
        $resultado = self::ejecutar($sql);
        return $resultado;
    }

    public function eliminar(){
        $sql = "UPDATE alumnos SET detalle_situacion = 0 WHERE id_alumnos = $this->id_alumnos";
        
        $resultado = self::ejecutar($sql);
        return $resultado;
    }
}
