<?php
/**
 * Шаблон сайдбара (sidebar.php)
 * @package WordPress
 * @subpackage mcreate
 */
?>
<?php if (is_active_sidebar( 'sidebar' )) { ?>
<aside class="col-sm-3">
	<?php dynamic_sidebar('sidebar'); ?>
</aside>
<?php } ?>