<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:

if ( !function_exists( 'chld_thm_cfg_locale_css' ) ):
    function chld_thm_cfg_locale_css( $uri ){
        if ( empty( $uri ) && is_rtl() && file_exists( get_template_directory() . '/rtl.css' ) )
            $uri = get_template_directory_uri() . '/rtl.css';
        return $uri;
    }
endif;
add_filter( 'locale_stylesheet_uri', 'chld_thm_cfg_locale_css' );
         
if ( !function_exists( 'child_theme_configurator_css' ) ):
    function child_theme_configurator_css() {
        wp_enqueue_style( 'chld_thm_cfg_child', trailingslashit( get_stylesheet_directory_uri() ) . 'style.css', array( 'astra-theme-css' ) );
    }
endif;
add_action( 'wp_enqueue_scripts', 'child_theme_configurator_css', 10 );

function ps_enqueue_paseos_styles() {

    if ( is_singular('paseo') ) {

        wp_enqueue_style(
            'ps-paseos-style',
            get_stylesheet_directory_uri() . '/assets/css/paseos.css',
            array(),
            '1.0'
        );

    }

}
add_action('wp_enqueue_scripts', 'ps_enqueue_paseos_styles');

function ps_enqueue_paseos_archive_styles() {

  // Carga SOLO en el archivo /paseo/
  if ( is_post_type_archive('paseo') ) {
    wp_enqueue_style(
      'ps-paseos-archive-style',
      get_stylesheet_directory_uri() . '/assets/css/paseos-archive.css',
      array(),
      '1.0'
    );
  }

}
add_action('wp_enqueue_scripts', 'ps_enqueue_paseos_archive_styles');

// END ENQUEUE PARENT ACTION

function ps_paseo_template() {
    $post_type_object = get_post_type_object('paseo');

    $post_type_object->template = array(
        array('core/paragraph', array(
            'placeholder' => 'Escribe aquí la descripción del paseo...'
        )),
        array('core/heading', array(
            'level' => 2,
            'content' => 'Duración'
        )),
        array('core/paragraph', array(
            'placeholder' => 'Ej: 2 horas'
        )),
        array('core/heading', array(
            'level' => 2,
            'content' => 'Precio'
        )),
        array('core/paragraph', array(
            'placeholder' => 'Ej: Desde 18€'
        )),
        array('core/heading', array(
            'level' => 2,
            'content' => 'Idioma'
        )),
        array('core/paragraph', array(
            'placeholder' => 'Ej: Español e inglés'
        )),
        array('core/heading', array(
            'level' => 2,
            'content' => 'Encuentro'
        )),
        array('core/paragraph', array(
            'placeholder' => 'Lugar de encuentro'
        )),
        array('core/heading', array(
            'level' => 2,
            'content' => 'Incluye'
        )),
        array('core/list'),
        array('core/heading', array(
            'level' => 2,
            'content' => 'No incluye'
        )),
        array('core/list')
    );
}
add_action('init', 'ps_paseo_template');
