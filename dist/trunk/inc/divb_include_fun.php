<?php

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

function divb_include_fun() {

	$paths = array(
		'inc/fun/divb_block_div_block.php',
	);

	if ( count( $paths ) > 0 ) {
		foreach( $paths as $path ) {
			include_once( divb\Divb::get_instance()->dir_path . $path );
		}
	}

}

?>