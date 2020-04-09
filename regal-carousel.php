<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://github.com/Neil-Ipsen
 * @since             1.0.0
 * @package           Regal_Carousel
 *
 * @wordpress-plugin
 * Plugin Name:       Regal Carousel
 * Plugin URI:        https://github.com/Neil-Ipsen/regal-carousel
 * Description:       A Wordpress social carousel plugin, designed to simplify the presentation of your social media directly from your website.
 * Version:           1.0.0
 * Author:            Neil Ipsen
 * Author URI:        https://github.com/Neil-Ipsen
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       regal-carousel
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
define( 'REGAL_CAROUSEL_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-regal-carousel-activator.php
 */
function activate_regal_carousel() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-regal-carousel-activator.php';
	Regal_Carousel_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-regal-carousel-deactivator.php
 */
function deactivate_regal_carousel() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-regal-carousel-deactivator.php';
	Regal_Carousel_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_regal_carousel' );
register_deactivation_hook( __FILE__, 'deactivate_regal_carousel' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-regal-carousel.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_regal_carousel() {

	$plugin = new Regal_Carousel();
	$plugin->run();

}
run_regal_carousel();
