<?php

/*
 *  add Footer scripts
 */
function footer_scripts() {
  wp_enqueue_script( 'main', get_stylesheet_directory_uri() . '/scripts/main.js', array(), null, true );
  wp_localize_script( 'main', 'wpAjax', array( 'ajaxurl'=>admin_url('admin-ajax.php') ) );
}
add_action( 'wp_enqueue_scripts', 'footer_scripts', 1 );


//
// FUNCAO PARA MONTAGEM DO AJAX
//
function PostAjaxme_callback() {
  $return_array = array();
  $post_ID = intval($_POST['post-id']);

  $return_array['html'] .= '<p>';
  $return_array['html'] .= 'Olá eu ou a requisição <b>Ajax</b> que você acabou de chamar!';
  $return_array['html'] .= 'O meu ID é: <b>'.$post_ID.'</b>';
  $return_array['html'] .= '</p>';

  echo json_encode($return_array);
  wp_die();
}

add_action( 'wp_ajax_PostAjaxme', 'PostAjaxme_callback' );
add_action( 'wp_ajax_nopriv_PostAjaxme', 'PostAjaxme_callback' );