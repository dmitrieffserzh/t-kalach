<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'main-slider' => array(
		'label'         => __( 'Слайды' ),
		'popup-title'   => __( 'Добавить/изменить слайды' ),
		'desc'          => __( 'Добавить или удалить слайды' ),
		'type'          => 'addable-popup',
		'template'      => '{{=title}}',
		'popup-options' => array(
			'image'     => array(
				'label' => __( 'Изображение слайда' ),
				'desc'  => __( 'Загрузите изображение не менее чем 1920x650 px' ),
				'type'  => 'upload',
			),
			'title'   => array(
				'label' => __( 'Заголовок слайда' ),
				'type'  => 'text',
			),
			'content'   => array(
				'label' => __( 'Текст слайда' ),
				'type'  => 'textarea',
			),
			'button_name'=> array(
				'label' => __( 'Текст кнопки' ),
				'type'  => 'text'
			),
			'button_url'=> array(
				'label' => __( 'Ссылка кнопки' ),
				'desc'  => __( 'Укажите ссылку на целевую страницу' ),
				'type'  => 'text'
			)
		)
	)
);