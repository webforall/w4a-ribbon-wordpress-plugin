<?php

/**
 * @package w4a-ribbon
 * @version 0.1
 */
/*
  Plugin Name: WebForAll Ribbon
  Plugin URI: http://wordpress.org/extend/plugins/w4a-ribbon/
  Description: Adds WebForAll ribbon to your wordpress blog
  Author: ftassi <tassi.francesco@gmail.com>
  Version: 0.1
  Author URI: http://flavors.me/ftassi
 */

$w4aRibbon = new W4aRibbon();

class W4aRibbon
{

  const VERSION = '0.1';

  function __construct()
  {
    add_action('wp_footer', array($this, 'printRibbon'));
    add_action('wp', array($this, 'loadCss'));
  }

  public function printRibbon()
  {
    $ribbonPath = plugins_url('w4a-ribbon/images/supporter-top-right-big.png');
    ob_start();
    require_once( dirname(__FILE__) . '/template/ribbon.php' );
    echo ob_get_clean();
  }

  public function loadCss()
  {
    wp_register_style('w4a-ribbon-style', plugins_url('css/style.css', __FILE__), false, self::VERSION);
    wp_enqueue_style('w4a-ribbon-style');
  }

}