<?php

abstract class Conexion{
    public static $conexion = null;

    private static function conectar(){
        try{ 
            self::$conexion = new PDO('informix:host=host.docker.internal; service=9088; database=final_cornelio; server=informix; protocol=onsoctcp;EnableScrollableCursors = 1;charset=utf8','informix','in4mix'); 
            self::$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e){
            echo "Error de conexion de BD";
            echo "<br>";
            echo $e->getMessage();
            exit;
        }

        return self::$conexion;
    }

    public static function ejecutar($sql){
        self::conectar();
        $sentencia = self::$conexion->prepare($sql);
        $resultado = $sentencia->execute();
        $id = self::$conexion->lastInsertId();
        self::$conexion = null;
        return [
            'resultado' => $resultado,
            'id' => $id
        ];
    }

    public static function servir($sql){
        self::conectar();
        $sentencia = self::$conexion->prepare($sql);
        $sentencia->execute();
        $resultados = $sentencia->fetchAll(PDO::FETCH_ASSOC);
        self::$conexion = null;
        return $resultados;
    }
}