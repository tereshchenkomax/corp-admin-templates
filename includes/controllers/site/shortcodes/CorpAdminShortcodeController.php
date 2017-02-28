<?php
/**
 * Created by PhpStorm.
 * User: jesus
 * Date: 11.02.2017
 * Time: 14:57
 */

namespace includes\controllers\site\shortcodes;


abstract class CorpAdminShortcodeController
{
    public function __construct(){
        add_action( 'wp_loaded',  array( &$this, 'initShortcode') );
    }
    abstract public function initShortcode();

    abstract public function action($atts = array(), $content = '', $tag = '');

    abstract public function render($data);
}
