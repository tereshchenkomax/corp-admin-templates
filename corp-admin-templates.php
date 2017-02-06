<?php
/*
 Plugin Name:  Corp Admin Templates
 Description: Corp Admin Templates
 Version: 1.0.0
 Author: Tereshchenko Max
 Author URI: https://github.com/tereshchenkomax
 Plugin URI: https://github.com/tereshchenkomax/corp-admin-templates
 Text Domain: corp-admin-templates
 Domain Path: /languages/

  Copyright 2017  Tereshchenko Max  (email: tereshchenkomax@gmail.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/
require_once plugin_dir_path(__FILE__) . '/config-path.php';
require_once CORPADMINTEMPLATES_PlUGIN_DIR.'/includes/common/CorpAdminAutoload.php';
require_once CORPADMINTEMPLATES_PlUGIN_DIR.'/includes/CorpAdminTemplates.php';


register_activation_hook( __FILE__, array('includes\CorpAdminTemplates' ,  'activation' ) );
register_deactivation_hook( __FILE__, array('includes\CorpAdminTemplates' ,  'deactivation' ) );



//add_action('plugins_loaded', function(){ error_log(__('Hello', CORPADMINTEMPLATES_PlUGIN_TEXTDOMAIN)); }, 100);


