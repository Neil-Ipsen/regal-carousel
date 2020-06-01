<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://github.com/Neil-Ipsen
 * @since      1.0.0
 *
 * @package    Regal_Carousel
 * @subpackage Regal_Carousel/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Regal_Carousel
 * @subpackage Regal_Carousel/admin
 * @author     Neil Ipsen <ipsen.neil@gmail.com>
 */

//include 'C:/wamp64/www/wordpress/wp-includes/plugin.php';

class Regal_Carousel_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

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
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;
		add_action( 'admin_menu', array( $this, 'register_menus' ) );

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
		 * defined in Regal_Carousel_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Regal_Carousel_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/regal-carousel-admin.css', array(), $this->version, 'all' );

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
		 * defined in Regal_Carousel_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Regal_Carousel_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/regal-carousel-admin.js', array( 'jquery' ), $this->version, false );

	}

	/*public function regal_carousel_options_page_html() {
		?>
		<div class="wrap">
			<h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
			<form action="options.php" method="post">
				<?php
				// output security fields for the registered setting "regal_carousel_options"
				settings_fields( 'regal_carousel_options' );
				// output settings sections and their fields
				// (sections are registered for "regal_carousel", each field is registered to a specific section)
				do_settings_sections( 'regal_carousel' );
				// output save settings button
				submit_button( __( 'Save Settings', 'textdomain' ) );
				?>
			</form>
		</div>
		<?php
	}*/

	public function register_menus() {
		add_submenu_page(
			'upload.php',
			'Regal Carousel',
			'Regal Carousel Options',
			'manage_options',
			'regal-carousel',
			'regal_carousel_options_page_html'
		);
	}

}
?>