<?php
/**
 * @package hskwakr-practice
 */

/*
Plugin Name: hskwakr practice
Plugin URI: https://github.com/hskwakr/wp-plugin-practice
Description: This is my first attempt on writing a custom plugin.
Version: 1.0.0
Author: hskwakr
Author URI: https://github.com/hskwakr
License: MIT
Text Domain: hskwakr-practice
*/

/*
MIT License

Copyright (c) 2021 Hosokawa

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.
*/

// Protect from illegal access
defined( 'ABSPATH' ) or die( 'Cannot access this page.' );

if ( file_exists( dirname( __FILE__ ) . '/vendor/autoload.php' ) ) {
  require_once dirname( __FILE__ ) . '/vendor/autoload.php';
}

define( 'PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
define( 'PLUGIN_URL', plugin_dir_url( __FILE__ ) );

if ( class_exists( 'Inc\\Init' ) ) {
  Inc\Init::register_services();
}

/**
 * Class HskwakrPractice
 * @author hskwakr
 */
class HskwakrPractice
{
}
