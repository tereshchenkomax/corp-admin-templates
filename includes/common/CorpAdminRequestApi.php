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
    const CORPADMIN_API = "http://www.youtube.com/embed/M7lc1UVf-VE?enablejsapi=1&origin=http://example.com";
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

    public function getPinterest($requestURL)
    {
        $requestURL = self::CORPADMIN_API;
        return $this->requestAPI($requestURL);
    }

    public function requestAPI($requestURL)
    {
        $response = wp_remote_get($requestURL,$args = array() );
        $body = wp_remote_retrieve_body($response);
        return $body;
//        $json = json_decode($body);
//        if (!is_wp_error($json) && $json->success == true) {
//            return $json->data;
//        } else {
//            return false;
//        }

    }
}