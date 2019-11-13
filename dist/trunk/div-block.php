<?php
/*
	Plugin Name: Div Block
	Plugin URI: https://github.com/jhotadhari/div-block
	Description: Just a simple div Block. Nothing else.
	Version: 0.1.8
	Author: jhotadhari
	Author URI: https://github.com/jhotadhari
	License: GNU General Public License v2 or later
	License URI: http://www.gnu.org/licenses/gpl-2.0.html
	Text Domain: divb
	Domain Path: /languages
	Tags: container,wrapper,block,div,gutenberg,bootstrap
	GitHub Plugin URI: https://github.com/jhotadhari/div-block
	Release Asset: true
*/
?><?php
/**
 * Div Block Plugin init
 *
 * @package WordPress
 * @subpackage div-block
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

include_once( dirname( __FILE__ ) . '/vendor/autoload.php' );

function divb_init() {

	$init_args = array(
		'version'		=> '0.1.8',
		'slug'			=> 'div-block',
		'name'			=> 'Div Block',
		'prefix'		=> 'divb',
		'textdomain'	=> 'divb',
		'project_kind'	=> 'plugin',
		'FILE_CONST'	=> __FILE__,
		'db_version'	=> 0,
		'wde'			=> array(
			'generator-wp-dev-env'	=> '0.10.8',
			'wp-dev-env-grunt'		=> '0.8.8',
			'wp-dev-env-frame'		=> '0.7.6',
		),
		'deps'			=> array(
			'php_version'	=> '7.0.0',		// required php version
			'wp_version'	=> '5.0.0',			// required wp version
			'plugins'    	=> array(
				/*
				'woocommerce' => array(
					'name'              => 'WooCommerce',               // full name
					'link'              => 'https://woocommerce.com/',  // link
					'ver_at_least'      => '3.0.0',                     // min version of required plugin
					'ver_tested_up_to'  => '3.2.1',                     // tested with required plugin up to
					'class'             => 'WooCommerce',               // test by class
					//'function'        => 'WooCommerce',               // test by function
				),
				*/
			),
			'php_ext'     => array(
				/*
				'xml' => array(
					'name'              => 'Xml',                                           // full name
					'link'              => 'http://php.net/manual/en/xml.installation.php', // link
				),
				*/
			),
		),
	);

	// see ./classes/Divb.php
	return divb\Divb::get_instance( $init_args );
}
divb_init();

?>