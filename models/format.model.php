<?php
    require_once("conexion.php");

    class FormatModel{
        public static function listFormats($tabla){            
            $conexion = Conectar::conectate();

            $result = $conexion->prepare("SELECT * FROM $tabla");
            $result->execute();
            return $result->fetchAll();

            $result = null;
        }
        
        public static function showFormat($tabla, $field, $value){            
            $conexion = Conectar::conectate();

            $query = "SELECT * FROM $tabla where $field like '$value'";
            $result = $conexion->prepare($query);
            $result->execute();
            return $result->fetch();

            $result = null;
        }

        public static function addFormat($tabla,$datos){
            $conexion = Conectar::conectate();
            
            $query = "Insert into $tabla (name, description) values (?, ?)";
            $result = $conexion->prepare($query);
            if($result->execute(array($datos["name"], $datos["description"])))
            {return true;}
            else
            {return false;}
        }
        
        public static function updateFormat($datos,$id){
            $conexion = Conectar::conectate();

            $tabla = "formats";
            $consulta = "UPDATE $tabla SET name = ?, description = ? WHERE id like ?";
            $resultado = $conexion->prepare($consulta);
            if($resultado->execute(array($datos["name"],$datos["description"],$id)))
            {return true;}
            else{return false;}
        }

        public static function delete($id) {
            $conexion = Conectar::conectate();

            $tabla = "formats";
            $query = "DELETE FROM $tabla where id like '$id'";
            if($conexion->exec($query))
            {return true;}
            else{return false;}
        }
    }
