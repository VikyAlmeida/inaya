<?php
    include('./controllers/template.controller.php');
    include('./controllers/user.controller.php');
    include('./controllers/library.controller.php');
    include('./controllers/router.controller.php');
    include('./controllers/categories.controller.php');
    include('./controllers/socialNetworks.controller.php');
    include('./controllers/format.controller.php');
    include('./controllers/sections.controller.php');

    include('./models/user.model.php');
    include('./models/category.model.php');
    include('./models/format.model.php');
    include('./models/sections.model.php');
    include('./models/socialNetworks.model.php');

    session_start();
    $template = new ControllerTemplate();
    $template->ctrTemplate();