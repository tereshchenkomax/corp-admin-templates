<?php
/**
 * Created by PhpStorm.
 * User: jesus
 * Date: 11.02.2017
 * Time: 21:57
 */

namespace includes\models\site;

use includes\common\CorpAdminRequestApi;
use includes\controllers\admin\menu\CorpAdminCreatorInstance;
class CorpAdminSampleShortcodesModel implements CorpAdminCreatorInstance
{
    public function __construct() {

    }

    public function getData(){
        $cacheKey = "";
        $data = array();
        $cacheKey = $this->getPinterest();
        if ( false === ($data = get_transient($cacheKey))) {
            $requestAPI = CorpAdminRequestApi::getInstance();
            $data = $requestAPI->getPinterest();
            set_transient($cacheKey, $data, 100);
        }

        return $data;
    }

    public function getPinterest(){
        return "https://api.pinterest.com/v1/boards/marticz/home-office/pins/?access_token=AQ6JbH3UlMbdjl-qPXGTCB4vsRItFKNGcD8gRBZDyWe0SoA2CgAAAAA";
    }

    public static function newInstance()
    {
        // TODO: Implement newInstance() method.
        $instance = new self;
        return $instance;
    }
}