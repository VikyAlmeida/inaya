<body>
    <?php
        include('./views/modules/partials/loader.php'); 
        include('./views/modules/partials/nav.php'); 

        $routes = new routerController();
        $routes->routes();
        
        include('./views/modules/partials/footer.php');
        include('./views/modules/partials/scripts.php');
    ?>
</body>