<?php

// Enqueue frontend styles and scripts

add_action('wp_enqueue_scripts', function() use ($plugin) {

  $url = $plugin->url;
  $version = $plugin->version;

  wp_enqueue_style(
    'tangible-plugin-playground',
    $url . 'assets/build/tangible-plugin-playground.min.css',
    [],
    $version
  );

  wp_enqueue_script(
    'tangible-plugin-playground',
    $url . 'assets/build/tangible-plugin-playground.min.js',
    ['jquery'],
    $version
  );

});
