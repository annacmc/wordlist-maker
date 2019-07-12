<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              annamcphee.net
 * @since             1.0.0
 * @package           Wordlist_Maker
 *
 * @wordpress-plugin
 * Plugin Name:       Wordlist Maker
 * Plugin URI:        annamcphee.net
 * Description:       A plugin to create flashcard-ready translated wordlists out of text
 * Version:           1.0.0
 * Author:            Anna
 * Author URI:        annamcphee.net
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wordlist-maker
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'WORDLIST_MAKER_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-wordlist-maker-activator.php
 */
function activate_wordlist_maker() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wordlist-maker-activator.php';
	Wordlist_Maker_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-wordlist-maker-deactivator.php
 */
function deactivate_wordlist_maker() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wordlist-maker-deactivator.php';
	Wordlist_Maker_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_wordlist_maker' );
register_deactivation_hook( __FILE__, 'deactivate_wordlist_maker' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-wordlist-maker.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_wordlist_maker() {

	$plugin = new Wordlist_Maker();
	$plugin->run();

}
run_wordlist_maker();
