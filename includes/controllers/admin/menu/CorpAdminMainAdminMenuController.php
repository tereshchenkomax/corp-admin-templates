<?php
/**
 * Created by PhpStorm.
 * User: solomashenko
 * Date: 27.01.17
 * Time: 15:26
 */

namespace includes\controllers\admin\menu;
use includes\common\CorpAdminRequestApi;
use includes\models\site\CorpAdminSampleShortcodesModel;
use includes\models\admin\menu\CorpAdminMainAdminMenuModel;

class CorpAdminMainAdminMenuController extends CorpAdminAdminMenuController
{
    public $model;
    public function __construct(){
        parent::__construct();
        $this->model = CorpAdminMainAdminMenuModel::newInstance();
    }
    public function action()
    {
        // TODO: Implement action() method.
        /**
         * add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position );
         *
         */
        $pluginPage = add_menu_page(
            _x(
                'Corp Admin Templates',
                'admin menu page' ,
                CORPADMINTEMPLATES_PlUGIN_TEXTDOMAIN
            ),
            _x(
                'Corp Admin Templates',
                'admin menu page' ,
                CORPADMINTEMPLATES_PlUGIN_TEXTDOMAIN
            ),
            'manage_options',
            CORPADMINTEMPLATES_PlUGIN_TEXTDOMAIN,
            array(&$this,'render'),
            CORPADMINTEMPLATES_PlUGIN_URL .'assets/images/main-menu.png',8
        );
    }

    /**
     * Метод отвечающий за контент страницы
     */
    public function render()
    {
        $pathView = CORPADMINTEMPLATES_PlUGIN_DIR."/includes/views/admin/menu/CorpAdminMainAdminMenu.view.php";
        $this->loadView($pathView);
    }

    public static function newInstance()
    {
        // TODO: Implement newInstance() method.
        $instance = new self;
        return $instance;
    }
}