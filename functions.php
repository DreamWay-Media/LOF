<?php
// General
add_theme_support('post-thumbnails');
add_post_type_support( 'page', 'excerpt' );

// Less Compile
add_action('init', 'less_compile');
function less_compile(){
    if(get_option('less_status',1)==1) {
        $dir = dirname(__FILE__);
        include_once $dir . "/css/lessc.inc.php";
        $less = new lessc;
        $less->setPreserveComments(true);
        try {
            $less->setFormatter("compressed");
            //$less->compileFile($dir . "/css/app_" . get_locale() . ".less", $dir . "/css/app_" . get_locale() . ".css");
            $less->compileFile($dir . "/css/app.less", $dir . "/css/app.css");
        } catch (exception $e) {
            echo "fatal error: " . $e->getMessage();
        }
    }
}
add_action('init', 'sidebars');
function sidebars() {
	register_sidebar(
		array(
			'name'          => 'category',
			'id'            => 'category',
			'description'   => 'category links',
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
  register_sidebar(
		array(
			'name'          => 'address',
			'id'            => 'address',
			'description'   => 'address links',
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
  register_sidebar(
		array(
			'name'          => 'social',
			'id'            => 'social',
			'description'   => 'address links',
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
  register_sidebar(
		array(
			'name'          => 'flags',
			'id'            => 'flags',
			'description'   => 'flags of countries',
			'before_widget' => '<section id="%1$s" class="widget %2$s container">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
  register_sidebar(
		array(
			'name'          => 'shop',
			'id'            => 'shop',
			'description'   => 'shop links',
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
  register_sidebar(
		array(
			'name'          => 'newsletter',
			'id'            => 'newsletter',
			'description'   => 'newsletter links',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<div class="title-block wow fadeInDown" data-wow-duration="0.7s" data-wow-delay="0.5s"><h2>',
			'after_title'   => '</h2></div>',
		)
	);
	 register_sidebar(
		array(
			'name'          => 'search',
			'id'            => 'search',
			'description'   => 'search links',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
		)
	);
}
add_shortcode('archive_by_year_and_month','get_archive_by_year_and_month');

function get_archive_by_year_and_month($atts=array()){
    global $wpdb;
    $years = $wpdb->get_col("SELECT DISTINCT YEAR(post_date) FROM $wpdb->posts WHERE post_type = 'post' AND post_status = 'publish' ORDER BY post_date DESC");
    if($years){
        $rueckgabe = '<ul>';
        foreach($years as $year){
            $rueckgabe.='<li class="jahr"><a href="'.get_year_link($year).'">'.$year.'</a>';
            $rueckgabe.='<ul class="monthlist">';
            $months = $wpdb->get_col($wpdb->prepare("SELECT DISTINCT MONTH(post_date) FROM $wpdb->posts WHERE post_type='post' AND post_status='publish' AND YEAR(post_date) = %d ORDER BY post_date ASC",$year));
            foreach($months as $month){
                $dateObj   = DateTime::createFromFormat('!m', $month);
                $monthName = $dateObj->format('F');
                $rueckgabe.='<li class="month"><a href="'.get_month_link($year,$month).'">'.$monthName.'</a></li>';
            }
            $rueckgabe.='</ul>';
            $rueckgabe.='</li>';
        }
        $rueckgabe.='</ul>';
    }
    return $rueckgabe;
}
add_filter('admin_init', 'less_register_settings');
function less_register_settings(){
    register_setting('general', 'less_status', 'esc_attr');
    add_settings_field('less_status', '<label>'.__('LESS CSS Compiler Status' , 'less_status' ).'</label>' , 'less_settings_fields_html', 'general');
}
function less_settings_fields_html(){
    $value = get_option( 'less_status', '' );
    echo '<fieldset>';
    if($value == 0){
        echo '<label><input type="radio" name="less_status" value="1" /> <span>Enable</span></label><br>';
        echo '<label><input type="radio" name="less_status" value="0" checked="checked" /> <span>Disable</span></label><br>';
    }else{
        echo '<label><input type="radio" name="less_status" value="1" checked="checked" /> <span>Enable</span></label><br>';
        echo '<label><input type="radio" name="less_status" value="0" /> <span>Disable</span></label><br>';
    }
    echo '</fieldset>';
}

// Register Styles and Scripts
if ( !function_exists( 'register_styles_scripts' ) ) :
function register_styles_scripts() {
    // Styles
    wp_register_style( 'bootstrap'    , get_template_directory_uri() . '/css/bootstrap.css', array(), '6.5.1' );
    wp_register_style( 'owl'    , get_template_directory_uri() . '/css/owl.carousel.min.css', array(), '1.8.1' );
    wp_register_style( 'owl-theme'    , get_template_directory_uri() . '/css/owl.theme.default.min.css', array(), '1.8.1' );
    //wp_register_style( 'app'    , get_template_directory_uri() . '/css/app_'.get_locale().'.css', array(), '1.0.0' );
    wp_register_style( 'animate'    , get_template_directory_uri() . '/css/animate.css', array(), '1.0.0' );
    wp_register_style( 'app'    , get_template_directory_uri() . '/css/app.css', array(), '1.0.0' );


    // Scripts
    wp_register_script( 'jQuery3.3.1'    , get_stylesheet_directory_uri() . '/js/vendor/jquery.js', array(), '3.3.1', true );
    wp_register_script( 'bootstrap'     , get_stylesheet_directory_uri() . '/js/vendor/bootstrap.js', array(), '2.3.4', true );
    wp_register_script( 'owl'     , get_stylesheet_directory_uri() . '/js/vendor/owl.carousel.min.js', array(), '1.8.1', true );
    wp_register_script( 'wow'     , get_stylesheet_directory_uri() . '/js/vendor/WOW.js', array(), '1.0', true );
    wp_register_script( 'app'     , get_stylesheet_directory_uri() . '/js/app.js', array(), '', true );

    // Load'em All
    wp_enqueue_style( 'bootstrap' );
        wp_enqueue_style( 'owl' );
        wp_enqueue_style( 'owl-theme' );
    wp_enqueue_style( 'animate' );
    wp_enqueue_style( 'app' );

    wp_enqueue_script( 'jQuery3.3.1' );
    wp_enqueue_script( 'bootstrap' );
        wp_enqueue_script( 'owl' );
        wp_enqueue_script( 'wow' );
    wp_enqueue_script( 'app' );
}
add_action( 'wp_enqueue_scripts', 'register_styles_scripts' );
endif;


// Register Navigation Menus
if ( !function_exists( 'register_adora_menus' ) ) :
function register_adora_menus() {
    register_nav_menus(
        array(
            'main-menu' => __( 'main Menu' ),
            'cat-menu' => __( 'Category Menu' ),
            'footer-info' => __( 'Footer info' )
        )
    );
}
add_action( 'init', 'register_adora_menus' );
endif;


function my_custom_post_type_archive_where($where,$args){
    $post_type  = isset($args['post_type'])  ? $args['post_type']  : 'post';
    $where = "WHERE post_type = '$post_type' AND post_status = 'publish'";
    return $where;
}
add_filter( 'getarchives_where','my_custom_post_type_archive_where',10,2);


// Add WooCommerce support to a theme using
function mytheme_add_woocommerce_support() {
	add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support' );


/**
 * Add the product's sku to the WooCommerce shop/category pages. The description displays after the product's name, but before the product's price.
 *
 *
 * Put this snippet into a child theme's functions.php file
 */
 add_action( 'woocommerce_shop_loop_item_title', 'woocommerce_after_shop_loop_item_sku_in_cart', 5, 1);
  function woocommerce_after_shop_loop_item_sku_in_cart( $template ) {
    global $product;
   $sku = $product->get_sku();
   echo "<div class='meta'>" . $sku . "</div>"; }



// adding a woocommerce slide product gallery to my custom theme
   add_action( 'after_setup_theme', 'bctheme_setup' );

   function bctheme_setup() {
   add_theme_support( 'wc-product-gallery-slider' );
   add_theme_support( 'wc-product-gallery-lightbox' );
   add_theme_support( 'wc-product-gallery-zoom' );
   }


 if ( class_exists( 'YITH_YWRAQ_Frontend' ) ) {
    // remove_action( 'woocommerce_single_product_summary', array( YITH_YWRAQ_Frontend(), 'add_button_single_page' ), 35 );
    add_action( 'woocommerce_after_shop_loop_item_title', array( YITH_YWRAQ_Frontend(), 'add_button_single_page' ), 25 );
}
 
// Translations
// 
// display an 'Out of Stock' label on archive pages
add_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_stock', 10 );
function woocommerce_template_loop_stock() {
    global $product;
    if ( ! $product->managing_stock() && ! $product->is_in_stock() )
        echo '<p class="stock out-of-stock">Out of Stock</p>';
}
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_product_stock', 10 );
function woocommerce_template_product_stock() {
    global $product;
    if ( ! $product->managing_stock() && ! $product->is_in_stock() )
        echo '<p class="stock out-of-stock">Out of Stock</p>';
}
