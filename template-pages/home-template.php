<?php

/* Template Name: home page
 * Template Post Type: page
 */

$context = Timber::context();

$context['post'] = Timber::get_post();

if (get_field('categories')) {
  $categories  = get_field('categories');
  // var_dump($categories);
  $offset_highlight = 4;

  foreach ($categories as $key => $category) {
    $context['categories'][$key]['name'] = $category->name;
    $context['categories'][$key]['posts'] = get_posts(array(
      'post_type' => 'post', 
      'numberposts' => 9, 
      'category' => $category->term_id, 
      'suppress_filters' => 0,
      'orderby'     => 'date',
      'order'       => 'DESC', 
    ));
    $context['categories'][$key]['related_posts'] = get_posts(array(
      'numberposts' => 6,
      'offset'      => 9,
      'orderby'     => 'date',
      'order'       => 'DESC', 
      'category'    => $category->term_id, 
      'post_status' => 'publish',
      'post_type'   => 'post', 
      // 'post__not_in' => array($timber_post->id)  
    ));

    $context['categories'][$key]['highlight'] = get_posts(array(
      'numberposts' => 4,
      'offset'      => $offset_highlight,
      'orderby'     => 'date',
      'order'       => 'DESC', 
      'post_status' => 'publish',
      'post_type'   => 'post', 
      // 'post__not_in' => array($timber_post->id)  
    ));

    $offset_highlight = $offset_highlight + 4;
  }
}

if (get_field( 'news_big_block' )) {
  $context['news_big_block'] = get_field( 'news_big_block' );
} else {
  $context['news_big_block'] = get_posts(array(
    'post_type'   => 'post',
    'numberposts' => '3', 
    'suppress_filters' => true,
    'orderby'     => 'date',
    'order'       => 'DESC',
  ));
}

$context['most_popular']  = get_posts(array(
  'post_type'   => 'post',
  'numberposts' => '12', 
  'meta_key' => 'count_post_viewed', 
  'orderby' => 'meta_value_num', 
  'suppress_filters' => false,
  'order' => 'DESC'
));



Timber::render( array( 'template-home.twig', 'page.twig' ), $context );