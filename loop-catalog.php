<?php
/**
 * Запись в цикле (loop.php)
 * @package WordPress
 * @subpackage Тертый калач
 */
?>
<article id="product-<?php the_ID(); ?>" class="col-xs-12">
    <div class="product-item">
        <div class="row">
			<?php
			$first_photo['catalog_images_more'] = get_field( 'catalog_image' );
			$last_photo                         = get_field( 'catalog_images' );
			if ( $last_photo ) {
				array_unshift( $last_photo, $first_photo );
			}
			?>

            <div class="col-xs-12 col-sm-12 col-md-4">
                <div class="carousel slide article-slide" id="article-photo-carousel">
					<?php if ( ! $last_photo ) { ?>
                        <div class="carousel-inner cont-slider">
                            <div class="item active">
                                <img alt="" title=""
                                     src="<?php echo $first_photo['catalog_images_more']['sizes']['thumbnail']; ?>">
                            </div>
                        </div>
					<?php } ?>

					<?php if ( $last_photo ) { ?>
                        <div class="carousel-inner cont-slider">
							<?php
							$count = 0;
							foreach ( $last_photo as $item ) { ?>
                                <div class="item<?php if ( $count == 0 ) {
									echo ' active';
								} ?>">
                                    <img alt="" title=""
                                         src="<?php echo $item['catalog_images_more']['sizes']['thumbnail']; ?>">
                                </div>
								<?php $count ++;
							} ?>
                        </div>

                        <a class="left carousel-control" href="#article-photo-carousel" role="button"
                           data-slide="prev">
                            <span class="carousel-control-left"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#article-photo-carousel" role="button"
                           data-slide="next">
                            <span class="carousel-control-right"></span>
                            <span class="sr-only">Next</span>
                        </a>

                        <ol class="carousel-indicators">
							<?php
							$count = 0;
							foreach ( $last_photo as $item ) { ?>
                                <li <?php if ( $count == 0 ) {
									echo 'class="active"';
								} ?> data-slide-to="<? echo $count; ?>" data-target="#article-photo-carousel">
                                    <img alt="" src="<?php echo $item['catalog_images_more']['sizes']['micro']; ?>">
                                </li>
								<?php $count ++;
							} ?>
                        </ol>
					<?php } ?>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-8">
                <a href="<?php the_permalink(); ?>"><h2 class="h1"><?php the_title(); ?></h2></a>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-8">

				<?php echo get_field( 'catalog_description' ); ?>


                <div class="catalog-info">
					<?php if ( get_field( 'catalog_palitra' ) == true ) { ?>
                        <hr>
                        <div class="catalog-palitra">
                            <ul class="catalog-palitra__list">
                                <li class="catalog-palitra__item catalog-palitra__item--red"></li>
                                <li class="catalog-palitra__item catalog-palitra__item--blue"></li>
                                <li class="catalog-palitra__item catalog-palitra__item--black"></li>
                                <li class="catalog-palitra__item catalog-palitra__item--green"></li>
                                <li class="catalog-palitra__item catalog-palitra__item--gray"></li>
                            </ul>
                        </div>
					<?php } ?>
                    <hr>

					<?php if ( get_field( 'catalog_sizes' ) == true ) { ?>
                        <div class="catalog-sizes">
                            <ul class="catalog-sizes__list">
								<?php foreach ( get_field( 'catalog_sizes_enable' ) as $key => $value ) { ?>
                                    <li class="catalog-sizes__item"><?php echo $value['label']; ?></li>
								<?php } ?>
                            </ul>
                        </div>
					<?php } ?>


					<?php if ( ! empty( get_field( 'catalog_price' ) ) ) { ?>

                        <style>
                            .price-sale {

                            }
                        </style>


                        <span class=" <?php if ( ! empty( get_field( 'catalog_price_sale' ) ) ) { ?> price-sale <?php } ?>">
                <?php echo get_field( 'catalog_price' ); ?>
            </span>
						<?php echo get_field( 'catalog_price_sale' ); ?>

					<?php } ?>


                </div>
                <div class="product-item__link">
                    <div class="product-item__price">
						<?php if ( get_field( 'price' ) ) { ?>
							<?php echo get_field( 'price' ); ?><?php echo get_field( 'val' ); ?>
						<?php } else { ?>
                            Цена не указана
						<?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</article>