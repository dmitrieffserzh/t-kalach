<?php
/**
 * Шаблон подвала (footer.php)
 * @package WordPress
 * @subpackage mcreate
 */
?>
</main>
<?php if( is_front_page() ) { ?>
<div id="map"></div>
<?php } ?>
<footer class="footer">
    <div class="container">
        <div class="col-lg-8">
            <div class="row">
				<?php bem_menu( 'bottom', 'footer-menu' ); ?>
            </div>
        </div>
        <div class="col-lg-4 copyright text-right">
            <div class="row">
                ТЁРТЫЙ КАЛАЧ © 2016. <span class="hidden-xs">All rights reserved</span>
            </div>
        </div>
    </div>
</footer>
<?php if( is_front_page() ) { ?>
<script type="text/javascript">
    ymaps.ready(init);

    function init() {
        var myMap = new ymaps.Map("map", {
            // Центр карты, указываем коордианты
            center: [55.752161956105276, 37.61949517968746],
            // Масштаб, тут все просто
            zoom: 9,
            // Отключаем все элементы управления
            controls: []
        });

        var myGeoObjects = [];

        // Наша метка, указываем коордианты
        myGeoObjects = new ymaps.Placemark([55.800151390638646, 37.61400201562497], {
            balloonContentBody: 'Текст в балуне',
        }, {
            iconLayout: 'default#image',
            // Путь до нашей картинки
            iconImageHref: 'assets/img/address.png',
            // Размер по ширине и высоте
            iconImageSize: [70, 70],
            // Смещение левого верхнего угла иконки относительно
            // её «ножки» (точки привязки).
            iconImageOffset: [-35, -35]
        });

        var clusterer = new ymaps.Clusterer({
            clusterDisableClickZoom: false,
            clusterOpenBalloonOnClick: false,
        });

        clusterer.add(myGeoObjects);
        myMap.geoObjects.add(clusterer);
        // Отлючаем возможность изменения масштаба
        myMap.behaviors.disable('scrollZoom');

    }
</script>
<?php } ?>
<?php wp_footer(); ?>

<script>
    jQuery(document).ready(function ($) {

        $('#myCarousel').carousel({
            interval: 5000
        });

        $('#carousel-text').html($('#slide-content-0').html());

//Handles the carousel thumbnails
        $('[id^=carousel-selector-]').click(function () {
            var id = this.id.substr(this.id.lastIndexOf("-") + 1);
            var id = parseInt(id);
            $('#myCarousel').carousel(id);
        });


// When the carousel slides, auto update the text
        $('#myCarousel').on('slid.bs.carousel', function (e) {
            var id = $('.item.active').data('slide-number');
            $('#carousel-text').html($('#slide-content-' + id).html());
        });
    });

</script>



</body>
</html>
