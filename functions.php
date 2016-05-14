<?php
/*
 *  Author: Pascal Bieri
 *  URL: http://www.leuchterag.ch
 *  functions.php für Imagenow Website
 */
define( 'THEME_VERSION', 1.0 );

/*-----------------------------------------------------------------------------------*/
/* ADD RSS FEED SUPPORT (ENABLES POST AND COMMENT RSS FEED LINKS TO HEAD)
/*-----------------------------------------------------------------------------------*/
add_theme_support( 'automatic-feed-links' );

/*-----------------------------------------------------------------------------------*/
/* ADD WORDPRESS TITLE TAG TO POSTS (NOT HARDCODED)
/*-----------------------------------------------------------------------------------*/
add_theme_support( 'title-tag' );

/*-----------------------------------------------------------------------------------*/
/* ENABLE SUPPORT FOR POST THUMBNAILS ON POSTS AND PAGES
/*-----------------------------------------------------------------------------------*/
add_theme_support( 'post-thumbnails' );

/**
 * Add automatic image sizes
 */
if ( function_exists( 'add_image_size' ) ) { 
	add_image_size( 'imagenow', 555 );
    add_image_size( 'background', 1920 );
}
/*-----------------------------------------------------------------------------------*/
/* SWITCH DEFAULT CORE MARKUP FOR SEARCH FORM, COMMENT FORM, AND COMMENTS
/* TO OUTPUT VALID HTML5.
/*-----------------------------------------------------------------------------------*/
add_theme_support( 'html5', array(
    'search-form',
    'comment-form',
    'comment-list',
    'gallery',
    'caption',
) );

/*-----------------------------------------------------------------------------------*/
/* REGISTER MENUS
/*-----------------------------------------------------------------------------------*/
add_theme_support( 'nav-menus' );

register_nav_menus( array(
	'main' => 'Hauptnavigation',
	)
);

/*-----------------------------------------------------------------------------------*/
/* REGISTER WIDGET AREAS
/*-----------------------------------------------------------------------------------*/


/*-----------------------------------------------------------------------------------*/
/* ENQUEUE STYLES AND SCRIPTS
/*-----------------------------------------------------------------------------------*/

// Load footer scripts
function footer_scripts()
{
	// If query if current Page is not wp-login-php or admin page
    if ($GLOBALS['pagenow'] != 'wp-login.php' && !is_admin()) {

        wp_register_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '1.0.0', true); 
        wp_enqueue_script('bootstrap'); 
        
        wp_register_script('bxslider', get_template_directory_uri() . '/js/jquery.bxslider.min.js', array('jquery'), '1.0.0', true); 
        wp_enqueue_script('bxslider');
        
        wp_register_script('imgliquid', get_template_directory_uri() . '/js/imgLiquid-min.js', array('jquery'), '1.0.0', true); 
        wp_enqueue_script('imgliquid');
        
        wp_register_script('main', get_template_directory_uri() . '/js/main.js', array('jquery'), '1.0.0', true); 
        wp_enqueue_script('main');
    } 
}
        
// Load header scripts
function header_scripts()
{
    if ($GLOBALS['pagenow'] != 'wp-login.php' && !is_admin()) {
    }
}

// Load styles
function theme_styles()
{
    wp_register_style('googlefonts', 'https://fonts.googleapis.com/css?family=Raleway:400,200,500,400italic,300,600,700|Open+Sans:400,300,300italic,400italic', array(), '1.0', 'all');
    wp_enqueue_style('googlefonts');  
        
    wp_register_style('font-fontawesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css', array(), '1.0', 'all');
    wp_enqueue_style('font-fontawesome');   
    
    wp_register_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.css', array(), '1.0', 'all');
    wp_enqueue_style('bootstrap');
    
    wp_register_style('bxslider', get_template_directory_uri() . '/css/jquery.bxslider.css', array(), '1.0', 'all');
    wp_enqueue_style('bxslider');    
    
    wp_register_style('main', get_template_directory_uri() . '/css/main.css', array(), '1.0', 'all');
    wp_enqueue_style('main');   
}


// Add scripts and styles
add_action('init', 'header_scripts'); 
add_action('init', 'footer_scripts'); 
add_action('wp_enqueue_scripts', 'theme_styles');


/*-----------------------------------------------------------------------------------*/
/* CUSTOMIZE BACKEND-LOGIN LOGO
/*-----------------------------------------------------------------------------------*/
function custom_loginlogo() {
	   echo '<style type="text/css">h1 a {background-image: url('.get_bloginfo('template_directory').'/img/backend/login-logo.png) !important; background-size: contain !important; height:61px !important; width:220px !important;}</style>';
	}
add_action('login_head', 'custom_loginlogo'); // ADD CUSTOM LOGIN LOGO 

/*-----------------------------------------------------------------------------------*/
/* FUNCTION CUSTOMIZE BACKEND FOOTER
/*-----------------------------------------------------------------------------------*/
function custom_footer() {
	add_filter( 'admin_footer_text', '__return_empty_string', 11 );
	add_filter( 'update_footer',     '__return_empty_string', 11 );
}
add_action( 'admin_menu', 'custom_footer' );

/*-----------------------------------------------------------------------------------*/
/* REMOVE DASHOBARD WIDGETS
/*-----------------------------------------------------------------------------------*/
function remove_dashboard_widget() {
		/* DEFAULT WIDGETS */
		remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );
        remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
        remove_meta_box( 'dashboard_primary', 'dashboard', 'side' );
        remove_meta_box( 'dashboard_activity', 'dashboard', 'normal');
        remove_meta_box( 'jetpack_summary_widget', 'dashboard', 'normal'); //jetpack statistics
        /* CUSTOM WIDGETS */
}
add_action('wp_dashboard_setup', 'remove_dashboard_widget' ); 

/* REMOVE WORDPRESS WELCOME PANEL */
remove_action( 'welcome_panel', 'wp_welcome_panel' );


/*-----------------------------------------------------------------------------------*/
/* CUSTOMIZE ADMIN BAR 
/*-----------------------------------------------------------------------------------*/

/* REMOVE ADMIN BAR IN FRONTEND */
show_admin_bar( false );

/*-----------------------------------------------------------------------------------*/
/* DISABLE WP EMOTICONS
/*-----------------------------------------------------------------------------------*/
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

/*-----------------------------------------------------------------------------------*/
/* DISABLE JETPACK CSS & DEVICEPIXEL IN FRONTEND 
/*-----------------------------------------------------------------------------------*/
function dequeue_devicepx() {
    wp_dequeue_script( 'devicepx' );
}
add_action( 'wp_enqueue_scripts', 'dequeue_devicepx', 20 );
add_filter( 'jetpack_implode_frontend_css', '__return_false' );

/*-----------------------------------------------------------------------------------*/
/* ADAVANCED CUSTOM FIELDS SETTINS
/*-----------------------------------------------------------------------------------*/


 ?>