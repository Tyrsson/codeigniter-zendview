<?php
/**
 *
 * @author Joey
 * @version
 */
require_once 'Zend/View/Interface.php';

/**
 * Menu helper
 *
 * @uses viewHelper Site_View_Helper
 */
class Site_View_Helper_PodMenu extends Zend_View_Helper_Navigation_Menu
{

    /**
     * CSS class to use for the ul element
     *
     * @var string
     */
    protected $_ulClass = 'podMenu';
    /**
     * View helper entry point:
     * Retrieves helper and optionally sets container to operate on
     *
     * @param  Zend_Navigation_Container $container  [optional] container to
     *                                               operate on
     * @return Zend_View_Helper_Navigation_Menu      fluent interface,
     *                                               returns self
     */
    public function podMenu(Zend_Navigation_Container $container = null)
    {
        if (null !== $container) {
            $this->setContainer($container);
        }

        return $this;
    }

}
