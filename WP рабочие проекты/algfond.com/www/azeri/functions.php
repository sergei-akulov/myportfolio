<?php
 show_admin_bar(false); 
 /*add_action( 'wp_enqueue_scripts', 'my_scripts_method' );
 function my_scripts_method() {
   // отменяем зарегистрированный jQuery
   // вместо "jquery-core", можно вписать "jquery", тогда будет отменен еще и jquery-migrate
   wp_deregister_script( 'jquery' );
   wp_register_script( 'jquery', 'https://code.jquery.com/jquery-3.4.1.js');
   wp_enqueue_script( 'jquery' );
 }*/

 
function lesson_scripts(){
  //--fontawesome-----
      wp_enqueue_script('fontawesome', 'https://kit.fontawesome.com/e7522be2b2.js',array('jquery'),null,true);

      //---bootstrap------
      wp_enqueue_style('bootstrap-style','https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css');
      wp_enqueue_script('popper','https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js',array('jquery'),null,true);
      wp_enqueue_script('bootstrap-js','https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js',array('jquery'),null,true);

      //------анимация-----
      wp_enqueue_style('animation', 'https://unpkg.com/aos@2.3.1/dist/aos.css');
      wp_enqueue_script('animation','https://unpkg.com/aos@2.3.1/dist/aos.js',array('jquery'),null,true);
    //fancybox
    wp_enqueue_style('fancybox', 'https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css');
    wp_enqueue_script('fancybox','https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js',array('jquery'),null,true);
      //------сайт----
      wp_enqueue_style('azeri-style', get_stylesheet_uri());      
      wp_enqueue_script('azeri-scripts', get_template_directory_uri() . '/assets/js/code.js',  array('jquery') , null, true);
 
}
add_action('wp_enqueue_scripts','lesson_scripts');

add_theme_support('custom-logo');

add_theme_support('menus');

add_filter('nav_menu_link_attributes','filter_nav_menu_link_attributes', 10, 3);
 function filter_nav_menu_link_attributes($atts, $item, $args)
 {
   if($args->menu=='Main'){
     $atts['class']='nav-link';
     if($item->current){
      $atts['class']='nav-link-active';
     }
   };

   return $atts;
 }

//---регистрируем POLYLANG для advanced custom fields
 if( function_exists('acf_add_options_page') ) {
  // Language Specific Options
  // Translatable options specific languages. e.g., social profiles links
  // 
  
  $languages = array( 'ru', 'uk' );
  foreach ( $languages as $lang ) {
    acf_add_options_page( array(
      'page_title' => 'Site Options (' . strtoupper( $lang ) . ')',
      'menu_title' => __('Site Options (' . strtoupper( $lang ) . ')', 'text-domain'),
      'menu_slug'  => "site-options-${lang}",
      'post_id'    => $lang
    ) );
  }
}
?>