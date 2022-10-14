<?php
    require_once("conexion.php");

    class UsuarioModel{
        public static function where($tabla,$condicion){
            $conexion = Conectar::conectate();
            
            $sentencia = $conexion->prepare("SELECT * FROM $tabla where ".$condicion);
            $sentencia->execute();
            if($sentencia->rowCount()>1):
                return $sentencia->fetchAll();
            else:
                return $sentencia->fetch();
            endif;

            $sentencia = null;
        }
        public static function insert($tabla,$datos){
            $conexion = Conectar::conectate();
            
            $consulta = "Insert into $tabla(usuario,pass,nombre)values(?,?,?)";
            $resultado = $conexion->prepare($consulta);
            if($resultado->execute(array($datos["usuario"],$datos["pass"],$datos["nombre"])))
            {return true;}
            else
            {return false;}
        }
    }