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

    public function getData($currency, $origin, $destination, $month = ""){
        $cacheKey = "";
        $data = array();
        $cacheKey = $this->getYouTube();
        if ( false === ($data = get_transient($cacheKey))) {
            $reqestAPI = CorpAdminRequestApi::getInstance();
            $data = $reqestAPI->requestAPI();
            set_transient($cacheKey, $data, 100);
        }

        return $data;
    }

    public function getYouTube(){
        return "http://www.youtube.com/embed/M7lc1UVf-VE?enablejsapi=1&origin=http://example.com";
    }

    public static function newInstance()
    {
        // TODO: Implement newInstance() method.
        $instance = new self;
        return $instance;
    }
}