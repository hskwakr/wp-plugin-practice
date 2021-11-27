<?php
/**
 * @package hskwakr-practice
 */
namespace Inc\Pages;

use \Inc\Base\BaseController;
use \Inc\Api\SettingsApi;
use \Inc\Api\Callbacks\AdminCallbacks;

/**
 * Class Admin
 * @author hskwakr
 */
class Admin extends BaseController
{
  public $settings;
  public $callbacks;

  public $pages;
  public $subpages;

  public function register()
  {
    $this->settings = new SettingsApi();
    $this->callbacks = new AdminCallbacks();

    $this->setPages();
    $this->setSubpages();

    $this->setSettings();
    $this->setSections();
    $this->setFields();

    $this->settings
         ->addPages( $this->pages )
         ->withSubpages( 'Dashboard' )
         ->addSubpages( $this->subpages )
         ->register();
  }

  function setPages()
  {
    $this->pages = array(
      array(
        'page_title' => 'hskwakr practice',
        'menu_title' => 'hskwakr practice',
        'capability' => 'manage_options',
        'menu_slug'  => 'hskwakr_practice',
        'callback'   => array( $this->callbacks, 'adminDashboard' ),
        'icon_url'   => 'dashicons-admin-plugins',
        'position'   => 110
      ),
    );
  }

  function setSubpages()
  {
    $this->subpages = array(
      array(
        'parent_slug' => 'hskwakr_practice',
        'page_title'  => 'Custom Post Type',
        'menu_title'  => 'CPT',
        'capability'  => 'manage_options',
        'menu_slug'   => 'hskwakr_practice_cpt',
        'callback'   => array( $this->callbacks, 'adminCpt' ),
      ),
      array(
        'parent_slug' => 'hskwakr_practice',
        'page_title'  => 'Custom Taxonomies',
        'menu_title'  => 'Taxonomies',
        'capability'  => 'manage_options',
        'menu_slug'   => 'hskwakr_practice_taxonomies',
        'callback'   => array( $this->callbacks, 'adminTaxonomy' ),
      ),
      array(
        'parent_slug' => 'hskwakr_practice',
        'page_title'  => 'Custom Widgets',
        'menu_title'  => 'Widgets',
        'capability'  => 'manage_options',
        'menu_slug'   => 'hskwakr_practice_widgets',
        'callback'   => array( $this->callbacks, 'adminWidget' ),
      ),
    );
  }

  function setSettings()
  {
    $args = array(
      array(
        'option_group' => 'hskwakr_practice_option_groups',
        'option_name'  => 'text_example',
        'callback'     => array( $this->callbacks, 'optionGroup' )
      )
    );

    $this->settings->setSettings( $args );
  }

  function setSections()
  {
    $args = array(
      array(
        'id'       => 'hskwakr_practice_admin_index',
        'title'    => 'Settings',
        'callback' => array( $this->callbacks, 'adminSection' ),
        'page'     => 'hskwakr_practice'
      )
    );

    $this->settings->setSections( $args );
  }

  function setFields()
  {
    $args = array(
      array(
        'id'       => 'text_example',
        'title'    => 'Text Example',
        'callback' => array( $this->callbacks, 'textExample' ),
        'page'     => 'hskwakr_practice',
        'section'  => 'hskwakr_practice_admin_index',
        'args'     => array(
          'label_for' => 'text_example',
          'class'     => 'example_class'
        )
      )
    );

    $this->settings->setFields( $args );
  }
}
