<?php
/**
 *
 * @author Joey
 *
 */
class LoadZend {

    public function AutoLoad() {
        ini_set('include_path',
        ini_get('include_path') . PATH_SEPARATOR . APPPATH . 'libraries');

        require_once 'Zend/Loader/Autoloader.php';
        $autoloader = Zend_Loader_Autoloader::getInstance();
        $autoloader->registerNamespace('Site_');
        //log_message('debug', "Zend Class Initialized");
    }
}
