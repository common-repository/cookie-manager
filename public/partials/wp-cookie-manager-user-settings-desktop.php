<?php

/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       https://deviware.com/
 * @since      1.0.0
 *
 * @package    cookie-manager
 * @subpackage cookie-manager/public/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<div id="cookie-settings-section-selector">
    <button id="wcm-how-we-use-cookies-button" class="active"><?php esc_html_e( get_option('wcm_cookies_use_title', $default_texts->cookies_use_title), 'wp-cookie-manager' );?></button>
    <button id="wcm-essential-cookies-button"><?php esc_html_e( get_option('wcm_essential_cookies_title', $default_texts->essential_cookies_title), 'wp-cookie-manager' );?></button>
    <button id="wcm-analytics-cookies-button"><?php esc_html_e( get_option('wcm_analytics_cookies_title', $default_texts->analytics_cookies_title), 'wp-cookie-manager' );?></button>
    <button id="wcm-external-cookies-button"><?php esc_html_e( get_option('wcm_external_cookies_title', $default_texts->external_cookies_title), 'wp-cookie-manager' );?></button>
    <button id="wcm-privacy-policy-button"><?php esc_html_e( get_option('wcm_privacy_policy_title', $default_texts->privacy_policy_title), 'wp-cookie-manager' );?></button>
</div>
<div id="cookie-settings-section">
    <button id="close-pop-up">
        <span>×</span> 
    </button>    
    <p id="cookie-settings-section-text__use">
        <?php esc_html_e( get_option('wcm_cookies_use_text', $default_texts->cookies_use_text), 'wp-cookie-manager' );?>
    </p>
    <p id="cookie-settings-section-text__essential">
        <?php esc_html_e( get_option('wcm_essential_cookies_text', $default_texts->essential_cookies_text), 'wp-cookie-manager' );?>
    </p>
    <p id="cookie-settings-section-text__analytics">
        <?php esc_html_e( get_option('wcm_analytics_cookies_text', $default_texts->analytics_cookies_text), 'wp-cookie-manager' );?>
    </p>
    <p id="analytics_cookie_names" class="hidden-data"><?php esc_html_e( get_option('wcm_analytics_cookie_names', $default_texts->analytics_cookie_names), 'wp-cookie-manager' );?></p>
    <p id="cookie-settings-section-text__external">
        <?php esc_html_e( get_option('wcm_external_cookies_text', $default_texts->external_cookies_text), 'wp-cookie-manager' );?>
    </p>
    <p id="external_cookie_names" class="hidden-data"><?php esc_html_e( get_option('wcm_external_cookie_names', $default_texts->external_cookie_names), 'wp-cookie-manager' );?></p>
    <p id="cookie-settings-section-text__privacy_policy">
        <?php esc_html_e( get_option('wcm_privacy_policy_text', $default_texts->privacy_policy_text), 'wp-cookie-manager' );?>
        <a 
            href="<?php esc_html_e( get_option('wcm_privacy_policy_url', $default_texts->privacy_policy_url), 'wp-cookie-manager' );?>"
        >
            <?php esc_html_e( get_option('wcm_privacy_policy_link', $default_texts->privacy_policy_link), 'wp-cookie-manager' );?>
        </a>
    </p>
    <div id="wp-cookie-manager-cookie-settings-popup-switch-essential">
        <label><b><?php echo __( 'Active', 'wp-cookie-manager' ); ?>:</b></label>
        <label class="switch">
            <input type="checkbox" checked disabled>
            <span class="slider round"></span>
        </label>
    </div>
    <div id="wp-cookie-manager-cookie-settings-popup-switch-analytics">
        <label><b><?php echo __( 'Active', 'wp-cookie-manager' ); ?>:</b></label>
        <label class="switch">
            <input type="checkbox" checked disabled>
            <span class="slider round"></span>
        </label>
    </div>
    <div id="wp-cookie-manager-cookie-settings-popup-switch-external">
        <label><b><?php echo __( 'Active', 'wp-cookie-manager' ); ?>:</b></label>
        <label class="switch">
            <input type="checkbox" checked disabled>
            <span class="slider round"></span>
        </label>
    </div>
</div>