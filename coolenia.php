<?php

/**
 * Plugin Name: Coolenia
 * Description: Plugin pour les cookies
 * Author: NoName
 */

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
            settings_fields( 'CooLenia_setting' );
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
        'CooLenia_setting',     // Settings group.
        'privacyUrl',     // Setting name
        'coolenia_settings_page'  // Sanitize callback.
    );

    register_setting(
        'CooLenia_setting',     // Settings group.
        'bodyPosition',     // Setting name
        'coolenia_settings_page'  // Sanitize callback.
    );

    register_setting(
        'CooLenia_setting',     // Settings group.
        'hashtag',     // Setting name
        'coolenia_settings_page'  // Sanitize callback.
    );

    register_setting(
        'CooLenia_setting',     // Settings group.
        'cookieName',     // Setting name
        'coolenia_settings_page'  // Sanitize callback.
    );

    register_setting(
        'CooLenia_setting',     // Settings group.
        'Orientation',     // Setting name
        'coolenia_settings_page'  // Sanitize callback.
    );

    register_setting(
        'CooLenia_setting',     // Settings group.
        'Orientation',     // Setting name
        'coolenia_settings_page'  // Sanitize callback.
    );

    register_setting(
        'CooLenia_setting',     // Settings group.
        'groupServices',     // Setting name
        'coolenia_settings_page'  // Sanitize callback.
    );

    register_setting(
        'CooLenia_setting',     // Settings group.
        'serviceDefaultState',     // Setting name
        'coolenia_settings_page'  // Sanitize callback.
    );

    register_setting(
        'CooLenia_setting',     // Settings group.
        'showAlertSmall',     // Setting name
        'coolenia_settings_page'  // Sanitize callback.
    );

    register_setting(
        'CooLenia_setting',     // Settings group.
        'cookieslist',     // Setting name
        'coolenia_settings_page'  // Sanitize callback.
    );

    register_setting(
        'CooLenia_setting',     // Settings group.
        'closePopup',     // Setting name
        'coolenia_settings_page'  // Sanitize callback.
    );

    register_setting(
        'CooLenia_setting',     // Settings group.
        'adblocker',     // Setting name
        'coolenia_settings_page'  // Sanitize callback.
    );

    register_setting(
        'CooLenia_setting',     // Settings group.
        'DenyAllCta',     // Setting name
        'coolenia_settings_page'  // Sanitize callback.
    );

    register_setting(
        'CooLenia_setting',     // Settings group.
        'AcceptAllCta',     // Setting name
        'coolenia_settings_page'  // Sanitize callback.
    );

    register_setting(
        'CooLenia_setting',     // Settings group.
        'highPrivacy',     // Setting name
        'coolenia_settings_page'  // Sanitize callback.
    );

    register_setting(
        'CooLenia_setting',     // Settings group.
        'handleBrowserDNTRequest',     // Setting name
        'coolenia_settings_page'  // Sanitize callback.
    );

    register_setting(
        'CooLenia_setting',     // Settings group.
        'removeCredit',     // Setting name
        'coolenia_settings_page'  // Sanitize callback.
    );

    register_setting(
        'CooLenia_setting',     // Settings group.
        'moreInfoLink',     // Setting name
        'coolenia_settings_page'  // Sanitize callback.
    );

    register_setting(
        'CooLenia_setting',     // Settings group.
        'useExternalCss',     // Setting name
        'coolenia_settings_page'  // Sanitize callback.
    );

    register_setting(
        'CooLenia_setting',     // Settings group.
        'useExternalJs',     // Setting name
        'coolenia_settings_page'  // Sanitize callback.
    );

    register_setting(
        'CooLenia_setting',     // Settings group.
        'readmoreLink',     // Setting name
        'coolenia_settings_page'  // Sanitize callback.
    );

    register_setting(
        'CooLenia_setting',     // Settings group.
        'mandatory',     // Setting name
        'coolenia_settings_page'  // Sanitize callback.
    );

    register_setting(
        'CooLenia_setting',     // Settings group.
        'mandatoryCta',     // Setting name
        'coolenia_settings_page'  // Sanitize callback.
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
    $setting = get_option( 'privacyUrl' );
    $value   = $setting ?: '';
    ?>
    <label>
        <input class="regular-text" type="text" name="privacyUrl" value="<?php echo esc_attr( $value ); ?>">
    </label>
    <?php
}

function bodyPosition_field_markup( $args ){
    $setting = get_option( 'bodyPosition' );
    $value   = $setting ?: '';
    ?>
    <label>
        <select name="bodyPosition">
            <option>top</option>
            <option>bottom</option>
        </select>
    </label>
    <?php
}

function orientation_field_markup( $args ){
    $setting = get_option( 'Orientation' );
    $value   = $setting ?: '';
    ?>
    <label>
        <select name="Orientation">
            <option>top</option>
            <option>bottom</option>
        </select>
    </label>
    <?php
}

function hashtag_field_markup( $args ){
    $setting = get_option( 'hashtag' );
    $value   = $setting ?: '';
    ?>
    <label>
        <input class="regular-text" type="text" name="hashtag" value="<?php echo esc_attr( $value ); ?>">
    </label>
    <?php
}

