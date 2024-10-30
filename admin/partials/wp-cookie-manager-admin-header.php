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

$tab = '';
switch ($_GET['tab']) {
    case 'general':
        $tab = __(' - General', 'wp-cookie-manager');
        break;
    case 'texts':
        $tab = __(' - Texts', 'wp-cookie-manager');
        break;
    case 'appearance':
        $tab = __(' - Appearance', 'wp-cookie-manager');
        break;
    default:
        $tab = __(' - General', 'wp-cookie-manager');
}

?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<div id="wcm-embedded-root">
    <div class="wcm-layout">
        <div class="wcm-layout__header">
            <div class="wcm-layout__header-wrapper">
                <h1 class="wcm-layout__header-heading"><?php printf(__('WP Cookie Manager %s','wp-cookie-manager'), $tab); ?></h1>
            </div>
        </div>
    </div>
</div>



