<?php

define("CORPADMINTEMPLATES_PlUGIN_DIR", plugin_dir_path(__FILE__));
define("CORPADMINTEMPLATES_PlUGIN_URL", plugin_dir_url( __FILE__ ));
define("CORPADMINTEMPLATES_PlUGIN_SLUG", preg_replace( '/[^\da-zA-Z]/i', '_',  basename(CORPADMINTEMPLATES_PlUGIN_DIR)));
define("CORPADMINTEMPLATES_PlUGIN_TEXTDOMAIN", str_replace( '_', '-', CORPADMINTEMPLATES_PlUGIN_SLUG ));
define("CORPADMINTEMPLATES_PlUGIN_OPTION_VERSION", CORPADMINTEMPLATES_PlUGIN_SLUG.'_version');
define("CORPADMINTEMPLATES_PlUGIN_OPTION_NAME", CORPADMINTEMPLATES_PlUGIN_SLUG.'_options');
define("CORPADMINTEMPLATES_PlUGIN_AJAX_URL", admin_url('admin-ajax.php'));

if ( ! function_exists( 'get_plugins' ) ) {
    require_once ABSPATH . 'wp-admin/includes/plugin.php';
}
$TPOPlUGINs = get_plugin_data(CORPADMINTEMPLATES_PlUGIN_DIR.'/'.basename(CORPADMINTEMPLATES_PlUGIN_DIR).'.php', false, false);

define("CORPADMINTEMPLATES_PlUGIN_VERSION", $TPOPlUGINs['Version']);
define("CORPADMINTEMPLATES_PlUGIN_NAME", $TPOPlUGINs['Name']);

define("CORPADMINTEMPLATES_PlUGIN_DIR_LOCALIZATION", dirname( plugin_basename(__FILE__) ) . '/languages/');
/**
 * Created by PhpStorm.
 * User: jesus
 * Date: 01.02.2017
 * Time: 21:37
 */