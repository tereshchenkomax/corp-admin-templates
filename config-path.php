<?php
define("CORPADMINAUTOLOAD_PlUGIN_DIR", plugin_dir_path(__FILE__));
define("CORPADMINAUTOLOAD_PlUGIN_URL", plugin_dir_url( __FILE__ ));
define("CORPADMINAUTOLOAD_PlUGIN_SLUG", preg_replace( '/[^\da-zA-Z]/i', '_',  basename(CORPADMINAUTOLOAD_PlUGIN_DIR)));
define("CORPADMINAUTOLOAD_PlUGIN_TEXTDOMAIN", str_replace( '_', '-', CORPADMINAUTOLOAD_PlUGIN_SLUG ));
define("CORPADMINAUTOLOAD_PlUGIN_OPTION_VERSION", CORPADMINAUTOLOAD_PlUGIN_SLUG.'_version');
define("CORPADMINAUTOLOAD_PlUGIN_OPTION_NAME", CORPADMINAUTOLOAD_PlUGIN_SLUG.'_options');
define("CORPADMINAUTOLOAD_PlUGIN_AJAX_URL", admin_url('admin-ajax.php'));
/**
 * Created by PhpStorm.
 * User: jesus
 * Date: 01.02.2017
 * Time: 21:37
 */