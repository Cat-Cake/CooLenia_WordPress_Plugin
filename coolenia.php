<?php

/**
 * Plugin Name: Coolenia
 * Description: Plugin pour les cookies
 * Author: NoName
 */

require_once(plugin_dir_path(__FILE__) . 'coolenia-admin.php');


define('WP_DEBUG', true);
define('WP_DEBUG_LOG', true);
define('WP_DEBUG_DISPLAY', false);
@ini_set('display_errors', 0);


function starting_tarte_au_citron() {
    wp_enqueue_script( 'mytarteaucitron', './tarteaucitron.js-1.10.0/tarteaucitron.js' );
}

add_action('wp_enqueue_scripts', 'starting_tarte_au_citron');

function tarte_au_citron() {
    ?>
    <script src="/wp-content/plugins/CooLenia/tarteaucitron.js-1.10.0/tarteaucitron.js"></script>
    <script type="text/javascript">
        tarteaucitron.init({
            "privacyUrl": "", /* Privacy policy url */
            "bodyPosition": "bottom", /* or top to bring it as first element for accessibility */

            "hashtag": "#tarteaucitron", /* Open the panel with this hashtag */
            "cookieName": "tarteaucitron", /* Cookie name */

            "orientation": "middle", /* Banner position (top - bottom) */

            "groupServices": false, /* Group services by category */
            "serviceDefaultState": "wait", /* Default state (true - wait - false) */

            "showAlertSmall": false, /* Show the small banner on bottom right */
            "cookieslist": false, /* Show the cookie list */

            "closePopup": false, /* Show a close X on the banner */

            "showIcon": true, /* Show cookie icon to manage cookies */
            //"iconSrc": "", /* Optionnal: URL or base64 encoded image */
            "iconPosition": "BottomRight", /* BottomRight, BottomLeft, TopRight and TopLeft */

            "adblocker": false, /* Show a Warning if an adblocker is detected */

            "DenyAllCta" : true, /* Show the deny all button */
            "AcceptAllCta" : true, /* Show the accept all button when highPrivacy on */
            "highPrivacy": true, /* HIGHLY RECOMMANDED Disable auto consent */

            "handleBrowserDNTRequest": false, /* If Do Not Track == 1, disallow all */

            "removeCredit": false, /* Remove credit link */
            "moreInfoLink": true, /* Show more info link */

            "useExternalCss": false, /* If false, the tarteaucitron.css file will be loaded */
            "useExternalJs": false, /* If false, the tarteaucitron.js file will be loaded */

            //"cookieDomain": ".my-multisite-domaine.fr", /* Shared cookie for multisite */

            "readmoreLink": "", /* Change the default readmore link */

            "mandatory": true, /* Show a message about mandatory cookies */
            "mandatoryCta": true /* Show the disabled accept button when mandatory on */
        });
    </script>
    <?php
}


add_action('wp_head', 'tarte_au_citron');

function wpdocs_register_my_custom_menu_page() {
    add_menu_page(
        __( 'CooLenia Plugin Settings', 'textdomain' ),
        'CooLenia Extension',
        'manage_options',
        '/CooLenia/coolenia-admin.php',
        'coolenia_settings_page_markup',
        plugins_url( 'myplugin/images/icon.png' ),
        6
    );
}
add_action( 'admin_menu', 'wpdocs_register_my_custom_menu_page' );

/**
 * Markup callback for the settings page
 */
function coolenia_settings_page_markup(){
    ?>
    <div class="wrap">
        <h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
        <form action="options.php" method="POST">
            <?php
            settings_fields( 'example_setting' );
            do_settings_sections( 'coolenia_settings_page' );
            submit_button();
            ?>
        </form>
    </div>
    <?php
}

add_action( 'admin_init', 'coolenia_setting_container' );
/**
 * Registers a single setting
 */
function coolenia_setting(){
    register_setting(
        'example_setting',     // Settings group.
        'example_setting',     // Setting name
        'sanitize_text_field'  // Sanitize callback.
    );
}

