<?php
/**
 * Шаблон рубрики (category.php)
 * @package WordPress
 * @subpackage mcreate
 */
get_header(); ?>
    <section>
        <div class="container">
            <div class="row">

                <h1 class="col-xs-12"><?php single_cat_title(); ?></h1>

                <div class="catalog-category">
					<?php
					$cat        = get_query_var( 'cat' );
					$categories = get_categories( 'parent=' . $cat . '&hide_empty=0' );

					foreach ( $categories as $category ) { ?>

                        <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                            <div class="catalog-category__item">
                                <a href="<?php echo get_category_link( $category->term_id ); ?>"
                                   title="<?php echo $category->name; ?>" class="catalog-category__link">

									<?php $img_url = wp_get_attachment_image_src( get_field( 'cat_image', 'category_' . $category->term_id ) ); ?>
                                    <img src="<?php echo $img_url ? $img_url[0] : get_template_directory_uri() . "/img/no_image.png"; ?>"
                                         alt="<?php echo $category->name; ?>" class="catalog-category__image">

                                    <h2 class="catalog-category__title"><?php echo $category->name; ?></h2>
                                </a>
                            </div>
                        </div>

					<?php } ?>
                </div>

	            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		            <?php get_template_part('loop'); ?>
	            <?php endwhile;
	            else: echo '<p>Нет записей.</p>'; endif; ?>
	            <?php pagination(); ?>

            </div>
        </div>
    </section>
<?php get_footer(); ?>