<?php   
  
/* 
Plugin Name: Date Metabox
Plugin URI: http://www.wearecondiment.com
Description: For adding events
Version: 1.0 
Author: Chris Waters
Author URI: http://www.wearecondiment.com
*/

function Date_Metabox() {
	
	$x_options = get_option('date_metabox_options');
	$datepicker_post_types = $x_options['post_type'];

	$datepicker_mb = new WPAlchemy_MetaBox(array
	(
		'id' => '_date_meta',
		'title' => 'Datepicker Meta',
		'template' => dirname(__FILE__) . '/date_meta.php',
		'types' => $datepicker_post_types,
		'mode' => WPALCHEMY_MODE_EXTRACT,
		'prefix' => '_my_'
	));
	
	global $pagenow, $typenow;
	$dir = get_bloginfo('template_directory');
	
	if (is_admin() && $pagenow=='post-new.php' OR $pagenow=='post.php') {
		wp_enqueue_script('admin-jquery-ui', plugins_url('/js/jquery-ui.js',__FILE__), 'jquery');
		wp_enqueue_script('admin-jquery-ui-timepicker', plugins_url('/js/timepicker.js',__FILE__), 'jquery');
		wp_enqueue_script('admin-date-picker', plugins_url('/js/condiment_date_picker.js',__FILE__), 'jquery');
	}
	
	include_once dirname(__FILE__) . '/helpers.php';
	
}

add_action('init','Date_Metabox');

function customcss() {
	$dir = get_bloginfo('template_directory');
	wp_register_style('jquery-ui-css',  plugins_url('/css/jquery-ui.css', __FILE__) );
	wp_enqueue_style('jquery-ui-css');
}

add_action('admin_head','customcss');

function plugin_admin_add_page() {
	add_options_page('Date Metabox Options', 'Date Metabox', 'manage_options', 'plugin', 'plugin_options_page');
}

add_action('admin_menu', 'plugin_admin_add_page');

function plugin_options_page() {
?>
	<div class="wrap">
		<h2>Posts Types To Use Date Metabox</h2>
		<form action="options.php" method="post">
			<?php settings_fields('date_metabox_options'); ?>
			<?php do_settings_sections('plugin'); ?>
			<input name="Submit" type="submit" value="<?php esc_attr_e('Save Changes'); ?>" />
		</form>
	</div>
<?php }

add_action('admin_init', 'plugin_admin_init');

function plugin_admin_init(){
	register_setting('date_metabox_options', 'date_metabox_options', 'date_metabox_options_validate' );
	add_settings_section('plugin_main', 'Main Settings', 'plugin_section_text', 'plugin');
	add_settings_field('plugin_text_string', 'Plugin Text Input', 'plugin_setting_string', 'plugin', 'plugin_main');
}

function plugin_section_text() {
	echo '<p>Main description of this section here.</p>';
}

function plugin_setting_string() {
	$options = get_option('date_metabox_options');
	$post_types=get_post_types('','names'); 
	foreach ($post_types as $post_type ) {
		$checked = $options[$post_type] == 1 ? ' checked=checked' : '';
	  echo '<input type="checkbox" id="'.$post_type.'_cb" name="date_metabox_options['.$post_type.']" value="1"'.$checked.'><label for="'.$post_type.'_cb">'.$post_type.'</label><br>';
	}
	//print_r($options);
}

function date_metabox_options_validate($input) {
	$options = get_option('date_metabox_options');
	$post_types=get_post_types('','names'); 
	foreach ($post_types as $post_type) {
		$options[$post_type] = $input[$post_type];
		if($options[$post_type] == 1) {
			$array[] = $post_type;
		}
	}
	$options['post_type'] = $array;
	$options['text_string'] = trim($input['text_string']);
	return $options;
}