add_action( 'admin_init', 'coolenia_setting' );
/**
 * Registers a single setting
 */
function coolenia_setting_container(){
    register_setting(...);

    add_settings_section(
        'header_section',                   // Section ID
        __( 'Fill the content of the Tarteaucitron.js initialization scripts.', 'example' ),  // Title
        'coolenia_section_markup',            // Callback or empty string
        'coolenia_settings_page'              // Page to display the section in.
    );

    add_settings_field(
        'privacyUrl_text_field',                   // Field ID
        __( 'privacyUrl', 'example' ),  // Title
        'privacyUrl_field_markup',            // Callback to display the field
        'coolenia_settings_page',                // Page
        'header_section',                      // Section
    );

    add_settings_field(
        'bodyPosition_text_field',                   // Field ID
        __( 'bodyPosition', 'example' ),  // Title
        'bodyPosition_field_markup',            // Callback to display the field
        'coolenia_settings_page',                // Page
        'header_section',                      // Section
    );

    add_settings_field(
        'hashtag_text_field',                   // Field ID
        __( 'hashtag', 'example' ),  // Title
        'hashtag_field_markup',            // Callback to display the field
        'coolenia_settings_page',                // Page
        'header_section',                      // Section
    );

    add_settings_field(
        'cookieName_text_field',                   // Field ID
        __( 'cookieName', 'example' ),  // Title
        'cookieName_field_markup',            // Callback to display the field
        'coolenia_settings_page',                // Page
        'header_section',                      // Section
    );

    add_settings_field(
        'orientation_text_field',                   // Field ID
        __( 'Orientation', 'example' ),  // Title
        'orientation_field_markup',            // Callback to display the field
        'coolenia_settings_page',                // Page
        'header_section',                      // Section
    );

    add_settings_field(
        'groupServices_text_field',                   // Field ID
        __( 'groupServices', 'example' ),  // Title
        'groupServices_field_markup',            // Callback to display the field
        'coolenia_settings_page',                // Page
        'header_section',                      // Section
    );

    add_settings_field(
        'serviceDefaultState_text_field',                   // Field ID
        __( 'serviceDefaultState', 'example' ),  // Title
        'serviceDefaultState_field_markup',            // Callback to display the field
        'coolenia_settings_page',                // Page
        'header_section',                      // Section
    );

    add_settings_field(
        'showAlertSmall_text_field',                   // Field ID
        __( 'showAlertSmall', 'example' ),  // Title
        'showAlertSmall_field_markup',            // Callback to display the field
        'coolenia_settings_page',                // Page
        'header_section',                      // Section
    );

    add_settings_field(
        'cookieslist_text_field',                   // Field ID
        __( 'cookieslist', 'example' ),  // Title
        'cookieslist_field_markup',            // Callback to display the field
        'coolenia_settings_page',                // Page
        'header_section',                      // Section
    );

    add_settings_field(
        'closePopup_text_field',                   // Field ID
        __( 'closePopup', 'example' ),  // Title
        'closePopup_field_markup',            // Callback to display the field
        'coolenia_settings_page',                // Page
        'header_section',                      // Section
    );

    add_settings_field(
        'adblocker_text_field',                   // Field ID
        __( 'adblocker', 'example' ),  // Title
        'adblocker_field_markup',            // Callback to display the field
        'coolenia_settings_page',                // Page
        'header_section',                      // Section
    );

    add_settings_field(
        'DenyAllCta_text_field',                   // Field ID
        __( 'DenyAllCta', 'example' ),  // Title
        'DenyAllCta_field_markup',            // Callback to display the field
        'coolenia_settings_page',                // Page
        'header_section',                      // Section
    );

    add_settings_field(
        'AcceptAllCta_text_field',                   // Field ID
        __( 'AcceptAllCta', 'example' ),  // Title
        'AcceptAllCta_field_markup',            // Callback to display the field
        'coolenia_settings_page',                // Page
        'header_section',                      // Section
    );

    add_settings_field(
        'highPrivacy_text_field',                   // Field ID
        __( 'highPrivacy', 'example' ),  // Title
        'highPrivacy_field_markup',            // Callback to display the field
        'coolenia_settings_page',                // Page
        'header_section',                      // Section
    );

    add_settings_field(
        'handleBrowserDNTRequest_text_field',                   // Field ID
        __( 'handleBrowserDNTRequest', 'example' ),  // Title
        'handleBrowserDNTRequest_field_markup',            // Callback to display the field
        'coolenia_settings_page',                // Page
        'header_section',                      // Section
    );

    add_settings_field(
        'removeCredit_text_field',                   // Field ID
        __( 'removeCredit', 'example' ),  // Title
        'removeCredit_field_markup',            // Callback to display the field
        'coolenia_settings_page',                // Page
        'header_section',                      // Section
    );

    add_settings_field(
        'moreInfoLink_text_field',                   // Field ID
        __( 'moreInfoLink', 'example' ),  // Title
        'moreInfoLink_field_markup',            // Callback to display the field
        'coolenia_settings_page',                // Page
        'header_section',                      // Section
    );

    add_settings_field(
        'useExternalCss_text_field',                   // Field ID
        __( 'useExternalCss', 'example' ),  // Title
        'useExternalCss_field_markup',            // Callback to display the field
        'coolenia_settings_page',                // Page
        'header_section',                      // Section
    );

    add_settings_field(
        'useExternalJs_text_field',                   // Field ID
        __( 'useExternalJs', 'example' ),  // Title
        'useExternalJs_field_markup',            // Callback to display the field
        'coolenia_settings_page',                // Page
        'header_section',                      // Section
    );

    add_settings_field(
        'readmoreLink_text_field',                   // Field ID
        __( 'readmoreLink', 'example' ),  // Title
        'readmoreLink_field_markup',            // Callback to display the field
        'coolenia_settings_page',                // Page
        'header_section',                      // Section
    );

    add_settings_field(
        'mandatory_text_field',                   // Field ID
        __( 'mandatory', 'example' ),  // Title
        'mandatory_field_markup',            // Callback to display the field
        'coolenia_settings_page',                // Page
        'header_section',                      // Section
    );

    add_settings_field(
        'mandatoryCta_text_field',                   // Field ID
        __( 'mandatoryCta', 'example' ),  // Title
        'mandatoryCta_field_markup',            // Callback to display the field
        'coolenia_settings_page',                // Page
        'header_section',                      // Section
    );

}

