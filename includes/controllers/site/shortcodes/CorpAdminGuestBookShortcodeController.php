<?php
/**
 * Created by PhpStorm.
 * User: jesus
 * Date: 25.02.2017
 * Time: 23:17
 */

namespace includes\controllers\site\shortcodes;

use includes\controllers\admin\menu\CorpAdminCreatorInstance;

class CorpAdminGuestBookShortcodeController extends CorpAdminSampleShortcodeController
implements CorpAdminCreatorInstance
{
    public function initShortcode()
    {
        add_shortcode( 'corp_admin_guest_book', array(&$this, 'action'));
    }


    public function action($atts = array(), $content = '', $tag = '')
    {
        return $this->render(array());
    }

    public function render($data)
    {
        $output = '';
        $output .= '<form  method="post">
                        <label>'.__('User name', CORPADMINTEMPLATES_PlUGIN_TEXTDOMAIN ).'</label>
                        <input type="text" name="corp_user_name" class="corp-user-name">
                        <label>'.__('Message', CORPADMINTEMPLATES_PlUGIN_TEXTDOMAIN ).'</label>
                        <textarea name="corp_message" class="corp-message"></textarea>
                        <button class="corp-admin-btn-add" >'.__('Add', CORPADMINTEMPLATES_PlUGIN_TEXTDOMAIN ).'</button>                   
                    </form>';
        return $output;
    }

    public static function newInstance()
    {
        // TODO: Implement newInstance() method.
        $instance = new self;
        return $instance;
    }
}