<?php
/**
 * Created by PhpStorm.
 * User: jesus
 * Date: 05.02.2017
 * Time: 12:56
 */

namespace includes\common;

use includes\ajax\CorpAdminAjaxHandler;
use includes\controllers\admin\menu\CorpAdminAdminMenuController;
use includes\controllers\admin\menu\CorpAdminMainAdminMenuController;
use includes\controllers\admin\menu\CorpAdminMainAdminSubMenuController;
use includes\controllers\admin\menu\CorpAdminMyPluginsMenuController;
use includes\controllers\site\shortcodes\CorpAdminSampleShortcodeController;
use includes\controllers\site\shortcodes\CorpAdminShortcodeController;
use includes\controllers\site\shortcodes\CorpAdminGuestBookShortcodeController;
use includes\example\CorpAdminAction;
use includes\example\CorpAdminFilter;
use includes\widgets\CorpAdminGuestBookDashboardWidget;

class CorpAdminLoader
{
    private static $instance = null;

    private function __construct(){

        if ( is_admin() ) {
            $this->admin();
        } else {
            $this->site();
        }
        $this->all();


    }

    public static function getInstance(){
        if ( null == self::$instance ) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    public function admin(){

        CorpAdminMainAdminMenuController::newInstance();
        CorpAdminMainAdminSubMenuController::newInstance();
        CorpAdminMyPluginsMenuController::newInstance();
        CorpAdminGuestBookDashboardWidget::newInstance();

    }

    public function site(){
        CorpAdminSampleShortcodeController::newInstance();
        CorpAdminGuestBookShortcodeController::newInstance();

    }

    public function all(){
        CorpAdminLocalization::getInstance();
        CorpAdminAjaxHandler::newInstance();

        $CorpAdminAction = CorpAdminAction::newInstance();
       /*$stepByStepExampleFilter = StepByStepExampleFilter::newInstance();
       $stepByStepExampleFilter->callMyFilter("Roman");
       $stepByStepExampleFilter->callMyFilterAdditionalParameter("Roman", "Softgroup", "Poltava");
       $stepByStepExampleAction = StepByStepExampleAction::newInstance();
       $stepByStepExampleAction->callMyAction();
       $stepByStepExampleAction->callMyActionAdditionalParameter( 'test1', 'test2', 'test3' );*/
    }
}