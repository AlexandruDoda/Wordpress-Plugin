<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Defines the admin functionality.
 *
 * @package       Wordboot
 * @subpackage    Wordboot/admin
 * @author        Abruptive <https://abruptive.com>
 */

if( ! class_exists( 'Wordboot_Admin' ) ) {

	class Wordboot_Admin {

		/**
		 * The plugin variables container.
		 * 
		 * @var    object    $plugin
		 */
		private $plugin;

		/**
		 * Construct the class.
		 * 
		 * @param    object    $plugin    The plugin variables.
		 */
		public function __construct( $plugin ) {

			$this->plugin = $plugin;

		}

		/**
		 * Enqueue the admin stylesheets.
		 *
		 * @link https://developer.wordpress.org/reference/functions/wp_enqueue_style
		 */
		public function enqueue_styles() {

			// Enqueue and localize the admin plugin stylesheet.
			wp_enqueue_style( $this->plugin['id'], $this->plugin['url'] . 'assets/admin/css/admin.min.css', array(), $this->plugin['version'], 'all' );

		}

		/**
		 * Enqueue the admin scripts.
		 * 
		 * @link https://developer.wordpress.org/reference/functions/wp_enqueue_script
		 */
		public function enqueue_scripts() {

			// Enqueue and localize the admin plugin script.
			wp_enqueue_script( $this->plugin['id'], $this->plugin['url'] . 'assets/admin/js/admin.min.js', array( 'jquery' ), $this->plugin['version'], true );

		}

		/**
		 * Extend the default action links.
		 *
		 * @param     array    $actions       Associative array of action names to anchor tags.
		 * @return    array    Associative array of plugin action links,
		 */
		public function action_links( $actions ) {

			return array_merge( array( 
				'<a href="' . admin_url( 'admin.php?page=' . $this->plugin['id'] ) . '">' . 
					__( 'Settings', 'wordboot' ) . 
				'</a>',
			), $actions );
			
		}

	}

}
