<?php
/**********
* Plugin Name: Nebula FAQs
* Plugin URI: https://github.com/Katrine-Marie/Nebula-FAQs
* Description: Add FAQ posts to an info accordion, whish can be inserted into a post or page with a shortcode.
* Version: 1.1.0
* Author: Katrine-Marie Burmeister
* Author URI: https://fjordstudio.dk
* License:     GNU General Public License v3.0
* License URI: https://www.gnu.org/licenses/gpl-3.0.html
*/

namespace nebula\faq;

if(!defined('ABSPATH')){
	exit('Go away!');
}

define('nebula_faqs_DIR', plugin_dir_path(__FILE__));

include_once(nebula_faqs_DIR . 'init/faq-posttype.php');
$mystart = new InitializePlugin();

// Welcome screen
include_once nebula_faqs_DIR . 'init/admin_welcome.php';
$welcome_page = new admin_welcome();


function launch () {

  global $pagenow, $post_type;

  $my_post_type = new faq_post_type();

  if(!is_admin()) {
    include (nebula_faqs_DIR . '/user/class-faq-shortcode.php');
    $run_user = new user_faq();
  }
}
launch();


class InitializePlugin {
	public function __construct(){
  	register_activation_hook( __FILE__, array($this, 'plugin_activated' ));
    register_deactivation_hook( __FILE__, array($this, 'plugin_deactivated' ));
    register_uninstall_hook( __FILE__, array($this, 'plugin_uninstall' ) );
  }
  public static function plugin_activated(){
    $register_post_type = new faq_post_type();
    $register_post_type->register_faq_post_type();
    flush_rewrite_rules();
  }
  public function plugin_deactivated(){

  }
  public function plugin_uninstall() {

  }
}
