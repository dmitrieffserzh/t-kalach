<?php
/**
 * Функции шаблона (function.php)
 * @package WordPress
 * @subpackage mcreate
 */

add_theme_support('title-tag');

register_nav_menus(array(
	'top' => 'Верхнее',
	'bottom' => 'Внизу'
));

add_theme_support('post-thumbnails');
set_post_thumbnail_size(400, 400);
add_image_size('big-thumb', 400, 400, array( 'center', 'center' ));


// IMAGE HELPER
function image_thumbnails($url) {
	return str_replace('.', '-400x400.', $url);
}

register_sidebar(array(
	'name' => 'Сайдбар',
	'id' => "sidebar",
	'description' => 'Обычная колонка в сайдбаре',
	'before_widget' => '<div id="%1$s" class="widget %2$s">',
	'after_widget' => "</div>\n",
	'before_title' => '<span class="widgettitle">',
	'after_title' => "</span>\n",
));

if (!class_exists('clean_comments_constructor')) {
	class clean_comments_constructor extends Walker_Comment {
		public function start_lvl( &$output, $depth = 0, $args = array()) {
			$output .= '<ul class="children">' . "\n";
		}
		public function end_lvl( &$output, $depth = 0, $args = array()) {
			$output .= "</ul><!-- .children -->\n";
		}
	    protected function comment( $comment, $depth, $args ) {
	    	$classes = implode(' ', get_comment_class()).($comment->comment_author_email == get_the_author_meta('email') ? ' author-comment' : '');
	        echo '<li id="comment-'.get_comment_ID().'" class="'.$classes.' media">'."\n";
	    	echo '<div class="media-left">'.get_avatar($comment, 64, '', get_comment_author(), array('class' => 'media-object'))."</div>\n";
	    	echo '<div class="media-body">';
	    	echo '<span class="meta media-heading">Автор: '.get_comment_author()."\n";
	    	//echo ' '.get_comment_author_email();
	    	echo ' '.get_comment_author_url();
	    	echo ' Добавлено '.get_comment_date('F j, Y в H:i')."\n";
	    	if ( '0' == $comment->comment_approved ) echo '<br><em class="comment-awaiting-moderation">Ваш комментарий будет опубликован после проверки модератором.</em>'."\n";
	    	echo "</span>";
	        comment_text()."\n";
	        $reply_link_args = array(
	        	'depth' => $depth,
	        	'reply_text' => 'Ответить',
				'login_text' => 'Вы должны быть залогинены'
	        );
	        echo get_comment_reply_link(array_merge($args, $reply_link_args));
	        echo '</div>'."\n";
	    }
	    public function end_el( &$output, $comment, $depth = 0, $args = array() ) {
			$output .= "</li><!-- #comment-## -->\n";
		}
	}
}

if (!function_exists('pagination')) {
	function pagination() {
		global $wp_query;
		$big = 999999999;
		$links = paginate_links(array(
			'base' => str_replace($big,'%#%',esc_url(get_pagenum_link($big))),
			'format' => '?paged=%#%',
			'current' => max(1, get_query_var('paged')),
			'type' => 'array',
			'prev_text'    => 'Назад',
	    	'next_text'    => 'Вперед',
			'total' => $wp_query->max_num_pages,
			'show_all'     => false,
			'end_size'     => 15,
			'mid_size'     => 15,
			'add_args'     => false,
			'add_fragment' => '',
			'before_page_number' => '',
			'after_page_number' => ''
		));
	 	if( is_array( $links ) ) {
		    echo '<ul class="pagination">';
		    foreach ( $links as $link ) {
		    	if ( strpos( $link, 'current' ) !== false ) echo "<li class='active'>$link</li>";
		        else echo "<li>$link</li>"; 
		    }
		   	echo '</ul>';
		 }
	}
}

add_action('wp_footer', 'add_scripts');
if (!function_exists('add_scripts')) {
	function add_scripts() {
	    if(is_admin()) return false;
	    wp_deregister_script('jquery');
	    wp_enqueue_script('jquery','//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js','','',true);
	    wp_enqueue_script('main', get_template_directory_uri().'/js/main.js','','',true);
	}
}

add_action('wp_print_styles', 'add_styles');
if (!function_exists('add_styles')) {
	function add_styles() {
	    if(is_admin()) return false;
		wp_enqueue_style( 'main', get_template_directory_uri().'/style.css' );
	}
}

if (!function_exists('content_class_by_sidebar')) {
	function content_class_by_sidebar() {
		if (is_active_sidebar( 'sidebar' )) { 
			echo 'col-sm-9';
		} else { 
			echo 'col-sm-12';
		}
	}
}



// BEM MENU
require 'components/menu.php';


// Хлебные крошки
function show_breadcrumb($name='catalog',$type='catalog'){
	$list = "";
	$home = get_bloginfo("home");
	if ($type && $name){
		$ans = get_term_by('name', $name, $type);
		$parentID=$ans->parent;
		while ($parentID > 0){
			$parent = get_term_by('id', $parentID, $type);
			$url = $home."/".$type."/".$parent->slug;
			$list = "<li><a href='".$url."'>".$parent->name."</a></li>".$list;
			$parentID = $parent->parent;
		}
		$url = $home."/".$type."/".$ans->slug;
		$list = $list."<li>".$ans->name."</li>";
	}

	if ($list) echo "<ul><li><a href='$home'>Home</a></li>".$list."</ul>";
}









// CUSTOM FIELD REPEATER
add_action('admin_head', 'my_custom_style');

function my_custom_style() {
	echo '<style>
			.acf-repeater .acf-row {
				float: left;
				margin-top: -1px;
				width: 12.5%;
				height: 168px;
			}
			.acf-repeater .acf-row .acf-image-uploader img {
			   	width: 111px;
    			height: 111px;
			}
			.acf-repeater .acf-row .acf-fields > .acf-field:first-child{
			    border-top-width: 0;
			    margin-top: 1px;
			    height: 166px;
			    max-width: 135px;
			}
			.acf-repeater .acf-row .acf-fields .acf-button {
			    margin: 5px 0;
    			padding: 5px;
				font-size: 12px;
    			line-height: 12px;
				white-space: normal;
				height: auto;
				text-align: center;
			}
  		</style>';
}