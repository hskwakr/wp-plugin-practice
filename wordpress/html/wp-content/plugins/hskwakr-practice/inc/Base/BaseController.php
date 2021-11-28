<?php
/**
 * @package hskwakr-practice
 */
namespace Inc\Base;

/**
 * Class BaseController
 * @author hskwakr
 */
abstract class BaseController
{
  public $plugin_file;
  public $plugin_path;
  public $plugin_name;
  public $plugin_url;

  public function __construct()
  {
    $this->plugin_path = plugin_dir_path( dirname( __FILE__, 2 ) );
    $this->plugin_url  = plugin_dir_url( dirname( __FILE__, 2 ) );
    $this->plugin_name = plugin_basename( dirname( __FILE__, 3 ) );
    $this->plugin_file = $this->plugin_name . '/' . $this->plugin_name . '.php';
  }
}
