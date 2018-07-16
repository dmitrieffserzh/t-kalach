<?php
/**
 * Страница с кастомным шаблоном (page-custom.php)
 * @package WordPress
 * @subpackage mcreate
 * Template Name: Страница с кастомным шаблоном
 */
get_header(); ?>
    <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
            <?php the_content(); ?>
    <?php endwhile; ?>
<?php get_footer(); ?>