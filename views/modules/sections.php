<?php
    $sectionController = new sectionController();
    $sections = $sectionController->list('sections', 'category_id', $route[1]);
?>
<section class="section section-variant-1 bg-default novi-background bg-cover"> 
        <div class="container container-wide">
          <div class="row row-fix justify-content-xl-end row-30 text-center text-xl-left">
            <div class="col-xl-8">
              <div class="parallax-text-wrap">
                <h3>Secciones</span>
              </div>
              <hr class="divider divider-decorate">
            </div>
            <div class="col-xl-3 text-xl-right"><a class="button button-secondary button-nina" href="categories">Crear Seccion</a></div>
          </div>
        </div>
      </section>