/**
 * Displays the content of the section
 *
 * @param  array  $args  Arguments passed to the add_settings_section() function call
 */
function coolenia_section_markup( $args ){}

/**
 * Displays our setting field
 *
 * @param  array  $args  Arguments passed to corresponding add_settings_field() call
 */

function privacyUrl_field_markup( $args ){
    $setting = get_option( 'example_setting' );
    $value   = $setting ?: '';
    ?>
    <input class="regular-text" type="text" name="example_setting" value="<?php echo esc_attr( $value ); ?>">
    <?php
}

function bodyPosition_field_markup( $args ){
    $setting = get_option( 'example_setting' );
    $value   = $setting ?: '';
    ?>
    <select>
        <option>Top</option>
        <option>Bottom</option>
    </select>
    <?php
}

function orientation_field_markup( $args ){
    $setting = get_option( 'example_setting' );
    $value   = $setting ?: '';
    ?>
    <select>
        <option>Top</option>
        <option>Bottom</option>
    </select>
    <?php
}

function hashtag_field_markup( $args ){
    $setting = get_option( 'example_setting' );
    $value   = $setting ?: '';
    ?>
    <input class="regular-text" type="text" name="example_setting" value="<?php echo esc_attr( $value ); ?>">
    <?php
}

function cookieName_field_markup( $args ){
    $setting = get_option( 'example_setting' );
    $value   = $setting ?: '';
    ?>
    <input class="regular-text" type="text" name="example_setting" value="<?php echo esc_attr( $value ); ?>">
    <?php
}

