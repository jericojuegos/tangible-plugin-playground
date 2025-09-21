<?php
/**
 * Plugin Name: Tangible Plugin Playground
 * Plugin URI: https://tangibleplugins.com/tangible-plugin-playground
 * Description: 
 * Version: 0.1.1
 * Author: Jerico Juegos
 * Author URI: https://jericojuegos.com
 * License: GPLv2 or later
 */
use tangible\framework;
use tangible\updater;

define( 'TANGIBLE_PLUGIN_PLAYGROUND_VERSION', '0.1.1' );

require __DIR__ . '/vendor/tangible/framework/index.php';
require __DIR__ . '/vendor/tangible/updater/index.php';

/**
 * Get plugin instance
 */
function tangible_plugin_playground($instance = false) {
  static $plugin;
  return $plugin ? $plugin : ($plugin = $instance);
}

add_action('plugins_loaded', function() {

  // See https://github.com/TangibleInc/framework/#note-on-plugin-activation
  if (defined('WP_SANDBOX_SCRAPING')) return;

  $plugin    = framework\register_plugin([
    'name'           => 'tangible-plugin-playground',
    'title'          => 'Tangible Plugin Playground',
    'setting_prefix' => 'tangible_plugin_playground',
    'version'        => TANGIBLE_PLUGIN_PLAYGROUND_VERSION,
    'file_path' => __FILE__,
    'base_path' => plugin_basename( __FILE__ ),
    'dir_path' => plugin_dir_path( __FILE__ ),
    'url' => plugins_url( '/', __FILE__ ),
    'assets_url' => plugins_url( '/assets', __FILE__ ),
  ]);

  updater\register_plugin([
    'name' => $plugin->name,
    'file' => __FILE__,    
  ]);

  tangible_plugin_playground( $plugin );

  require_once __DIR__.'/includes/index.php';

}, 10);
