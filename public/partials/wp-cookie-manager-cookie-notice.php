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
$license_activated = get_option( 'wcm_license_activated', false );
$wcm_bg_color = get_option('wcm_bg_color', null);
$wcm_primary_text_color = get_option('wcm_primary_text_color', null);
$wcm_secondary_text_color = get_option('wcm_secondary_text_color', null);
$wcm_aab_bg_color = get_option('wcm_aab_bg_color', null);
$wcm_aab_text_color = get_option('wcm_aab_text_color', null);
$wcm_cs_scs_bg_color = get_option('wcm_cs_scs_bg_color', null);
$wcm_cs_scs_text_color = get_option('wcm_cs_scs_text_color', null);
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->

<div id="wp-cookie-manager-cookie-notice-container" style="<?php echo( $wcm_bg_color && $wcm_bg_color != '' ? 'background-color:'.esc_attr($wcm_bg_color).';' : '' ); ?>">
    <div id="wp-cookie-manager-cookie-notice">
        <div id="wp-cookie-manager-cookie-notice-text">
            <p style="<?php echo( $wcm_primary_text_color && $wcm_primary_text_color != '' ? 'color:'.esc_attr($wcm_primary_text_color).';' : '' ); ?>"><?php echo __(get_option('wcm_cookies_notice_text', $default_texts->cookies_notice_text), 'wp-cookie-manager'); ?></p>
        </div>
        <div id="wp-cookie-manager-cookie-notice-buttons">
            <button 
                id="<?php echo( $license_activated ? 'wp-cookie-manager-open-cookie-settings' : 'wp-cookie-manager-dismiss'); ?>" 
                style="<?php    
                    echo(  
                        $wcm_cs_scs_bg_color && 
                        $wcm_cs_scs_bg_color != '' ? 'background-color:'.esc_attr($wcm_cs_scs_bg_color).';' : '' 
                    ); 
                    echo(  
                        $wcm_cs_scs_text_color && 
                        $wcm_cs_scs_text_color != '' ? 'color:'.esc_attr($wcm_cs_scs_text_color).';' : '' 
                    ); 
                ?>"
            >
                <?php 
                if ($license_activated) {
                    esc_html_e( 
                        get_option(
                            'wcm_open_settings_button_text', 
                            $default_texts->open_settings_button_text
                        ), 
                        'wp-cookie-manager'
                    );
                } else {
                    _e( 'Dismiss notice','wp-cookie-manager' );
                }

                ?>
            </button>
            <button 
                id="wp-cookie-manager-cookie-accept-notice"
                style="<?php    
                    echo(  
                        $wcm_aab_bg_color && 
                        $wcm_aab_bg_color != '' ? 'background-color:'.esc_attr($wcm_aab_bg_color).';' : '' 
                    ); 
                    echo(  
                        $wcm_aab_text_color && 
                        $wcm_aab_text_color != '' ? 'color:'.esc_attr($wcm_aab_text_color).';' : '' 
                    ); 
                ?>"
            >
                <span>
                    <?php 
                        esc_html_e( 
                            get_option(
                                'wcm_accept_all_cookies_button_text', 
                                $default_texts->accept_all_cookies_button_text
                            ), 
                            'wp-cookie-manager' 
                        );
                    ?>
                </span> 
            </button>
        </div>  
    </div>
</div>