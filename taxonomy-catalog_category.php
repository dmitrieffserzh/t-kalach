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
                <div class="col-md-12">
                    <h1><?php single_cat_title(); ?></h1>
                </div>
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                        <?php get_template_part('loop-catalog'); ?>
                        <?php
                    endwhile;
                else: echo '<p>Нет записей.</p>';
                endif;
                ?>
                <?php pagination(); ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>