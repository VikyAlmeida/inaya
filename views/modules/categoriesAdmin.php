<?php
    $CategoryController = new CategoryController();
    if (isset($route[2])) :
      $CategoryController->deleted($route[1]);
    elseif (isset($route[1])) :
      $category = $CategoryController->show('id', $route[1]);
?>
      <section class="section section-wrap bg-gray-lighter novi-background bg-cover">
        <div class="section-wrap-inner">
          <div class="container container-bigger">
            <div class="row row-fix row-50">
              <div class="col-lg-8 col-xl-7">
                <div class="section-wrap-content section-lg">
                  <h3>Editar categoria</h3>
                  <hr class="divider divider-left divider-secondary">
                  <!-- RD Mailform-->
                  <form  enctype="multipart/form-data" data-form-output="form-output-global" method="post" action="">
                    <div class="row row-fix row-20">
                      <div class="col-md-6">
                        <div class="form-wrap form-wrap-validation">
                          <label class="form-label-outside" for="form-1-name">Nombre</label>
                          <input class="form-input" id="form-1-name" type="text" value='<?= $category['name']; ?>' name="name" data-constraints="@Required"/>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <label class="form-label-outside">Image</label>
                        <div class="fallback">
                            <input name="file" type="file" data-constraints="@Required"/>
                        </div>
                      </div>
                      <div class="col-sm-12">
                        <div class="form-wrap form-wrap-validation">
                          <label class="form-label-outside" for="form-1-message">Descripcion</label>
                          <textarea class="form-input" id="form-1-message" name="description" data-constraints="@Required"><?= $category['description']; ?></textarea>
                        </div>
                      </div>
                      <input type="hidden" name="image" value="<?= $category['image']; ?>">
                      <div class="col-sm-12 offset-custom-1">
                        <div class="form-button">
                          <button class="button button-secondary button-nina" type="submit">Editar</button>
                        </div>
                      </div>
                    </div>
                        <?php
                            $categories = new CategoryController();
                            $categories->updated($route[1]);
                        ?>
                  </form>
                </div>
              </div>
            </div>
          </div>
          
          <div class="section-wrap-aside">
            <img src="<?= $category['image']; ?>" alt="">
          </div>
        </div>
    </section>

<?php
    else :
?>

    <section class="section section-wrap bg-gray-lighter novi-background bg-cover">
        <div class="section-wrap-inner">
          <div class="container container-bigger">
            <div class="row row-fix row-50">
              <div class="col-lg-8 col-xl-7">
                <div class="section-wrap-content section-lg">
                  <h3>Crear categoria</h3>
                  <hr class="divider divider-left divider-secondary">
                  <!-- RD Mailform-->
                  <form  enctype="multipart/form-data" data-form-output="form-output-global" method="post" action="">
                    <div class="row row-fix row-20">
                      <div class="col-md-6">
                        <div class="form-wrap form-wrap-validation">
                          <label class="form-label-outside" for="form-1-name">Nombre</label>
                          <input class="form-input" id="form-1-name" type="text" name="name" data-constraints="@Required"/>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <label class="form-label-outside">Image</label>
                        <div class="fallback">
                            <input name="file" type="file" data-constraints="@Required"/>
                        </div>
                      </div>
                      <div class="col-sm-12">
                        <div class="form-wrap form-wrap-validation">
                          <label class="form-label-outside" for="form-1-message">Descripcion</label>
                          <textarea class="form-input" id="form-1-message" name="description" data-constraints="@Required"></textarea>
                        </div>
                      </div>
                      <div class="col-sm-12 offset-custom-1">
                        <div class="form-button">
                          <button class="button button-secondary button-nina" type="submit">Crear</button>
                        </div>
                      </div>
                    </div>
                        <?php
                            $categories = new CategoryController();
                            $categories->create();
                        ?>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
    </section>

<?php
    endif;
?>     