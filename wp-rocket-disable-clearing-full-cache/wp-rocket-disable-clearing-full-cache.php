<?php

/*
 * Plugin Name: WP Rocket Disable Clearing Full Cache
 * Plugin URL: https://github.com/pothi/wp-rocket-add-ons
 * Author: Pothi Kalimuthu
 * Author URI: https://www.tinywp.com
 * Version: 1.0
 * Description: Remove all or selective actions to clear the entire cache
 */

namespace TinyWP;

defined('ABSPATH') or die( 'Direct access is forbidden!' . PHP_EOL );

if ( ! function_exists( __NAMESPACE__ . '\disable_clearing_full_cache') ) {
    function disable_clearing_full_cache() {
        // Launch hooks that deletes all the cache domain
        remove_action( 'switch_theme'              ,     'rocket_clean_domain' );  // When user change theme
        remove_action( 'user_register'             ,     'rocket_clean_domain' );  // When a user is added
        remove_action( 'profile_update'            ,     'rocket_clean_domain' );  // When a user is updated
        remove_action( 'deleted_user'              ,     'rocket_clean_domain' );  // When a user is deleted
        remove_action( 'wp_update_nav_menu'        ,     'rocket_clean_domain' );  // When a custom menu is update
        remove_action( 'update_option_sidebars_widgets', 'rocket_clean_domain' );  // When you change the order of widgets
        remove_action( 'update_option_category_base',    'rocket_clean_domain' );  // When category permalink prefix is update
        remove_action( 'update_option_tag_base'    ,     'rocket_clean_domain' );  // When tag permalink prefix is update
        remove_action( 'permalink_structure_changed',    'rocket_clean_domain' );  // When permalink structure is update
        remove_action( 'create_term'               ,     'rocket_clean_domain' );  // When a term is created
        remove_action( 'edited_terms'              ,     'rocket_clean_domain' );  // When a term is updated
        remove_action( 'delete_term'               ,     'rocket_clean_domain' );  // When a term is deleted
        remove_action( 'remove_link'                  ,     'rocket_clean_domain' );  // When a link is added
        remove_action( 'edit_link'                 ,     'rocket_clean_domain' );  // When a link is updated
        remove_action( 'delete_link'               ,     'rocket_clean_domain' );  // When a link is deleted
        remove_action( 'customize_save'            ,     'rocket_clean_domain' );  // When customizer is saved
        remove_action( 'avada_clear_dynamic_css_cache',  'rocket_clean_domain' );  // When Avada theme purge its own cache
        remove_action( 'update_option_theme_mods_' . get_option( 'stylesheet' ), 'rocket_clean_domain' ); // When location of a menu is updated

        remove_filter( 'widget_update_callback', 'rocket_widget_update_callback' );
    }
} // TODO: else throw exception

add_action( 'init', 'disable_clearing_full_cache' );

