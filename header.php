<?php
/**
 * Шаблон шапки (header.php)
 * @package WordPress
 * @subpackage mcreate
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<?php /* RSS и всякое */ ?>
    <link rel="alternate" type="application/rdf+xml" title="RDF mapping" href="<?php bloginfo( 'rdf_url' ); ?>">
    <link rel="alternate" type="application/rss+xml" title="RSS" href="<?php bloginfo( 'rss_url' ); ?>">
    <link rel="alternate" type="application/rss+xml" title="Comments RSS"
          href="<?php bloginfo( 'comments_rss2_url' ); ?>">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>"/>

    <!--[if lt IE 9]>
    <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
	<?php wp_head(); ?>
    <script src="http://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>
</head>
<body <?php body_class(); ?>>
<header class="header">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="header__logo"></div>

                <button type="button" id="button-menu" class="button-menu">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>

            <nav id="menu-block" class="menu-block">
				<?php bem_menu( 'top', 'main-menu' ); ?>

                <div class="search-header">

                    <div class="search-header__block">
                        <form role="search" method="get" class="search-form form-inline"
                              action="<?php echo home_url( '/' ); ?>">
                            <input type="search" class="search-input" id="search-field" placeholder="Строка для поиска"
                                   value="<?php echo get_search_query() ?>" name="s">
                            <button type="submit" class="btn btn-default btn-sm">Найти</button>
                        </form>
                    </div>

                    <button class="search-header__button">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="feather feather-search">
                            <circle cx="11" cy="11" r="8"></circle>
                            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                        </svg>
                    </button>
                </div>


            </nav>
        </div>
    </div>
    <div class="modal-bg"></div>
</header>


<!--<div class="col-md-4 hidden-sm">
    <div class="block-contacts">
        <span class="email">info@t-kalach.ru</span>
        <span class="phone">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="feather feather-phone-call">
                                <path d="M15.05 5A5 5 0 0 1 19 8.95M15.05 1A9 9 0 0 1 23 8.94m-1 7.98v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                            </svg>
                            +7 (915) 455-33-99
                        </span>
    </div>
</div>-->

<main class="main">


