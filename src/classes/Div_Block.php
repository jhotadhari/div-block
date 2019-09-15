<?php

namespace divb;

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

use croox\wde;

class Div_Block extends wde\Block {

	protected function initialize() {
		// Block type name excluding namespace. Use dashes.
		$this->name = str_replace( '_', '-',
			sanitize_title_with_dashes( 'div-block' )
		);

		$this->project_class_name = 'divb\Divb';
	}

	protected function setup_handles() {
		$prefix = $this->project_class_name::get_instance()->prefix;
		$_name = str_replace( '-', '_', $this->name );

		// Define handles only for editor assets. So nothing will be loaded in frontend.
		$this->handles = array(
			'style_admin'     => $prefix . '_block_' . $_name . '_admin',
			'script_admin'    => $prefix . '_block_' . $_name . '_admin',
			// 'style_frontend'  => $prefix . '_block_' . $_name . '_frontend',
			// 'script_frontend' => $prefix . '_block_' . $_name . '_frontend',
		);
	}

}