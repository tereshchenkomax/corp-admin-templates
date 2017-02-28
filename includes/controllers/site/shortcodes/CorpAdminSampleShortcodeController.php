<?php
/**
 * Created by PhpStorm.
 * User: jesus
 * Date: 11.02.2017
 * Time: 14:57
 */

namespace includes\controllers\site\shortcodes;

use includes\common\CorpAdminRequestApi;

use includes\controllers\admin\menu\CorpAdminCreatorInstance;
use includes\models\site\CorpAdminSampleShortcodesModel;


class CorpAdminSampleShortcodeController extends CorpAdminShortcodeController implements CorpAdminCreatorInstance
{
    public $model;
    public function __construct() {
        parent::__construct();
        $this->model = \includes\models\site\CorpAdminSampleShortcodesModel::newInstance();
    }

    public function initShortcode()
    {
        // TODO: Implement initShortcode() method.

        add_shortcode( 'show-api-data', array(&$this, 'action'));
    }

    public function action($atts = array(), $content = '', $tag = '')
    {

        $atts = shortcode_atts( array(
            ), $atts, $tag );
        $requestAPI = CorpAdminRequestApi::getInstance();
        $data = $requestAPI->getPinterest();
//        $data = $this->model->getYouTube();
        if ($data == false) return false;
        return $this->render($data).'Shortcode here';

    }

    public function render($data)
    {
        // TODO: Implement render() method.
        var_dump('<pre>', $data, '</pre>');
    }

    public static function newInstance()
    {
        // TODO: Implement newInstance() method.
        $instance = new self;
        return $instance;
    }
}
