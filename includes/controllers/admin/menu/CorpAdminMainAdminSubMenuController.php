<?php
/**
 * Created by PhpStorm.
 * User: solomashenko
 * Date: 27.01.17
 * Time: 16:25
 */

namespace includes\controllers\admin\menu;


class CorpAdminMainAdminSubMenuController extends CorpAdminAdminMenuController
{

    public function action()
    {
        // TODO: Implement action() method.
        $pluginPage = add_submenu_page(
            CORPADMINTEMPLATES_PlUGIN_TEXTDOMAIN,
            _x(
                'Sub Corp Admin Templates',
                'admin sub menu page' ,
                CORPADMINTEMPLATES_PlUGIN_TEXTDOMAIN
            ),
            _x(
                'Sub Corp Admin Templates',
                'admin sub menu page' ,
                CORPADMINTEMPLATES_PlUGIN_TEXTDOMAIN
            ),
            'manage_options',
            'step_by_step_control_sub_menu',
            array(&$this, 'render'));
    }

    public function render()
    {
        // TODO: Implement render() method.
        _e("Sub Corp Admin Templates", SCORPADMINTEMPLATES_PlUGIN_TEXTDOMAIN);
        echo '<br /><h1 class="cat-sub-main-menu-title">' . get_admin_page_title() . '</h1>';
    }

    public static function newInstance()
    {
        // TODO: Implement newInstance() method.
        $instance = new self;
        return $instance;
    }
}