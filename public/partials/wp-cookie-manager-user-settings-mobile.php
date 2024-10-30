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
<div id="wp-cookie-manager-cookie-settings-popup-content-mobile" class="cookie-settings-section-mobile">
    <div id="wcm-how-we-use-cookies-container-mobile" class="active">
        <div id="wcm-how-we-use-cookies-button-mobile" class="wcm-mobile-tab"><?php esc_html_e( get_option('wcm_cookies_use_title', $default_texts->cookies_use_title), 'wp-cookie-manager' );?></div>
        <div id="wcm-how-we-use-cookies-section-mobile active" class="wcm-mobile-settings-section">
            <p id="cookie-settings-section-text__use-mobile">
                <?php esc_html_e( get_option('wcm_cookies_use_text', $default_texts->cookies_use_text), 'wp-cookie-manager' );?>
            </p>
        </div>
    </div>
    
    <div id="wcm-essential-cookies-container-mobile" class="cookie-settings-section-mobile">
        <div id="wcm-essential-cookies-button-mobile" class="wcm-mobile-tab"><?php esc_html_e( get_option('wcm_essential_cookies_title', $default_texts->essential_cookies_title), 'wp-cookie-manager' );?></div>
        <div id="wcm-essential-cookies-section-mobile" class="wcm-mobile-settings-section">
            <p id="cookie-settings-section-text__essential-mobile">
                <?php esc_html_e( get_option('wcm_essential_cookies_text', $default_texts->essential_cookies_text), 'wp-cookie-manager' );?>
            </p>
            <div id="wp-cookie-manager-cookie-settings-popup-switch-essential-mobile">
                <label><b><?php echo __( 'Active', 'wp-cookie-manager' ); ?>:</b></label>
                <label class="switch">
                    <input type="checkbox" checked disabled>
                    <span class="slider round"></span>
                </label>
            </div>
        </div>
    </div>
    <div id="wcm-analytics-cookies-container-mobile" class="cookie-settings-section-mobile">
        <div id="wcm-analytics-cookies-button-mobile" class="wcm-mobile-tab"><?php esc_html_e( get_option('wcm_analytics_cookies_title', $default_texts->analytics_cookies_title), 'wp-cookie-manager' );?></div>
        <div id="wcm-analytics-cookies-section-mobile" class="wcm-mobile-settings-section">
            <p id="cookie-settings-section-text__analytics-mobile">
                <?php esc_html_e( get_option('wcm_analytics_cookies_text', $default_texts->analytics_cookies_text), 'wp-cookie-manager' );?>
            </p>
            <p id="analytics_cookie_names-mobile" class="hidden-data"><?php esc_html_e( get_option('wcm_analytics_cookie_names', $default_texts->analytics_cookie_names), 'wp-cookie-manager' );?></p>
            <div id="wp-cookie-manager-cookie-settings-popup-switch-analytics-mobile">
                <label><b><?php echo __( 'Active', 'wp-cookie-manager' ); ?>:</b></label>
                <label class="switch">
                    <input type="checkbox" checked disabled>
                    <span class="slider round"></span>
                </label>
            </div>
        </div>
    </div>
    <div id="wcm-external-cookies-container-mobile" class="cookie-settings-section-mobile">
        <div id="wcm-external-cookies-button-mobile" class="wcm-mobile-tab"><?php esc_html_e( get_option('wcm_external_cookies_title', $default_texts->external_cookies_title), 'wp-cookie-manager' );?></div>
        <div id="wcm-external-cookies-section-mobile" class="wcm-mobile-settings-section">
            <p id="cookie-settings-section-text__external-mobile">
                <?php esc_html_e( get_option('wcm_external_cookies_text', $default_texts->external_cookies_text), 'wp-cookie-manager' );?>
            </p>
            <p id="external_cookie_names-mobile" class="hidden-data"><?php esc_html_e( get_option('wcm_external_cookie_names', $default_texts->external_cookie_names), 'wp-cookie-manager' );?></p>
            <div id="wp-cookie-manager-cookie-settings-popup-switch-external-mobile">
                <label><b><?php echo __( 'Active', 'wp-cookie-manager' ); ?>:</b></label>
                <label class="switch">
                    <input type="checkbox" checked disabled>
                    <span class="slider round"></span>
                </label>
            </div>
        </div>
    </div>
    
    <div id="wcm-privacy-policy-container-mobile" class="cookie-settings-section-mobile">
        <div id="wcm-privacy-policy-button-mobile" class="wcm-mobile-tab"><?php esc_html_e( get_option('wcm_privacy_policy_title', $default_texts->privacy_policy_title), 'wp-cookie-manager' );?></div>
        <div id="wcm-privacy-policy-section-mobile" class="wcm-mobile-settings-section">
            <p id="cookie-settings-section-text__privacy_policy-mobile">
                <?php esc_html_e( get_option('privacy_policy_text', $default_texts->privacy_policy_text), 'wp-cookie-manager' );?>
                <a 
                    href="<?php esc_html_e( get_option('wcm_privacy_policy_url', $default_texts->privacy_policy_url), 'wp-cookie-manager' );?>"
                >
                    <?php esc_html_e( get_option('wcm_privacy_policy_link', $default_texts->privacy_policy_link), 'wp-cookie-manager' );?>
                </a>
            </p>
        </div>
    </div>
</div>
