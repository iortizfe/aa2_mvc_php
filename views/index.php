<?php
    include './views/partials/header.php';
?>
<section class="o-swiper-home">
  <div class="swiper-container">
    <div class="swiper-wrapper">     
      <div class="swiper-slide">
        <img class="a-object-cover" src="<?php echo URLROOT.'/src/img/slider/slider5.jpg' ?>" />
      </div>
      <div class="swiper-slide">
        <img class="a-object-cover" src="<?php echo URLROOT.'/src/img/slider/slider2.jpg' ?>" />
      </div>
      <div class="swiper-slide">
        <img class="a-object-cover" src="<?php echo URLROOT.'/src/img/slider/slider3.jpg' ?>" />
      </div>
      <div class="swiper-slide">
        <img class="a-object-cover" src="<?php echo URLROOT.'/src/img/slider/slider4.jpg' ?>" />
      </div>
 
    </div>
    <!-- Add Pagination -->
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
    <div class="swiper-pagination"></div>
  </div>
</section>
<section class="quehay-section">
    <h1>¿Que es <img src="<?php echo URLROOT.'/src/img/logo.svg' ?>" /></h1>
    <div class="o-featured-module">
        <article class="m-featured-item">
            <div class="icon">
                <img class="a-object-cover" src="<?php echo URLROOT.'/src/img/icons/aprender.svg'?>" />
            </div>
            <h5>Agrega tus clases</h5>
        </article>
        <article class="m-featured-item">
            <div class="icon">
                <img class="a-object-cover" src="<?php echo URLROOT.'/src/img/icons/leccion-en-linea.svg' ?>"/>
            </div>
            <h5>Permite que se apunten</h5>
        </article>
        <article class="m-featured-item">
            <div class="icon">
                <img class="a-object-cover" src="<?php echo URLROOT.'/src/img/icons/crecimiento.svg' ?>"/>
            </div>
            <h5>Haz crecer tu aula</h5>
        </article>
    </div>
</section>
<section class="utilidad-section">
    <div class="p6-wrap">
        <div class="image">
            <img class="a-object-cover" src="<?php echo URLROOT.'/src/img/home/estudiante1.jpg' ?>" />
        </div>
        <div class="content">
            <h2>¿Como funciona?</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam neque nunc, tempor in arcu ut, fermentum tempus lorem. Aenean eget ullamcorper tellus. Vivamus aliquet pellentesque justo nec bibendum. Integer auctor venenatis nisl, ut rutrum turpis consequat et. Proin ac egestas elit, mattis elementum nisi. Pellentesque quis nisl quam. In euismod lorem eu augue vulputate, eu vestibulum diam cursus. Cras volutpat ex quis euismod condimentum. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Morbi feugiat nunc ut iaculis auctor. Sed sem est, porta quis lectus fermentum, commodo egestas urna. Aenean dignissim, leo non efficitur egestas, velit nibh vulputate justo, a lacinia nulla elit ut nisl. Quisque eleifend tellus quis erat rutrum egestas.</p>
        </div>
    </div>
</section>
<?php
    include './views/partials/footer.php'
?>