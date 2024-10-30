<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://deviware.com/
 * @since      1.0.0
 *
 * @package    Wp_Cookie_Manager
 * @subpackage Wp_Cookie_Manager/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Wp_Cookie_Manager
 * @subpackage Wp_Cookie_Manager/public
 * @author     Deviware <hola@deviware.com>
 */

 class Wp_Cookie_Manager_Public {

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
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $gpdr_cookie_advisor      The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $Wp_Cookie_Manager, $version ) {

		$this->Wp_Cookie_Manager = $Wp_Cookie_Manager;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
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

		wp_enqueue_style( $this->Wp_Cookie_Manager.'-public', plugin_dir_url( __FILE__ ) . 'css/wp-cookie-manager-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
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

		wp_enqueue_script( $this->Wp_Cookie_Manager.'-public', plugin_dir_url( __FILE__ ) . 'js/wp-cookie-manager-public.js', array( 'jquery' ), $this->version, false );
		wp_localize_script($this->Wp_Cookie_Manager.'-public', 'wcmPublicScript', array('pluginsUrl' => plugins_url(), 'ajax_url' => admin_url( 'admin-ajax.php' )));
		

	}

	/**
	 * Add cookies popup for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function add_cookies_popup() {
		$default_settings = new Wp_Cookie_Manager_Default_Settings();
		$default_texts = $default_settings->get_default_texts();
		include_once "partials/wp-cookie-manager-user-settings.php";
	}

	/**
	 * Add cookie notice for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function add_cookie_notice() {
		$default_settings = new Wp_Cookie_Manager_Default_Settings();
		$default_texts = $default_settings->get_default_texts();
		include_once "partials/wp-cookie-manager-cookie-notice.php";
		include_once "partials/wp-cookie-manager-user-settings.php";
	}

	/**
	 * Add analytics script to head.
	 *
	 * @since    1.0.0
	 */
	public function add_analytics_script() {
		$ga_measurement_id = get_option('wcm_analytics_ga_measurement_id', null);
		$sanitized_cookie = (isset($_COOKIE['wp-cookie-manager-settings']) ? sanitize_text_field($_COOKIE['wp-cookie-manager-settings']) : null);
		$wcm_cookie = ( isset($sanitized_cookie) ? json_decode(stripcslashes(trim($sanitized_cookie,'"'))) : '');
		$analytics_code_head = get_option('wcm_analytics_head_code', null);

		if (!empty($ga_measurement_id)){
		//If analytics cookies are enabled insert Google Analytics Script
		if ($wcm_cookie && $wcm_cookie->analyticsEnabled):
			if (!function_exists('str_contains')) {
				function str_contains(string $haystack, string $needle): bool
				{
					return '' === $needle || false !== strpos($haystack, $needle);
				}
			}
			if (str_contains(strtoupper( $ga_measurement_id ),"UA-")) { 
				?>
					<!-- Google Analytics -->
					<script>
					(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
					(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
					m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
					})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
					
					ga('create', '<?php echo esc_attr($ga_measurement_id); ?>', 'auto');
					ga('send', 'pageview');
					</script>
					<!-- End Google Analytics -->
			 	<?php 
			} else {
				?>
					<!-- Global site tag (gtag.js) - Google Analytics -->
					<script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo esc_attr($ga_measurement_id); ?>"></script>
					<script>
					window.dataLayer = window.dataLayer || [];
					function gtag(){window.dataLayer.push(arguments);}
					gtag('js', new Date());
					
					gtag('config', '<?php echo esc_attr($ga_measurement_id); ?>');
					</script>
				<?php
			}


		else: ?>
			<!--<script data-cookieconsent="ignore"> 
				window.dataLayer = window.dataLayer || []; 
				function gtag() { dataLayer.push(arguments); } 
				gtag('consent', 'default', { 
					'ad_storage': 'denied', 
					'analytics_storage': 'denied', 
					'wait_for_update': 500 
				}); 
				gtag('set', 'ads_data_redaction', true); 
			</script>-->
			<!-- Global site tag (gtag.js) - Google Analytics | Consent mode -->
			<!--<script 
				async 
				src="https://www.googletagmanager.com/gtag/js?id=<?php echo esc_attr($ga_measurement_id); ?>" 
				data-cookieconsent="ignore"
			></script>
			<script data-cookieconsent="ignore">
				window.dataLayer = window.dataLayer || [];
				function gtag(){dataLayer.push(arguments);}
				gtag('js', new Date());
				gtag('config', '<?php echo esc_attr($ga_measurement_id); ?>', { 'anonymize_ip': true });
			</script>-->

			<script>
				const cyrb53 = function(str, seed = 0) {
				let h1 = 0xdeadbeef ^ seed,
					h2 = 0x41c6ce57 ^ seed;
				for (let i = 0, ch; i < str.length; i++) {
					ch = str.charCodeAt(i);
					h1 = Math.imul(h1 ^ ch, 2654435761);
					h2 = Math.imul(h2 ^ ch, 1597334677);
				}
				h1 = Math.imul(h1 ^ h1 >>> 16, 2246822507) ^ Math.imul(h2 ^ h2 >>> 13, 3266489909);
				h2 = Math.imul(h2 ^ h2 >>> 16, 2246822507) ^ Math.imul(h1 ^ h1 >>> 13, 3266489909);
				return 4294967296 * (2097151 & h2) + (h1 >>> 0);
				};

				let clientIP = "{$_SERVER['REMOTE_ADDR']}";
				let validityInterval = Math.round (new Date() / 1000 / 3600 / 24 / 4);
				let clientIDSource = clientIP + ";" + window.location.host + ";" + navigator.userAgent + ";" + navigator.language + ";" + validityInterval;
				let clientIDHashed = cyrb53(clientIDSource).toString(16);

				(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
				(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
				m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
				})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

				ga('create', '<?php echo esc_attr($ga_measurement_id); ?>', {
				'storage': 'none',
				'clientId': clientIDHashed
				});
				ga('set', 'anonymizeIp', true);
				ga('send', 'pageview');
			</script>

		<?php endif;
		}
	}

	/**
	 * Add data to log.
	 *
	 * @since    1.0.0
	 */
	public function add_to_log(){

		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-wp-cookie-manager-log.php';
		$isLogActive = get_option("wcm_accepted_cookies_log");
		$fpath = plugin_dir_path( dirname( __FILE__ ) ) . 'admin/accepted-cookies-log/';	
		$fname = "/wp-cookie-manager-accepted-cookies-log.csv";
		$year = strval(date("Y"));
		$fheader = "ip,email,date,essential_cookies_accepted,analytics_cookies_accepted,external_cookies_accepted\n";
		
		// Check parameters
		if(!empty($_POST['data']) && $isLogActive){
			$data = sanitize_text_field($_POST['data']);
			//print_r($data);
			prepare_directory($fpath, $year);
			prepare_file($fpath, $year, $fname, $fheader);
			update_file($fpath, $year, $fname, prepare_data($data));
		};

		wp_send_json($data);
	}
}