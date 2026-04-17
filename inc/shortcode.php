<?php
// Wordpress Shordcode
function basic_shortcoder(){
  return "Shortcode text test";
}
add_shortcode( 'testShortcoder', 'basic_shortcoder');


function button_shortcode( $atts, $content = null ){
  $values = shortcode_atts( array (
    'url' => '#',
  ), $atts );
  return '<a class="button" href="'.esc_attr($values['url']) .'">' . $content . '</a>';
}
add_shortcode( 'buttonShortcoder', 'button_shortcode');