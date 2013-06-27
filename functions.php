<?php
/**
 * Eaglet functions and definitions
 *
 * @package Eaglet
 */

$themename = "Eaglet";
$shortname = "eaglet";
$options = array (
array( "name" => "Style",
	"desc" => "Style",
	"id" => $shortname."_style",
	"type" => "select",
	"options" => array("default", "sidebar_style", "colors"),
	"std" => "default"),
);

function mytheme_add_admin() {

global $themename, $shortname, $options;

if ( $_GET['page'] == basename(__FILE__) ) {

if ( 'save' == $_REQUEST['action'] ) {

foreach ($options as $value) {
update_option( $value['id'], $_REQUEST[ $value['id'] ] ); }

foreach ($options as $value) {
if( isset( $_REQUEST[ $value['id'] ] ) ) { update_option( $value['id'], $_REQUEST[ $value['id'] ]  ); } else { delete_option( $value['id'] ); } }

header("Location: themes.php?page=functions.php&saved=true");
die;

} else if( 'reset' == $_REQUEST['action'] ) {

foreach ($options as $value) {
delete_option( $value['id'] ); }

header("Location: themes.php?page=functions.php&reset=true");
die;

}
}

add_theme_page($themename." Options", "".$themename." Options", 'edit_themes', basename(__FILE__), 'mytheme_admin');

}

