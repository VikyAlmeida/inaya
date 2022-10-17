<header class="section page-header">
    <div class="rd-navbar-wrap rd-navbar-corporate">
        <nav class="rd-navbar" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed" data-md-layout="rd-navbar-fixed" data-md-device-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-fullwidth" data-xl-layout="rd-navbar-static" data-lg-device-layout="rd-navbar-fixed" data-xl-device-layout="rd-navbar-static" data-md-stick-up-offset="130px" data-lg-stick-up-offset="100px" data-stick-up="true" data-sm-stick-up="true" data-md-stick-up="true" data-lg-stick-up="true" data-xl-stick-up="true">
        <div class="rd-navbar-collapse-toggle" data-rd-navbar-toggle=".rd-navbar-collapse"><span></span></div>
        <div class="rd-navbar-inner">
            <div class="rd-navbar-panel">
            <button class="rd-navbar-toggle" data-rd-navbar-toggle=".rd-navbar-nav-wrap"><span></span></button>
            <div class="rd-navbar-brand"><a class="brand-name" href="home"><img class="logo-default" src="./views/images/logo-default-208x46.png" alt="" width="208" height="46"/><img class="logo-inverse" src="images/logo-inverse-208x46.png" alt="" width="208" height="46"/></a></div>
            </div>
            <div class="rd-navbar-aside-center">
            <div class="rd-navbar-nav-wrap">
                <ul class="rd-navbar-nav">
                <li class="active"><a href="home">Home</a>
                </li>
                <li><a href="about-us">About Us</a>
                </li>
                <li><a href="contacts">Contacts</a>
                </li>
                <li><a href="typography">Typography</a><li>
                <?php
                    if ( isset($_SESSION['user']) && $_SESSION['user']['role_id']==1 ) :
                        echo '<li><a href="panel">Panel</a><li>';
                    else:
                        echo '<div class="rd-navbar-aside-right"><a class="button button-sm button-secondary button-nina" href="login">Login</a></div>';
                    endif;
                ?>
            </div>
            </div>
            <?php
                if(isset($_SESSION['user'])):
                    echo '<div class="rd-navbar-aside-right">
                        <a href="logout" class="button button-sm button-secondary button-nina">'.$_SESSION['user']['name'].'</a>
                    </div>';
                else:
                    echo '<div class="rd-navbar-aside-right"><a class="button button-sm button-secondary button-nina" href="login">Login</a></div>';
                endif;
            ?>
            
        </div>
        </nav>
    </div>
</header>