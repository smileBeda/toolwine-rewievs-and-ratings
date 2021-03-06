<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://www.tukutoi.com/
 * @since      1.0.0
 *
 * @package    Tw_Rar
 * @subpackage Tw_Rar/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Tw_Rar
 * @subpackage Tw_Rar/admin
 * @author     TukuToi <hello@tukutoi.com>
 */
class Tw_Rar_Admin {

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

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/tw-rar-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/tw-rar-admin.js', array( 'jquery' ), $this->version, false );

	}

	/**
	 *Register Toolset ShortCodes
	 */
	public function add_toolset_shortcodes($shortcodes){

		$shortcodes[] = 'has_user_reviewed';
		$shortcodes[] = 'rating_to_delete';
		$shortcodes[] = 'format_and_round';
    	
    	return $shortcodes;

	}

	public function add_quicktags_forms(){
		echo sprintf(
            '<button %1$s %2$s %3$s %4$s >%5$s %6$s</button>',
            'id="' . esc_attr( 'tw_rar_insert_fields_id' ) . '"',
            'class="' . esc_attr( 'tw_rar_insert_fields_class button button-secondary' ) . '"',
            'title="' . esc_attr( 'Insert Rating Fields' ) . '"',
            'data-target="content"',
            '<span class="dashicons dashicons-star-half" style="vertical-align:text-top"></span>',
            esc_html( __( 'Add Rating Fields', 'tw_rar' ) )
        );
	}

}
