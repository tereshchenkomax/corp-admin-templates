<?php
namespace includes\example;
/**
 * Created by PhpStorm.
 * User: jesus
 * Date: 05.02.2017
 * Time: 13:22
 */
class CorpAdminAction
{
    public function __construct() {
        //Прикрепим функцию к событию 'my_action'
        add_action('my_action', array(&$this, 'myActionFunction'));
        // Прикрепим функцию к событию 'my_hook'
        add_action('my_action', array(&$this, 'myActionFunctionAdditionalParameter'), 10, 3);
//        add_action('admin_init','add_custom_admin_theme');
        add_action('plugins_loaded', function(){ error_log(__('Hello', CORPADMINTEMPLATES_PlUGIN_TEXTDOMAIN)); }, 100);
        do_action('my_hook');
    }
//    public function add_custom_admin_theme(){
//        wp_admin_css_color(
//            'corp-admin-css',__('Admin Color Scheme'),
//            admin_url("css/corp-admin-css.css"),
//            array( '#103154', '#ffffff', '#be8643', '#f1dd7d' )
//        );
//    }
    public static function newInstance(){
        $instance = new self;
        return $instance;
    }

    /**
     * Функция события my_action
     */
    public function myActionFunction(){
        //Выводим сообщение в debug.log
        error_log("my_action call");
    }

    public function callMyAction(){
        // Вызов самого события.
        do_action('my_action');
    }

    /**
     * Функция события my_action
     */
    public function myActionFunctionAdditionalParameter($data1 = "", $data2 = "", $data3 = "" ){
        //Выводим сообщение в debug.log
        error_log("my_action call {$data1} {$data2} {$data3}");
    }

    public function callMyActionAdditionalParameter( $data1, $data2, $data3 ){
        // Вызов самого события.
        do_action('my_action', $data1, $data2, $data3 );
    }
}
