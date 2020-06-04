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
		add_action( 'admin_menu', array( $this, 'register_menus' ), 30 );
		add_filter( 'plugin_action_links_regal-carousel/regal-carousel.php', array( $this, 'settings_link' ) );


	}

	public function settings_link( $links ) {
		$settings_link = '<a href="upload.php?page=regal_carousel">Settings</a>';
		array_push( $links, $settings_link );
		return $links;
	}

	public static function register_menus() {
		
		add_submenu_page(
			'upload.php',
			'Regal Carousel',
			'Regal Carousel',
			'manage_options',
			'regal_carousel',
			array( $this, 'regal_carousel_options_page_html' )
		);

	}

	public static function settings_init() {

		register_setting(
			'media',
			'regal_carousel_options'
		);

		add_settings_section(
			'regal_carousel_options',
			'Options',
			'regal_carousel_options_page_html',
			'regal_carousel'
		);

		add_settings_field(
			'regal_carousel_options_field',
			'Option',
			'regal_carousel_options_page_html',
			'regal_carousel',
			'regal_carousel_options',
			''
		);
	}

	public function regal_carousel_options_page_html() {
		// check user capabilities
		if ( ! current_user_can( 'manage options' ) ) {
			return;
		}
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
	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/regal-carousel-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the scripts for the admin area.
	 * 
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/regal-carousel-admin.js', array( 'jquery' ), $this->version, false );

	}

}