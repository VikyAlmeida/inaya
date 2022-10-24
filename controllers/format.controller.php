<?php
class FormatController{
    public function list($tabla){
        $registros = FormatModel::listFormats($tabla);
        return $registros;
    }
    public static function show($field, $value){
        $registro = FormatModel::showFormat("formats",$field, $value);
        return $registro;
    }
    public function create() {
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $name = Generales::sanar_datos($_POST["name"],"string",$errores,"nombre");
            $description = Generales::sanar_datos($_POST["description"],"string",$errores,"descripcion");
            if(empty($errores)){
                $datos = compact('name','description');
                if(FormatModel::addFormat("formats",$datos)):
                    ?>
                        <script>
                            sessionStorage.setItem('accion', 0);
                            sessionStorage.setItem('name', 'Creado con exito el formato');
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
            $description = Generales::sanar_datos($_POST["description"],"string",$errores,"descripcion");
            
            if(empty($errores)){
                $datos = compact('name','description');;
                if(FormatModel::updateFormat($datos,$id)):
                    ?>
                        <script>
                            sessionStorage.setItem('accion', 0);
                            sessionStorage.setItem('name', 'Actualizado con exito el formato');
                        </script>
                    <?php
                    echo "<script>window.location='formats'</script>";
                else:
                    echo "<script>alert('Ha ocurrido un error');window.location='panel'</script>";
                endif;
            }
        }
    }
    public static function deleted($id){
        $id = (int)$id;
        if(FormatModel::delete($id)):
            ?>
                <script>
                    sessionStorage.setItem('accion', 0);
                    sessionStorage.setItem('name', 'Eliminado con exito el formato');
                    window.location='panel';
                </script>
            <?php
        else:
            echo "<script>alert('Ha ocurrido un error');window.location='panel'</script>";
        endif;
    }
}