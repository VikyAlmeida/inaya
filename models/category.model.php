<?php
    require_once("conexion.php");

    class CategoriesModel{
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
            
            $query = "Insert into $tabla (name) values (?)";
            $result = $conexion->prepare($query);
            if($result->execute(array($datos["name"])))
            {return true;}
            else
            {return false;}
        }
        
        public function updateCategory($datos,$id){
            $tabla = "categories";	
            $consulta = "UPDATE $tabla SET name = ?  WHERE id like ?";
            $resultado = $this->conexion->prepare($consulta);
            if($resultado->execute(array($datos["name"],$id)))
            {return true;}
            else{return false;}
        }

        public function eliminar($id)
        {
            $tabla = "categories";
            $consulta = "DELETE FROM $tabla where id like '$id'";
            if($resultado = $this->conexion->exec($consulta))
            {return true;}
            else{return false;}
        }
    }
