<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://deviware.com/
 * @since      1.0.0
 *
 * @package    Wp_Cookie_Manager
 * @subpackage Wp_Cookie_Manager/admin/partials
 */

 $license_activated = get_option( 'wcm_license_activated', false );

?>

<!--<div class="wrap wcm_general_settings">-->
    <form method="post" id="wcm-general-settings-form" action="<?php echo esc_html( admin_url( 'admin-post.php' ) ); ?>">
        <?php //settings_fields( 'wp-cookie-manager-general-settings' ); ?>
        <?php //do_settings_sections( 'wp-cookie-manager-general-settings' ); ?>
        <h2><?php _e('General Settings', 'wp-cookie-manager'); ?></h2>
        <div>
            <p><?php _e('Here you can configure the general settings of the WP Cookie Manager plugin.', 'wp-cookie-manager');?> </p>
        </div>
        
        <h2><?php _e('License', 'wp-cookie-manager'); ?></h2>
        <table class="form-table">
            <tbody>
                <tr valign="top" class="">
                    <th scope="row" class="titledesc"><?php _e('License', 'wp-cookie-manager'); ?></th>
                    <td class="forminp forminp-checkbox">
                        <fieldset>
                            <legend class="screen-reader-text"><span><?php _e('Activate license', 'wp-cookie-manager'); ?></span></legend>
                            <label for="wcm_license">
                                <input 
                                    name="wcm_license" 
                                    id="wcm_license" 
                                    type="text" 
                                    class="" 
                                    value="<?php echo __( get_option('wcm_license', ''), 'wp-cookie-manager' );?>"
                                >
                            </label>
                            <?php if ( $license_activated ): ?>
                                <p class="description"><?php _e('Your license is valid, enjoy PRO features.', 'wp-cookie-manager'); ?></p>
                            <?php else: ?>
                                <p class="description"><?php _e('Provide a valid license to get the PRO features. You can get one <a target="blank" href="https://www.deviware.com">here</a>.', 'wp-cookie-manager'); ?></p>
                            <?php endif; ?>
                        </fieldset>
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="<?php echo( !$license_activated ? 'wcm_pro_feature_container' : ''); ?>">
            <h2><?php _e('Logs', 'wp-cookie-manager'); ?></h2>
            <table class="form-table">
                <tbody>
                    <tr valign="top" class="">
                        <th scope="row" class="titledesc"><?php _e('Activate / Deactivate', 'wp-cookie-manager'); ?></th>
                        <td class="forminp forminp-checkbox">
                            <?php if ( $license_activated ): ?>
                            <fieldset>
                                <legend class="screen-reader-text"><span><?php _e('Activate log', 'wp-cookie-manager'); ?></span></legend>
                                <label for="wcm_accepted_cookies_log">
                                    <input 
                                        name="wcm_accepted_cookies_log" 
                                        id="wcm_accepted_cookies_log" 
                                        type="checkbox" 
                                        class="" 
                                        value="1" 
                                        <?php echo ( get_option('wcm_accepted_cookies_log') ? "checked" : "" ); ?>
                                    >
                                    <?php _e('Generate a log file with accepted Cookies.', 'wp-cookie-manager'); ?>
                                </label>
                                <p class="description"><?php _e("This option saves into a CSV formatted log file all the user consents.", 'wp-cookie-manager'); ?></p>
                            </fieldset>
                            <?php else: ?>
                            <p class="wcm_pro_feature" ><?php _e('This is a PRO feature', 'wp-cookie-manager'); ?></p>
                            <?php endif; ?>
                        </td>
                    </tr>
                </tbody>
            </table>
            <h2><?php _e('Analytics Cookies', 'wp-cookie-manager'); ?></h2>
            <p><?php _e("Keep in mind that our plugin will not block Google Analytics Cookies if you haven't provided your Google Analytics ID and script in the following fields. Also you have to remove all other Google Analytics or TAG Manager implementations.", 'wp-cookie-manager'); ?></p>
            <table class="form-table">
                <tbody>
                    <tr valign="top">
                        <th scope="row" class="titledesc">
                            <label for="wcm_analytics_ga_measurement_id"><?php _e("Google Analytics ID", 'wp-cookie-manager'); ?></label>
                        </th>
                        <td class="forminp forminp-text">
                            <?php if ( $license_activated ): ?>
                            <input 
                                name="wcm_analytics_ga_measurement_id" 
                                id="wcm_analytics_ga_measurement_id" 
                                type="text" 
                                style="" 
                                value="<?php echo __( get_option('wcm_analytics_ga_measurement_id', ''), 'wp-cookie-manager' );?>" 
                                class="" 
                                placeholder="<?php echo esc_attr(__( $default_texts->analytics_ga_measurement_id, 'wp-cookie-manager' )); ?>"
                            >
                            <?php else: ?>
                            <p class="wcm_pro_feature" ><?php _e('This is a PRO feature', 'wp-cookie-manager'); ?></p>
                            <?php endif; ?>
                            <p class="description"><?php echo __( "It's used in case user doesn't accept analytics cookies to set the consent mode.", 'wp-cookie-manager' ); ?></p>
                        </td>
                    </tr>
                    <tr valign="top">
                        <th scope="row" class="titledesc">
                            <label for="wcm_analytics_cookie_names"><?php _e("Cookie names to block (separated by comma)", 'wp-cookie-manager'); ?></label>
                        </th>
                        <td class="forminp forminp-textarea">
                            <?php if ( $license_activated ): ?>
                            <textarea name="wcm_analytics_cookie_names" id="wcm_analytics_cookie_names"><?php echo esc_textarea(__( get_option('wcm_analytics_cookie_names', $default_texts->analytics_cookie_names), 'wp-cookie-manager' ));?></textarea>
                            <?php else: ?>
                            <p class="wcm_pro_feature" ><?php _e('This is a PRO feature', 'wp-cookie-manager'); ?></p>
                            <?php endif; ?>
                            <p class="description"><?php echo __( "This is not for Google Analytics or TAG Manager, you should only use it for other analytics cookies.", 'wp-cookie-manager' ); ?></p>
                        </td>
                    </tr>
                </tbody>
            </table>
            <h2><?php _e('Other Cookies', 'wp-cookie-manager'); ?></h2>
            <table class="form-table">
                <tbody>
                    <tr valign="top">
                        <th scope="row" class="titledesc">
                            <label for="wcm_external_cookie_names"><?php _e("Cookie names to block (separated by comma)", 'wp-cookie-manager'); ?></label>
                        </th>
                        <td class="forminp forminp-textarea">
                            <?php if ( $license_activated ): ?>
                            <textarea name="wcm_external_cookie_names" id="wcm_external_cookie_names"><?php echo esc_textarea(__( get_option('wcm_external_cookie_names', $default_texts->external_cookie_names), 'wp-cookie-manager' ));?></textarea>
                            <?php else: ?>
                            <p class="wcm_pro_feature" ><?php _e('This is a PRO feature', 'wp-cookie-manager'); ?></p>
                            <?php endif; ?>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="wcm-admin-buttons">
            <?php wp_nonce_field( 'wcm-settings-save', 'wcm-settings-wpnonce' ); ?>
            <input type="hidden" name="action" value="general"/>
            <?php submit_button(); ?>
            <?php if ( get_option('wcm_accepted_cookies_log', false) && $license_activated ): ?>
                <div class="wcm_download_btn">
                    <button 
                        id="download_accepted_cookies_log_file" 
                        class="button button-secondary" 
                    >
                        <?php echo __( 'Download Cookie Consents', 'wp-cookie-manager' ); ?>
                    </button>
                </div>
            <?php endif; ?>
        </div>
    </form>
<!--</div>-->