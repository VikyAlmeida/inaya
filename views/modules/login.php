
        <section class="breadcrumbs-custom" style="background: url(&quot;images/breadcrumbs-bg.jpg&quot;); background-size: cover;">
          <div class="container" style="background-color:rgb(255, 255, 255,0.4);padding:3em;border-radius: 15px;">
            <p class="heading-1 breadcrumbs-custom-title">Login</p>
            <form method="POST" action="">
              <div class="row row-20 row-fix">
                <div class="col-sm-12">
                  <label class="form-label-outside">Email</label>
                  <div class="form-wrap form-wrap-inline">
                    <input class="form-input" name="email" type="text">
                  </div>
                </div>
                <div class="col-sm-12">
                  <label class="form-label-outside">Contraseña</label>
                  <div class="form-wrap form-wrap-inline">
                    <input class="form-input" name="password" type="password">
                  </div>
                </div>
              </div>
              <div class="form-wrap form-button">
                <input class="button button-block button-secondary" type="submit" value='Iniciar sesion' />
              </div>
              <?php
                  $users = new userController();
                  $users->login();
              ?>
            </form>
          </div>
        </section>