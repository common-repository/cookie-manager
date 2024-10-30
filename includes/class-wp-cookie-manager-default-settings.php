<?php

/**
 * Define the default settings
 *
 * Defines the default settings for this plugin.
 *
 * @link       https://deviware.com
 * @since      1.0.0
 *
 * @package    Wp_Cookie_Manager
 * @subpackage Wp_Cookie_Manager/includes
 */

/**
 * Define the default settings functionality.
 *
 * Defines the the default settings for this plugin.
 *
 * @since      1.0.0
 * @package    Wp_Cookie_Manager
 * @subpackage Wp_Cookie_Manager/includes
 * @author     Deviware <hola@deviware.com>
 */
class Wp_Cookie_Manager_Default_Settings {

    /**
	 * The object of default plugin texts.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      object    $default_texts    The default plugin texts.
	 */
    protected $default_texts;
    
    /**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 */
	public function __construct() {
		$this->default_texts = $this->set_default_texts();
	}

	/**
	 * Set the plugin default settings.
	 *
	 * @since    1.0.0
	 */
	private function set_default_texts() {     
		
		$default_texts = new stdClass();
		$default_texts->cookies_notice_text				= __( 'This site uses cookies. By continuing to browse the site, you are agreeing to our use of cookies.', 'wp-cookie-manager' );
		$default_texts->cookies_use_title				= __( "How we use cookies", 'wp-cookie-manager' );
		$default_texts->cookies_use_text  				= __( "We may request cookies to be set on your device. We use cookies to let us know when you visit our websites, how you interact with us, to enrich your user experience, and to customize your relationship with our website.\n\nClick on the different category headings to find out more. You can also change some of your preferences. Note that blocking some types of cookies may impact your experience on our websites and the services we are able to offer.", 'wp-cookie-manager' );
		$default_texts->essential_cookies_title 		= __( "Essential Website Cookies", 'wp-cookie-manager' );
		$default_texts->essential_cookies_text 			= __( "These cookies are strictly necessary to provide you with services available through our website and to use some of its features.\n\nBecause these cookies are strictly necessary to deliver the website, refuseing them will have impact how our site functions. You always can block or delete cookies by changing your browser settings and force blocking all cookies on this website. But this will always prompt you to accept/refuse cookies when revisiting our site.\n\nWe fully respect if you want to refuse cookies but to avoid asking you again and again kindly allow us to store a cookie for that. You are free to opt out any time or opt in for other cookies to get a better experience. If you refuse cookies we will remove all set cookies in our domain.\n\nWe provide you with a list of stored cookies on your computer in our domain so you can check what we stored. Due to security reasons we are not able to show or modify cookies from other domains. You can check these in your browser security settings.", 'wp-cookie-manager' );
		$default_texts->analytics_cookies_title 		= __( "Analytics Cookies", 'wp-cookie-manager' );
		$default_texts->analytics_cookies_text 			= __( "These cookies collect information that is used either in aggregate form to help us understand how our website is being used or how effective our marketing campaigns are, or to help us customize our website and application for you in order to enhance your experience.<br><br>If you do not want that we track your visit to our site you can disable tracking in your browser here:", 'wp-cookie-manager' );
		$default_texts->analytics_ga_measurement_id 	= __( "UA-XXXXX-Y", 'wp-cookie-manager' );
		$default_texts->analytics_cookie_names 			= "";
		$default_texts->external_cookies_title 			= __( "Other external services", 'wp-cookie-manager' );
		$default_texts->external_cookies_text 			= __( "We also use different external services like Google Webfonts, Google Maps, and external Video providers. Since these providers may collect personal data like your IP address we allow you to block them here. Please be aware that this might heavily reduce the functionality and appearance of our site. Changes will take effect once you reload the page.", 'wp-cookie-manager' );
		$default_texts->external_cookie_names 			= "";
		$default_texts->privacy_policy_title 			= __( "Privacy Policy", 'wp-cookie-manager' );
		$default_texts->privacy_policy_text 			= __( "You can read about our cookies and privacy settings in detail on our Privacy Policy Page.", 'wp-cookie-manager' );
		$default_texts->privacy_policy_link 			= __( "Privacy Policy", 'wp-cookie-manager' );
		$default_texts->privacy_policy_url 				= "";
		$default_texts->accept_all_cookies_button_text 	= __( "Accept all", 'wp-cookie-manager' );
		$default_texts->open_settings_button_text 		= __( "Cookie Settings", 'wp-cookie-manager' );


		/*$default_texts->cookies_use_title = "Como usamos las cookies";
		$default_texts->cookies_use_text  =	"Podemos solicitar que se establezcan cookies en su dispositivo. Utilizamos cookies para informarnos cuando visita nuestros sitios web, cómo interactúa con nosotros, para enriquecer su experiencia de usuario y para personalizar su relación con nuestro sitio web. Haga clic en los títulos de las diferentes categorías para obtener más información. También puede cambiar algunas de sus preferencias. Tenga en cuenta que bloquear algunos tipos de cookies puede afectar su experiencia en nuestros sitios web y los servicios que podemos ofrecer.";
		$default_texts->essential_cookies_title = "Cookies esenciales del sitio web";
		$default_texts->essential_cookies_text = "Estas cookies son estrictamente necesarias para brindarle los servicios disponibles a través de nuestro sitio web y para utilizar algunas de sus funciones. Debido a que estas cookies son estrictamente necesarias para entregar el sitio web, rechazarlas tendrá un impacto en el funcionamiento de nuestro sitio. Siempre puede bloquear o eliminar las cookies cambiando la configuración de su navegador y forzando el bloqueo de todas las cookies en este sitio web. Pero esto siempre le pedirá que acepte / rechace las cookies cuando vuelva a visitar nuestro sitio. Respetamos completamente si desea rechazar las cookies, pero para evitar preguntarle una y otra vez, permítanos almacenar una cookie para eso. Puede optar por no participar en cualquier momento u optar por otras cookies para obtener una mejor experiencia. Si rechaza las cookies, eliminaremos todas las cookies establecidas en nuestro dominio. Le proporcionamos una lista de cookies almacenadas en su computadora en nuestro dominio para que pueda verificar lo que almacenamos. Por razones de seguridad, no podemos mostrar ni modificar cookies de otros dominios. Puede comprobarlos en la configuración de seguridad de su navegador.";
		$default_texts->analytics_cookies_title = "Cookies de Google Analytics";
		$default_texts->analytics_cookies_text = "Estas cookies recopilan información que se utiliza en forma agregada para ayudarnos a comprender cómo se usa nuestro sitio web o qué tan efectivas son nuestras campañas de marketing, o para ayudarnos a personalizar nuestro sitio web y nuestra aplicación para mejorar su experiencia. Si no desea que rastreemos su visita a nuestro sitio, puede deshabilitar el rastreo en su navegador aquí:";
		$default_texts->analytics_ga_measurement_id = "GA_MEASUREMENT_ID";
		$default_texts->analytics_cookie_names = "_ga, _gid, _gat, AMP_TOKEN, _gac_, __utma, __utmt, __utmb, __utmc, __utmz, __utmv, __utmx, __utmxx, _gaexp, _opt_awcid, _opt_awmid, _opt_awgid, _opt_awkid, _opt_utmc";
		$default_texts->external_cookies_title = "Otros servicios externos";
		$default_texts->external_cookies_text = "También utilizamos diferentes servicios externos como Google Webfonts, Google Maps y proveedores de video externos. Dado que estos proveedores pueden recopilar datos personales como su dirección IP, le permitimos bloquearlos aquí. Tenga en cuenta que esto podría reducir considerablemente la funcionalidad y la apariencia de nuestro sitio. Los cambios entrarán en vigor una vez que vuelva a cargar la página.";
		$default_texts->external_cookie_names = "";
		$default_texts->privacy_policy_title = "Política de privacidad";
		$default_texts->privacy_policy_text = "Puede leer sobre nuestras cookies y la configuración de privacidad en detalle en nuestra Página de Política de Privacidad.";
		$default_texts->privacy_policy_link = "Política de privacidad";
		$default_texts->privacy_policy_url = "";
		$default_texts->accept_all_cookies_button_text = "Aceptar todo";
		$default_texts->open_settings_button_text = "Configurar Cookies";*/


		return $default_texts;
    }
    
    /**
	 * Get the plugin default settings.
	 *
	 * @since    1.0.0
	 */
	public function get_default_texts() {
        return $this->default_texts;
	}



}
