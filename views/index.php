<?php
    include './views/partials/header.php';
?>
<section class="o-swiper-home">
  <div class="swiper-container">
    <div class="swiper-wrapper">     
      <div class="swiper-slide">
        <img class="a-object-cover" src="<?php echo URLROOT.'src/img/slider/slider5.jpg' ?>" />
      </div>
      <div class="swiper-slide">
        <img class="a-object-cover" src="<?php echo URLROOT.'src/img/slider/slider2.jpg' ?>" />
      </div>
      <div class="swiper-slide">
        <img class="a-object-cover" src="<?php echo URLROOT.'src/img/slider/slider3.jpg' ?>" />
      </div>
      <div class="swiper-slide">
        <img class="a-object-cover" src="<?php echo URLROOT.'src/img/slider/slider4.jpg' ?>" />
      </div>
 
    </div>
    <!-- Add Pagination -->
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
    <div class="swiper-pagination"></div>
  </div>
</section>
<section class="quehay-section">
    <h1>¿Qué es <img src="<?php echo URLROOT.'src/img/logo.svg' ?>" />?</h1>
    <div class="o-featured-module">
        <article class="m-featured-item">
            <div class="icon">
                <img class="a-object-cover" src="<?php echo URLROOT.'src/img/icons/aprender.svg'?>" />
            </div>
            <h5>Agrega tus clases</h5>
        </article>
        <article class="m-featured-item">
            <div class="icon">
                <img class="a-object-cover" src="<?php echo URLROOT.'src/img/icons/leccion-en-linea.svg' ?>"/>
            </div>
            <h5>Permite que se apunten</h5>
        </article>
        <article class="m-featured-item">
            <div class="icon">
                <img class="a-object-cover" src="<?php echo URLROOT.'src/img/icons/crecimiento.svg' ?>"/>
            </div>
            <h5>Haz crecer tu aula</h5>
        </article>
    </div>
</section>
<section class="utilidad-section">
    <div class="p6-wrap">
        <div class="image">
            <img class="a-object-cover" src="<?php echo URLROOT.'src/img/home/estudiante1.jpg' ?>" />
        </div>
        <div class="content">
            <h2>¿Cómo funciona?</h2>
            <p>Si eres estudiante esta apliación te servirá para saber tu horario de las asignaturas matriculadas.

            </p>
            <p>
              Como gestor de la aplicación puedes dar de alta profesores, cursos, horarios...
           </p>
        </div>
    </div>
</section>
<?php
    include './views/partials/footer.php'
?>