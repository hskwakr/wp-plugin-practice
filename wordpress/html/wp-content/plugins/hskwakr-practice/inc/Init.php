<?php
/**
 * @package hskwakr-practice
 */
namespace Inc;

/**
 * Class Init
 * @author hskwakr
 */
final class Init
{
  /**
   * Store all the classes inside an array
   * @return array Full list of classes
   */
  public static function get_services()
  {
    return [
      Base\Enqueue::class,
      Pages\Admin::class
    ];
  }
  
  
  /**
   * Loop through the classes, initialize them,
   * and call the register method if it exists
   * @return
   */
  public static function register_services()
  {
    foreach ( self::get_services() as $class ) {
      $service = self::instantiate( $class );

      if ( method_exists( $service, 'register' ) ) {
        $service->register();
      }
    }
  }

  /**
   * Initialize the class
   * @param $class class from the services array
   * @return class instance
   */
  private static function instantiate( $class )
  {
    return new $class();
  }
}
