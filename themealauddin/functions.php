<?php
//Load css
function load_css(){
    wp_register_style('webambootstrap', get_template_directory_uri() . '/css/webambootstrap.min.css', array(), false, 'all');
    wp_enqueue_style('webambootstrap');

    wp_register_style('fawesome', get_template_directory_uri() . '/css/font-awesome.min.css', array(), false, 'all');
    wp_enqueue_style('fawesome');

    wp_register_style('main', get_template_directory_uri() . '/css/main.css', array(), false, 'all');
    wp_enqueue_style('main');

    wp_register_style('mobile', get_template_directory_uri() . '/css/mobile.css', array(), false, 'all');
    wp_enqueue_style('mobile');
}

add_action('wp_enqueue_scripts','load_css');

//Load js
function load_js(){
    wp_enqueue_script('jquery');
    wp_register_script('webambootstrapjs', get_template_directory_uri() . '/js/webambootstrap.min.js', 'jquery', false, true);
    wp_enqueue_script('webambootstrapjs');
    
    wp_register_script('alajs', get_template_directory_uri() . '/js/alacustomjs.js', 'jquery', false, true);
    wp_enqueue_script('alajs');
}

add_action('wp_enqueue_scripts','load_js');

//Add theme supprts


function themename_custom_logo_setup() {
    $defaults = array(
    'height'      => 100,
    'width'       => 400,
    'flex-height' => true,
    'flex-width'  => true,
    'header-text' => array( 'site-title', 'site-description' ),
   'unlink-homepage-logo' => true, 
    );
    add_theme_support( 'custom-logo', $defaults );
   }
   add_action( 'after_setup_theme', 'themename_custom_logo_setup' );


add_theme_support('menus');
add_theme_support('post-thumbnails');
add_theme_support('widgets');


//Menus
// register_nav_menus(
//     array(
//         'top-menu' => 'Top menu location',
//         'mobile-menu' => 'Mobile menu location',
//         'footer-menu' => 'Footer menu location'
//     )
// );


// nav walker menus for bootstrap

register_nav_menus( array(
    'topspcmenu' => __( 'Top Menu', 'spctheme' ),
) );

function register_navwalker(){
	require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
}
add_action( 'after_setup_theme', 'register_navwalker' );


//add image sizes

add_image_size('blog-large', 800, 400, true);
add_image_size('blog-small', 300, 200, true);

//Register sidebar

function mysidebars() {
    register_sidebar( 
        array(
        'name'          => __( 'Page Sidebar', 'textdomain' ),
        'id'            => 'page-sidebar',
        'description'   => __( 'Widgets in this area will be shown on all pages.', 'textdomain' ),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget'  => '</li>',
        'before_title'  => '<h5 class="widgettitle">',
        'after_title'   => '</h5>',
    ) 
);

    register_sidebar( 
        array(
        'name'          => __( 'Blog Sidebar', 'textdomain' ),
        'id'            => 'blog-sidebar',
        'description'   => __( 'Widgets in this area will be shown on all blogs.', 'textdomain' ),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget'  => '</li>',
        'before_title'  => '<h5 class="widgettitle">',
        'after_title'   => '</h5>',
    ) 
);
}
add_action( 'widgets_init', 'mysidebars' );


//Custom post creation
function my_first_post_type(){

$args = array(
'labels' => array('name' => 'Courses', 'singular_name' => 'Course'),
'hierarchical' => true,
'public' => true,
'has_archive' => true,
'menu_icon' => 'dashicons-shield',
'supports' => array('title', 'editor', 'thumbnail', 'custom-fields'),
// 'rewrite' => array('slug' => 'cars')
);

register_post_type('courses', $args);


}

add_action('init','my_first_post_type');


//my first taxonomy

function my_first_taxonomy(){

$args = array(
    'labels' => array('name' => 'Courses Category', 'singular_name' => 'Course Category'),
    'public' => true,
    'hierarchical' => true,

);

register_taxonomy('Course Category', array('courses'), $args);

}

add_action('init','my_first_taxonomy');



// custom bootstrap slider by Alauddin Mondal

function custom_bootstrap_slider() {
	$labels = array(
		'name'               => _x( 'Slider', 'post type general name'),
		'singular_name'      => _x( 'Slide', 'post type singular name'),
		'menu_name'          => _x( 'Bootstrap Slider', 'admin menu'),
		'name_admin_bar'     => _x( 'Slide', 'add new on admin bar'),
		'add_new'            => _x( 'Add New', 'Slide'),
		'add_new_item'       => __( 'Name'),
		'new_item'           => __( 'New Slide'),
		'edit_item'          => __( 'Edit Slide'),
		'view_item'          => __( 'View Slide'),
		'all_items'          => __( 'All Slide'),
		'featured_image'     => __( 'Featured Image', 'text_domain' ),
		'search_items'       => __( 'Search Slide'),
		'parent_item_colon'  => __( 'Parent Slide:'),
		'not_found'          => __( 'No Slide found.'),
		'not_found_in_trash' => __( 'No Slide found in Trash.'),
	);

	$args = array(
		'labels'             => $labels,
		'menu_icon'	         => 'dashicons-star-half',
    	'description'        => __( 'Description.'),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => true,
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => true,
		'menu_position'      => null,
		'supports'           => array('title','editor','thumbnail')
	);

	register_post_type( 'slider', $args );
}


add_action('init','custom_bootstrap_slider');


add_filter("the_excerpt", "spcExerptfiler");

  function spcExerptfiler($content)
  {
    // Take the existing content and return a subset of it
    return substr($content, 0, 155);
  }


// Creating the widget 
class wpb_widget extends WP_Widget {
  
function __construct() {
parent::__construct(
  
// Base ID of your widget
'wpb_widget', 
  
// Widget name will appear in UI
__('Alauddin Mondal Widget', 'wpb_widget_domain'), 
  
// Widget description
array( 'description' => __( 'This is sample widget from Alauddin', 'wpb_widget_domain' ), ) 
);
}
  
// Creating widget front-end
  
public function widget( $args, $instance ) {
$title = apply_filters( 'widget_title', $instance['title'] );
  
// before and after widget arguments are defined by themes
echo $args['before_widget'];
if ( ! empty( $title ) )
echo $args['before_title'] . $title . $args['after_title'];
  
// This is where you run the code and display the output
echo __( 'Alauddin, Mondal', 'wpb_widget_domain' );
echo $args['after_widget'];
}
          
// Widget Backend 
public function form( $instance ) {
if ( isset( $instance[ 'title' ] ) ) {
$title = $instance[ 'title' ];
}
else {
$title = __( 'New title', 'wpb_widget_domain' );
}
// Widget admin form
?>
<p>
<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
</p>
<?php 
}
      
// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) {
$instance = array();
$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
return $instance;
}
 
// Class wpb_widget ends here
} 
 
 
// Register and load the widget
function wpb_load_widget() {
    register_widget( 'wpb_widget' );
}
add_action( 'widgets_init', 'wpb_load_widget' );