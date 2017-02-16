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
        //require_once (CORPADMINTEMPLATES_PlUGIN_TEXTDOMAIN . '/includes/controllers/admin/page/main-admin-menu.php');
        // TODO: Implement render() method.
//        var_dump(wp_remote_get('http://www.youtube.com/embed/M7lc1UVf-VE?enablejsapi=1&origin=http://example.com'));
//        $responce = wp_remote_get('http://www.youtube.com/embed/M7lc1UVf-VE?enablejsapi=1&origin=http://example.com');
//        wp_remote_retrieve_body($responce);
//        $headers = $responce['headers'];
//        echo $headers['content-type'];



        _e("Corp Admin Templates", CORPADMINTEMPLATES_PlUGIN_TEXTDOMAIN);
        echo '<div class="cat-main-menu">';
        echo '<br /><h1 class="cat-main-menu-title">' . get_admin_page_title() . '</h1>';
        echo '<h3>'. _x("This my first plugin",'admin menu page', CORPADMINTEMPLATES_PlUGIN_TEXTDOMAIN). ' '
                    . _x("Check it on",'admin menu page', CORPADMINTEMPLATES_PlUGIN_TEXTDOMAIN). ' '
                    .'<a href="https://github.com/tereshchenkomax/corp-admin-templates" target="_blank">Github</a>.
		</h3>';

        $pathView = CORPADMINTEMPLATES_PlUGIN_DIR."/includes/views/admin/menu/CorpAdminMainAdminMenu.view.php";
        $this->loadView($pathView);

//        echo 'Pinterest Test';
//        $requestAPI = CorpAdminRequestApi::getInstance();
//        $pins = $requestAPI->getPinterest();
//        var_dump($pins['data']);

    }

    public static function newInstance()
    {
        // TODO: Implement newInstance() method.
        $instance = new self;
        return $instance;
    }
}