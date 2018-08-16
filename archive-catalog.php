<?php
/**
 * Страница архивов записей (archive.php)
 * @package WordPress
 * @subpackage Тертый калач
 */
get_header();
?>
    <section>
        <div class="container">
            <div class="row">

                <h1 class="col-xs-12">Каталог</h1> Archive catalog

                <div class="catalog-category">
					<?php
					$categories = get_categories( 'taxonomy=catalog_category&hide_empty=0' );
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

            </div>
        </div>
    </section>
<?php get_footer(); ?>