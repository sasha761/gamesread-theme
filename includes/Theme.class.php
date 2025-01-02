<?php
Timber\Timber::init();
if ( ! class_exists( 'Timber' ) ) {
  add_action( 'admin_notices', function () {
    echo '<div class="error"><p>Timber not activated. Make sure you activate the plugin in <a href="' . esc_url( admin_url( 'plugins.php#timber' ) ) . '">' . esc_url( admin_url( 'plugins.php' ) ) . '</a></p></div>';
  } );

  return;
}

use Timber\ImageHelper;
use Timber\Menu;
use Timber\Site;
use Timber\URLHelper;
use Twig\Extension\StringLoaderExtension;
use Twig\TwigFilter;

Timber::$dirname = 'templates';


class StarterSite extends Timber\Site {
  /** Add timber support. */
  public function __construct() {
    add_action( 'after_setup_theme', array( $this, 'theme_supports' ) );
    add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
    add_filter( 'timber/context', array( $this, 'add_to_context' ) );
    add_filter( 'timber/twig', array( $this, 'add_to_twig' ) );
    add_action( 'widgets_init', array( $this, 'register_widgets' ) );
    // add_action( 'init', array( $this, 'register_post_types', ) );
    // add_action( 'init', array( $this, 'register_taxonomies' ) );
    parent::__construct();
  }

  public function register_widgets() {
  	register_sidebar(
			array(
				'name'          => esc_html__( 'Sidebar', 'rehab' ),
				'id'            => 'sidebar-1',
				'description'   => esc_html__( 'Add widgets here.', 'rehab' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h2 class="widget-title">',
				'after_title'   => '</h2>',
			)
		);
  }

  /** This is where you can register custom post types. */
  public function register_post_types() {

  }

  /** This is where you can register custom taxonomies. */
  public function register_taxonomies() {

  }

  public function enqueue_scripts() {
    wp_enqueue_style( 'rehab-style', get_stylesheet_uri(), array(), _S_VERSION );
		wp_enqueue_script( 'main-script', get_template_directory_uri() . '/dist/main.js', array(), '', true );
    wp_localize_script( 'main-script', 'ajax', array(
      'url' => site_url(),
      'nonce' => wp_create_nonce('wp_rest')
    ));
		wp_enqueue_style( 'main-style', get_template_directory_uri() . '/dist/main.css', array(), null, false );
  }

  // public function getIp() {
	// 	$keys = [
	// 		'HTTP_CLIENT_IP',
	// 		'HTTP_X_FORWARDED_FOR',
	// 		'REMOTE_ADDR'
	// 	];
	// 	foreach ( $keys as $key ) {
	// 		if ( ! empty( $_SERVER[ $key ] ) ) {
	// 			$ip = explode( ',', $_SERVER[ $key ] );        
	// 			$ip =	trim(end($ip));
	// 			if ( filter_var( $ip, FILTER_VALIDATE_IP ) ) {
	// 				return $ip;
	// 			}
	// 		}
	// 	}
	// }

  public function add_to_context($context) {
    $context['main_menu']          = Timber::get_menu( 'menu-1' );
    $context['footer_menu']        = Timber::get_menu( 'menu-2' );
    $context['admin_email']        = get_option('admin_email');
    $context['options']            = get_fields('option');
    // $content['user_IP']            = $this->getIp();

		if ( function_exists( 'yoast_breadcrumb' ) ) {
    	$context['breadcrumbs'] = yoast_breadcrumb('<div class="c-breadcrumbs">','</div>', false );
  	}

    return $context;
  }

  // Here add / register filters and hooks
  public function add_to_twig( $twig ) {
    $twig->addExtension( new StringLoaderExtension() );
    $twig->addFilter( new TwigFilter( 'shortcodeHide', array( $this, 'shortcodeHide' ) ) );
    $twig->addFilter( new TwigFilter( 'image', array( $this, 'image' ) ) );
    $twig->addFilter( new TwigFilter( 'reading', array( $this, 'reading' ) ) );
    return $twig;
  }

  public function theme_supports() {
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'menus' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'rehab' ),
				'menu-2' => esc_html__( 'footer', 'rehab' ),
			)
		);
	}


  public function reading($post_id) {
    $content = get_post_field( 'post_content', $post_id );
    $word_count = str_word_count( strip_tags( $content ) );
    $readingtime = ceil($word_count / 200);

    if ($readingtime == 1) {
      $timer = " minute";
    } else {
      $timer = " minutes";
    }

    $totalreadingtime = $readingtime . $timer;
    return $totalreadingtime;
  }

	public function shortcodeHide($content) {
		$content = preg_replace('/\[.*?\]/', '', $content);
    return $content;
  }
  
  public function image($id) {
    $content = get_post($id);
    $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $content->post_content, $matches);
    if (has_post_thumbnail($id)) {
      $content = get_the_post_thumbnail_url($id);
    } else if(!empty($matches[1][0])){
      $content = $matches[1][0];
    } else {
      $content = "/wp-content/themes/news/src/img/cropped-games-read-logo-1.png";
    }
    
    return $content;
  }
}

new StarterSite();