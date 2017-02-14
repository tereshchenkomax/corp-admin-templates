<?php

/**
 * Created by PhpStorm.
 * User: jesus
 * Date: 11.02.2017
 * Time: 15:12 *
 */
namespace includes\common;
class CorpAdminRequestApi
{
    const CORPADMIN_API = "https://api.pinterest.com/v1/boards/marticz/home-office/pins/?access_token=";
    const CORPADMIN_TOKEN = "AQ6JbH3UlMbdjl-qPXGTCB4vsRItFKNGcD8gRBZDyWe0SoA2CgAAAAA";
    private static $instance = null;

    private function __construct()
    {

    }

    public static function getInstance()
    {
        if (null == self::$instance) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    public function getToken(){
        return "&token=".self::CORPADMIN_TOKEN;
    }

    public function getPinterest()
    {
        $requestURL = self::CORPADMIN_API."AQ6JbH3UlMbdjl-qPXGTCB4vsRItFKNGcD8gRBZDyWe0SoA2CgAAAAA";
//            $this->getToken();
        return $this->requestAPI($requestURL);
    }

    public function requestAPI($requestURL)
    {
        $response = wp_remote_get($requestURL,$args = array() );
        $body = wp_remote_retrieve_body($response);
        return $body;
        $json = json_decode($body);
        if (!is_wp_error($json) && $json->success == true) {
//            return $json->data;
//        } else {
//            return false;
            echo '<ul>';
            foreach( $json['data'] as $pin ) {
                echo '<li><a href="' . $pin['url'] . '">' . $pin['note']. '</a></li>';
            }
            echo '</ul>';
        }

    }
}