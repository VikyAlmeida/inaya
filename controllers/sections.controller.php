<?php
class sectionController{
    public function list($tabla,$field, $value){
        $registros = SectionModel::listSections($tabla, $field, $value);
        return $registros;
    }
    public static function show($field, $value){
        $registro = SectionModel::showSections("sections",$field, $value);
        return $registro;
    }
    public function create() {
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $name = Generales::sanar_datos($_POST["name"],"string",$errores,"nombre");
            $category_id = $_POST["category_id"];
            $format_id = $_POST["format_id"];

            if(empty($errores)){
                $datos = compact('name', 'category_id', 'format_id');
                if(SectionModel::addSection("sections",$datos)):
                    ?>
                        <script>
                            sessionStorage.setItem('accion', 0);
                            sessionStorage.setItem('name', 'Creada con exito la seccion');
                            window.location='panel';
                        </script>
                    <?php
                else:
                    echo "<script>alert('Ha ocurrido un error');window.location='panel'</script>";
                endif;
            }
        }
    }
    public function updated($id){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $name = Generales::sanar_datos($_POST["name"],"string",$errores,"nombre");
            $category_id = $_POST["category_id"];
            $format_id = $_POST["format_id"];
            
            if(empty($errores)){
                $datos = compact('name', 'category_id', 'format_id');
                if(SectionModel::updateSection($datos,$id)):
                    ?>
                        <script>
                            sessionStorage.setItem('accion', 0);
                            sessionStorage.setItem('name', 'Actualizada con exito la seccion');
                        </script>
                    <?php
                    echo "<script>window.location='panel'</script>";
                else:
                    echo "<script>alert('Ha ocurrido un error');window.location='panel'</script>";
                endif;
            }
        }
    }
    public static function deleted($id){
        $id = (int)$id;
        if(SectionModel::delete($id)):
            ?>
                <script>
                    sessionStorage.setItem('accion', 0);
                    sessionStorage.setItem('name', 'Eliminada con exito la seccion');
                    window.location='panel';
                </script>
            <?php
        else:
            echo "<script>alert('Ha ocurrido un error');window.location='panel'</script>";
        endif;
    }
}