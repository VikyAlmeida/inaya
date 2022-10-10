<body>
    <?php
        include('./views/modules/partials/loader.php'); 
        include('./views/modules/partials/nav.php'); 
        $urls = array('home', 'login');
        if(isset($_GET["ruta"])){
            $url = explode("-", $_GET["ruta"]);
            if(in_array($url[0], $urls))
            {
                include("./views/modules/".$url[0].".php");
            }else{
                include("./views/modules/404.php");
            }
        }else{
            include("./views/modules/home.php");
        }
        include('./views/modules/partials/footer.php');
        include('./views/modules/partials/scripts.php');
    ?>
</body>