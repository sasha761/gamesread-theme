<?php
//Save the rating submitted by the user.
add_action( 'comment_post', 'ci_comment_rating_save_comment_rating' );
function ci_comment_rating_save_comment_rating( $comment_id ) {
  if ( isset( $_POST['rating'] ) && '' !== $_POST['rating'] ) {
    $rating = intval( $_POST['rating'] );
    add_comment_meta( $comment_id, 'rating', $rating );
  }
}


// function create_ratings_table() {
// 	global $wpdb;
// 	$table_name = $wpdb->prefix . 'post_ratings';

// 	$sql = "CREATE TABLE IF NOT EXISTS $table_name (
// 			id int(11) NOT NULL AUTO_INCREMENT,
// 			post_id int(11) NOT NULL,
// 			user_count int(11) NOT NULL,
// 			average_rating int(1) NOT NULL,
// 			PRIMARY KEY (id),
// 			INDEX post_user_index (post_id, user_ip)
// 	);";

// 	require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
// 	dbDelta($sql);
// }
// add_action('init', 'create_ratings_table');


// add_action( 'rest_api_init', function () {
//   register_rest_route('/api/v1', '/rating', [
//     'methods' => 'POST',
//     'callback' => 'update_rating'
//   ]);
// });

// function update_rating(WP_REST_Request $request) {
// 	$rating = (int)$request['rating'];
// 	$nonce = $request['nonce'];
// 	$post_ID = (int)$request['id'];
// 	$user_identifier = '131.0.0.1'; 
	

// 	if ( ! wp_verify_nonce( $nonce, 'wp_rest' ) ) {
// 		die ( 'Busted!');
// 	} else {
// 		 global $wpdb;
// 		 $table_name = $wpdb->prefix . 'post_ratings';

// 		 $wpdb->show_errors();

// 			$existing_rating = $wpdb->get_row(
// 				$wpdb->prepare(
// 					"SELECT * FROM $table_name WHERE post_id = %d",
// 					$post_ID,
// 				)
// 			);

// 			// var_dump($existing_rating);

// 			if ($existing_rating) {
// 					// Если оценка уже существует, обновляем её

// 				// $wpdb->update(
// 				// 	$table_name,
// 				// 	array(
// 				// 		'average_rating' => $rating
// 				// 		'post_id' => $post_ID,
// 				// 		'user_count' => 
// 				// 	),
// 				// 	array('%d'),
// 				// 	array('%d', '%s')
// 				// );
// 			} else {
// 					// Если оценки нет, добавляем новую запись
// 				$wpdb->insert(
// 					$table_name,
// 					array(
// 						'post_id' => $post_ID,
// 						'average_rating' => $rating,
// 						'user_count' => 1
// 					),
// 					array('%d', '%d', '%d')
// 				);
// 			}
 
// 			// $ratings_count = $wpdb->get_var(
// 			// 	$wpdb->prepare(
// 			// 			"SELECT COUNT(*) FROM $table_name WHERE post_id = %d",
// 			// 			$post_ID
// 			// 	)
// 			// );

// 		// Обновляем таблицу поста с новым количеством и средним рейтингом
// 		// update_post_meta($post_ID, 'ratings_count', $ratings_count);
// 		// update_post_meta($post_ID, 'average_rating', calculate_average_rating($post_ID));

// 		if ($wpdb->last_error) {
// 			echo $wpdb->last_error;
// 		}
 
// 		 return new WP_REST_Response(array('success' => true), 200);
// 	}
// }

// function calculate_average_rating($post_ID) {
// 	global $wpdb;
// 	$table_name = $wpdb->prefix . 'post_ratings';

// 	$sum_of_ratings = $wpdb->get_var(
// 			$wpdb->prepare(
// 					"SELECT SUM(rating) FROM $table_name WHERE post_id = %d",
// 					$post_ID
// 			)
// 	);

// 	$ratings_count = $wpdb->get_var(
// 			$wpdb->prepare(
// 					"SELECT COUNT(*) FROM $table_name WHERE post_id = %d",
// 					$post_ID
// 			)
// 	);

// 	if ($ratings_count > 0) {
// 		return $sum_of_ratings / $ratings_count;
// 	} else {
// 		return 0; // Предотвращаем деление на ноль
// 	}
// }


// Disables the block editor from managing widgets in the Gutenberg plugin.
// Disables the block editor from managing widgets.
add_filter( 'gutenberg_use_widgets_block_editor', '__return_false' );
add_filter( 'use_widgets_block_editor', '__return_false' );


// most popular
// function count_post_visits() {
//  	if( is_single() ) {
//     global $post;
//     $views = get_post_meta( $post->ID, 'count_post_viewed', true );
//     if( $views == '' ) {
//       update_post_meta( $post->ID, 'count_post_viewed', '1' );   
//     } else {
//       $views_number = intval( $views );
//       update_post_meta( $post->ID, 'count_post_viewed', $views_number + 1 );
//     }
//  	}
// }
// add_action( 'wp_head', 'count_post_visits' );

if( function_exists('acf_add_options_page') ) {
  $parent = acf_add_options_page(array(
    'page_title'  => 'Theme General Settings',
    'menu_title'  => 'Theme Settings',
    'redirect'    => false
  ));

  acf_add_options_sub_page(array(
    'page_title'  => 'Sidebar',
    'menu_title'  => 'Sidebar',
    'parent_slug'   => $parent['menu_slug'],
  ));
}

add_shortcode( 'return_title', 'return_post_title' );
function return_post_title() {
  return get_the_title();
}


remove_action( 'wp_head', 'feed_links_extra', 3 ); // Display the links to the extra feeds such as category feeds
remove_action( 'wp_head', 'feed_links', 2 ); // Display the links to the general feeds: Post and Comment Feed
remove_action( 'wp_head', 'rsd_link' ); // Display the link to the Really Simple Discovery service endpoint, EditURI link
remove_action( 'wp_head', 'wlwmanifest_link' ); // Display the link to the Windows Live Writer manifest file.
remove_action( 'wp_head', 'index_rel_link' ); // index link
remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 ); // prev link
remove_action( 'wp_head', 'start_post_rel_link', 10, 0 ); // start link
remove_action( 'wp_head', 'adjacent_posts_rel_link', 10, 0 ); // Display relational links for the posts adjacent to the current post.
remove_action( 'wp_head', 'wp_generator' ); // Display the XHTML generator that is generated on the wp_head hook, WP version

/**
 * Redirect to the homepage all users trying to access feeds.
 */
function disable_feeds() {
  wp_redirect( home_url() );
  die;
}

// Disable global RSS, RDF & Atom feeds.
add_action( 'do_feed',      'disable_feeds', -1 );
add_action( 'do_feed_rdf',  'disable_feeds', -1 );
add_action( 'do_feed_rss',  'disable_feeds', -1 );
add_action( 'do_feed_rss2', 'disable_feeds', -1 );
add_action( 'do_feed_atom', 'disable_feeds', -1 );

// Disable comment feeds.
add_action( 'do_feed_rss2_comments', 'disable_feeds', -1 );
add_action( 'do_feed_atom_comments', 'disable_feeds', -1 );

// Prevent feed links from being inserted in the <head> of the page.
add_action( 'feed_links_show_posts_feed',    '__return_false', -1 );
add_action( 'feed_links_show_comments_feed', '__return_false', -1 );
remove_action( 'wp_head', 'feed_links',       2 );
remove_action( 'wp_head', 'feed_links_extra', 3 );

// Disable emoji.
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );
remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );