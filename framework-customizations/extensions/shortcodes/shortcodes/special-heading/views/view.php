<?php if (!defined('FW')) die( 'Forbidden' );
/**
 * @var $atts
 */
?>
<div class="heading heading-<?php echo esc_attr($atts['heading']); ?> <?php echo !empty($atts['centered']) ? 'text-center' : ''; ?>">
	<?php $heading = "<{$atts['heading']} class='special-title'>{$atts['title']}</{$atts['heading']}>"; ?>
	<?php echo $heading; ?>
	<?php if (!empty($atts['subtitle'])): ?>
		<div class="special-subtitle"><?php echo $atts['subtitle']; ?></div>
	<?php endif; ?>
</div>