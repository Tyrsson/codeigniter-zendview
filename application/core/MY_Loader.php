<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

/* load the MX_Loader class */
require APPPATH."third_party/MX/Loader.php";

class MY_Loader extends MX_Loader {

    public $view;
    public $layout;

    /** Initialize the loader variables **/
    public function initialize($controller = NULL) {

        /* set the module name */
        $this->_module = CI::$APP->router->fetch_module();

        if (is_a($controller, 'MX_Controller')) {

            /* reference to the module controller */
            $this->controller = $controller;

            $view = new Zend_View();
            $view->getPluginLoader('helper');
            $view->addHelperPath('Zend/View/Helper/', 'Zend_View_Helper');
            $view->addHelperPath('Site/View/Helper', 'Site_View_Helper');
            $view->addScriptPath(realpath('./' .APPPATH . 'views'));

            $layout = new Zend_Layout();
            // this needs replaced with config values
            $layout->setLayoutPath(APPPATH . 'layouts');
            $layout->setLayout('layout');
            $layout->setView($view);
            $this->setLayout($layout);

            if(method_exists($this->controller, 'setView')) {
                $this->controller->setView($view);
            }
            if(method_exists($this->controller, 'setLayout')) {
                $this->controller->setLayout($layout);
            }
            $this->setView($view);
            /* references to ci loader variables */
            foreach (get_class_vars('CI_Loader') as $var => $val) {
                if ($var != '_ci_ob_level') {
                    $this->$var =& CI::$APP->load->$var;
                }
            }

        } else {
            parent::initialize();

            /* autoload module items */
            $this->_autoloader(array());
        }

        /* add this module path to the loader variables */
        $this->_add_module_paths($this->_module);
    }
    public function setView($view) {
        $this->view = $view;
    }
    public function setLayout($layout) {
        $this->layout = $layout;
    }

    /** Load a module view **/
    public function view($view, $vars = array(), $return = FALSE) {

        list($path, $_view) = Modules::find($view, $this->_module, 'views/');

        $this->view->addScriptPath(realpath('./' . APPPATH . 'modules/' . $this->_module . '/views'));

        if ($path != FALSE) {
            $this->_ci_view_paths = array($path => TRUE) + $this->_ci_view_paths;
            $view = $_view;
        }

        $this->view->assign($vars);
        $this->layout->setContentKey('content');
        $this->layout->content = $this->view->render($view);
        echo $this->layout->render();

        // this is the original code below
        //return $this->_ci_load(array('_ci_view' => $view, '_ci_vars' => $this->_ci_object_to_array($vars), '_ci_return' => $return));
    }
}