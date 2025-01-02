<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package rehab
 */
$context = Timber::context();
$timber_post = Timber::get_post();
$context['post'] = $timber_post;

$category = get_the_category();
$context['category_list'] = $category;
$context['category'] = $category[0];
$context['category_link'] = get_the_permalink($category[0]->term_id);
$context['thumbnail'] = get_the_post_thumbnail_url($timber_post->id);

$context['file'] = get_field('file');
$selected_cats = get_field('categories', 'option');
$context['category_agreed'] = false;

// Получите информацию об авторе
$author = $post->post_author;
$author_info = get_userdata($author);

// Добавьте данные об авторе в контекст Timber
$context['author_name'] = $author_info->display_name;
$context['author_link'] = get_author_posts_url($author);

$context['most_popular']  = get_posts(array(
  'post_type'   => 'post',
  'post_status' => 'publish',
  'posts_per_page' => '12', 
  'category'    => $category[0]->term_id,
  'meta_key' => 'count_post_viewed', 
  'orderby' => 'meta_value_num', 
  'suppress_filters' => false,
  'order' => 'DESC'
));

$related_args = array( 
  'numberposts' => 6,
  'ignore_sticky_posts' => true,
  'category'    => $category[0]->term_id,
  'orderby' => 'DESC',
  'post_status' => 'publish',
  'post_type' => 'post', 
  'post__not_in' => array($timber_post->id) 
);

$comments_args       = array('post_id' => $timber_post->id, 'status' => 'approve'); 
$context['comments'] = get_comments($comments_args);

$context['related'] = get_posts( $related_args );

$countKey = 'count_post_viewed';
$count = get_post_meta($timber_post->id, $countKey, true);

session_start();
// Проверяем, существует ли в сессии массив для отслеживания посещенных страниц
if (!isset($_SESSION['visited_pages'])) {
  $_SESSION['visited_pages'] = array();
}

// Проверяем, была ли страница уже посещена
if (!in_array($timber_post->id, $_SESSION['visited_pages'])) {
  // Если нет, вызываем функцию и отмечаем страницу как посещенную
  if($count == '') {
    $count = 1;
    delete_post_meta($timber_post->id, $countKey);
    update_post_meta($timber_post->id, $countKey, '1');
  } else {
    $count = $count + 1;
    update_post_meta($timber_post->id, $countKey, $count);
  }

  // Добавляем страницу в массив посещенных
  $_SESSION['visited_pages'][] = $timber_post->id;
} 

$context['viewCount'] = $count;

if ( post_password_required( $timber_post->ID ) ) {
	// Timber::render( 'single-password.twig', $context );
} else {
	Timber::render( array( 'single-' . $timber_post->ID . '.twig', 'single-' . $timber_post->post_type . '.twig', 'single.twig' ), $context );
}