function cookieName_field_markup( $args ){
    $setting = get_option( 'cookieName' );
    $value   = $setting ?: '';
    ?>
    <label>
        <input class="regular-text" type="text" name="cookieName" value="<?php echo esc_attr( $value ); ?>">
    </label>
    <?php
}

function groupServices_field_markup( $args ){
    $setting = get_option( 'groupServices' );
    $value   = $setting ?: '';
    ?>
    <label>
        <select name="groupServices">
            <option>false</option>
            <option>true</option>
        </select>
    </label>
    <?php
}

function serviceDefaultState_field_markup( $args ){
    $setting = get_option( 'serviceDefaultState' );
    $value   = $setting ?: '';
    ?>
    <label>
        <select name="serviceDefaultState">
            <option>true</option>
            <option>wait</option>
            <option>false</option>
        </select>
    </label>
    <?php
}

function showAlertSmall_field_markup( $args ){
    $setting = get_option( 'showAlertSmall' );
    $value   = $setting ?: '';
    ?>
    <label>
        <select name="showAlertSmall">
            <option>false</option>
            <option>true</option>
        </select>
    </label>
    <?php
}

function cookieslist_field_markup( $args ){
    $setting = get_option( 'cookieslist' );
    $value   = $setting ?: '';
    ?>
    <label>
        <select name="cookieslist">
            <option>true</option>
            <option>wait</option>
            <option>false</option>
        </select>
    </label>
    <?php
}

function closePopup_field_markup( $args ){
    $setting = get_option( 'closePopup' );
    $value   = $setting ?: '';
    ?>
    <label>
        <select name="closePopup">
            <option>false</option>
            <option>true</option>
        </select>
    </label>
    <?php
}

function adblocker_field_markup( $args ){
    $setting = get_option( 'adblocker' );
    $value   = $setting ?: '';
    ?>
    <label>
        <select name="adblocker">
            <option>false</option>
            <option>true</option>
        </select>
    </label>
    <?php
}

function DenyAllCta_field_markup( $args ){
    $setting = get_option( 'DenyAllCta' );
    $value   = $setting ?: '';
    ?>
    <label>
        <select name="DenyAllCta">
            <option>true</option>
            <option>wait</option>
            <option>false</option>
        </select>
    </label>
    <?php
}

function AcceptAllCta_field_markup( $args ){
    $setting = get_option( 'AcceptAllCta' );
    $value   = $setting ?: '';
    ?>
    <label>
        <select name="AcceptAllCta">
            <option>false</option>
            <option>true</option>
        </select>
    </label>
    <?php
}

function highPrivacy_field_markup( $args ){
    $setting = get_option( 'highPrivacy' );
    $value   = $setting ?: '';
    ?>
    <label>
        <select name="highPrivacy">
            <option>false</option>
            <option>true</option>
        </select>
    </label>
    <?php
}

function handleBrowserDNTRequest_field_markup( $args ){
    $setting = get_option( 'handleBrowserDNTRequest' );
    $value   = $setting ?: '';
    ?>
    <label>
        <select name="handleBrowserDNTRequest">
            <option>false</option>
            <option>true</option>
        </select>
    </label>
    <?php
}

function removeCredit_field_markup( $args ){
    $setting = get_option( 'removeCredit' );
    $value   = $setting ?: '';
    ?>
    <label>
        <select name="removeCredit">
            <option>false</option>
            <option>true</option>
        </select>
    </label>
    <?php
}

function moreInfoLink_field_markup( $args ){
    $setting = get_option( 'moreInfoLink' );
    $value   = $setting ?: '';
    ?>
    <label>
        <select name="moreInfoLink">
            <option>false</option>
            <option>true</option>
        </select>
    </label>
    <?php
}


function useExternalCss_field_markup( $args ){
    $setting = get_option( 'useExternalCss' );
    $value   = $setting ?: '';
    ?>
    <label>
        <select name="useExternalCss">
            <option>false</option>
            <option>true</option>
        </select>
    </label>
    <?php
}

function useExternalJs_field_markup( $args ){
    $setting = get_option( 'useExternalJs' );
    $value   = $setting ?: '';
    ?>
    <label>
        <select name="useExternalJs">
            <option>false</option>
            <option>true</option>
        </select>
    </label>
    <?php
}

function readmoreLink_field_markup( $args ){
    $setting = get_option( 'readmoreLink' );
    $value   = $setting ?: '';
    ?>
    <label>
        <input class="regular-text" type="text" name="readmoreLink" value="<?php echo esc_attr( $value ); ?>">
    </label>
    <?php
}

function mandatory_field_markup( $args ){
    $setting = get_option( 'mandatory' );
    $value   = $setting ?: '';
    ?>
    <label>
        <select name="mandatory">
            <option>false</option>
            <option>true</option>
        </select>
    </label>
    <?php
}

function mandatoryCta_field_markup( $args ){
    $setting = get_option( 'mandatoryCta' );
    $value   = $setting ?: '';
    ?>
    <label>
        <select name="mandatoryCta">
            <option>false</option>
            <option>true</option>
        </select>
    </label>
    <?php
}