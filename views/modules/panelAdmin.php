<?php
    $CategoryController = new CategoryController();
    $categories = $CategoryController->list('categories');
?>
<section class="section section-variant-1 bg-default novi-background bg-cover"> 
        <div class="container container-wide">
          <div class="row row-fix justify-content-xl-end row-30 text-center text-xl-left">
            <div class="col-xl-8">
              <div class="parallax-text-wrap">
                <h3>Categories</span>
              </div>
              <hr class="divider divider-decorate">
            </div>
            <div class="col-xl-3 text-xl-right"><a class="button button-secondary button-nina" href="categories">Crear categoria</a></div>
          </div>
          <div class="row row-50">
            <?php
                if ($categories):
                    foreach ($categories as $category):
            ?>
            <div class="col-md-6 col-xl-4">
              <article class="event-default-wrap">
                <div class="event-default">
                  <figure class="event-default-image"><img src="<?=$category['image']?>" alt="" width="570px" height="100px"/>
                  </figure>
                  <div class="event-default-caption"><a class="button button-xs button-secondary button-nina"><?=$category['description']?></a></div>
                  <div class="event-default-caption"><a class="button button-xs button-secondary button-nina"><?=$category['description']?></a></div>
                  <div class="event-default-caption"><a class="button button-xs button-secondary button-nina"><?=$category['description']?></a></div>
                </div>
                <div class="event-default-inner">
                  <h5><a class="event-default-title" href="#"><?=$category['name']?></a></h5>
                  <span class="heading-5">
                    <a href="categories-<?=$category['id']?>-deleted"><span class='fa-trash'></span></a>
                    <a href="categories-<?=$category['id']?>"><span class='fa-edit'></span></a>
                  </span>
                </div>
              </article>
            </div>
            <?php
                endforeach;
            else:
                echo '<div class="col-md-12 col-xl-12"><h4 style="text-align: center">No hay categorias</h4></div>';
            endif;
            ?>
          </div>
        </div>
      </section>

<section class="section section-lg bg-gray-lighter novi-background bg-cover text-center">
    <div class="container container-wide">
        <h3>Redes sociales</h3>
        <div class="divider divider-decorate"></div>
        <div class="row row-50 justify-content-sm-center text-left">
        <div class="col-sm-10 col-md-6 col-xl-3">
            <article class="box-minimal box-minimal-border">
            <div class="box-minimal-icon novi-icon mdi mdi-airplane"></div>
            <p class="big box-minimal-title">Air Tickets</p>
            <hr>
            <div class="box-minimal-text text-spacing-sm">At our travel agency, you can book air tickets to any world destination. We also provide online ticket booking via our website in just a couple of steps.</div>
            </article>
        </div>
        <div class="col-sm-10 col-md-6 col-xl-3">
            <article class="box-minimal box-minimal-border">
            <div class="box-minimal-icon novi-icon mdi mdi-map"></div>
            <p class="big box-minimal-title">Voyages & Cruises</p>
            <hr>
            <div class="box-minimal-text text-spacing-sm">Besides regular tours and excursions, we also offer a variety of cruises & sea voyages for different customers looking for awesome experiences.</div>
            </article>
        </div>
        <div class="col-sm-10 col-md-6 col-xl-3">
            <article class="box-minimal box-minimal-border">
            <div class="box-minimal-icon novi-icon mdi mdi-city"></div>
            <p class="big box-minimal-title">Hotel Bookings</p>
            <hr>
            <div class="box-minimal-text text-spacing-sm">We offer a wide selection of hotel ranging from 5-star ones to small properties located worldwide so that you could book a hotel you like.</div>
            </article>
        </div>
        <div class="col-sm-10 col-md-6 col-xl-3">
            <article class="box-minimal box-minimal-border">
            <div class="box-minimal-icon novi-icon mdi mdi-beach"></div>
            <p class="big box-minimal-title">Tailored Summer Tours</p>
            <hr>
            <div class="box-minimal-text text-spacing-sm">Our agency provides varied tours including tailored summer tours for clients who are searching for an exclusive and memorable vacation.</div>
            </article>
        </div>
        </div>
    </div>
</section>