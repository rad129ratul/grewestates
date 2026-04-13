<?php

// Theme Title
add_theme_support('title-tag');

// Thumbnil Image Area
add_theme_support( 'post-thumbnails', array('page', 'post') );
add_image_size('post-thumbnails', 970, 350, true);


// Except to 40 Word

function excerpt_more($more){
  return '<br> <br> <a class="redmore" href="'. get_the_permalink() . '">' . 'Read More' . '</a>';
}
add_filter('excerpt_more', 'excerpt_more');

function excerpt_lenght($length){
  return 40;
}
add_filter('excerpt_length', 'excerpt_lenght', 999);