<?php

namespace divb;

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

use croox\wde;

class Divb extends wde\Plugin {

	public function hooks(){
        parent::hooks();

		// $this->_include( 'css_properties' ); // Includes function divb_get_css_property

        // // Fix WPML global active language variable for REST Requests.
        // if ( class_exists( 'SitePress' ) ) {
        // 	add_action( 'after_setup_theme', array( 'croox\wde\utils\Wpml', 'rest_setup_switch_lang' ) );
        // }

		// add_action( 'init', array( $this, 'do_something_on_init' ), 10 );
	}

	// public function do_something_on_init(){
	// 	// ...
	// }

	// public function enqueue_scripts_admin(){
    //     parent::enqueue_scripts_admin();

    //     $handle = $this->prefix . '_script_admin';

    //     $this->register_script( array(
	// 		'handle'	=> $handle,
	// 		'deps'		=> array(
	// 			'jquery',
	// 			// 'wp-hooks',
	// 			// 'wp-api',
	// 			// 'wp-data',
	// 			// 'wp-i18n',
	// 		),
	// 		'in_footer'	=> true,	// default false
	// 		'enqueue'	=> true,
	// 	) );

	// }

}