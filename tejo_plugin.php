<?php
 
/*
 
Plugin Name: Tejo Makeup Recommender
 
Plugin URI: https://tejo.ca/
 
Description: Integrates Tejo makeup recommender into WooCommerce storefront.
 
Version: 1.0
 
Author: Mark Guan
 
Text-Domain: tejo makeup recommender
*/


require_once(plugin_dir_path(__FILE__).'/tejo_plugin_class.php');

add_action('admin_menu','tejo_plugin_admin_menu');

function tejo_plugin_admin_menu() {
    add_menu_page('Tejo Instructions Page', 'Tejo Makeup Recommender', 
    'manage_options', 'tejo_plugin', 'tejo_instructions');
}

function tejo_instructions() {
    echo "
    <h1>Instructions for setting up Tejo Makeup Recommender:</h1>
    <body>
        <ol>
            <li>Book a meeting with <a href='https://calendly.com/r-baker-2/tejo-introduction-call?month=2022-01'>Calendly</a> to get setup with Tejo.</li>
            <li>On the admin dashboard of your WooCommerce store, click <b>Appearance</b>, and then <b>Widgets</b>.</li>
            <li>Click the block with the plus button to <b>Add Block</b> where you want the recommender to be placed, and then search for <b>Tejo Makeup Recommender</b>.</li>
            <li>Type in your custom Tejo url onto the block to embed the Tejo Makeup Recommender to your WooCommerce store.</li>
            <li>You can reposition the widget block with the options on the top of the block.</li>
            <li>Click the <b>Update</b> button on the top right corner to save your changes.</li>
        </ol>
    <body>
    ";
}
function register_tejo_plugin() {
    register_widget("Tejo_Widget");
}


add_action('widgets_init', 'register_tejo_plugin');
?>
