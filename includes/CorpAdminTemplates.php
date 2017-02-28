<?php

namespace includes;

use includes\common\CorpAdminLoader;
use includes\common\CorpAdminDefaultOption;
use includes\models\admin\menu\CorpAdminGuestBookSubMenuModel;
use includes\custom_post_type\FoodPostType;

class CorpAdminTemplates
{
    private static $instance = null;
    private function __construct() {
        CorpAdminLoader::getInstance();
        add_action('plugins_loaded', array(&$this, 'setDefaultOptions'));


        new FoodPostType();
    }
    public static function getInstance() {

        if ( null == self::$instance ) {
            self::$instance = new self;
        }

        return self::$instance;

    }

    static public function activation()
    {
        // debug.log
        error_log('plugin '.CORPADMINTEMPLATES_PlUGIN_NAME.' activation');
        //таблица гостевой
        CorpAdminGuestBookSubMenuModel::createTable();
    }

    static public function deactivation()
    {
        // debug.log
        error_log('plugin '.CORPADMINTEMPLATES_PlUGIN_NAME.' deactivation');
    }

}

CorpAdminTemplates::getInstance();


/**
 * Created by PhpStorm.
 * User: jesus
 * Date: 01.02.2017
 * Time: 22:03
 */