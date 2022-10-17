<?php
class CategoryController{
    public function list($tabla){
        $registros = CategoryModel::listCategories($tabla);
        return $registros;
    }
    public static function show($field, $value){
        $registro = CategoryModel::showCategory("categories",$field, $value);
        return $registro;
    }
    public function create() {
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $name = Generales::sanar_datos($_POST["name"],"string",$errores,"nombre");
            $description = Generales::sanar_datos($_POST["description"],"string",$errores,"descripcion");
            $image =  'views/images/categories/'.Generales::foto($_FILES["file"], 'views/images/categories/');
            if(empty($errores)){
                $datos = compact('name','description', 'image');
                var_dump($datos);
                if(CategoryModel::addCategory("categories",$datos)):
                    ?>
                        <script>
                            sessionStorage.setItem('accion', 0);
                            sessionStorage.setItem('name', 'Creada con exito la categoria');
                            window.location='categories';
                        </script>
                    <?php
                else:
                    echo "<script>alert('Ha ocurrido un error');window.location='nuevoInmueble'</script>";
                endif;
            }
        }
    }
    public function updated($id){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            var_dump($_FILES['file']['size']);
            $name = Generales::sanar_datos($_POST["name"],"string",$errores,"nombre");
            $description = Generales::sanar_datos($_POST["description"],"string",$errores,"descripcion");
            if ($_FILES['file']['size'] == 0): 
                $image = $_POST['image'];
            else: 
                $image =  'views/images/categories/'.Generales::foto($_FILES["file"], 'views/images/categories/');
            endif;
            
            if(empty($errores)){
                $datos = compact('name','description', 'image');
                var_dump($datos);
                if(CategoryModel::updateCategory($datos,$id)):
                    ?>
                        <script>
                            sessionStorage.setItem('accion', 0);
                            sessionStorage.setItem('name', 'Actualizada con exito la categoria');
                        </script>
                    <?php
                    echo "<script>window.location='categories-$id'</script>";
                else:
                    echo "<script>alert('Ha ocurrido un error');window.location='panel'</script>";
                endif;
            }
        }
    }
    public static function deleted($id){
        $id = (int)$id;
        if(CategoryModel::delete($id)):
            ?>
                <script>
                    sessionStorage.setItem('accion', 0);
                    sessionStorage.setItem('name', 'Eliminada con exito la categoria');
                    window.location='panel';
                </script>
            <?php
        else:
            echo "<script>alert('Ha ocurrido un error');window.location='nuevoInmueble'</script>";
        endif;
    }
}