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
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<div class="wrap wcm_settings">
    <?php 
        // Code displayed before the tabs (outside)
        
        // Tabs
        $tab = ( ! empty( sanitize_title($_GET['tab']) ) ) ? sanitize_title($_GET['tab']) : 'general';
        echo $this->generate_wcm_admin_page_tabs( $tab );

        if ( $tab == 'texts' ) {
            include_once 'wp-cookie-manager-admin-texts.php';
        } 
        elseif ( $tab == 'appearance' ) {
            include_once 'wp-cookie-manager-admin-appearance.php';
        }
        else {
            include_once 'wp-cookie-manager-admin-general.php';
        }
        // Code after the tabs (outside)
    ?>
</div>


