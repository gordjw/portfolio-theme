<?php

/**
 *
 **/
class SimplePortfolio {
	private $sp_option_defaults = array(

	);


	function __construct( $args = array() ) {
		$this->initialise_sp_options();

		add_action( 'wp_enqueue_scripts', array( &$this, 'load_resources' ) );
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


	public function load_resources() {
		wp_register_style( 'portfolio-screen', get_template_directory_uri() . "/css/portfolio.css" );
		wp_register_script( 'jquery-ui', get_template_directory_uri() . "/js/jquery-ui-1.10.3.custom.min.js", array('jquery') );
		wp_register_script( 'bigvideo', get_template_directory_uri() . "/js/bigvideo.js", array('jquery') );
		wp_register_script( 'video', get_template_directory_uri() . "/js/video.js", array('jquery') );
		wp_register_script( 'portfolio', get_template_directory_uri() . "/js/portfolio.js", array('jquery') );
		
		wp_enqueue_style( 'portfolio-screen' );
		wp_enqueue_script( 'jquery-ui' );
		wp_enqueue_script( 'bigvideo' );
		wp_enqueue_script( 'video' );
		wp_enqueue_script( 'portfolio' );
	}
}
