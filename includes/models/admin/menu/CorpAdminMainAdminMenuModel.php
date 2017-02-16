<?php
/**
 * Created by PhpStorm.
 * User: jesus
 * Date: 16.02.2017
 * Time: 21:12
 */

namespace includes\models\admin\menu;
use includes\controllers\admin\menu\CorpAdminCreatorInstance;

class CorpAdminMainAdminMenuModel implements CorpAdminCreatorInstance
{
    public static function newInstance()
    {
        // TODO: Implement newInstance() method.
        $instance = new self;
        return $instance;
    }

    public function __construct(){
        add_action( 'admin_init', array( &$this, 'createOption' ) );
        error_log(1);
    }

    /**
     * Регистрировать опции
     * Добавлять поля опции
     * Добавлять секции опции

     */
    public function createOption()
    {
        error_log(2);
        // register_setting( $option_group, $option_name, $sanitize_callback );
        // Регистрирует новую опцию
        register_setting('CorpAdminSettings', CORPADMINTEMPLATES_PlUGIN_OPTION_NAME, array(&$this, 'saveOption'));
        // add_settings_section( $id, $title, $callback, $page );
        // Добавление секции опций
        add_settings_section(
            'corp_admin_account_section_id',
            __('Account', CORPADMINTEMPLATES_PlUGIN_TEXTDOMAIN),
            _x("This is the 1st options section. Have fun",'admin menu page', CORPADMINTEMPLATES_PlUGIN_TEXTDOMAIN),
            'corp-admin-templates'
        );
        // add_settings_field( $id, $title, $callback, $page, $section, $args );
        // Добавление полей опций
        add_settings_field(
            'corp_admin_token_field_id',
            __('Token', CORPADMINTEMPLATES_PlUGIN_TEXTDOMAIN),
            array(&$this, 'tokenField'),
            'corp-admin-templates',
            'corp_admin_account_section_id'
        );
        add_settings_field(
            'corp_admin_marker_field_id',
            __('Wish to plugin creator', CORPADMINTEMPLATES_PlUGIN_TEXTDOMAIN),
            array(&$this, 'wishField'),
            'corp-admin-templates',
            'corp_admin_account_section_id'
        );

    }

    public function tokenField(){
        $option = get_option(CORPADMINTEMPLATES_PlUGIN_OPTION_NAME);

        ?>
        <input type="text"
               name="<?php echo CORPADMINTEMPLATES_PlUGIN_OPTION_NAME; ?>[account][token]"
               value="<?php echo esc_attr( $option['account']['token'] ) ?>" />
        <?php
    }
    public function wishField(){
        $option = get_option(CORPADMINTEMPLATES_PlUGIN_OPTION_NAME);
//        var_dump($option);
        ?>
        <input type="text"
               name="<?php echo CORPADMINTEMPLATES_PlUGIN_OPTION_NAME; ?>[account][wish]"
               value="<?php echo esc_attr( $option['account']['wish'] ) ?>" />
        <?php
    }
    /**
     * Сохранение опции
     * @param $input
     */
    public function saveOption($input)
    {
        error_log(3);
        error_log(print_r($input, true));
        return $input;
    }
}