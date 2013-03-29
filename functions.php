<?php
include_once('functions/admin.php');
include_once('functions/theme.php');
include_once('widgets/widget-newsletter.php');
include_once('widgets/widget-announcement.php');
include_once('widgets/widget-main-announcement.php');
//include_once('functions/custom-post-type.php');

/************* THUMBNAIL SIZE OPTIONS *************/

// Thumbnail sizes
add_image_size( 'sn-thumb-600', 600, 150, true );
add_image_size( 'sn-thumb-300', 300, 100, true );

/************* ACTIVE SIDEBARS ********************/
// Sidebars & Widgetizes Areas
function sn_register_sidebars() {
    register_sidebar(array(
    	'id' => 'sidebar1',
    	'name' => __('Sidebar 1', 'sn'),
    	'description' => __('The first (primary) sidebar.', 'sn'),
    	'before_widget' => '<div id="%1$s" class="widget %2$s">',
    	'after_widget' => '</div>',
    	'before_title' => '<h4 class="widget-title">',
    	'after_title' => '</h4>',
    ));

    register_sidebar(array(
        'id' => 'banner',
        'name' => __('Homepage Banner', 'sn'),
        'description' => __('The banner on the homepage', 'sn'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>',
    ));

    register_sidebar(array(
        'id' => 'home-region-left',
        'name' => __('Homepage Left Region', 'sn'),
        'description' => __('The left region of the homepage', 'sn'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>',
    ));

    register_sidebar(array(
        'id' => 'home-region-center',
        'name' => __('Homepage Center Region', 'sn'),
        'description' => __('The center region of the homepage', 'sn'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>',
    ));

    register_sidebar(array(
        'id' => 'home-region-right',
        'name' => __('Homepage Right Region', 'sn'),
        'description' => __('The right region of the homepage', 'sn'),
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>',
    ));
}
add_action( 'widgets_init', 'sn_register_sidebars' );

/************* CUSTOM STYLES **********************/
function sn_mcekit_editor_buttons($buttons) {  
    array_unshift($buttons, 'styleselect');  
    return $buttons;  
}  
  
add_filter('mce_buttons_2', 'sn_mcekit_editor_buttons');

function sn_mcekit_editor_settings($settings) {
    if (!empty($settings['theme_advanced_styles']))
        $settings['theme_advanced_styles'] .= ';';    
    else
        $settings['theme_advanced_styles'] = '';

    $classes = array(
        __('Button','textdomain') => 'button',
        __('Header subheader', 'textdomain') => 'subheader',
        __('List circle', 'textdomain') => 'circle',
        __('List disc', 'textdomain') => 'disc',
        __('List square', 'textdomain') => 'square',
        __('Paragraph Lead', 'textdomain') => 'lead',
        __('VCard', 'textdomain') => 'vcard',
        __('VCard Email', 'textdomain') => 'email',
        __('VCard Fullname', 'textdomain') => 'fn',
        __('VCard Locality', 'textdomain') => 'locality',
        __('VCard Phone', 'textdomain') => 'phone',
        __('VCard ZIP', 'texdomain') => 'state',
        __('VCard Street Address', 'textdomain') => 'street-address',
    );

    $class_settings = '';
    foreach ( $classes as $name => $value )
        $class_settings .= "{$name}={$value};";

    $settings['theme_advanced_styles'] .= trim($class_settings, '; ');
    return $settings;
} 

add_filter('tiny_mce_before_init', 'sn_mcekit_editor_settings');

/************* SEARCH FORM LAYOUT *****************/

// Search Form
function sn_wpsearch($form) {
    $form = '<form role="search" method="get" id="search-form" action="' . home_url( '/' ) . '" >
    <label class="screen-reader-text" for="s">' . __('Search for:', 'sn') . '</label>
    <input type="text" value="' . get_search_query() . '" name="s" id="s" placeholder="'.esc_attr__('Search the Site...','sn').'" />
    <input type="submit" class="button" id="search-submit" value="'. esc_attr__('Search') .'" />
    </form>';
    return $form;
}
add_filter( 'get_search_form', 'sn_wpsearch' );

?>
