<?php if (!defined('FW')) die( 'Forbidden' );
/**
 * @var $atts
 */
?>
<div class="heading-h1 <?php echo !empty($atts['centered']) ? 'text-center' : ''; ?>">
	<?php if( function_exists('fw_ext_breadcrumbs') ) { fw_ext_breadcrumbs(); } ?>

	<?php $heading = "<h1 class='special-title-h1'>{$atts['title']}</h1"; ?>
	<?php echo $heading; ?>
	<?php if (!empty($atts['subtitle'])): ?>
		<div class="special-subtitle-h1"><?php echo $atts['subtitle']; ?></div>
	<?php endif; ?>
</div>