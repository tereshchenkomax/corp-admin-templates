<?php
/**
 * Created by PhpStorm.
 * User: solomashenko
 * Date: 29.01.17
 * Time: 19:28
 */

namespace includes\controllers\admin\menu;


class CorpAdminMyPluginsMenuController extends CorpAdminAdminMenuController
{
    public function action()
    {
        // TODO: Implement action() method.

        $pluginPage = add_plugins_page(
            __('Sub plugins Corp Admin Templates', CORPADMINTEMPLATES_PlUGIN_TEXTDOMAIN),
            __('Sub plugins Corp Admin Templates', CORPADMINTEMPLATES_PlUGIN_TEXTDOMAIN),
            'read',
            'step_by_step_control_sub_plugins_menu',
            array(&$this, 'render')
        );
    }

    public function render()
    {
        // TODO: Implement render() method.
        _e("Hello this is CORPADMINTEMPLATES page Plugins ", CORPADMINTEMPLATES_PlUGIN_TEXTDOMAIN);

    }

    public static function newInstance()
    {
        // TODO: Implement newInstance() method.
        $instance = new self;
        return $instance;
    }
}