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
        $sql = "INSERT INTO alumnos (alu_nombre, alu_apellido, alu_grado, alu_arma, alu_nac) 
                VALUES ('$this->alu_nombre', '$this->alu_apellido', '$this->alu_grado', '$this->alu_arma', '$this->alu_nac')";
        $resultado = self::ejecutar($sql);
        return $resultado;
    }

    public function buscar(){
        $sql = "SELECT * FROM alumnos WHERE detalle_situacion = '1'";

        if($this->alu_nombre != ''){
            $sql .= " AND alu_nombre LIKE '%$this->alu_nombre%'";
        }

        if($this->id_alumnos != null){
            $sql .= " AND id_alumnos = $this->id_alumnos";
        }

        $resultado = self::servir($sql);
        return $resultado;
    }

    public function modificar(){
        $sql = "UPDATE alumnos SET alu_nombre = '$this->alu_nombre', alu_apellido = '$this->alu_apellido',
                alu_grado = '$this->alu_grado', alu_arma = '$this->alu_arma', alu_nac = '$this->alu_nac'
                WHERE id_alumnos = $this->id_alumnos";
        
        $resultado = self::ejecutar($sql);
        return $resultado;
    }

    public function eliminar(){
        $sql = "UPDATE alumnos SET detalle_situacion = '0' WHERE id_alumnos = $this->id_alumnos";
        
        $resultado = self::ejecutar($sql);
        return $resultado;
    }
}

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
        $sql = "INSERT INTO materias (ma_nombre, detalle_situacion) 
                VALUES ('$this->ma_nombre', '$this->detalle_situacion')";
        $resultado = self::ejecutar($sql);
        return $resultado;
    }

    public function buscar(){
        $sql = "SELECT * FROM materias WHERE detalle_situacion = '1'";

        if($this->ma_nombre != ''){
            $sql .= " AND ma_nombre LIKE '%$this->ma_nombre%'";
        }

        if($this->id_materias != null){
            $sql .= " AND id_materias = $this->id_materias";
        }

        $resultado = self::servir($sql);
        return $resultado;
    }

    public function modificar(){
        $sql = "UPDATE materias SET ma_nombre = '$this->ma_nombre'
                WHERE id_materias = $this->id_materias";
        
        $resultado = self::ejecutar($sql);
        return $resultado;
    }

    public function eliminar(){
        $sql = "UPDATE materias SET detalle_situacion = '0' WHERE id_materias = $this->id_materias";
        
        $resultado = self::ejecutar($sql);
        return $resultado;
    }
}

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
        $sql = "INSERT INTO calificaciones (calif_alumno, calif_materia, calif_punteo, calif_resultado, detalle_situacion) 
                VALUES ('$this->calif_alumno', '$this->calif_materia', '$this->calif_punteo', '$this->calif_resultado', '$this->detalle_situacion')";
        $resultado = self::ejecutar($sql);
        return $resultado;
    }

    public function buscar(){
        $sql = "SELECT alumnos.alu_nombre || ' ' || alu_apellido AS Nombre, alumnos.alu_grado, alumnos.alu_arma, alumnos.alu_nac, 
                materias.ma_nombre, calificaciones.calif_punteo, calificaciones.calif_resultado
                FROM alumnos
                JOIN calificaciones ON alumnos.id_alumnos = calificaciones.calif_alumno
                JOIN materias ON calificaciones.calif_materia = materias.id_materias
                WHERE calificaciones.detalle_situacion = '1'
                ORDER BY alumnos.alu_nombre, materias.ma_nombre, calificaciones.id_calificaciones";

        $resultado = self::servir($sql);
        return $resultado;
    }

    public function calcularPromedio(){
        $sql = "SELECT alumnos.alu_nombre || ' ' || alu_apellido AS Nombre, AVG(calificaciones.calif_punteo) AS Promedio
                FROM alumnos
                JOIN calificaciones ON alumnos.id_alumnos = calificaciones.calif_alumno
                GROUP BY alumnos.alu_nombre";

        $resultado = self::servir($sql);
        return $resultado;
    }

    public function modificar(){
        $sql = "UPDATE calificaciones SET calif_alumno = '$this->calif_alumno', calif_materia = '$this->calif_materia',
                calif_punteo = '$this->calif_punteo', calif_resultado = '$this->calif_resultado'
                WHERE id_calificaciones = $this->id_calificaciones";
        
        $resultado = self::ejecutar($sql);
        return $resultado;
    }

    public function eliminar(){
        $sql = "UPDATE calificaciones SET detalle_situacion = '0' WHERE id_calificaciones = $this->id_calificaciones";
        
        $resultado = self::ejecutar($sql);
        return $resultado;
    }
}

