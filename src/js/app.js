document.addEventListener('DOMContentLoaded',function(){
    swiperStart();
});

var minTablet = '(min-width:768px)',
    maxTablet = '(max-width:767px)',
    minDesktop = '(min-width: 1240px)',
    maxDesktop = '(max-width: 1239px)';

function swiperStart(){
    var swiper = new Swiper('.swiper-container', {
        pagination: {
            el: '.swiper-pagination',
            dynamicBullets: true,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });
}

(function(){
    var menu = document.querySelector('.menu'),
        btn = menu.querySelector('.menu-burguer');

    btn.addEventListener('click', function(){
        menu.classList.toggle('active');
    });


})();

(function(){
    $(document).ready(function() {
        $('.datatable').DataTable();
    });
})();