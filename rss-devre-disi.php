<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Doğrudan erişim engellendi

/**
 * Plugin Name: RSS Devre Dışı Bırakma
 * Description: WordPress RSS ve Atom beslemelerini devre dışı bırakan basit bir eklenti.
 * Version: 1.0
 * Author: Abdullah KIVRAK
 * Author URI: https://abdullahki.com
 * License: GPL2
 * Text Domain: rss-devre-disi-birakma
 */

// RSS ve Atom beslemelerini devre dışı bırak
function ak_disable_rss_feeds() {
    printf(
        /* translators: %s: Home URL */
        esc_html__( 'RSS beslemeleri bu site için devre dışı bırakılmıştır. Ana sayfaya dönmek için %s.', 'rss-devre-disi-birakma' ),
        '<a href="' . esc_url( home_url( '/' ) ) . '">' . esc_html__( 'buraya tıklayın', 'rss-devre-disi-birakma' ) . '</a>'
    );
    wp_die( esc_html__( 'RSS Devre Dışı Bırakıldı', 'rss-devre-disi-birakma' ) );
}

// Aşağıdaki aksiyonlar RSS ve Atom beslemelerini devre dışı bırakır
add_action( 'do_feed', 'ak_disable_rss_feeds', 1 );
add_action( 'do_feed_rdf', 'ak_disable_rss_feeds', 1 );
add_action( 'do_feed_rss', 'ak_disable_rss_feeds', 1 );
add_action( 'do_feed_rss2', 'ak_disable_rss_feeds', 1 );
add_action( 'do_feed_atom', 'ak_disable_rss_feeds', 1 );

// Besleme bağlantılarını <head> etiketinden kaldır
remove_action( 'wp_head', 'feed_links', 2 );
remove_action( 'wp_head', 'feed_links_extra', 3 );
