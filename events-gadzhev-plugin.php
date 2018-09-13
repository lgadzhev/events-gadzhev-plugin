<?php
/**
 * Events Post Type
 *
 * @package   EventsGadzhevPlugin
 * @author    Lachezar Gadzhev
 * @license   MIT
 * @link      https://github.com/lgadzhev/events-gadzhev-plugin
 * @copyright 2018 Lachezar Gadzhev
 *
 * @wordpress-plugin
 * Plugin Name: Events Gadzhev
 * Plugin URI:  https://github.com/lgadzhev/events-gadzhev-plugin
 *
 * Description: Custom Post Type plugin that gives you the ability to create events with custom fields:
 * Date (including datepicker), Location and URL. You can view them in single or archive page where all
 * The events are listed, ordered by the date of the event in ascending order. You can also add each
 * event to your Google Calendar using the button below them.
 *
 * Version:     1.0.0
 * Author:      Lachezar Gadzhev
 * Author URI:  https://github.com/lgadzhev
 * Text Domain: events-gadzhev-plugin
 * License:     MIT
 * License URI: https://opensource.org/licenses/MIT
 */

defined( 'ABSPATH' ) or die( "You can't access this file!" );

require plugin_dir_path( __FILE__ ) . 'includes/EventsGadzhevPlugin.php';

if ( class_exists( 'EventsGadzhevPlugin' ) ) {
	$eventsGadzhevPlugin = new EventsGadzhevPlugin();
}

register_activation_hook( __FILE__, array( $eventsGadzhevPlugin, 'activate' ) );
register_deactivation_hook( __FILE__, array( $eventsGadzhevPlugin, 'deactivate' ) );
