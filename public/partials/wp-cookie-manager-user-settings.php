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
$wcm_aab_bg_color = get_option('wcm_aab_bg_color', null);
$wcm_aab_text_color = get_option('wcm_aab_text_color', null);
$wcm_cs_scs_bg_color = get_option('wcm_cs_scs_bg_color', null);
$wcm_cs_scs_text_color = get_option('wcm_cs_scs_text_color', null);
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->

<div id="wp-cookie-manager-cookie-settings-popup">
    <div id="pop-up">
        <div id="wp-cookie-manager-cookie-settings-popup-title"><?php echo __( 'Cookie settings', 'wp-cookie-manager' ); ?></div>
        <div id="wp-cookie-manager-cookie-settings-popup-content">
            <div class="desktop">
                <?php include("wp-cookie-manager-user-settings-desktop.php"); ?>
            </div>
            <div class="mobile">
                <?php include("wp-cookie-manager-user-settings-mobile.php"); ?>
            </div>
        </div>
        <div id="wp-cookie-manager-cookie-settings-popup-buttons">
            <button 
                id="wp-cookie-manager-cookie-settings-popup-buttons-save"
                style="<?php    
                    echo(  
                        $wcm_cs_scs_bg_color && 
                        $wcm_cs_scs_bg_color != '' ? 'background-color:'.$wcm_cs_scs_bg_color.';' : '' 
                    ); 
                    echo(  
                        $wcm_cs_scs_text_color && 
                        $wcm_cs_scs_text_color != '' ? 'color:'.$wcm_cs_scs_text_color.';' : '' 
                    ); 
                ?>"
            ><?php echo __( 'Save settings', 'wp-cookie-manager' ); ?></button>
            <button 
                id="wp-cookie-manager-cookie-settings-popup-buttons-accept-all"
                style="<?php    
                    echo(  
                        $wcm_aab_bg_color && 
                        $wcm_aab_bg_color != '' ? 'background-color:'.$wcm_aab_bg_color.';' : '' 
                    ); 
                    echo(  
                        $wcm_aab_text_color && 
                        $wcm_aab_text_color != '' ? 'color:'.$wcm_aab_text_color.';' : '' 
                    ); 
                ?>"
            ><?php echo __( 'Accept all cookies', 'wp-cookie-manager' ); ?></button>
        </div>
    </div>
</div>