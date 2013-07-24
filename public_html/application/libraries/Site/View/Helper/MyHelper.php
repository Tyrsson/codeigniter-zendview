<?php
/**
 *
 * @author Joey
 * @version
 */
require_once 'Zend/View/Interface.php';

/**
 * MyHelper helper
 *
 * @uses viewHelper Site_View_Helper
 */
class Site_View_Helper_MyHelper
{

    /**
     *
     * @var Zend_View_Interface
     */
    public $view;

    public $html = '';
    /**
     */
    public function myHelper ($content = '')
    {
        $this->html .= '<div class="pods">'.$content.'</div>';
        return $this->html;
    }

    /**
     * Sets the view field
     *
     * @param $view Zend_View_Interface
     */
    public function setView (Zend_View_Interface $view)
    {
        $this->view = $view;
    }
}
