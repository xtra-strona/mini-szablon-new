<?php
if ( ! function_exists( 'twentysixteen_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 *
 * Create your own twentysixteen_setup() function to override in a child theme.
 *
 * @since Twenty Sixteen 1.0
 */
function twentysixteen_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Twenty Sixteen, use a find and replace
	 * to change 'twentysixteen' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'twentysixteen', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
    * Dodaliśmy Support dla Header image
  */
 	$args = array(
 		'flex-width'    => true,
 		'width'         => 980,
 		'flex-height'    => true,
 		'height'        => 200,
 		'default-image' => get_template_directory_uri() . '/images/header.jpg',
 	);
 	add_theme_support( 'custom-header', $args );


	/*
	 * Enable support for custom logo.
	 *
	 *  @since Twenty Sixteen 1.2
	 */

	add_theme_support( 'custom-logo', array(
	'height'      => 50,
	'width'       => 50,
	'flex-height' => true,
	'flex-width'  => true,
	'header-text' => array( 'site-title', 'site-description' ),

) );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 1200, 9999 );

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'twentysixteen' ),
	//	'social'  => __( 'Social Links Menu', 'twentysixteen' ),
) );

// SUPPORT DLA CUSTOM BACKGROUND
add_theme_support( 'custom-background' );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

add_theme_support( 'post-formats', array( 'link', 'gallery') );

}
endif; // twentysixteen_setup
add_action( 'after_setup_theme', 'twentysixteen_setup' );

//Register Sidebar
add_action( 'widgets_init', 'theme_slug_widgets_init' );
function theme_slug_widgets_init() {
      
    register_sidebar( array(
        'name' => __( 'Prawy Sidebar', 'theme-slug' ),
        'id' => 'sidebar-prawy',
        'description' => __( 'Widgets in this area will be shown on all posts and pages.', 'theme-slug' ),
        'before_widget' => '<div id="%1$s" class="well %2$s">',
	'after_widget'  => '</div>',
	'before_title'  => '<h2 class="widgettitle">',
	'after_title'   => '</h2>',
    ) );
    
    // DODATKOWY SIDEBAR
        register_sidebar( array(
        'name' => __( 'Sidebar Strony', 'theme-slug' ),
        'id' => 'sidebar-strony',
        'description' => __( 'Widgets in this area will be shown on all posts and pages.', 'theme-slug' ),
        'before_widget' => '<div id="%1$s" class="well %2$s">',
	'after_widget'  => '</div>',
	'before_title'  => '<h2 class="widgettitle">',
	'after_title'   => '</h2>',
    ) );  
}

require_once('inc/wp_bootstrap_navwalker.php');

//Comments Template
add_filter( 'comment_form_default_fields', 'bootstrap3_comment_form_fields' );
function bootstrap3_comment_form_fields( $fields ) {
		$commenter = wp_get_current_commenter();

		$req      = get_option( 'require_name_email' );
		$aria_req = ( $req ? " aria-required='true'" : '' );
		$html5    = current_theme_supports( 'html5', 'comment-form' ) ? 1 : 0;

		$fields   =  array(
				'author' => '<div class="form-group comment-form-author">' . '<label for="author">' . __( 'Name' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
										'<input class="form-control" id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></div>',
				'email'  => '<div class="form-group comment-form-email"><label for="email">' . __( 'Email' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
										'<input class="form-control" id="email" name="email" ' . ( $html5 ? 'type="email"' : 'type="text"' ) . ' value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></div>',
				'url'    => '<div class="form-group comment-form-url"><label for="url">' . __( 'Website' ) . '</label> ' .
										'<input class="form-control" id="url" name="url" ' . ( $html5 ? 'type="url"' : 'type="text"' ) . ' value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></div>'
		);

		return $fields;
}

//Comments Textarea
add_filter( 'comment_form_defaults', 'bootstrap3_comment_form' );
function bootstrap3_comment_form( $args ) {
		$args['comment_field'] = '<div class="form-group comment-form-comment">
						<label for="comment">' . _x( 'Comment', 'noun' ) . '</label>
						<textarea class="form-control" id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea>
				</div>';
		$args['class_submit'] = 'btn btn-default'; // since WP 4.1

		return $args;
}


/**

 * Proper way to enqueue scripts and styles

 */

function moje_css_js() {

    // wp_enqueue_style( 'style-name', get_stylesheet_uri() );

// Pamiętaj że style dodajesz dzięki funkcji w headerze strony wp_head();

   wp_enqueue_style('bootstrap-min', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '0.1.0', 'all');

   wp_enqueue_style('blog-home', get_template_directory_uri() . '/css/blog-home.css', array(), '0.2.0', 'all');

// Wyrejestrowałem Defoltowy skrypt Jquery ładowany w wp_head(),  co może mieć wpływ na prędkość oraz mam większą kontrolę nad jego zachowaniem

    wp_deregister_script( 'jquery' );

// Zauważ na końcu " true " => jeśli dasz " false " to skrypt załaduje się w headerze strony czyli odpowiednio true łąduje skrypty w zaczepie wp_footer(); natomiast false w zaczepie wp_head();
    wp_enqueue_script( 'jquery', get_template_directory_uri() . '/js/jquery.js', array(), '3.0.0', true );

    wp_enqueue_script( 'parallax', get_template_directory_uri() . '/js/parallax.min.js', array('jquery'), '4.0.0', true );

    wp_enqueue_script( 'bootstrap-min', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '5.0.0', true );

}

add_action( 'wp_enqueue_scripts', 'moje_css_js' );

// Hok w wp_head()
function hook_css() {
    ?>
        <style>

            footer {
				background-color: #094a40;
				color: aliceblue;
				padding: 3rem 1rem;
				margin: 0px 0;
            }

          /*TUTAJ DODALIŚMY NASZE STYLE KOLORU NAGŁÓWKA*/
			.parallax-window h1 {
				color: #<?php echo get_header_textcolor(); ?>;
			}

        </style>
    <?php
}
add_action('wp_head', 'hook_css');

// 1 Akcja w wp_footer()
// function moja_funkcja() {
//     echo '<h1>Dodaliśmy 1 Tekst na Samym Dole Strony w zaczepie wp_footer() </h1>';
// }
//         // TUTAJ ZMIENIŁEM PRIORYTET NA 20
// add_action( 'wp_footer', 'moja_funkcja', 20 );

// // 2 Akcja w wp_footer()
// function moja_nastepna_funkcja() {
//     echo '<h1>Dodaliśmy 2 Tekst na Samym Dole Strony w zaczepie wp_footer() </h1>';
// }
//                   // TUTAJ ZMIENIŁEM PRIORYTET NA 10
// add_action( 'wp_footer', 'moja_nastepna_funkcja', 10 );
