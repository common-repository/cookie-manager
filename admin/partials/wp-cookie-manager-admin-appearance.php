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

 $wcm_bg_color = get_option('wcm_bg_color', null);
 $wcm_primary_text_color = get_option('wcm_primary_text_color', null);
 $wcm_secondary_text_color = get_option('wcm_secondary_text_color', null);
 $wcm_aab_bg_color = get_option('wcm_aab_bg_color', null);
 $wcm_aab_text_color = get_option('wcm_aab_text_color', null);
 $wcm_cs_scs_bg_color = get_option('wcm_cs_scs_bg_color', null);
 $wcm_cs_scs_text_color = get_option('wcm_cs_scs_text_color', null);

?>

<!--<div class="wrap wcm_appearance_settings">-->
    <form method="post" id="wcm-appearance-settings-form" action="<?php echo esc_html( admin_url( 'admin-post.php' ) ); ?>">
        <?php settings_fields( 'wp-cookie-manager-appearance-settings' ); ?>
        <?php do_settings_sections( 'wp-cookie-manager-appearance-settings' ); ?>
        <h2><?php _e('Appearance Settings', 'wp-cookie-manager'); ?></h2>
        <div>
            <p><?php _e('Here you can configure the appeareance of the public part of the WP Cookie Manager plugin.', 'wp-cookie-manager');?> </p>
        </div>
        
        <h2><?php _e('General', 'wp-cookie-manager'); ?></h2>
        <table class="form-table">
            <tbody>
                <tr valign="top">
                    <th scope="row" class="titledesc">
                        <label for="wcm_bg_color"><?php _e("Background color", 'wp-cookie-manager'); ?></label>
                    </th>
                    <td class="forminp forminp-text">
                        <input name="wcm_bg_color" id="wcm_bg_color" type="text" value="<?php echo esc_attr( $wcm_bg_color ? $wcm_bg_color : '' ); ?>" class="wcm-color-field">
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row" class="titledesc">
                        <label for="wcm_primary_text_color"><?php _e("Primary Text color", 'wp-cookie-manager'); ?></label>
                    </th>
                    <td class="forminp forminp-text">
                        <input name="wcm_primary_text_color" id="wcm_primary_text_color" type="text" value="<?php echo esc_attr( $wcm_primary_text_color ? $wcm_primary_text_color : '' ); ?>" class="wcm-color-field">
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row" class="titledesc">
                        <label for="wcm_secondary_text_color"><?php _e("Secondary Text color", 'wp-cookie-manager'); ?></label>
                    </th>
                    <td class="forminp forminp-text">
                        <input name="wcm_secondary_text_color" id="wcm_secondary_text_color" type="text" value="<?php echo esc_attr( $wcm_secondary_text_color ? $wcm_secondary_text_color : '' ); ?>" class="wcm-color-field">
                    </td>
                </tr>
            </tbody>
        </table>
        <h2><?php _e('Accept All Button', 'wp-cookie-manager'); ?></h2>
        <table class="form-table">
            <tbody>
            <tr valign="top">
                    <th scope="row" class="titledesc">
                        <label for="wcm_aab_bg_color"><?php _e("Background Color", 'wp-cookie-manager'); ?></label>
                    </th>
                    <td class="forminp forminp-text">
                        <input name="wcm_aab_bg_color" id="wcm_aab_bg_color" type="text" value="<?php echo esc_attr( $wcm_aab_bg_color ? $wcm_aab_bg_color : '' ); ?>" class="wcm-color-field">
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row" class="titledesc">
                        <label for="wcm_aab_text_color"><?php _e("Text color", 'wp-cookie-manager'); ?></label>
                    </th>
                    <td class="forminp forminp-text">
                        <input name="wcm_aab_text_color" id="wcm_aab_text_color" type="text" value="<?php echo esc_attr( $wcm_aab_text_color ? $wcm_aab_text_color : '' ); ?>" class="wcm-color-field">
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="<?php echo( !$license_activated ? 'wcm_pro_feature_container' : ''); ?>">
        <h2><?php _e('Cookie Settings and Save Cookie Settings buttons', 'wp-cookie-manager'); ?></h2>
        <table class="form-table">
            <tbody>
            <tr valign="top">
                    <th scope="row" class="titledesc">
                        <label for="wcm_cs_scs_bg_color"><?php _e("Background Color", 'wp-cookie-manager'); ?></label>
                    </th>
                    <td class="forminp forminp-text">
                        <?php if ( $license_activated ): ?>
                        <input name="wcm_cs_scs_bg_color" id="wcm_cs_scs_bg_color" type="text" value="<?php echo esc_attr( $wcm_cs_scs_bg_color ? $wcm_cs_scs_bg_color : '' ); ?>" class="wcm-color-field">
                        <?php else: ?>
                        <p class="wcm_pro_feature" ><?php _e('This is a PRO feature', 'wp-cookie-manager'); ?></p>
                        <?php endif; ?>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row" class="titledesc">
                        <label for="wcm_cs_scs_text_color"><?php _e("Text color", 'wp-cookie-manager'); ?></label>
                    </th>
                    <td class="forminp forminp-text">
                        <?php if ( $license_activated ): ?>
                        <input name="wcm_cs_scs_text_color" id="wcm_cs_scs_text_color" type="text" value="<?php echo esc_attr( $wcm_cs_scs_text_color ? $wcm_cs_scs_text_color : '' ); ?>" class="wcm-color-field">
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
            <input type="hidden" name="action" value="appearance"/>
            <?php submit_button(); ?>
        </div>
    </form>
<!--</div>-->