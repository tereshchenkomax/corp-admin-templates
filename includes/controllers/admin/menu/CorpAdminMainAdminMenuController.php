<?php
/**
 * Created by PhpStorm.
 * User: solomashenko
 * Date: 27.01.17
 * Time: 15:26
 */

namespace includes\controllers\admin\menu;


class CorpAdminMainAdminMenuController extends CorpAdminAdminMenuController
{

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
        _e("Corp Admin Templates", CORPADMINTEMPLATES_PlUGIN_TEXTDOMAIN);

        echo '<br /><h1 class="cat-main-menu-title">' . get_admin_page_title() . '</h1>';

    }

    public static function newInstance()
    {
        // TODO: Implement newInstance() method.
        $instance = new self;
        return $instance;
    }
}