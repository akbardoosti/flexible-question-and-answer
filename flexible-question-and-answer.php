<?php
/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://wpx93.ir
 * @since             1.0.0
 * @package           WPXD_QA
 *
 * @wordpress-plugin
 * Plugin Name: Flexible Question and Answer
 * Plugin URI: https://wpx93.ir
 * Description: A flexible question and answer plugin for WordPress.
 * Version: 1.0.0
 * Author: Akbar Doosti <wpx93.ir@gmail.com>
 * Author URI: wpx93.ir
 * License: GPL2
 * Text Domain: wpxd-qa-plugin
 */

// Plugin code goes here

// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define('WPXD_QA_VERSION', '1.0.0');

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-wpxd-qa-plugin-activator.php
 */
function activate_wpxd_qa()
{
    require_once plugin_dir_path(__FILE__) . 'includes/class-wpxd-qa-plugin-activator.php';
    WPXD_QA_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-wpxd-qa-plugin-deactivator.php
 */
function deactivate_wpxd_qa()
{
    require_once plugin_dir_path(__FILE__) . 'includes/class-wpxd-qa-plugin-deactivator.php';
    WPXD_QA_Deactivator::deactivate();
}

register_activation_hook(__FILE__, 'activate_wpxd_qa');
register_deactivation_hook(__FILE__, 'deactivate_wpxd_qa');

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path(__FILE__) . 'includes/class-wpxd-qa-plugin.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_wpxd_qa_plugin() {

    $plugin = new WPXD_QA();
    $plugin->run();

}
run_wpxd_qa_plugin();

/**
 * Adds an "Update" link to the plugin action links
 * and a "Detail" link to the plugin row meta in the plugins list.
 *
 * @param array $links The array of plugin action links.
 * @return array The updated array of plugin action links.
 */
function wpxd_plugin_update_link($links)
{
    // Get plugin data
    $plugin_file    = 'flexible-question-and-answer/flexible-question-and-answer.php';
    $plugin_data    = get_plugin_data(WP_PLUGIN_DIR . '/' . $plugin_file);
    $plugin_version = $plugin_data['Version'];
    $plugin_name    = $plugin_data['Name'];

    // Construct update URL
    $update_url     = 'https://wpx93.ir/update-service/';
    $update_url    .= '?action=update';
    $update_url    .= '&slug=' . basename(dirname(__FILE__)) . '&version=' . $plugin_version;
    $update_url    .= '&name=' . urlencode($plugin_name);

    // Add update link to plugin action links
    $links[]        = '<a href="' . $update_url . '">' . __('Update', 'wpxd-qa-plugin') . '</a>';

    return $links;
}
add_filter('plugin_action_links_' . plugin_basename(__FILE__), 'wpxd_plugin_update_link');

// Add the plugin information link to the plugin row in the plugins list
add_filter('plugin_row_meta', 'wpxd_plugin_info_link', 10, 2);

/**
 * Adds a "Detail" link to the plugin row meta in the plugins list.
 * @param array $plugin_meta The array of plugin row meta.
 * @param string $plugin_file The path to the plugin file relative to the plugins directory.
 * @return array The updated array of plugin row meta.
 */
function wpxd_plugin_info_link($plugin_meta, $plugin_file) {
    if ( 'flexible-question-and-answer/flexible-question-and-answer.php' === $plugin_file ) {
        // Construct detail URL
        $str = '<a href="%s">%s</a>';
        $url = esc_url(
            admin_url(
                'admin.php?tab=plugin-information&page=flexible-question-and-answer'
            )
        );
        $detail = __('Detail', 'wpxd-qa-plugin');
        $str = sprintf($str, $url, $detail);
        $plugin_meta[] = $str;
    }

    return $plugin_meta;
}
