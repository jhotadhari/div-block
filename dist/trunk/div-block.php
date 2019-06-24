<?php
/*
	Plugin Name: Div Block
	Plugin URI: https://github.com/jhotadhari/div-block
	Description: Just a simple div Block. Nothing else.
	Version: 0.1.0
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
		'version'	=> '0.1.0',
		'slug'	=> 'div-block',
		'name'	=> 'Div Block',
		'prefix'	=> 'divb',
		'textdomain'	=> 'divb',
		'FILE_CONST'	=> __FILE__,
		'db_version'	=> 0,
	);

	// see ./classes/Divb.php
	return divb\Divb::get_instance( $init_args );
}
divb_init();


?>