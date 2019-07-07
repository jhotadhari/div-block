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
	}

	public function register_block() {
		if ( function_exists( 'register_block_type' ) ) {
			register_block_type( $this->namspace, array(
				'editor_script' => $this->get_handle( 'editor' ),
				// 'editor_style' => $this->get_handle( 'editor' ),
				// 'style' => $this->get_handle( 'frontend' ),
				// 'script' => $this->get_handle( 'frontend' ),
				// 'render_callback' => array( $this, 'render' ),
			) );
		}
	}

	protected function get_handle( $key ){
		$handles = $this->handles;
		if ( array_key_exists( $key, $handles ) ){
			return $handles[$key];
		}
	}

	public function enqueue_editor_assets() {
		$handle = $this->get_handle( 'editor' );		// returns 'divb_block_div_block_editor'

		namespace\Divb::get_instance()->register_script( array(
			'handle'		=> $handle,
			'deps'			=> array(
				'wp-blocks',
				'wp-i18n',
				'wp-element',
				'wp-edit-post',
			),
			'in_footer'		=> true,
			'enqueue'		=> true,
		) );

		namespace\Divb::get_instance()->register_style( array(
			'handle'		=> $handle,
			'enqueue'		=> true,
			'deps'			=> array( 'wp-edit-blocks' ),
		) );


	}

}