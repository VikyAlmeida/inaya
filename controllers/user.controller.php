<?php
class userController{
    public function registro() {
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $condicion = "usuario like '".$_POST["usuario"]."'";
            $registros = UserModel::where("usuarios",$condicion);
            if(!$registros):
                $usuario = $_POST["usuario"];
                $nombre = $_POST["nombre"];
                $pass = Generales::encriptar($_POST["pass"]);
                $datos = compact('nombre','usuario', 'pass');
                if(UserModel::insert("usuarios",$datos)):
                    echo "<script>alert('Se te ha dado de alta');window.location='login'</script>";
                else:
                    echo "<script>alert('Ha ocurrido un error');window.location='registro'</script>";
                endif;
            else:
                echo "<script>alert('Ese usuario ya existe');window.location='registro'</script>";
            endif;
        }
    }
    public function login() {
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $query = "email like '".$_POST["email"]."' and password like '".$_POST["password"]."'";
            $userBd = UserModel::where("users",$query);

            if($userBd):
                if($userBd["password"]==$_POST["password"]):
                    $_SESSION["user"]["id"]=$userBd["id"];
                    $_SESSION["user"]["name"]=$userBd["name"];
                    $_SESSION["user"]["role_id"]=$userBd["role_id"];
                    ?>
                        <script>
                            sessionStorage.setItem('login', 0);
                            window.location='home';
                        </script>
                    <?php
                else:
                    echo "<script>alert('Contraseña incorrecta');window.location='login'</script>";
                endif;
            else:
                unset($_SESSION["user"]);
                echo "<script>alert('Ese usuario no existe');window.location='login'</script>";
            endif;
        }
    }
}