function mytheme_admin() {

global $themename, $shortname, $options;

if ( $_REQUEST['saved'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings saved.</strong></p></div>';
if ( $_REQUEST['reset'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings reset.</strong></p></div>';

?>
<div class="wrap">
<h2><?php echo $themename; ?> Settings</h2>

<form method="post">

<?php foreach ($options as $value) {
switch ( $value['type'] ) {

case "open":
?>
<table width="100%" border="0" style="background-color:#eef5fb; padding:10px;">

<?php break;

case "close":
?>

</table><br />

<?php break;

case "title":
?>
<table width="100%" border="0" style="background-color:#dceefc; padding:5px 10px;"><tr>
<td valign="top" colspan="2"><h3 style="font-family:Georgia,'Times New Roman',Times,serif;"><?php echo $value['name']; ?></h3></td>
</tr>

<!--custom-->


<?php break;
case "sub-title":
?>
<h3 style="font-family:Georgia,'Times New Roman',Times,serif; padding-left:8px;"><?php echo $value['name']; ?></h3>
<!--end-of-custom-->


<?php break;

case 'text':
?>

<tr>
<td valign="top" width="20%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
<td width="80%"><input style="width:400px;" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_settings( $value['id'] ) != "") { echo get_settings( $value['id'] ); } else { echo $value['std']; } ?>" /></td>
</tr>

<tr>
<td><small><?php echo $value['desc']; ?></small></td>
</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #000000;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>

<?php
break;

case 'textarea':
?>

<tr>
<td valign="top" width="20%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
<td width="80%"><textarea name="<?php echo $value['id']; ?>" style="width:400px; height:200px;" type="<?php echo $value['type']; ?>" cols="" rows=""><?php if ( get_settings( $value['id'] ) != "") { echo get_settings( $value['id'] ); } else { echo $value['std']; } ?></textarea></td>

</tr>

<tr>
<td><small><?php echo $value['desc']; ?></small></td>
</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #000000;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>

<?php
break;

case 'select':
?>
<tr>
<td width="20%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
<td width="80%"><select style="width:240px;" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>"><?php foreach ($value['options'] as $option) { ?><option<?php if ( get_settings( $value['id'] ) == $option) { echo ' selected="selected"'; } elseif ($option == $value['std']) { echo ' selected="selected"'; } ?>><?php echo $option; ?></option><?php } ?></select></td>
</tr>

<tr>
<td><small><?php echo $value['desc']; ?></small></td>
</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #000000;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>

<?php
break;

case "checkbox":
?>
<tr>
<td width="20%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
<td width="80%"><?php if(get_option($value['id'])){ $checked = "checked=\"checked\""; }else{ $checked = "";} ?>
<input type="checkbox" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" value="true" <?php echo $checked; ?> />
</td>
</tr>

<tr>
<td><small><?php echo $value['desc']; ?></small></td>
</tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px dotted #000000;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>

<?php break;

}
}
?>

<p class="submit">
<input name="save" type="submit" value="Save changes" />
<input type="hidden" name="action" value="save" />
</p>
</form>
<form method="post">
<p class="submit">
<input name="reset" type="submit" value="Reset" />
<input type="hidden" name="action" value="reset" />
</p>
</form>

<?php
}
add_action('admin_menu', 'mytheme_add_admin');

/**
 * Register widgetized area and update sidebar with default widgets
 */
function eaglet_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'eaglet' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'eaglet_widgets_init' );

add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 200, 300, true ); // Normal post thumbnails
add_image_size( 'single-post-thumbnail', 400, 9999 ); // Permalink thumbnail size

remove_action('wp_head', 'wp_generator');

// hide ngg version show_nextgen_version
function global_hide_ngg_version($txt){
   return '';
}
add_filter('show_nextgen_version', 'global_hide_ngg_version');

// Prevents WordPress from testing ssl capability on domain.com/xmlrpc.php?rsd
remove_filter('atom_service_url','atom_service_url_filter');
// remove unncessary header info
function remove_header_info() {
    remove_action('wp_head', 'rsd_link');
    remove_action('wp_head', 'wlwmanifest_link');
    remove_action('wp_head', 'wp_generator');
    remove_action('wp_head', 'start_post_rel_link');
    remove_action('wp_head', 'index_rel_link');
    remove_action('wp_head', 'adjacent_posts_rel_link');
}
add_action('init', 'remove_header_info');

// remove extra css that recent comments widget injects
function remove_recent_comments_style() {
    global $wp_widget_factory;
    remove_action('wp_head', array($wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style'));
}
add_action('widgets_init', 'remove_recent_comments_style');

//Remove Version Number
function wpbeginner_remove_version() {
return '';}
add_filter('the_generator', 'wpbeginner_remove_version');

//Enable shortcode in widgets
add_filter('widget_text', 'do_shortcode');

function gpp_excerpt($text) { return str_replace('[...]', '<br /><a href="'.get_permalink().'">Read More &rarr;</a>', $text); } add_filter('the_excerpt', 'gpp_excerpt');

add_filter('login_errors',create_function('$a', "return null;"));

add_filter('excerpt_length', 'my_excerpt_length');
function my_excerpt_length($length) {
return 50; }

// add ie conditional html5 shim to header
add_action( 'wp_enqueue_scripts', 'wps_enqueue_lt_ie9' );
/**
 * Conditionally Enqueue Script for IE browsers less than IE 9
 *
 * @link http://php.net/manual/en/function.version-compare.php
 * @uses wp_check_browser_version()
 */
function wps_enqueue_lt_ie9() {
    global $is_IE;

    // Return early, if not IE
    if ( ! $is_IE ) return;

    // Include the file, if needed
    if ( ! function_exists( 'wp_check_browser_version' ) )
        include_once( ABSPATH . 'wp-admin/includes/dashboard.php' );

    // IE version conditional enqueue
    $response = wp_check_browser_version();
    if ( 0 > version_compare( intval( $response['version'] ) , 9 ) )
        wp_enqueue_script( 'wps-html5shiv', 'http://html5shim.googlecode.com/svn/trunk/html5.js', array(), 'pre3.6', false );
        wp_enqueue_script( 'wps-html5shiv', 'http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js', array(), 'pre3.6', false );
}

//add jquery
if (!is_admin()) add_action("wp_enqueue_scripts", "my_jquery_enqueue", 11);
function my_jquery_enqueue() {
   wp_deregister_script('jquery');
    wp_register_script( 'jquery', ( 'https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js' ), false, null, true );
   wp_enqueue_script('jquery');
}


function brooklyneagle_copyright() {
global $wpdb;
$copyright_dates = $wpdb->get_results("
SELECT
YEAR(min(post_date_gmt)) AS firstdate,
YEAR(max(post_date_gmt)) AS lastdate
FROM
$wpdb->posts
WHERE
post_status = 'publish'
");
$output = '';
if($copyright_dates) {
$copyright = "&copy; Everything Brooklyn Media " . $copyright_dates[0]->firstdate;
if($copyright_dates[0]->firstdate != $copyright_dates[0]->lastdate) {
$copyright .= '-' . $copyright_dates[0]->lastdate;
}
$output = $copyright;
}
return $output;
}

//Block Spam
function in_comment_post_like($string, $array) {
	foreach($array as $ref) { if(strstr($string, $ref)) { return true; } }
	return false;
}
function drop_bad_comments() {
	if (!empty($_POST['comment'])) {
		$post_comment_content = $_POST['comment'];
		$lower_case_comment = strtolower($_POST['comment']);
		$bad_comment_content = array(
			'viagra',
			'hydrocodone',
			'hair loss',
			'[url=http',
			'[link=http',
			'xanax',
			'tramadol',
			'lorazepam',
			'adderall',
			'dexadrine',
			'no prescription',
			'oxycontin',
			'without a prescription',
			'sex pics',
			'family incest',
			'cialis',
			'best forex',
			'amoxicillin'
		);
		if (in_comment_post_like($lower_case_comment, $bad_comment_content)) {
			$comment_box_text = wordwrap(trim($post_comment_content), 80, "\n  ", true);
			$txtdrop = fopen('/var/log/httpd/wp_post-logger/nullamatix.com-text-area_dropped.txt', 'a');
			fwrite($txtdrop, "  --------------\n  [COMMENT] = " . $post_comment_content . "\n  --------------\n");
			fwrite($txtdrop, "  [SOURCE_IP] = " . $_SERVER['REMOTE_ADDR'] . " @ " . date("F j, Y, g:i a") . "\n");
			fwrite($txtdrop, "  [USERAGENT] = " . $_SERVER['HTTP_USER_AGENT'] . "\n");
			fwrite($txtdrop, "  [REFERER  ] = " . $_SERVER['HTTP_REFERER'] . "\n");
			fwrite($txtdrop, "  [FILE_NAME] = " . $_SERVER['SCRIPT_NAME'] . " - [REQ_URI] = " . $_SERVER['REQUEST_URI'] . "\n");
			fwrite($txtdrop, '--------------**********------------------'."\n");
			header("HTTP/1.1 406 Not Acceptable");
			header("Status: 406 Not Acceptable");
			header("Connection: Close");
			wp_die( __('bang bang.') );
		}
	}
}
add_action('init', 'drop_bad_comments');

//Add NextGen Gallery search function
if ( function_exists( 'ngg_images_results' ) ) ngg_images_results();

## Function to do search on gallery pics from NextGen Gallery plugin
##
## 2 vars : (1) $keywords (usually coming from the standard search query from wordpress)
##	 (2) $numberPicCol (number of pic by row, if null it takes 4 )
function ngg_get_search_pictures ($keywords, $numberPicRow = NULL) {
global $wpdb;
//	$count=1;
//	if (!$numberPicRow) { $numberPicRow = "4"; }

$nngquery = "
SELECT pid,description,alttext
FROM wp_ngg_pictures
WHERE MATCH (description, filename, alttext) AGAINST ('$keywords' IN BOOLEAN MODE)
AND exclude = '0′
## start of tags code
UNION
SELECT pid,wp_ngg_pictures.description,alttext
FROM wp_ngg_pictures, wp_terms, wp_term_taxonomy, wp_term_relationships
WHERE wp_terms.term_id = wp_term_taxonomy.term_id and
wp_term_taxonomy.taxonomy = 'ngg_tag' and
wp_term_taxonomy.term_taxonomy_id = wp_term_relationships.term_taxonomy_id and
wp_term_relationships.object_id = wp_ngg_pictures.pid and
MATCH (wp_terms.name) AGAINST ('$keywords*' IN BOOLEAN MODE)
AND exclude = '0′
## end of tags code
";
$pictures = $wpdb->get_results($nngquery, ARRAY_A);

if ($pictures) foreach($pictures as $pic) {

$out .= '<div class="ngg-gallery-thumbnail">';
$out .= '<a href="'.nggGallery::get_image_url($pic[pid]).'" title="'.stripslashes($pic[description]).'" class="thickbox" rel="singlepic'.$pic[pid].'">';
$out .= '<img src="'.nggGallery::get_thumbnail_url($pic[pid]).'" alt="'.stripslashes($pic[alttext]).'" title="'.stripslashes($pic[alttext]).'" />';
$out .= "</a></div>\n";
// pictures use float left, so don't need the code that outputs a <br />
//	 if ($count == 0) {
//	 $out .= "<br />";
//	 }
//	 ++$count;
//	 $count%=$numberPicRow;
}
return $out;
};


//Custom login styles
function custom_login_logo() {
	echo '<style type="text/css">h1 a { background: url('.get_bloginfo('template_directory').'/images/login-logo.png) no-repeat !important; }
	html { background: #333333 url('.get_bloginfo("template_directory").'/images/bright_squares.jpg) !important; }
	#login {background: #333333!important; width:100%!important;}
	</style>';
}
add_action('login_head', 'custom_login_logo');

function login_styles() {
echo '<style type="text/css"></style>';
}
add_action('login_head', 'login_styles');

function diw_disable_default_widgets() {
     if(function_exists('unregister_sidebar_widget')) {
          unregister_widget('WP_Widget_Calendar');
          unregister_widget('WP_Widget_Links');
          unregister_widget('WP_Widget_Recent_Comments');
          unregister_widget('WP_Widget_Recent_Posts');
          unregister_widget('WP_Widget_RSS');
     }
}
add_action('widgets_init', 'diw_disable_default_widgets');

//Enable PHP in text widget
function php_text($text) {
 if (strpos($text, '<' . '?') !== false) {
 ob_start();
 eval('?' . '>' . $text);
 $text = ob_get_contents();
 ob_end_clean();
 }
 return $text;
}
add_filter('widget_text', 'php_text', 99);

//Remove Admin Backend Menus for all users, except User #1 (usually the first Admin)
function remove_menus () {
global $menu;
$user = wp_get_current_user();
    if ($user->ID!=1) { // Is not administrator,

        $restricted = array(__('Dashboard'), __('Posts'), __('Media'), __('Links'), __('Appearance'), __('Tools'), __('Settings'), __('Comments'), __('Plugins'));
        end ($menu);
        while (prev($menu)){
            $value = explode(' ',$menu[key($menu)][0]);
            if(in_array($value[0] != NULL?$value[0]:"" , $restricted)){unset($menu[key($menu)]);}
        }
    }
}
add_action('admin_menu', 'remove_menus');

// REMOVE THE WORDPRESS UPDATE NOTIFICATION FOR ALL USERS EXCEPT SYSADMIN
       global $user_login;
       get_currentuserinfo();
       if (!current_user_can('update_plugins')) { // checks to see if current user can update plugins
        add_action( 'init', create_function( '$a', "remove_action( 'init', 'wp_version_check' );" ), 2 );
        add_filter( 'pre_option_update_core', create_function( '$a', "return null;" ) );
       }

//Change the Footer in WordPress Admin Panel
function remove_footer_admin () {
echo 'Fueled by <a href="http://www.wordpress.org" target="_blank">WordPress</a> | Designed by <a href="#" target="_blank">Hannah Freimark</a></p>';
}

add_filter('admin_footer_text', 'remove_footer_admin');

add_action( 'wp_scheduled_delete', 'delete_expired_db_transients' );

//Delete expired transient data
function delete_expired_db_transients() {

    global $wpdb, $_wp_using_ext_object_cache;

    if( $_wp_using_ext_object_cache )
        return;

    $time = isset ( $_SERVER['REQUEST_TIME'] ) ? (int)$_SERVER['REQUEST_TIME'] : time() ;
    $expired = $wpdb->get_col( "SELECT option_name FROM {$wpdb->options} WHERE option_name LIKE '_transient_timeout%' AND option_value < {$time};" );

    foreach( $expired as $transient ) {

        $key = str_replace('_transient_timeout_', '', $transient);
        delete_transient($key);
    }
}

//Enable categories for pages
add_action( 'init', 'enable_category_taxonomy_for_pages', 500 );

function enable_category_taxonomy_for_pages() {
    register_taxonomy_for_object_type('category','page');

}

add_filter('manage_pages_columns', 'eaglet_custom_columns');
function eaglet_custom_columns($defaults) {
    unset($defaults['comments']);
    unset($defaults['author']);
    return $defaults;
}

add_action( 'init', 'create_photographer' );
function create_photographer() {
 $labels = array(
    'name' => _x( 'Photographers' ),
    'singular_name' => _x( 'Photographer' ),
    'search_items' =>  __( 'Search Photographers' ),
    'all_items' => __( 'All Photographers' ),
    'edit_item' => __( 'Edit Photographer' ),
    'update_item' => __( 'Update Photographer' ),
    'add_new_item' => __( 'Add New Photographer' ),
    'new_item_name' => __( 'New Photographer Name' ),
  );

  register_taxonomy('photographer','page',array(
    'hierarchical' => false,
    'labels' => $labels,
    'show_ui'           => true,
	'show_admin_column' => true,

  ));
}

add_filter('wp_nav_menu_items','add_search_box', 10, 2);
function add_search_box($items, $args) {

        ob_start();
        get_search_form();
        $searchform = ob_get_contents();
        ob_end_clean();

        $items .= '<li>' . $searchform . '</li>';

    return $items;
}