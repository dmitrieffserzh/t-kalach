<?php
/**
 * Шаблон отдельной записи (single.php)
 * @package WordPress
 * @subpackage Тертый калач
 */
get_header();
?>


<section>
    <div class="container">
        <div class="row">
            <div class="<?php content_class_by_sidebar(); ?>">
                <?php
                if (have_posts()) {
                    while (have_posts()) : the_post();
                        ?>
                        <article>

                            <div class="col-lg-24">
                                <div class="product">
                                    <h1><?php the_title(); ?></h1>

                                    <?php
                                    $images = get_field('images');
                                    ?>

                                    <ul id="imageGallery">
                                        <?php if (!empty($images)) { ?>
                                            <?php foreach ($images as $image) { ?>

                                                <li data-thumb="<?php echo $image['image']; ?>" data-src="<?php echo $image['image']; ?>">
                                                    <a href="<?php echo $image['image']; ?>" rel="lightbox[gallery-0]" data-lightbox-type="ajax"><img src="<?php echo $image['image']; ?>" style="width: 100%;" /></a>
                                                </li>

                                            <?php } ?>
                                        <?php } else { ?>
                                            <li data-thumb="<?php echo get_field('main_image')['sizes']['big-item']; ?>" data-src="<?php echo get_field('main_image')['sizes']['big-item']; ?>">
                                                <a href="<?php echo get_field('main_image')['sizes']['big-item']; ?>" rel="lightbox[gallery-0]" data-lightbox-type="ajax"><img src="<?php echo get_field('main_image')['sizes']['big-item']; ?>" style="width: 100%;" /></a>
                                            </li>
                                        <?php } ?>
                                    </ul>

                                    <div class="product__info">
                                        <div class="product__info-price">
                                            <?php
                                            $price = get_field('price');

                                            if (!empty($price)) {
                                                ?>
                                                <?php echo $price; ?> <?php echo get_field('val'); ?>
                                            <?php } else { ?>
                                                Цена не указана
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                            $thecontent = get_the_content();
                            if (!empty($thecontent)) {
                                ?>
                                <div class="col-lg-24">
                                    <div class="content">
                                        <h2>Описание</h2>
                                        <?php the_content(); ?>
                                    </div>
                                </div>
                            <?php } ?>
                            <div class="col-lg-24">
                                <?php if (empty($attributes)) { ?>
                                    <div class="attribute">
                                        <h2>Характеристики</h2>
                                        <?php
                                        $attributes = get_field('attributes');
                                        ?>

                                        <ul class="attribute__list">
                                            <?php
                                            foreach ($attributes as $item) {
                                                if ($item['attribute_title'] && $item['attribute_desc']) {
                                                    ?>
                                                    <li class="attribute__item">
                                                        <span class="title"><?php echo $item['attribute_title']; ?>:</span><span class="desc"><?php echo $item['attribute_desc']; ?></span>
                                                    </li>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </ul>

                                    </div>
                                <?php } ?>
                            </div>
                        </article>
                        <?php
                    endwhile;
                }
                ?>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>
