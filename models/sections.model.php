<?php
    require_once("conexion.php");

    class SectionModel{
        public static function listSections($tabla,$field, $value){            
            $conexion = Conectar::conectate();

            $result = $conexion->prepare("SELECT * FROM $tabla where $field like '$value'");
            $result->execute();
            return $result->fetchAll();

            $result = null;
        }
        
        public static function showSections($tabla, $field, $value){            
            $conexion = Conectar::conectate();

            $query = "SELECT * FROM $tabla where $field like '$value'";
            $result = $conexion->prepare($query);
            $result->execute();
            return $result->fetch();

            $result = null;
        }

        public static function addSection($tabla,$datos){
            $conexion = Conectar::conectate();
            
            $query = "Insert into $tabla (name, category_id, format_id) values (?, ?, ?)";
            $result = $conexion->prepare($query);
            if($result->execute(array($datos["name"], $datos["category_id"], $datos["format_id"])))
            {return true;}
            else
            {return false;}
        }
        
        public static function updateSection($datos,$id){
            $conexion = Conectar::conectate();

            $tabla = "sections";
            $consulta = "UPDATE $tabla SET name = ?, category_id = ?, format_id = ? WHERE id like ?";
            $resultado = $conexion->prepare($consulta);
            if($resultado->execute(array($datos["name"], $datos["category_id"], $datos["format_id"],$id)))
            {return true;}
            else{return false;}
        }

        public static function delete($id) {
            $conexion = Conectar::conectate();

            $tabla = "sections";
            $query = "DELETE FROM $tabla where id like '$id'";
            if($conexion->exec($query))
            {return true;}
            else{return false;}
        }
    }
