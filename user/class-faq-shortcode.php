<?php

namespace nebula\faq;

class user_faq {

	public function __construct(){
		add_shortcode('nebula-faq', array($this, 'process_faq_shortcode'));

		add_action( 'wp_enqueue_scripts', array( $this, 'register_styles'));
    add_action( 'wp_enqueue_scripts', array( $this, 'register_scripts'));
	}

	public function process_faq_shortcode(){
		// enqueue the registerred styles
    wp_enqueue_style( 'user-faq1' );
    wp_enqueue_media();
    wp_enqueue_script('user-faq');

		ob_start();
		include(nebula_faqs_DIR . 'user/views/faq-accordion.php');
		return ob_get_clean();
	}

	public function register_styles() {
  	wp_register_style(
        'user-faq1',
        '//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css',
        array()
    );
  }

	public function register_scripts() {
  	wp_register_script('user-faq', plugin_dir_url(__FILE__) . 'js/accordion.js',
            array('jquery', 'jquery-ui-core', 'jquery-ui-accordion'), '1.0', 'all'
    );
  }

}
