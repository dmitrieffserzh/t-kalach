<?php
/**
 * Запись в цикле (loop.php)
 * @package WordPress
 * @subpackage Тертый калач
 */
?>
<article id="product-<?php the_ID(); ?>" class="col-xs-12 col-md-12 col-lg-8">
    <div class="product-item">
        <div class="product-item__image">

            <?php if (!empty(get_field('main_image')['sizes']['big-item'])) { ?>
                <a href="<?php the_permalink(); ?>" class="circle-link">
                    <img src="<?php echo get_field('main_image')['sizes']['big-item']; ?>" alt="<?php the_title(); ?>">
                    <span></span>
                </a>
            <?php } ?>


        </div>
        <div class="product-item__link">
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            <div class="product-item__price">
                <?php if (get_field('price')) { ?>
                    <?php echo get_field('price'); ?> <?php echo get_field('val'); ?>
                <?php } else { ?>
                    Цена не указана
                <?php } ?>
            </div>
        </div>

    </div>
</article>