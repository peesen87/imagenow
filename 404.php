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
            <div id="slider">
                <ul class="slider">
                    <li class="slide">
                        <div class="contentwrapper">
                            <div class="background">
                                <img src="<?php echo get_template_directory_uri(); ?>/img/home-header-01.jpg" />
                            </div>
                            <div class="content">
                                <span class="title">imagenow</span>
                                <span class="subtitle">Erfahren Sie mehr über uns!</span>
                                <a href="#" class="btn">Zum Angebot</a>
                            </div>
                        </div>
                    </li>
                    <li class="slide">
                        <div class="contentwrapper">
                            <div class="background">
                                <img src="<?php echo get_template_directory_uri(); ?>/img/home-header-01.jpg" />
                            </div>
                            <div class="content">
                                <span class="title">imagenow</span>
                                <span class="subtitle">Erfahren Sie mehr über uns!</span>
                                <a href="#" class="btn">Zum Angebot</a>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </header>
        
        <main>

            <section id="intro">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3>Leider wurde nichts gefunden!</h3>
                        </div>
                    </div>
                </div>
            </section>

        </main>
        
        <footer>    
        </footer>
    </div>

<?php wp_footer(); ?>    
</body>

</html>