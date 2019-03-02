<?php

namespace nebula\faq;

class admin_welcome {

	public function __construct()  {
  	add_action( 'admin_init', array($this,'welcome_do_activation_redirect') );

    if ( is_network_admin() || isset( $_GET['activate-multi'] ) ) {
     return;
    }

    add_action('admin_menu', array($this, 'welcome_pages') );
    add_action('admin_head', array($this, 'welcome_remove_menus' ) );
  }

  public function welcome_do_activation_redirect() {
    if ( ! get_transient( '_nebula_welcome' ) ) {
    	return;
    }
    // Redirect
    wp_safe_redirect( add_query_arg( array( 'page' => 'nebula-FAQs' ), admin_url( 'index.php' ) ) );
  }

  public function welcome_pages() {
    add_dashboard_page(
    	'Nebula FAQs',
      'Nebula FAQs',
      'read',
      'nebula-FAQs',
      array( $this,'welcome_content')
    );
  }

  public function welcome_remove_menus() {
  	remove_submenu_page( 'index.php', 'nebula-FAQs' );
  }

  public static function welcome_content() {

?>
  <div class="wrap admin-page">
  	<h1 class="title"><?php echo esc_html( get_admin_page_title() ); ?></h1>

		<p>
			Thank you for installing the 'Nebula FAQs' plugin.
		</p>
		<p>
			The FAQs can be created by simply adding posts to the 'FAQs' section, seen in the menu on the left. Adding the finished FAQ section to a post or page is done by writing the <code>[nebula-faq]</code> shortcode, where you wish the content to appear.
		</p>

  </div>
  <?php
  	delete_transient( '_nebula_welcome' );
  }

}
