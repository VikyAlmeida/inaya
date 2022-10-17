<?php
class routerController{
    public function routes() {
        $urlsCommun = array('home');
        $urlsLogged = array('logout');
        $urlsLoggedByRole = array('panel', 'categories');
        $urlsNotLogged = array('login');
        if(isset($_GET["ruta"])){
            $route = explode("-", $_GET["ruta"]);
            
            if (in_array($route[0], $urlsCommun)):
                include("./views/modules/".$route[0].".php");

            elseif (isset($_SESSION['user']) && in_array($route[0], $urlsLogged)) :
                include("./views/modules/".$route[0].".php");

            elseif (isset($_SESSION['user']) && in_array($route[0], $urlsLoggedByRole)) :
                if ($_SESSION['user']['role_id'] == 1): 
                    $routePHP = $route[0].'Admin.php';
                    include("./views/modules/".$routePHP);
                elseif ($_SESSION['user']['role_id'] == 2 ):
                    $routePHP = $route[0].'Merchant.php';
                    include("./views/modules/".$routePHP);
                else: 
                    $routePHP = $route[0].'Customer.php';
                    include("./views/modules/".$routePHP);
                endif;

            elseif (!isset($_SESSION['user']) && in_array($route[0], $urlsNotLogged)):
                include("./views/modules/".$route[0].".php");

            elseif(in_array($route[0], $urlsLogged) or in_array($route[0], $urlsNotLogged) or in_array($route[0],$urlsCommun)):
                echo "<script>window.location='home';</script>";
            else:
                include("./views/modules/404.php");
            endif;

        }else{
            include("./views/modules/home.php");
        }
    }
}