<?php

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

function divb_block_div_block() {
	return divb\Div_Block::get_instance();
}
divb_block_div_block();

?>