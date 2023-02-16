<?php

add_action('wp_enqueue_scripts', 'theme_enqueue_styles');
function theme_enqueue_styles()
{
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
    wp_enqueue_style('theme-style', get_stylesheet_directory_uri() . '/theme.css', array(), filemtime(get_stylesheet_directory() . '/theme.css'));
}


//Menu de navigation utilisateur connecté ou non
function logged_wp_nav_menu_args( $args = '' ) {
    if( is_user_logged_in() ) {
    // Utilisateur connecté : affiche le menu Admin
    $args['menu'] = 3;
     
    } else {
    // Utilisateur non connecté : pas d'affichage du menu Admin
    $args['menu'] = 2;
    }
    return $args;
    }
    add_filter( 'wp_nav_menu_args', 'logged_wp_nav_menu_args' );


    //Changement url relatives des images
    add_filter( 'attachment_link', 'wp_make_link_relative' ); 