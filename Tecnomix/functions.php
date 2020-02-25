<?php

function admin_styles() {
    wp_enqueue_style( 'vegasCSS', get_template_directory_uri() . '/login/css/vegas.min.css', false );
    wp_enqueue_style( 'loginCSS', get_template_directory_uri() . '/login/css/loginStyles.css', false );
  
    wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'vegasJS', get_template_directory_uri() . '/login/js/vegas.min.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script( 'loginjs', get_template_directory_uri() . '/login/js/login.js', array('jquery'), '1.0.0', true);
  
  
    wp_localize_script(
      'loginjs',
      'login_imagenes',
      array(
        "ruta_plantilla" => get_template_directory_uri()
      )
    );
  }
  add_action('login_enqueue_scripts', 'admin_styles', 10 );


/** Consultas reutilizables */
require get_template_directory() . '/inc/queries.php';

// Cuando el tema es activado
function gymfitness_setup() {
    // Habilitar imagenes destacadas
    add_theme_support('post-thumbnails');
    // Titulos SEO
    add_theme_support('title-tag');
    // Agregar imagenes de tamaño personalizado
    add_image_size('square', 350, 350, true);
    add_image_size('portrait', 350, 724, true);
    add_image_size('cajas', 400, 375, true);
    add_image_size('mediano', 700, 400, true);
    add_image_size('blog', 966, 644, true);
}
add_action('after_setup_theme', 'gymfitness_setup');

// Aqui van todas las funciones que son un poco más personalizadas y va estar disponibles en todos los archivos
function gymfitness_menus(){
    // Funcion para registrar menus
    register_nav_menus(array(
        'menu-principal'=>__('Menu Principal', 'Tecnomix'),
        'sociales_menu' => __('Menu Redes Sociales', 'Tecnomix')
    ));
}
// Para utilizar un hook usamos 'add_action'
add_action('init', 'gymfitness_menus');

// Script y styles
function Tecnomix_scripts_styles(){
    // La hoja de estilos principal
    wp_enqueue_style('normalize', get_template_directory_uri() . '/css/normalize.css', array(), '8.0.1');
    wp_enqueue_style('slicknavCSS', get_template_directory_uri() . '/css/slicknav.min.css', array(), '1.0.0');
    wp_enqueue_style('googleFont', 'https://fonts.googleapis.com/css?family=Open+Sans|Raleway:400,700,900|Staatliches&display=swap', array(), '1.0.0' );
    
    if(is_page('inicio')):
        wp_enqueue_style('bxSliderCSS', 'https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css', array(), '4.2.12');
    endif;
    
    // 'get_stylesheet_uri()' Para obtener la ruta de estilos
     wp_enqueue_style('style', get_stylesheet_uri(), array('normalize','googleFont'), '1.0.0');
     wp_enqueue_script('slicknavJS', get_template_directory_uri() . '/js/jquery.slicknav.min.js', array('jquery'), '1.0.0', true);
     wp_enqueue_script('scripts', get_template_directory_uri() . '/js/scripts.js', array('jquery','slicknavJS'), '1.0.0', true);

     if(is_page('inicio')):
        wp_enqueue_script('bxSliderJS', 'https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js', array('jquery'), '4.2.12', true);
     endif; 
    }
add_action('wp_enqueue_scripts', 'Tecnomix_scripts_styles');

// Definir Zona de Widgets
function gymfitness_widgets() {
    register_sidebar( array(
        'name' => 'Sidebar 1', 
        'id' => 'sidebar_1',
        'before_widget' => '<div class="widget">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="text-center texto-primario">',
        'after_title' => '</h3>'
    ));
    register_sidebar( array(
        'name' => 'Sidebar 2', 
        'id' => 'sidebar_2',
        'before_widget' => '<div class="widget">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="text-center texto-primario">',
        'after_title' => '</h3>'
    ));
}
add_action('widgets_init', 'gymfitness_widgets' );

/** Imagen Hero */
function gymfitness_hero_image() {
    
    // obtener id pagina principal
    $front_page_id = get_option('page_on_front');
    // Obtener id imagen
    $id_imagen = get_field('imagen_hero',  $front_page_id);
    // Obtener la imagen
    $imagen = wp_get_attachment_image_src($id_imagen, 'full')[0];
    // Style CSS
    wp_register_style('custom', false);
    wp_enqueue_style('custom');
    $imagen_destacada_css = "
        body.home .site-header {
            background-image: linear-gradient( rgba(0,0,0,0.75), rgba(0,0,0,0.75)  ), url($imagen) ;
        }
    ";
    wp_add_inline_style('custom', $imagen_destacada_css);
}
add_action('init', 'gymfitness_hero_image');

// Widget
function blogviajes_widgets() {
    register_sidebar(array(
      'name' => __('Footer Widgets'),
      'id' => 'footer_widget',
      'description' => 'Widgets para el Footer',
      'before_widget' => '<div id="%1$s" class="altura">',
      'after_widget' => '</div>',
      'before_title' => '<h3 class="widget-title">',
      'after_title' => '</h3>',
    ) );
  
  
    register_sidebar(array(
      'name' => __('Sidebar Widgets'),
      'id' => 'sidebar_widgets',
      'description' => 'Widgets para el Sidebar',
      'before_widget' => '<div id="%1$s" class="widget %2$s">',
      'after_widget' => '</div>',
      'before_title' => '<h3 class="widget-title">',
      'after_title' => '</h3>',
    ) );
  }
  add_action('widgets_init', 'blogviajes_widgets');