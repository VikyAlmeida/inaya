<?php
    include('./controllers/template.controller.php');
    include('./controllers/user.controller.php');
    include('./controllers/library.controller.php');

    include('./models/user.model.php');

    session_start();
    $template = new ControllerTemplate();
    $template->ctrTemplate();