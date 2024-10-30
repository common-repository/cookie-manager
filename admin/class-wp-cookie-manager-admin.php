<?php
/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Wp_Cookie_Manager
 * @subpackage Wp_Cookie_Manager/admin
 * @author     Deviware <hola@deviware.com>
 */
class Wp_Cookie_Manager_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $Wp_Cookie_Manager    The ID of this plugin.
	 */
	private $Wp_Cookie_Manager;
	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;
	/**
	 * Is license activated.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      boolean    $version    True if activated flase if not.
	 */
	private $license_activated;
	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $Wp_Cookie_Manager       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $Wp_Cookie_Manager, $version ) {
		$this->Wp_Cookie_Manager = $Wp_Cookie_Manager;
		$this->version = $version;
		$this->license_activated = get_option( 'wcm_license_activated', false );
	}
	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {
		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Wp_Cookie_Manager_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wp_Cookie_Manager_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->Wp_Cookie_Manager.'-admin', plugin_dir_url( __FILE__ ) . 'css/wp-cookie-manager-admin.css', array(), $this->version, 'all' );
		//Register menu icon
		wp_register_style('Wp_Cookie_Manager_gcaicons', plugins_url('cookie-manager/admin/css/wp-cookie-manager-icons.css'));
		wp_enqueue_style('Wp_Cookie_Manager_gcaicons');
		wp_enqueue_style( 'wp-color-picker' );
	}
	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {
		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Wp_Cookie_Manager_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wp_Cookie_Manager_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		wp_enqueue_script( $this->Wp_Cookie_Manager.'-admin', plugin_dir_url( __FILE__ ) . 'js/wp-cookie-manager-admin.js', array( 'jquery', 'wp-color-picker' ), $this->version, false );
		wp_localize_script($this->Wp_Cookie_Manager.'-admin', 'wcmAdminScript', array('pluginsUrl' => plugins_url()));
	}
	/**
	 * Create WP Cookie Manager Settings menu for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function create_wp_cookie_manager_menu(){
		$page_title = 'WP Cookie Manager Settings';   
		$menu_title = __('Cookie Settings', 'wp-cookie-manager');   
		$capability = 'manage_options';   
		$menu_slug  = 'wp-cookie-manager-settings';   
		$function   = 'display_wp_cookie_manager_settings_page';   
		$icon_url   = 'dashicons-wcm-cookie-solid';   
		$position   = 4;
		add_menu_page( $page_title, $menu_title, $capability, $menu_slug, array($this, $function), $icon_url, $position );
	}
	/**
	 * Create WP Cookie Manager Settings Page for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function display_wp_cookie_manager_settings_page(){ 
		$default_settings = new Wp_Cookie_Manager_Default_Settings();
		$default_texts = $default_settings->get_default_texts();
		include_once 'partials/wp-cookie-manager-admin-display.php';
	}
	/**
	 * Add WP Cookie Manager Classes to the body tag in the admin area.
	 *
	 * @since    1.0.0
	 */
	public function add_wcm_classes($classes) {
		//$classes =  array( 'wcm-page', 'wcm_page_wcm-admin' );
		global $current_screen;
		if($current_screen->base == 'toplevel_page_wp-cookie-manager-settings') {
			$classes .= ' wcm-page wcm_page_wcm-admin';
		}
		return $classes;
	}
	/**
	 * Display admin header for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function display_admin_header() {
		global $current_screen;
		if( $current_screen->base == 'toplevel_page_wp-cookie-manager-settings' ) {
			include_once 'partials/wp-cookie-manager-admin-header.php';
		}
	}
	/**
	 * Create WP Cookie Manager Settings Page Tabs for the admin area.
	 *
	 * @since    1.0.0
	 */
	function generate_wcm_admin_page_tabs( $current = 'general' ) {
		$tabs = array(
			'general'   => __( 'General', 'wp-cookie-manager' ), 
			'texts'  => __( 'Texts', 'wp-cookie-manager' ),
			'appearance' => __( 'Appearance', 'wp-cookie-manager' )
		);
		$html = '<h2 class="nav-tab-wrapper">';
		foreach( $tabs as $tab => $name ){
			$class = ( $tab == $current ) ? 'nav-tab-active' : '';
			$html .= '<a class="nav-tab ' . $class . '" href="?page=wp-cookie-manager-settings&tab=' . $tab . '">' . $name . '</a>';
		}
		$html .= '</h2>';
		return $html;
	}
	/**
	 * Change footer tet for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function change_admin_footer_text($content) {
		$html = '<i>' . _e('Developed by','wp-cookie-manager') . ' <a href="https://deviware.com/" target="_blank">Deviware Solutions</a></i>';
		return $html;
	}
	/**
	 * Determines if the nonce variable associated with the options page is set
	 * and is valid.
	 *
	 * @access private
	 * 
	 * @return boolean False if the field isn't set or the nonce value is invalid;
	 *                 otherwise, true.
	 */
	private function has_valid_nonce() {
		if (!isset($_POST['wcm-settings-wpnonce'])){
			return false;
		}
		$field=wp_unslash($_POST['wcm-settings-wpnonce']);
		$action='wcm-settings-save';
		return wp_verify_nonce($field,$action);
	}
	/**
	 * Validates the incoming nonce value, verifies the current user has
	 * permission to save the value from the options page and saves the
	 * option to the database.
	 */
	public function save_general_settings() {
		// First, validate the nonce and verify the user as permission to save.
		if ( ! ( $this->has_valid_nonce() && current_user_can( 'manage_options' ) ) ) {
			// TODO: Display an error message.
		}
		// Save license.
		if ( null !== wp_unslash( $_POST['wcm_license'] && $_POST['wcm_license'] != '') && !empty($_POST['wcm_license'])) {
			$value = sanitize_text_field( $_POST['wcm_license'] );
			$this->validate_activate_new_license($_POST['wcm_license']);
			update_option( 'wcm_license', $value );
		} else {
			$this->deactivate_license();
		}
		if ( $this->license_activated ) { 
			// Save activate LOG.
			if ( null !== wp_unslash( $_POST['wcm_accepted_cookies_log'] ) ) {
				$value = sanitize_text_field( $_POST['wcm_accepted_cookies_log'] );
				update_option( 'wcm_accepted_cookies_log', $value );
			} else {
				update_option( 'wcm_accepted_cookies_log', "" );
			}
			// Save analytics ID.
			if ( null !== wp_unslash( $_POST['wcm_analytics_ga_measurement_id'] ) ) {
				$value = sanitize_text_field( $_POST['wcm_analytics_ga_measurement_id'] );
				update_option( 'wcm_analytics_ga_measurement_id', $value );
			} else {
				update_option( 'wcm_analytics_ga_measurement_id', "" );
			}
			// Save analytics cookie names.
			if ( null !== wp_unslash( $_POST['wcm_analytics_cookie_names'] ) ) {
				$value = sanitize_text_field( $_POST['wcm_analytics_cookie_names'] );
				update_option( 'wcm_analytics_cookie_names', $value );
			} else {
				update_option( 'wcm_analytics_cookie_names', "" );
			}
			// Save external cookie names.
			if ( null !== wp_unslash( $_POST['wcm_external_cookie_names'] ) ) {

				$value = sanitize_text_field( $_POST['wcm_external_cookie_names'] );
				update_option( 'wcm_external_cookie_names', $value );
			
			} else {
				update_option( 'wcm_external_cookie_names', "" );
			}
		}
		$this->redirect();
	}
	/**
	 * Validates the incoming nonce value, verifies the current user has
	 * permission to save the value from the options page and saves the
	 * option to the database.
	 */
	public function save_texts_settings() {
		// First, validate the nonce and verify the user as permission to save.
		if ( ! ( $this->has_valid_nonce() && current_user_can( 'manage_options' ) ) ) {
			// TODO: Display an error message.
		}
		// Save Cookie Notice - Text.
		if ( null !== wp_unslash( $_POST['wcm_cookies_notice_text'] ) ) {
			$value = sanitize_text_field( $_POST['wcm_cookies_notice_text'] );
			update_option( 'wcm_cookies_notice_text', $value );
		} else {
			update_option( 'wcm_cookies_notice_text', "" );
		}
		if ( $this->license_activated ) {
			// Save How we use cookies - Title.
			if ( null !== wp_unslash( $_POST['wcm_cookies_use_title'] ) ) {
				$value = sanitize_text_field( $_POST['wcm_cookies_use_title'] );
				update_option( 'wcm_cookies_use_title', $value );
			} else {
				update_option( 'wcm_cookies_use_title', "" );
			}
			// Save How we use cookies - Text.
			if ( null !== wp_unslash( $_POST['wcm_cookies_use_text'] ) ) {
				$value = sanitize_text_field( $_POST['wcm_cookies_use_text'] );
				update_option( 'wcm_cookies_use_text', $value );
			} else {
				update_option( 'wcm_cookies_use_text', "" );
			}
			// Save Essentials Cookies - Title.
			if ( null !== wp_unslash( $_POST['wcm_essential_cookies_title'] ) ) {
				$value = sanitize_text_field( $_POST['wcm_essential_cookies_title'] );
				update_option( 'wcm_essential_cookies_title', $value );
			} else {
				update_option( 'wcm_essential_cookies_title', "" );
			}
			// Save Essentials Cookies - Text.
			if ( null !== wp_unslash( $_POST['wcm_essential_cookies_text'] ) ) {
				$value = sanitize_text_field( $_POST['wcm_essential_cookies_text'] );
				update_option( 'wcm_essential_cookies_text', $value );
			} else {
				update_option( 'wcm_essential_cookies_text', "" );
			}
			// Save Analytics Cookies - Title.
			if ( null !== wp_unslash( $_POST['wcm_analytics_cookies_title'] ) ) {
				$value = sanitize_text_field( $_POST['wcm_analytics_cookies_title'] );
				update_option( 'wcm_analytics_cookies_title', $value );
			} else {
				update_option( 'wcm_analytics_cookies_title', "" );
			}
			// Save Analytics Cookies - Text.
			if ( null !== wp_unslash( $_POST['wcm_analytics_cookies_text'] ) ) {
				$value = sanitize_text_field( $_POST['wcm_analytics_cookies_text'] );
				update_option( 'wcm_analytics_cookies_text', $value );
			} else {
				update_option( 'wcm_analytics_cookies_text', "" );
			}
			// Save External Cookies - Title.
			if ( null !== wp_unslash( $_POST['wcm_external_cookies_title'] ) ) {
				$value = sanitize_text_field( $_POST['wcm_external_cookies_title'] );
				update_option( 'wcm_external_cookies_title', $value );
			} else {
				update_option( 'wcm_external_cookies_title', "" );
			}
			// Save External Cookies - Text.
			if ( null !== wp_unslash( $_POST['wcm_external_cookies_text'] ) ) {
				$value = sanitize_text_field( $_POST['wcm_external_cookies_text'] );
				update_option( 'wcm_external_cookies_text', $value );
			} else {
				update_option( 'wcm_external_cookies_text', "" );
			}
			// Save Privacy Policy - Title.
			if ( null !== wp_unslash( $_POST['wcm_privacy_policy_title'] ) ) {
				$value = sanitize_text_field( $_POST['wcm_privacy_policy_title'] );
				update_option( 'wcm_privacy_policy_title', $value );
			} else {
				update_option( 'wcm_privacy_policy_title', "" );
			}
			// Save Privacy Policy - Legal Text.
			if ( null !== wp_unslash( $_POST['wcm_privacy_policy_text'] ) ) {
				$value = sanitize_text_field( $_POST['wcm_privacy_policy_text'] );
				update_option( 'wcm_privacy_policy_text', $value );
			} else {
					update_option( 'wcm_privacy_policy_text', "" );
			}
			// Save Privacy Policy - Link Title.
			if ( null !== wp_unslash( $_POST['wcm_privacy_policy_link'] ) ) {
				$value = sanitize_text_field( $_POST['wcm_privacy_policy_link'] );
				update_option( 'wcm_privacy_policy_link', $value );
			} else {
					update_option( 'wcm_privacy_policy_link', "" );
			}
			// Save Privacy Policy - URL.
			if ( null !== wp_unslash( $_POST['wcm_privacy_policy_url'] ) ) {
				$value = sanitize_text_field( $_POST['wcm_privacy_policy_url'] );
				update_option( 'wcm_privacy_policy_url', $value );
			} else {
				update_option( 'wcm_privacy_policy_url', "" );
			}
			// Buttons - Settings button.
			if ( null !== wp_unslash( $_POST['wcm_open_settings_button_text'] ) ) {
				$value = sanitize_text_field( $_POST['wcm_open_settings_button_text'] );
				update_option( 'wcm_open_settings_button_text', $value );
			} else {
				update_option( 'wcm_open_settings_button_text', "" );
			}
		}
		// Buttons - Accept All.
		if ( null !== wp_unslash( $_POST['wcm_accept_all_cookies_button_text'] ) ) {
			$value = sanitize_text_field( $_POST['wcm_accept_all_cookies_button_text'] );
			update_option( 'wcm_accept_all_cookies_button_text', $value );
		} else {
			update_option( 'wcm_accept_all_cookies_button_text', "" );
		}
		$this->redirect();
	}
	/**
	 * Validates the incoming nonce value, verifies the current user has
	 * permission to save the value from the options page and saves the
	 * option to the database.
	 */
	public function save_appearance_settings() {
		// First, validate the nonce and verify the user as permission to save.
		if ( ! ( $this->has_valid_nonce() && current_user_can( 'manage_options' ) ) ) {
			// TODO: Display an error message.
		}
		// General - Background color.
		if ( null !== wp_unslash( $_POST['wcm_bg_color'] ) ) {
			$value = sanitize_text_field( $_POST['wcm_bg_color'] );
			update_option( 'wcm_bg_color', $value );
		} else {
			update_option( 'wcm_bg_color', "" );
		}
		// General - Primary Text color.
		if ( null !== wp_unslash( $_POST['wcm_primary_text_color'] ) ) {
			$value = sanitize_text_field( $_POST['wcm_primary_text_color'] );
			update_option( 'wcm_primary_text_color', $value );
		} else {
			update_option( 'wcm_primary_text_color', "" );
		}
		// General - Cookie Settings and Save Cookie Settings buttons.
		if ( null !== wp_unslash( $_POST['wcm_secondary_text_color'] ) ) {
			$value = sanitize_text_field( $_POST['wcm_secondary_text_color'] );
			update_option( 'wcm_secondary_text_color', $value );
		} else {
			update_option( 'wcm_secondary_text_color', "" );
		}
		// Accept All Button - Background color.
		if ( null !== wp_unslash( $_POST['wcm_aab_bg_color'] ) ) {
			$value = sanitize_text_field( $_POST['wcm_aab_bg_color'] );
			update_option( 'wcm_aab_bg_color', $value );
		} else {
			update_option( 'wcm_aab_bg_color', "" );
		}
		// Accept All Button - Text color.
		if ( null !== wp_unslash( $_POST['wcm_aab_text_color'] ) ) {
			$value = sanitize_text_field( $_POST['wcm_aab_text_color'] );
			update_option( 'wcm_aab_text_color', $value );
		
		} else {
			update_option( 'wcm_aab_text_color', "" );
		}
		if ( $this->license_activated ) {
			// Cookie Settings and Save Cookie Settings buttons - Background color.
			if ( null !== wp_unslash( $_POST['wcm_cs_scs_bg_color'] ) ) {
				$value = sanitize_text_field( $_POST['wcm_cs_scs_bg_color'] );
				update_option( 'wcm_cs_scs_bg_color', $value );
			} else {
				update_option( 'wcm_cs_scs_bg_color', "" );
			}
			// Cookie Settings and Save Cookie Settings buttons - Text color.
			if ( null !== wp_unslash( $_POST['wcm_cs_scs_text_color'] ) ) {

				$value = sanitize_text_field( $_POST['wcm_cs_scs_text_color'] );
				update_option( 'wcm_cs_scs_text_color', $value );
			
			} else {
				update_option( 'wcm_cs_scs_text_color', "" );
			}
		}
		$this->redirect();
	}
	/**
	 * Redirect to the page from which we came (which should always be the
	 * admin page. If the referred isn't set, then we redirect the user to
	 * the login page.
	 *
	 * @access private
	 */
	private function redirect() {
		// To make the Coding Standards happy, we have to initialize this.
		if ( ! isset( $_POST['_wp_http_referer'] ) ) { // Input var okay.
			$_POST['_wp_http_referer'] = wp_login_url();
		}
		// Sanitize the value of the $_POST collection for the Coding Standards.
		$url = sanitize_text_field(
			wp_unslash( $_POST['_wp_http_referer'] ) // Input var okay.
		);
		// Finally, redirect back to the admin page.
		wp_safe_redirect( urldecode( $url ) );
		exit;
	}
	/**
	 * Validate and activate new license.
	 *
	 * @since    1.0.0
	 */
	public function validate_activate_new_license($new_license) {
		$license = json_decode($this->validate_license($new_license));
		$is_valid_license = $license->success;
		if( $license && $is_valid_license ) {
			//echo( 'IS VALID LICENSE<br>' );
			$remainingActivations = $license->data->remainingActivations;
			if ( !get_option( 'wcm_license_activated', false ) && $remainingActivations ) {
				//echo( 'REMAINING<br>' );
				$activate_license = json_decode($this->activate_license($new_license));
				$license_activated  = $activate_license->success;
				if( $license_activated ) {
					//echo('LICENSE ACTIVATED');
					update_option( 'wcm_license_activated', true );
				} else {
					update_option( 'wcm_license_activated', false );
				}
			}
		} else {
			if ( get_option( 'wcm_license_activated', false ) ) {
				$this->deactivate_license();
			}
		}
	}
	/**
	 * Check if user license is valid.
	 *
	 * @since    1.0.0
	 */
	public function validate_license($new_license = false) {
		$base_url = 'https://deviware.com/wp-json/lmfwc/v2/licenses/validate/';
		if ( !$new_license || $new_license == '' ) {
			$license_key = get_option( 'wcm_license' );
		} else {
			$license_key = $new_license;
		}
		$url = $base_url.$license_key;
		return $this->call_license_manager_api( $url );
	}
	/**
	 * Activate license.
	 *
	 * @since    1.0.0
	 */
	public function activate_license($new_license = false) {
		$base_url = 'https://deviware.com/wp-json/lmfwc/v2/licenses/activate/';
		if ( !$new_license || $new_license == '' ) {
			$license_key = get_option( 'wcm_license' );
		} else {
			$license_key = $new_license;
		}
		$url = $base_url.$license_key;
		return $this->call_license_manager_api( $url );
	}
	/**
	 * Deactivate license.
	 *
	 * @since    1.0.0
	 */
	public function deactivate_license( $new_license = false ) {
		$base_url = 'https://deviware.com/wp-json/lmfwc/v2/licenses/deactivate/';
		if ( !$new_license || $new_license == '' ) {
			//echo('NO NEW');
			$license_key = get_option( 'wcm_license' );
		} else {
			//echo('NEW');
			$license_key = $new_license;
		}
		$url = $base_url.$license_key;
		$result = $this->call_license_manager_api( $url );
		update_option( 'wcm_license', "" );
		update_option( 'wcm_license_activated', false );
		return $result;
	}
	/**
	 * Do the call to the licencse manager API.
	 *
	 * @since    1.0.0
	 */
	public function call_license_manager_api( $url )
	{
		$args = array(
			'headers' => array(
				'Authorization' => 'Basic ' . base64_encode( 'ck_cb000f06f1e99388037d194d0220e9b3a0d6befa:cs_2a9c09b1fd67bdc891d19652d09e6ea08c077a0b' )
			)
		);
		$request = wp_remote_get( $url, $args );

		if( is_wp_error( $request ) ) {
			return false; // Bail early
		}
		$response = wp_remote_retrieve_body( $request );
		return $response;
	}
}