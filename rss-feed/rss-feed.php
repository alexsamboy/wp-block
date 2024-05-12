<?php
/**
 * Plugin Name:       Rss Read Feed
 * Description:       Lector de contenido de RSS para mostrar en tu sitio.
 * Requires at least: 6.1
 * Requires PHP:      7.0
 * Version:           0.1.0
 * Author:            Manuel Perez
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       rss-feed
 *
 * @package RssFeed
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Registers the block using the metadata loaded from the `block.json` file.
 * Behind the scenes, it registers also all assets so they can be enqueued
 * through the block editor in the corresponding context.
 *
 * @see https://developer.wordpress.org/reference/functions/register_block_type/
 */
function rss_feed_rss_feed_block_init() {
	register_block_type( __DIR__ . '/build' );
}
add_action( 'init', 'rss_feed_rss_feed_block_init' );
