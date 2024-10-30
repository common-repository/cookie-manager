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

<!--<div class="wrap wcm_texts_settings">-->
    <form method="post" id="wcm-texts-settings-form" action="<?php echo esc_html( admin_url( 'admin-post.php' ) ); ?>">
        <?php settings_fields( 'wp-cookie-manager-texts-settings' ); ?>
        <?php do_settings_sections( 'wp-cookie-manager-texts-settings' ); ?>
        <h2><?php _e('Text Settings', 'wp-cookie-manager'); ?></h2>
        <div>
            <p><?php _e('Here you can change most of the texts shown in the public part of the WP Cookie Manager plugin.', 'wp-cookie-manager');?> </p>
        </div>
        <h2><?php _e('Cookie Notice', 'wp-cookie-manager'); ?></h2>
        <table class="form-table">
            <tbody>
                <tr valign="top">
                    <th scope="row" class="titledesc">
                        <label for="wcm_cookies_notice_text"><?php _e("Text", 'wp-cookie-manager'); ?></label>
                    </th>
                    <td class="forminp forminp-text">
                        <textarea 
                                name="wcm_cookies_notice_text" 
                                id="wcm_cookies_notice_text"
                                placeholder="<?php echo esc_attr(__($default_texts->cookies_notice_text, 'wp-cookie-manager')); ?>"
                        ><?php echo esc_textarea(__(get_option('wcm_cookies_notice_text', $default_texts->cookies_notice_text), 'wp-cookie-manager')); ?></textarea>
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="<?php echo( !$license_activated ? 'wcm_pro_feature_container' : ''); ?>">
            <h2><?php _e('How we use the cookies', 'wp-cookie-manager'); ?></h2>
            <table class="form-table">
                <tbody>
                    <tr valign="top">
                        <th scope="row" class="titledesc">
                            <label for="wcm_cookies_use_title"><?php _e("Title", 'wp-cookie-manager'); ?></label>
                        </th>
                        <td class="forminp forminp-text">
                            <?php if ( $license_activated ): ?>
                            <input 
                                name="wcm_cookies_use_title" 
                                id="wcm_cookies_use_title" 
                                type="text"
                                value="<?php echo esc_attr(__(get_option('wcm_cookies_use_title', $default_texts->cookies_use_title), 'wp-cookie-manager')); ?>" 
                                placeholder="<?php echo esc_attr(__( $default_texts->cookies_use_title, 'wp-cookie-manager' )); ?>"
                            >
                            <?php else: ?>
                            <p class="wcm_pro_feature" ><?php _e('This is a PRO feature', 'wp-cookie-manager'); ?></p>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr valign="top">
                        <th scope="row" class="titledesc">
                            <label for="wcm_cookies_use_text"><?php _e("Description", 'wp-cookie-manager'); ?></label>
                        </th>
                        <td class="forminp forminp-textarea">
                            <?php if ( $license_activated ): ?>
                            <textarea 
                                name="wcm_cookies_use_text" 
                                id="wcm_cookies_use_text"
                                placeholder="<?php echo esc_attr(__($default_texts->cookies_use_text, 'wp-cookie-manager')); ?>"
                            ><?php echo esc_textarea(__(get_option('wcm_cookies_use_text', $default_texts->cookies_use_text), 'wp-cookie-manager')); ?></textarea>
                            <?php else: ?>
                            <p class="wcm_pro_feature" ><?php _e('This is a PRO feature', 'wp-cookie-manager'); ?></p>
                            <?php endif; ?>
                        </td>
                    </tr>
                </tbody>
            </table>
            <h2><?php _e('Essential Cookies', 'wp-cookie-manager'); ?></h2>
            <table class="form-table">
                <tbody>
                    <tr valign="top">
                        <th scope="row" class="titledesc">
                            <label for="wcm_essential_cookies_title"><?php _e("Title", 'wp-cookie-manager'); ?></label>
                        </th>
                        <td class="forminp forminp-text">
                            <?php if ( $license_activated ): ?>
                            <input 
                                name="wcm_essential_cookies_title" 
                                id="wcm_essential_cookies_title" 
                                type="text" 
                                value="<?php echo esc_attr(__(get_option('wcm_essential_cookies_title', $default_texts->essential_cookies_title), 'wp-cookie-manager')); ?>"
                                placeholder="<?php echo esc_attr(__( $default_texts->essential_cookies_title, 'wp-cookie-manager' )); ?>"
                            >
                            <?php else: ?>
                            <p class="wcm_pro_feature" ><?php _e('This is a PRO feature', 'wp-cookie-manager'); ?></p>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr valign="top">
                        <th scope="row" class="titledesc">
                            <label for="wcm_essential_cookies_text"><?php _e("Description", 'wp-cookie-manager'); ?></label>
                        </th>
                        <td class="forminp forminp-textarea">
                        <?php if ( $license_activated ): ?>
                        <textarea 
                            id="wcm_essential_cookies_text" 
                            name="wcm_essential_cookies_text"
                            placeholder="<?php echo esc_attr(__( $default_texts->essential_cookies_text, 'wp-cookie-manager' )); ?>"
                        ><?php echo esc_textarea(__( get_option('wcm_essential_cookies_text', $default_texts->essential_cookies_text ), 'wp-cookie-manager')); ?></textarea>
                        <?php else: ?>
                            <p class="wcm_pro_feature" ><?php _e('This is a PRO feature', 'wp-cookie-manager'); ?></p>
                        <?php endif; ?>
                        </td>
                    </tr>
                </tbody>
            </table>
            <h2><?php _e('Analytics Cookies', 'wp-cookie-manager'); ?></h2>
            <table class="form-table">
                <tbody>
                    <tr valign="top">
                        <th scope="row" class="titledesc">
                            <label for="wcm_analytics_cookies_title"><?php _e("Title", 'wp-cookie-manager'); ?></label>
                        </th>
                        <td class="forminp forminp-text">
                            <?php if ( $license_activated ): ?>
                            <input 
                                name="wcm_analytics_cookies_title" 
                                id="wcm_analytics_cookies_title" 
                                type="text" 
                                value="<?php echo esc_attr(__(get_option('wcm_analytics_cookies_title', $default_texts->analytics_cookies_title), 'wp-cookie-manager')); ?>"
                                placeholder="<?php echo esc_attr(__( $default_texts->analytics_cookies_title, 'wp-cookie-manager' )); ?>"
                            >
                            <?php else: ?>
                            <p class="wcm_pro_feature" ><?php _e('This is a PRO feature', 'wp-cookie-manager'); ?></p>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr valign="top">
                        <th scope="row" class="titledesc">
                            <label for="wcm_analytics_cookies_text"><?php _e("Description", 'wp-cookie-manager'); ?></label>
                        </th>
                        <td class="forminp forminp-textarea">
                        <?php if ( $license_activated ): ?>
                        <textarea 
                            id="wcm_analytics_cookies_text" 
                            name="wcm_analytics_cookies_text"
                            placeholder="<?php echo esc_attr(__( $default_texts->analytics_cookies_text, 'wp-cookie-manager' )); ?>"
                        ><?php echo esc_textarea(__( get_option('wcm_analytics_cookies_text', $default_texts->analytics_cookies_text ), 'wp-cookie-manager')); ?></textarea>
                        <?php else: ?>
                            <p class="wcm_pro_feature" ><?php _e('This is a PRO feature', 'wp-cookie-manager'); ?></p>
                        <?php endif; ?>
                        </td>
                    </tr>
                </tbody>
            </table>
            <h2><?php _e('External Cookies', 'wp-cookie-manager'); ?></h2>
            <table class="form-table">
                <tbody>
                    <tr valign="top">
                        <th scope="row" class="titledesc">
                            <label for="wcm_external_cookies_title"><?php _e("Title", 'wp-cookie-manager'); ?></label>
                        </th>
                        <td class="forminp forminp-text">
                            <?php if ( $license_activated ): ?>
                            <input 
                                name="wcm_external_cookies_title" 
                                id="wcm_external_cookies_title" 
                                type="text"
                                value="<?php echo esc_attr(__( get_option('wcm_external_cookies_title', $default_texts->external_cookies_title), 'wp-cookie-manager' ));?>"
                                placeholder="<?php echo esc_attr(__( $default_texts->external_cookies_title, 'wp-cookie-manager' )); ?>"
                            >
                            <?php else: ?>
                            <p class="wcm_pro_feature" ><?php _e('This is a PRO feature', 'wp-cookie-manager'); ?></p>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr valign="top">
                        <th scope="row" class="titledesc">
                            <label for="wcm_external_cookies_text"><?php _e("Description", 'wp-cookie-manager'); ?></label>
                        </th>
                        <td class="forminp forminp-textarea">
                            <?php if ( $license_activated ): ?>
                            <textarea 
                                id="wcm_external_cookies_text" 
                                name="wcm_external_cookies_text"
                                placeholder="<?php echo esc_attr(__( $default_texts->external_cookies_text, 'wp-cookie-manager' )); ?>"
                            ><?php echo esc_textarea(__( get_option('wcm_external_cookies_text', $default_texts->external_cookies_text), 'wp-cookie-manager' ));?></textarea>
                            <?php else: ?>
                            <p class="wcm_pro_feature" ><?php _e('This is a PRO feature', 'wp-cookie-manager'); ?></p>
                            <?php endif; ?>
                        </td>
                    </tr>
                </tbody>
            </table>
            <h2><?php _e('Privacy Policy', 'wp-cookie-manager'); ?></h2>
            <table class="form-table">
                <tbody>
                    <tr valign="top">
                        <th scope="row" class="titledesc">
                            <label for="wcm_privacy_policy_title"><?php _e("Title", 'wp-cookie-manager'); ?></label>
                        </th>
                        <td class="forminp forminp-text">
                            <?php if ( $license_activated ): ?>
                            <input 
                                name="wcm_privacy_policy_title" 
                                id="wcm_privacy_policy_title" 
                                type="text"
                                placeholder="<?php echo esc_attr(__( $default_texts->privacy_policy_title, 'wp-cookie-manager' )); ?>"
                                value="<?php echo esc_attr(__( get_option('wcm_privacy_policy_title', $default_texts->privacy_policy_title), 'wp-cookie-manager' ));?>"
                            >
                            <?php else: ?>
                            <p class="wcm_pro_feature" ><?php _e('This is a PRO feature', 'wp-cookie-manager'); ?></p>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr valign="top">
                        <th scope="row" class="titledesc">
                            <label for="wcm_privacy_policy_text"><?php _e("Legal text", 'wp-cookie-manager'); ?></label>
                        </th>
                        <td class="forminp forminp-textarea">
                            <?php if ( $license_activated ): ?>
                            <textarea 
                                id="wcm_privacy_policy_text" 
                                name="wcm_privacy_policy_text"
                                placeholder="<?php echo esc_attr(__( $default_texts->privacy_policy_text, 'wp-cookie-manager' )); ?>"
                            ><?php echo esc_textarea(__( get_option('wcm_privacy_policy_text', $default_texts->privacy_policy_text), 'wp-cookie-manager' ));?></textarea>
                            <?php else: ?>
                            <p class="wcm_pro_feature" ><?php _e('This is a PRO feature', 'wp-cookie-manager'); ?></p>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr valign="top">
                        <th scope="row" class="titledesc">
                            <label for="wcm_privacy_policy_link"><?php _e("Link title", 'wp-cookie-manager'); ?></label>
                        </th>
                        <td class="forminp forminp-text">
                            <?php if ( $license_activated ): ?>
                            <input 
                                name="wcm_privacy_policy_link" 
                                id="wcm_privacy_policy_link" 
                                type="text"
                                placeholder="<?php echo esc_attr(__( $default_texts->privacy_policy_link, 'wp-cookie-manager' )); ?>" 
                                value="<?php echo esc_attr(__( get_option('wcm_privacy_policy_link', $default_texts->privacy_policy_link), 'wp-cookie-manager' ));?>"
                            >
                            <?php else: ?>
                            <p class="wcm_pro_feature" ><?php _e('This is a PRO feature', 'wp-cookie-manager'); ?></p>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr valign="top">
                        <th scope="row" class="titledesc">
                            <label for="wcm_privacy_policy_url"><?php _e("URL", 'wp-cookie-manager'); ?></label>
                        </th>
                        <td class="forminp forminp-text">
                            <?php if ( $license_activated ): ?>
                            <input 
                                name="wcm_privacy_policy_url" 
                                id="wcm_privacy_policy_url" 
                                type="text"
                                placeholder="<?php echo __( 'https://example.com/example', 'wp-cookie-manager' ); ?>"
                                value="<?php echo __( get_option('wcm_privacy_policy_url'), 'wp-cookie-manager' );?>"
                            >
                            <?php else: ?>
                            <p class="wcm_pro_feature" ><?php _e('This is a PRO feature', 'wp-cookie-manager'); ?></p>
                            <?php endif; ?>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <h2><?php _e('Buttons', 'wp-cookie-manager'); ?></h2>
        <table class="form-table">
            <tbody>
                <tr valign="top">
                    <th scope="row" class="titledesc">
                        <label for="wcm_accept_all_cookies_button_text"><?php _e("Accept all button", 'wp-cookie-manager'); ?></label>
                    </th>
                    <td class="forminp forminp-text">
                        <input 
                            name="wcm_accept_all_cookies_button_text" 
                            id="wcm_accept_all_cookies_button_text" 
                            type="text"
                            placeholder="<?php echo esc_attr(__( $default_texts->accept_all_cookies_button_text, 'wp-cookie-manager' )); ?>" 
                            value="<?php echo esc_attr(__( get_option('wcm_accept_all_cookies_button_text', $default_texts->accept_all_cookies_button_text), 'wp-cookie-manager' ));?>"
                        >
                    </td>
                </tr>
                <tr valign="top" class="<?php echo( !$license_activated ? 'wcm_pro_feature_container' : ''); ?>">
                    <th scope="row" class="titledesc">
                        <label for="wcm_open_settings_button_text"><?php _e("Settings button", 'wp-cookie-manager'); ?></label>
                    </th>
                    <td class="forminp forminp-text">
                        <?php if ( $license_activated ): ?>
                        <input 
                            name="wcm_open_settings_button_text" 
                            id="wcm_open_settings_button_text" 
                            type="text"
                            placeholder="<?php echo esc_attr(__( $default_texts->open_settings_button_text, 'wp-cookie-manager' )); ?>"  
                            value="<?php echo esc_attr(__( get_option('wcm_open_settings_button_text', $default_texts->open_settings_button_text), 'wp-cookie-manager' ));?>"
                        >
                        <?php else: ?>
                        <p class="wcm_pro_feature" ><?php _e('This is a PRO feature', 'wp-cookie-manager'); ?></p>
                        <?php endif; ?>
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="wcm-admin-buttons">
            <p class="submit">
                <?php wp_nonce_field( 'wcm-settings-save', 'wcm-settings-wpnonce' ); ?>
                <input type="hidden" name="action" value="texts"/>
                <?php submit_button(); ?>
            </p>
        </div>
    </form>
<!--</div>-->