<?php 

//adds dynamic tag support
function CTTF_theme_support(){
    add_theme_support('title-tag');
    add_theme_support('custom-logo');
    add_theme_support('post-thumbnails');
    
}
add_action('after_setup_theme', 'CTTF_theme_support');

function CTTF_menus()
{
	$locations= array(
		'primary' => "Top Nav"
	);
	register_nav_menus($locations);
}
add_action('init', 'CTTF_menus');

function CTTF_reg_styles(){
    $version = wp_get_theme()->get( 'Version' );
    wp_enqueue_style('CTTF-bootstrap', "https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css", array(), '4.4.1', 'all');
    wp_enqueue_style('CTTF-style', get_template_directory_uri('assets/css/main.css') . "/style.css", array('CTTF-bootstrap'), $version , 'all');
    wp_enqueue_style('CTTF-fontawesome',"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css", array(), '5.13.0', 'all');
}

add_action('wp_enqueue_scripts', 'CTTF_reg_styles');

function CTTF_reg_scripts(){
    $version = wp_get_theme()->get( 'Version' );
    wp_enqueue_script('CTTF-jquery', 'https://code.jquery.com/jquery-3.4.1.slim.min.js', array(), '3.4.1', true);   
    wp_enqueue_script('CTTF-popper', 'https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js', array(), '1.16.0', true);  
    wp_enqueue_script('CTTF-bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js', array(), '4.4.1', true);  
    wp_enqueue_script('CTTF-main', get_template_directory_uri() . "/assets/js/main.js", array(), $version , true);  
}

add_action('wp_enqueue_scripts', 'CTTF_reg_scripts');
function CTTF_widgets_init() {
	register_sidebar( array(
		'name'          => 'Home Top Nav',
		'id'            => 'home_nav_1',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '',
		'after_title'   => '',
    ) );
    register_sidebar( array(
		'name'          => 'Footer',
		'id'            => 'footer_1',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '',
		'after_title'   => '',
    ) );
    register_sidebar( array(
		'name'          => 'Front Page Body',
		'id'            => 'front-page-1',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '',
		'after_title'   => '',
    ) );
    register_sidebar( array(
		'name'          => 'Projects Post Body',
		'id'            => 'post-1',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '',
		'after_title'   => '',
	) );

}
add_action( 'widgets_init', 'CTTF_widgets_init' );

//customize color options
// Customize Appearance Options
function CTTF_customize_register( $wp_customize ) {

	$wp_customize->add_setting('CTTF_link_color', array(
		'default' => '#006ec3',
		'transport' => 'refresh',
    ));
    $wp_customize->add_setting('CTTF_bg_color', array(
		'default' => '#000000',
		'transport' => 'refresh',
	));

	$wp_customize->add_setting('CTTF_btn_color', array(
		'default' => '#006ec3',
		'transport' => 'refresh',
	));

	$wp_customize->add_setting('CTTF_btn_hover_color', array(
		'default' => '#004C87',
		'transport' => 'refresh',
	));

	$wp_customize->add_section('CTTF_standard_colors', array(
		'title' => __('Standard Colors', 'CTTF_theme'),
		'priority' => 30,
	));

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'CTTF_link_color_control', array(
		'label' => __('Link Color', 'CTTF_theme'),
		'section' => 'CTTF_standard_colors',
		'settings' => 'CTTF_link_color',
    ) ) );
    
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'CTTF_bg_color_control', array(
		'label' => __('Background Color', 'CTTF_theme'),
		'section' => 'CTTF_standard_colors',
		'settings' => 'CTTF_bg_color',
    ) ) );
    
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'CTTF_btn_color_control', array(
		'label' => __('Button Color', 'CTTF_theme'),
		'section' => 'CTTF_standard_colors',
		'settings' => 'CTTF_btn_color',
	) ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'CTTF_btn_hover_color_control', array(
		'label' => __('Button Hover Color', 'CTTF_theme'),
		'section' => 'CTTF_standard_colors',
		'settings' => 'CTTF_btn_hover_color',
	) ) );

}

add_action('customize_register', 'CTTF_customize_register');

function CTTF_customize_css() { ?>

    <style type="text/css">
        body {
            background-color: <?php echo get_theme_mod('CTTF_bg_color'); ?>;
        }
        social-list-a {
            border:0.1em solid <?php echo get_theme_mod('CTTF_link_color'); ?>;
        }
		a:link,
		a:visited {
			color: <?php echo get_theme_mod('CTTF_link_color'); ?>;
		}

		.site-header nav ul li.current-menu-item a:link,
		.site-header nav ul li.current-menu-item a:visited,
		.site-header nav ul li.current-page-ancestor a:link,
		.site-header nav ul li.current-page-ancestor a:visited {
			background-color: <?php echo get_theme_mod('CTTF_link_color'); ?>;
		}

		.btn-a,
		.btn-a:link,
		.btn-a:visited,
		div.hd-search #searchsubmit {
            border: 0.1em solid <?php echo get_theme_mod('CTTF_btn_color'); ?>;
            color: <?php echo get_theme_mod('CTTF_btn_color'); ?>;
		}

		.btn-a:hover,
		div.hd-search #searchsubmit:hover {
            
            color: <?php echo get_theme_mod('CTTF_bg_color'); ?>;
            background-color: <?php echo get_theme_mod('CTTF_btn_hover_color'); ?>;
		}

    </style>
    <?php }

add_action('wp_head', 'CTTF_customize_css');

?>