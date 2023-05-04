<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    WPXD_QA
 * @subpackage WPXD_QA/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    WPXD_QA
 * @subpackage WPXD_QA/admin
 * @author     Akbar Doosti <wpx93.ir@gmail.com>
 */
class WPXD_QA_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $WPXD_QA    The ID of this plugin.
	 */
	private $WPXD_QA;

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
	 * @param      string    $WPXD_QA       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $WPXD_QA, $version ) {
		
		$this->load_dependencies();

		$this->WPXD_QA = $WPXD_QA;
		$this->version = $version;
		add_action( 'admin_menu', array( $this, 'settings_menu' ) );

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
		 * defined in WPXD_QA_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The WPXD_QA_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->WPXD_QA, plugin_dir_url( __FILE__ ) . 'css/wpxd-qa-plugin-admin.css', array(), $this->version, 'all' );

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
		 * defined in WPXD_QA_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The WPXD_QA_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->WPXD_QA, plugin_dir_url( __FILE__ ) . 'js/wpxd-qa-plugin-admin.js', array( 'jquery' ), $this->version, false );

	}

	function settings_menu() {
		$setting = new WPXD_QA_Settings();
		add_submenu_page(
			'edit.php?post_type=wpxd_qa',
			__( 'Questions Settings', 'wpxd-qa-plugin' ),
			__( 'Settings', 'wpxd-qa-plugin' ),
			'manage_options',
			'wpxd-qa-settings',
			array( $setting, 'render_page' )
		);
	}

	public function load_dependencies() {
		require_once plugin_dir_path(dirname(__FILE__)) . '/includes/classes/class-wpxd-qa-settings.php';
	}
}