<?php
/**
 * @package hskwakr-practice
 */
namespace Inc\Base;

/**
 * Class Enqueue
 * @author hskwakr
 */
class Enqueue
{
  public function register()
  {
    add_action( 'admin_enque_scripts', array( $this, 'enqueue' ) );
  }

  function enqueue()
  {
    // enqueue all our scripts
    wp_enqueue_style( 'mypluginstyle', PLUGIN_URL . 'assets/mystyle.css' );
    wp_enqueue_script( 'mypluginscript', PLUGIN_URL . 'assets/myscript.js' );
  }
}
