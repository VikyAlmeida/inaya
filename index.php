<?php
    include('./controllers/template.controller.php');
    include('./controllers/user.controller.php');
    include('./controllers/library.controller.php');
    include('./controllers/router.controller.php');
    include('./controllers/categories.controller.php');

    include('./models/user.model.php');
    include('./models/category.model.php');


    session_start();
    $template = new ControllerTemplate();
    $template->ctrTemplate();