<?php

/**
 *
 **/
class SimplePortfolio {
	private $sp_option_defaults = array(

	);


	function __construct( $args = array() ) {
		$this->initialise_sp_options();

		add_action( 'init', array( &$this, 'load_resources' ) );
	}

	private function initialise_sp_options() {
		$sp_options = get_option('gw-sp-options', false );

		// If no options have been set yet
		if( ! $sp_options ) {
			// Initialise using the defaults
			add_option( 'gw-sp-options', $this->sp_option_defaults );
			$sp_options = $this->sp_option_defaults;
		}

		foreach( $sp_options as $o => $ov )
			$this->$o = $ov;
	}

	public function get_sp_option( $name ) {
		if( ! $this->$name )
			return false;

		return $this->$name;
	}


	private function load_resources() {
		
	}
}
