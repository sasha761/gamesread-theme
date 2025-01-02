<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package rehab
 */

$context = Timber::context();

$context['post'] = Timber::get_post();
$context['pages']     = get_posts(array(
    'post_type'   => 'page',
    'orderby' => 'date', 
    'order' => 'DESC', 
    'numberposts' => -1,
    'exclude' => 5,
    // 'include'     => array(431, 441, 433, 435, 445),
));
$context['query_object'] = get_queried_object();
Timber::render(array('page.twig'), $context );
