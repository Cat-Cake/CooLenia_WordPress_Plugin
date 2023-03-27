<?php
/**
 * Plugin Name: Coolenia
 * Description: Plugin de test
 * Author: NoName
 */

function first_function_hello_world() {
    echo "<p>Hello world!</p>";
}

add_action('admin_notices', 'first_function_hello_world');

function first_plugin_hello_title($title) {
    $custom_title = 'Hello World ' . $title;
    return $custom_title;
}

add_filter('the_title', 'first_plugin_hello_title');