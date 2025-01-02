<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package rehab
 */

$templates = array( 'archive.twig', 'index.twig' );

$context = Timber::context();

global $paged;
if ( ! isset( $paged ) || ! $paged ) {
    $paged = 1;
}

$context['title'] = 'Archive';
if ( is_day() ) {
	$context['title'] = 'Archive: ' . get_the_date( 'D M Y' );
} else if ( is_month() ) {
	$context['title'] = 'Archive: ' . get_the_date( 'M Y' );
} else if ( is_year() ) {
	$context['title'] = 'Archive: ' . get_the_date( 'Y' );
} else if ( is_tag() ) {
	$context['title'] = single_tag_title( '', false );
} else if ( is_category() ) {
	$context['title'] = single_cat_title( '', false );
	array_unshift( $templates, 'archive-' . get_query_var( 'cat' ) . '.twig' );
} else if ( is_post_type_archive() ) {
	$context['title'] = post_type_archive_title( '', false );
	array_unshift( $templates, 'archive-' . get_post_type() . '.twig' );
}

$post_type = get_post_type();
$category_id = get_queried_object_id();

$args = array(
	'post_type'   => $post_type,
	'post_status' => 'publish',
  'posts_per_page' => 12,
  'category'    => $category_id,
  'paged'       => $paged,
	'orderby'     => 'date',
  'order'       => 'DESC',
  'suppress_filters' => false
);

new WP_Query($args);
// $context['posts'] = Timber::get_posts($args);
// $context['posts'] = get_posts($args);

$context['most_popular']  = get_posts(array(
	'post_type'   => 'post',
	'post_status' => 'publish',
	'posts_per_page' => '12', 
	'category'    => $category_id,
	'meta_key' => 'count_post_viewed', 
	'orderby' => 'meta_value_num', 
	'suppress_filters' => false,
	'order' => 'DESC'
));

Timber::render( $templates, $context );