class Producto extends Conexion{
    public $producto_id;
    public $producto_nombre;
    public $producto_precio;
    public $producto_situacion;

    public function __construct($args = [] )
    {
        $this->producto_id = $args['producto_id'] ?? null;
        $this->producto_nombre = $args['producto_nombre'] ?? '';
        $this->producto_precio = $args['producto_precio'] ?? '';
        $this->producto_situacion = $args['producto_situacion'] ?? '';
    }

    public function guardar(){
        $sql = "INSERT INTO productos (producto_nombre, producto_precio) 
                VALUES ('$this->producto_nombre', '$this->producto_precio')";
        $resultado = self::ejecutar($sql);
        return $resultado;
    }

    public function buscar(){
        $sql = "SELECT * FROM productos WHERE producto_situacion = '1'";

        if($this->producto_nombre != ''){
            $sql .= " AND producto_nombre LIKE '%$this->producto_nombre%'";
        }

        if($this->producto_precio != ''){
            $sql .= " AND producto_precio = $this->producto_precio";
        }

        if($this->producto_id != null){
            $sql .= " AND producto_id = $this->producto_id";
        }

        $resultado = self::servir($sql);
        return $resultado;
    }

    public function modificar(){
        $sql = "UPDATE productos SET producto_nombre = '$this->producto_nombre', producto_precio = $this->producto_precio
                WHERE producto_id = $this->producto_id";
        
        $resultado = self::ejecutar($sql);
        return $resultado;
    }

    public function eliminar(){
        $sql = "UPDATE productos SET producto_situacion = '0' WHERE producto_id = $this->producto_id";
        
        $resultado = self::ejecutar($sql);
        return $resultado;
    }
}

class Venta extends Conexion{
    public $venta_id;
    public $venta_cliente;
    public $venta_fecha;
    public $venta_situacion;

    public function __construct($args = [] )
    {
        $this->venta_id = $args['venta_id'] ?? null;
        $this->venta_cliente = $args['venta_cliente'] ?? '';
        $this->venta_fecha = $args['venta_fecha'] ?? '';
        $this->venta_situacion = $args['venta_situacion'] ?? '';
    }

    public function guardar(){
        $sql = "INSERT INTO ventas (venta_cliente, venta_fecha) 
                VALUES ('$this->venta_cliente', '$this->venta_fecha')";
        $resultado = self::ejecutar($sql);
        return $resultado;
    }

    public function buscar(){
        $sql = "SELECT detalle_id, cliente_nombre, venta_fecha, producto_nombre, producto_precio, detalle_cantidad, 
                (producto_precio * detalle_cantidad) AS total 
                FROM ventas 
                INNER JOIN clientes ON venta_cliente = cliente_id  
                INNER JOIN detalle_ventas ON venta_id = detalle_venta
                INNER JOIN productos ON detalle_producto = producto_id
                WHERE venta_situacion = '1'";

        if($this->venta_cliente != ''){
            $sql .= " AND cliente_nombre LIKE '%$this->venta_cliente%'";
        }

        if($this->venta_fecha != ''){
            $sql .= " AND venta_fecha = '$this->venta_fecha'";
        }

        if($this->venta_id != null){
            $sql .= " AND venta_id = $this->venta_id";
        }

        $resultado = self::servir($sql);
        return $resultado;
    }

    public function modificar(){
        $sql = "UPDATE ventas SET venta_cliente = $this->venta_cliente, venta_fecha = '$this->venta_fecha'
                WHERE venta_id = $this->venta_id";
        
        $resultado = self::ejecutar($sql);
        return $resultado;
    }

    public function eliminar(){
        $sql = "UPDATE ventas SET venta_situacion = '0' WHERE venta_id = $this->venta_id";
        
        $resultado = self::ejecutar($sql);
        return $resultado;
    }
}
?>
