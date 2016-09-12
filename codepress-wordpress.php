<?php
/**
* Plugin Name: WordPress for CodePress
* Description: WordPress generator for CodePress
* Version: 1.0
* Author: Alessandro Senese
* Author URI: http://www.alessandrosenese.eu
* Plugin Uri: https://github.com/ceceppa/codepress-wordpress
* Text Domain: cp-wordpress
*/

if ( ! defined( 'ABSPATH' ) ) {
  echo 'Hi there! I\'m just a plugin.';
  exit;
}

define( 'CodePressWPPath', dirname(__FILE__) );

class CodePressWordPress {
  public function __construct() {
    register_activation_hook( __FILE__, array( & $this, 'register_addon' ) );
    register_deactivation_hook( __FILE__, array( & $this, 'unregister_addon' ) );
  }

  function register_addon() {
    cp_register_addon( 'WordPress', __FILE__ );
  }

  function unregister_addon() {
    cp_unregister_addon( 'WordPress', __FILE__ );
  }
}

new CodePressWordPress();
