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

            <?php
//             $field = get_field('catalog_sizes_enable');
//             print_r($field);
            ?>



            <?php if (!empty(get_field('catalog_image')['sizes']['thumbnail'])) { ?>
                <a href="<?php the_permalink(); ?>" class="circle-link">
                    <img src="<?php echo get_field('catalog_image')['sizes']['thumbnail']; ?>" alt="<?php the_title(); ?>">
                    <span></span>
                </a>
            <?php } ?>
            <hr>



	        <?php if (get_field('catalog_palitra') == TRUE) { ?>
                <ul>
                    <li>палитра</li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                </ul>
	        <?php } ?>
            <hr>




	        <?php if (get_field('catalog_sizes') == TRUE) { ?>
            <ul>
                <?php foreach(get_field('catalog_sizes_enable') as $key => $value){ ?>
                <li><?php echo $value['label']; ?></li>
                <?php } ?>
            </ul>
	        <?php } ?>
            <hr>


            <?php if (!empty(get_field('catalog_price'))) { ?>

            <style>
                .price-sale {

                }
            </style>


	        <span class=" <?php if (!empty(get_field('catalog_price_sale'))) { ?> price-sale <?php } ?>">
                <?php echo get_field('catalog_price'); ?>
            </span>
	            <?php echo get_field('catalog_price_sale'); ?>

            <?php } ?>
            <hr>


            краткое описание
            <?php echo get_field('catalog_description'); ?>



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