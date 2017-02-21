<?php


namespace includes\controllers\admin\menu;


use includes\models\admin\menu\CorpAdminGuestBookSubMenuModel;

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
            'corp_admin_control_sub_menu',
            array(&$this, 'render'));
    }

    public function render()
    {
        // TODO: Implement render() method.
        $action = isset($_GET['action']) ? $_GET['action'] : null;
        $data = array();
        $pathView = CORPADMINTEMPLATES_PlUGIN_DIR;
        switch ($action) {
            case "add_data":
                $pathView .= "/includes/views/admin/menu/CorpAdminGuestBookSubMenuAdd.view.php";
                $this->loadView($pathView, 0, $data);
                break;

            case "insert_data":
                if (isset($_POST)) {
                    $id = CorpAdminGuestBookSubMenuModel::insert(array(
                        'user_name' => $_POST['user_name'],
                        'date_add' => time(), // time() стандартная php функция получения времени
                        'message' => $_POST['message']
                    ));
                    $this->redirect("admin.php?page=corp_admin_control_sub_menu");
                }
                break;

            case "edit_data":
                if (isset($_GET['id']) && !empty($_GET['id'])) {
                    $data = CorpAdminGuestBookSubMenuModel::getById((int)$_GET['id']);
                    $pathView .= "/includes/views/admin/menu/CorpAdminGuestBookSubMenuEdit.view.php";
                    $this->loadView($pathView, 0, $data);
                }
                break;

            case "update_data":
                if (isset($_POST)) {
                    CorpAdminGuestBookSubMenuModel::updateById(
                        array(
                            'user_name' => $_POST['user_name'],
                            'date_add' => time(),
                            'message' => $_POST['message']
                        ), $_POST['id']
                    );
                    $this->redirect("admin.php?page=corp_admin_control_sub_menu");
                }
                break;

            case "delete_data":
                if (isset($_GET['id']) && !empty($_GET['id'])) {
                    CorpAdminGuestBookSubMenuModel::deleteById((int)$_GET['id']);
                }
                $this->redirect("admin.php?page=corp_admin_control_sub_menu");
                break;

            default:

                $data = CorpAdminGuestBookSubMenuModel::getAll();
                $pathView .= "/includes/views/admin/menu/CorpAdminGuestBookSubMenu.view.php";
                $this->loadView($pathView, 0, $data);
        }
    }
    public function redirect($page = ''){
        echo '<script type="text/javascript">
                  document.location.href="'.$page.'";
           </script>';
    }
    public static function newInstance()
    {
        // TODO: Implement newInstance() method.
        $instance = new self;
        return $instance;
    }
}