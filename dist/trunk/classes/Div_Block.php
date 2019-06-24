<?php

namespace divb;

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

class Div_Block {

	protected static $instance = null;
	protected $namspace = 'divb/div-block';

	protected $handles = array(
		'editor' => 'divb_block_div_block_editor',
		'frontend' => 'divb_block_div_block_frontend',
	);

	public static function get_instance() {
		if ( null === self::$instance ) {
			self::$instance = new self();
			self::$instance->hooks();
		}

		return self::$instance;
	}

	protected function __construct() {
		// ... silence
	}

	public function hooks() {
		add_action( 'init', array( $this, 'register_block' ) );
		add_action( 'enqueue_block_editor_assets', array( $this, 'enqueue_editor_assets' ) );
		// add_action( 'enqueue_block_assets', array( $this, 'enqueue_frontend_assets' ) );
	}

	public function register_block() {
		if ( function_exists( 'register_block_type' ) ) {
			register_block_type( $this->namspace, array(
				'editor_script' => $this->get_handle( 'editor' ),
				// 'editor_style' => $this->get_handle( 'editor' ),
				// 'style' => $this->get_handle( 'frontend' ),
				// 'script' => $this->get_handle( 'frontend' ),
				'render_callback' => array( $this, 'render' ),
			) );
		}
	}

	protected function get_handle( $key ){
		$handles = $this->handles;
		if ( array_key_exists( $key, $handles ) ){
			return $handles[$key];
		}
	}

	// protected function get_localize_data(){
	// 	$localize_data = array();
	// 	return $localize_data;
	// }

	// public function enqueue_frontend_assets() {

	// 	// check if we are on frontend
	// 	if ( is_admin() )
	// 		return;

	// 	$handle = $this->get_handle( 'frontend' );

	// 	// wp_enqueue_style(
	// 	// 	$handle,
	// 	// 	Divb::get_instance()->dir_url . '/css/' . $handle . '.min.css',
	// 	// 	array( 'wp-blocks' ),
	// 	// 	filemtime( Divb::get_instance()->dir_path . 'css/' . $handle . '.min.css' )
	// 	// );
	// }

	public function enqueue_editor_assets() {
		$handle = $this->get_handle( 'editor' );		// returns 'divb_block_div_block_editor'

		wp_register_script(
			$handle,
			Divb::get_instance()->dir_url . '/js/' . $handle . '.min.js',
			array(
				'wp-blocks',
				'wp-i18n',
				'wp-element',
				'wp-edit-post',
			),
			filemtime( Divb::get_instance()->dir_path . 'js/' . $handle . '.min.js' )
		);

		// wp_localize_script( $handle, 'divbData', $this->get_localize_data() );

		wp_set_script_translations( $handle, 'divb', Divb::get_instance()->dir_path . 'languages' );

		wp_enqueue_script( $handle );

		// wp_enqueue_style(
		// 	$handle,
		// 	Divb::get_instance()->dir_url . '/css/' . $handle . '.min.css',
		// 	array( 'wp-edit-blocks' ),
		// 	filemtime( Divb::get_instance()->dir_path . 'css/' . $handle . '.min.css' )
		// );
	}

}