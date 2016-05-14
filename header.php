<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>	

    <div id="wrapper">
        <header>
            <div id="navbar" class="group">
                <div id="logo">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                        <img src="<?php echo get_template_directory_uri(); ?>/img/logo-imagenow.png" />
                    </a>
                </div>
            
                <div id="mainnav">
                    <nav>
                        <?php wp_nav_menu(array(
                    		'menu' => 'Hauptnavigation', 
                            'container' => false,
                            'menu_class' => '',
                            'depth' => 1
						)); ?>
                    </nav>
                </div>
            </div>
            <div id="header-image" class="image-full">
                <div class="background">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/home-header-01.jpg" />
                </div>
                <div class="container">
                    <div class="row">
                        <div class="content">
                            <span class="title">Unser Portfolio überzeugt jeden!</span>
                            <span class="subtitle">Jetzt einen Kurs wählen!</span>
                        </div>
                    </div>
                </div>
            </div>
        </header>