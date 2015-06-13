<?php
/**
 * Get the AppPresser engine started
 */
require_once( get_template_directory() . '/inc/init.php' );

/**
 * Child theme (do not remove)
 */
define( 'CHILD_THEME_NAME', 'Archetype for AppPresser' );
define( 'CHILD_THEME_URL', 'http://logoscreative.co' );
define( 'CHILD_THEME_VERSION', '1.0.7' );

/**
 * Example for how to remove actions hooked in with AppTheme.
 * Modify or delete.
 */
//Remove the // from the start of the line below to make these filters work.

//add_action( 'after_setup_theme', 'appp_child_after_setup_theme' );

function appp_child_after_setup_theme() {
	appp_remove_hook( 'appp_page_title', 'do_page_title' );
	// Add our notice that we're using a child-theme
	add_action( 'appp_page_title', 'appp_child_replace_title' );
}

function appp_child_replace_title() {
	?>
	<h1 class="site-title page-title">New Page Title Example</h1>
<?php
}

/**
 * Styles & Scripts
 */
function archetype_enqueue_bootstrap() {

	// Dequeue default AppPresser files to replace with new ones

	wp_enqueue_style( 'bootstrap' );

	function archetype_enqueue_bootstrap() {

		if ( !defined('ARCHETYPE_ENQUEUE') ) {

			wp_enqueue_style( 'bootstrap-latest', '//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css' );

			wp_enqueue_script( 'bootstrap-latest', '//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js', array( 'jquery' ) );

			wp_enqueue_style( 'font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css' );

		} elseif ( defined('ARCHETYPE_ENQUEUE') && ARCHETYPE_ENQUEUE === 'bower' ) {

			wp_enqueue_style( 'archetype-styles', get_stylesheet_directory_uri() . '/assets/dist/css/main.min.css' );

			wp_enqueue_script( 'archetype-scripts', get_stylesheet_directory_uri() . '/assets/dist/js/scripts.min.js', array('jquery'), false, true );

		}

	}

	add_action( 'wp_enqueue_scripts', 'archetype_enqueue_bootstrap' );

}

add_action( 'wp_enqueue_scripts', 'archetype_enqueue_bootstrap' );