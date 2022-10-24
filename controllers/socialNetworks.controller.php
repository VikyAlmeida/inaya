<?php
class socialNetworkController{
    public function list($tabla){
        $registros = socialNetworkModel::listSocialNetworks($tabla);
        return $registros;
    }
    public static function show($field, $value){
        $registro = socialNetworkModel::showSocialNetwork("socialnetworks",$field, $value);
        return $registro;
    }
    public function create() {
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $name = Generales::sanar_datos($_POST["name"],"string",$errores,"nombre");
            $logo =  'views/images/socialNetworks/'.Generales::foto($_FILES["file"], 'views/images/socialNetworks/');

            if(empty($errores)){
                $datos = compact('name', 'logo');
                if(socialNetworkModel::addSocialNetwork("socialnetworks",$datos)):
                    ?>
                        <script>
                            sessionStorage.setItem('accion', 0);
                            sessionStorage.setItem('name', 'Creada con exito la red social');
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
            $logo =  'views/images/socialNetworks/'.Generales::foto($_FILES["file"], 'views/images/socialNetworks/');
            
            if(empty($errores)){
                $datos = compact('name', 'logo');
                if(socialNetworkModel::updateSocialNetwork($datos,$id)):
                    ?>
                        <script>
                            sessionStorage.setItem('accion', 0);
                            sessionStorage.setItem('name', 'Actualizada con exito la red social');
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
        if(socialNetworkModel::delete($id)):
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