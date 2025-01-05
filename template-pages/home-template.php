<?php

/* Template Name: home page
 * Template Post Type: page
 */

$context = Timber::context();

$context['post'] = Timber::get_post();

$categories = get_field('categories');

if ($categories && is_array($categories)) {
  $context['categories'] = [];
  $base_args = [
    'post_type' => 'post',
    'orderby' => 'date',
    'order' => 'DESC',
    'post_status' => 'publish',
    'suppress_filters' => 0,
  ];

  foreach ($categories as $key => $category) {
    $category_id = intval($category->term_id);

    // Определение ключей кэша
    $cache_key_posts = 'category_' . $category_id . '_posts';
    $cache_key_related = 'category_' . $category_id . '_related_posts';
    $cache_key_highlight = 'category_' . $category_id . '_highlight_posts';

    // Получение и кэширование постов
    $posts = get_transient($cache_key_posts);
    if ($posts === false) {
      $posts = get_posts(array_merge($base_args, [
        'posts_per_page' => 9,
        'cat' => $category_id,
      ]));
      // Добавляем permalink для каждого поста
      foreach ($posts as &$post) {
        $post->permalink = get_permalink($post->ID);
      }
      set_transient($cache_key_posts, $posts, HOUR_IN_SECONDS);
    }

    // Получение и кэширование связанных постов
    $related_posts = get_transient($cache_key_related);
    if ($related_posts === false) {
      $related_posts = get_posts(array_merge($base_args, [
        'posts_per_page' => 6,
        'offset' => 9,
        'cat' => $category_id,
      ]));
      foreach ($related_posts as &$post) {
        $post->permalink = get_permalink($post->ID);
      }
      set_transient($cache_key_related, $related_posts, HOUR_IN_SECONDS);
    }

    // Получение и кэширование выделенных постов
    $highlight_posts = get_transient($cache_key_highlight);
    if ($highlight_posts === false) {
      $highlight_posts = get_posts(array_merge($base_args, [
        'posts_per_page' => 4,
        'offset' => 15, // Начинаем с 15-го поста
        'cat' => $category_id,
      ]));
      foreach ($highlight_posts as &$post) {
        $post->permalink = get_permalink($post->ID);
      }
      set_transient($cache_key_highlight, $highlight_posts, HOUR_IN_SECONDS);
    }

    // Заполняем контекст для текущей категории
    $context['categories'][$key] = [
      'name' => sanitize_text_field($category->name),
      'posts' => $posts,
      'related_posts' => $related_posts,
      'highlight' => $highlight_posts,
    ];
  }
}


if (get_field('news_big_block')) {
  $context['news_big_block'] = get_field('news_big_block');
} else {
  $context['news_big_block'] = get_posts(array(
    'post_type' => 'post',
    'numberposts' => '3',
    'suppress_filters' => true,
    'orderby' => 'date',
    'order' => 'DESC',
  ));
}

$context['most_popular'] = get_posts(array(
  'post_type' => 'post',
  'numberposts' => '12',
  'meta_key' => 'count_post_viewed',
  'orderby' => 'meta_value_num',
  'suppress_filters' => false,
  'order' => 'DESC'
));



Timber::render(array('template-home.twig', 'page.twig'), $context);