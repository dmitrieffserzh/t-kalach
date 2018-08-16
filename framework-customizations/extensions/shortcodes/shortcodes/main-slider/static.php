<?php if (!defined('FW')) die('Forbidden');

$shortcodes_extension = fw_ext('shortcodes');
wp_enqueue_style(
	'fw-shortcode-main-slider',
	$shortcodes_extension->get_declared_URI('/shortcodes/main-slider/static/css/slider.css'),
	array('font-awesome')
);
wp_enqueue_script(
	'fw-shortcode-main-slider',
	$shortcodes_extension->get_declared_URI('/shortcodes/main-slider/static/js/slider.js'),
	array('jquery'),
	false,
	true
);
