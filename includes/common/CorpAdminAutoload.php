<?php

namespace includes\common;
class CorpAdminAutoload
{
    private static $instance = null;
    private function __construct() {
        spl_autoload_register(array($this, 'autoloadNamespace'));
    }

    public static function getInstance(){
        if ( null == self::$instance ) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    /**
     * @param $className
     */
    public function autoloadNamespace($className){
        $fileClass = CORPADMINTEMPLATES_PlUGIN_DIR.'/'.str_replace("\\","/",$className).'.php';
        if (file_exists($fileClass)) {
            if (!class_exists($fileClass, FALSE)) {
                require_once $fileClass;
            }
        }
    }
}
CorpAdminAutoload::getInstance();
/**
 * Created by PhpStorm.
 * User: jesus
 * Date: 02.02.2017
 * Time: 21:17
 */