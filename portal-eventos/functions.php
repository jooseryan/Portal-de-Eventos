<?php
// Carrega estilos do tema pai e do filho
function portal_eventos_enqueue_styles() {
    // Estilo do pai
    wp_enqueue_style(
        'hello-elementor-parent-style',
        get_template_directory_uri() . '/style.css'
    );

    // Estilo do filho
    wp_enqueue_style(
        'portal-eventos-style',
        get_stylesheet_directory_uri() . '/style.css',
        array('hello-elementor-parent-style')
    );
}
add_action('wp_enqueue_scripts', 'portal_eventos_enqueue_styles');
