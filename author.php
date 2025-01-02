<?php
/**
 * The template for displaying Author Archive pages
 *
 * Methods for TimberHelper can be found in the /lib sub-directory
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since    Timber 0.1
 */

global $wp_query;

$context             = Timber::context();
$user_id             = get_queried_object_id();
$user                = Timber::get_user($user_id);
$context['posts']    = Timber::get_posts();
$context['seo_text'] = get_field('seo_text', 'user_'. $user_id);
$context['user']     = $user;


Timber::render('author.twig', $context);
