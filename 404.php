<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package rehab
 */

$context = Timber::context();
Timber::render( '404.twig', $context );
