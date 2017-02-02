<?php
define("STEPBYSTEP_PlUGIN_DIR", plugin_dir_path(__FILE__));
define("STEPBYSTEP_PlUGIN_URL", plugin_dir_url( __FILE__ ));
define("STEPBYSTEP_PlUGIN_SLUG", preg_replace( '/[^\da-zA-Z]/i', '_',  basename(STEPBYSTEP_PlUGIN_DIR)));
define("STEPBYSTEP_PlUGIN_TEXTDOMAIN", str_replace( '_', '-', STEPBYSTEP_PlUGIN_SLUG ));
define("STEPBYSTEP_PlUGIN_OPTION_VERSION", STEPBYSTEP_PlUGIN_SLUG.'_version');
define("STEPBYSTEP_PlUGIN_OPTION_NAME", STEPBYSTEP_PlUGIN_SLUG.'_options');
define("STEPBYSTEP_PlUGIN_AJAX_URL", admin_url('admin-ajax.php'));
/**
 * Created by PhpStorm.
 * User: jesus
 * Date: 01.02.2017
 * Time: 21:37
 */