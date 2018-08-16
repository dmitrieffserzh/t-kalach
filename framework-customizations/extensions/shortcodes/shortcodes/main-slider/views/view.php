<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$id = uniqid( 'slider-' );
?>

<script>
    //jQuery(document).ready(function ($) {
    //    $('#<?php //echo esc_attr($id) ?>//').carouFredSel({
    //        swipe: {
    //            onTouch: true
    //        },
    //        next : "#<?php //echo esc_attr($id) ?>//-next",
    //        prev : "#<?php //echo esc_attr($id) ?>//-prev",
    //        pagination : "#<?php //echo esc_attr($id) ?>//-controls",
    //        responsive: true,
    //        infinite: false,
    //        items: 1,
    //        auto: false,
    //        scroll: {
    //            items : 1,
    //            fx: "crossfade",
    //            easing: "linear",
    //            duration: 300
    //        }
    //    });
    //});
</script>

<div id="<?php echo esc_attr($id); ?>" class="main-slider">

	<?php foreach ( fw_akg( 'main_slider', $atts, array() ) as $slide ): ?>

        <div class="main-slider__item">

	        <?php
	        $slide_image_url = !empty($slide['image']['url'])
		        ? $slide['image']['url']
		        : fw_get_framework_directory_uri('/static/img/no-image.png');
	        ?>

            <img src="<?php echo esc_attr($slide_image_url); ?>" alt="<?php echo esc_attr($slide['title']); ?>"/>

	        <?php echo $slide['title']; ?>
	        <?php echo $slide['content']; ?>

	        <?php echo $slide['button_name']; ?>
	        <?php echo $slide['button_url']; ?>

        </div>

	<?php endforeach; ?>

    <div class="fw-testimonials-arrows">
        <a class="prev" id="<?php echo esc_attr($id); ?>-prev" href="#"><i class="fa"></i></a>
        <a class="next" id="<?php echo esc_attr($id); ?>-next" href="#"><i class="fa"></i></a>
    </div>

</div>