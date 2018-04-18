<?php
function wpc_url_login(){
    return "http://www.dgrafo.com/"; // your URL here
}
function wpc_title_login(){
    return "Dinamo D\'GRAFO"; // your URL here
}
add_filter('login_headerurl', 'wpc_url_login');
add_filter('login_headertitle', 'wpc_title_login');


// Custom WordPress Login Logo
function login_css() {
	wp_enqueue_style( 'login_css', get_template_directory_uri() . '/_dg/login.css' );
}
add_action('login_head', 'login_css');


// Custom WordPress Footer
function remove_footer_admin () {
	echo '&copy; 2012 - D\'GRAFO - Todos os direitos reservados';
}
add_filter('admin_footer_text', 'remove_footer_admin');


// Custom Update Footer
function remove_footer_update () {
	return 'DÍNAMO 2.0';
}
add_filter('update_footer', 'remove_footer_update',100);

//Remove the Admin Bar
add_filter( 'show_admin_bar', '__return_false' );


// Specify the Auto-save Interval
define('AUTOSAVE_INTERVAL', 600); // 60 * 10, auto-saves every 10 minutes


//Reduce or Disable Revisions
//define('WP_POST_REVISIONS', 5); // Maximum 5 revisions per post
define('WP_POST_REVISIONS', false); // Disable revisions



//Empty Trash Automatically
define('EMPTY_TRASH_DAYS', 5 ); // Empty trash every 5 days


//Remove the screen options tab with screen_options hook
function remove_screen_options(){
    return false;
}
add_filter('screen_options_show_screen', 'remove_screen_options');


//Change default “Enter title here” text within post title input field
function title_text_input( $title ){
     return $title = 'Novo Título';
}
add_filter( 'enter_title_here', 'title_text_input' );


//Login Background
function login_enqueue_scripts(){
	echo '
		<div class="background-cover"></div>
		';
	}
add_action( 'login_enqueue_scripts', 'login_enqueue_scripts' );


include 'dg_menus.php';
include 'dg_widgets.php';
include 'dg_updates.php';

/**
* End
*/
?>
