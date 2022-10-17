<?php
    require_once("conexion.php");

    class CategoryModel{
        public static function listCategories($tabla){            
            $conexion = Conectar::conectate();

            $result = $conexion->prepare("SELECT * FROM $tabla");
            $result->execute();
            return $result->fetchAll();

            $result = null;
        }
        
        public static function showCategory($tabla, $field, $value){            
            $conexion = Conectar::conectate();

            $query = "SELECT * FROM $tabla where $field like '$value'";
            $result = $conexion->prepare($query);
            $result->execute();
            return $result->fetch();

            $result = null;
        }

        public static function addCategory($tabla,$datos){
            $conexion = Conectar::conectate();
            
            $query = "Insert into $tabla (name, image, description) values (?, ?, ?)";
            $result = $conexion->prepare($query);
            if($result->execute(array($datos["name"], $datos["image"], $datos["description"])))
            {return true;}
            else
            {return false;}
        }
        
        public static function updateCategory($datos,$id){
            $conexion = Conectar::conectate();

            $tabla = "categories";	
            $consulta = "UPDATE $tabla SET name = ?, image = ?, description = ? WHERE id like ?";
            $resultado = $conexion->prepare($consulta);
            if($resultado->execute(array($datos["name"],$datos["image"],$datos["description"],$id)))
            {return true;}
            else{return false;}
        }

        public static function delete($id) {
            $conexion = Conectar::conectate();

            $tabla = "categories";
            $query = "DELETE FROM $tabla where id like '$id'";
            if($conexion->exec($query))
            {return true;}
            else{return false;}
        }
    }