function groupServices_field_markup( $args ){
    $setting = get_option( 'example_setting' );
    $value   = $setting ?: '';
    ?>
    <select>
        <option>false</option>
        <option>true</option>
    </select>
    <?php
}

function serviceDefaultState_field_markup( $args ){
    $setting = get_option( 'example_setting' );
    $value   = $setting ?: '';
    ?>
    <select>
        <option>true</option>
        <option>wait</option>
        <option>false</option>
    </select>
    <?php
}

function showAlertSmall_field_markup( $args ){
    $setting = get_option( 'example_setting' );
    $value   = $setting ?: '';
    ?>
    <select>
        <option>false</option>
        <option>true</option>
    </select>
    <?php
}

function cookieslist_field_markup( $args ){
    $setting = get_option( 'example_setting' );
    $value   = $setting ?: '';
    ?>
    <select>
        <option>true</option>
        <option>wait</option>
        <option>false</option>
    </select>
    <?php
}

function closePopup_field_markup( $args ){
    $setting = get_option( 'example_setting' );
    $value   = $setting ?: '';
    ?>
    <select>
        <option>false</option>
        <option>true</option>
    </select>
    <?php
}

function adblocker_field_markup( $args ){
    $setting = get_option( 'example_setting' );
    $value   = $setting ?: '';
    ?>
    <select>
        <option>false</option>
        <option>true</option>
    </select>
    <?php
}

function DenyAllCta_field_markup( $args ){
    $setting = get_option( 'example_setting' );
    $value   = $setting ?: '';
    ?>
    <select>
        <option>true</option>
        <option>wait</option>
        <option>false</option>
    </select>
    <?php
}

function AcceptAllCta_field_markup( $args ){
    $setting = get_option( 'example_setting' );
    $value   = $setting ?: '';
    ?>
    <select>
        <option>false</option>
        <option>true</option>
    </select>
    <?php
}

function highPrivacy_field_markup( $args ){
    $setting = get_option( 'example_setting' );
    $value   = $setting ?: '';
    ?>
    <select>
        <option>false</option>
        <option>true</option>
    </select>
    <?php
}

function handleBrowserDNTRequest_field_markup( $args ){
    $setting = get_option( 'example_setting' );
    $value   = $setting ?: '';
    ?>
    <select>
        <option>false</option>
        <option>true</option>
    </select>
    <?php
}

function removeCredit_field_markup( $args ){
    $setting = get_option( 'example_setting' );
    $value   = $setting ?: '';
    ?>
    <select>
        <option>false</option>
        <option>true</option>
    </select>
    <?php
}

function moreInfoLink_field_markup( $args ){
    $setting = get_option( 'example_setting' );
    $value   = $setting ?: '';
    ?>
    <select>
        <option>false</option>
        <option>true</option>
    </select>
    <?php
}


function useExternalCss_field_markup( $args ){
    $setting = get_option( 'example_setting' );
    $value   = $setting ?: '';
    ?>
    <select>
        <option>false</option>
        <option>true</option>
    </select>
    <?php
}

function useExternalJs_field_markup( $args ){
    $setting = get_option( 'example_setting' );
    $value   = $setting ?: '';
    ?>
    <select>
        <option>false</option>
        <option>true</option>
    </select>
    <?php
}

function readmoreLink_field_markup( $args ){
    $setting = get_option( 'example_setting' );
    $value   = $setting ?: '';
    ?>
    <input class="regular-text" type="text" name="example_setting" value="<?php echo esc_attr( $value ); ?>">
    <?php
}

function mandatory_field_markup( $args ){
    $setting = get_option( 'example_setting' );
    $value   = $setting ?: '';
    ?>
    <select>
        <option>false</option>
        <option>true</option>
    </select>
    <?php
}

function mandatoryCta_field_markup( $args ){
    $setting = get_option( 'example_setting' );
    $value   = $setting ?: '';
    ?>
    <select>
        <option>false</option>
        <option>true</option>
    </select>
    <?php
}