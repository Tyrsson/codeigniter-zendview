<?php
/**
 *
 * @author Joey
 * @version
 */
require_once 'Zend/View/Interface.php';

/**
 * PodContainer helper
 *
 * @uses viewHelper Site_View_Helper
 */
class Site_View_Helper_Pod
{
/**
     *
     * @var Zend_View_Interface
     */
    public $view;

    public $wrapperTag = 'div';
    public $podAttribs;
    public $decorator;
    public $container;
    public $pages = array();
    public $heading;
    /*
     * @param $podAttribs the html attributes that will be used to create the pad markup
     *          must have at least a tag key $podAttribs['tag']
     *
     */
    public function pod (array $data, array $podAttribs, array $listAttribs = null, $alternateLiClass = true, array $headingAttribs = array('tag' => 'h2', 'podHeading' => ''))
    {
        if(!isset($podAttribs['tag']) || empty($podAttribs['tag']) || $podAttribs['tag'] == null) {
            $podAttribs['tag'] = $this->getWrapperTag();
        }
        $this->setPodAttribs($podAttribs);
        $this->getDecorator();

        $ulClass = (isset($listAttribs['ulClass']) ? $listAttribs['ulClass'] : '');

        $this->buildPages($data);
        $this->getContainer();
        $this->container->addPages($this->getPages());

        if(!empty($headingAttribs['podHeading'])) {
            $headingText = $headingAttribs['podHeading'];
            unset($headingAttribs['podHeading']);
            $heading = new Zend_Form_Decorator_HtmlTag($headingAttribs);
            return $this->decorator->render( $heading->render($headingAttribs['podHeading']) . $this->view->podMenu($this->container)->setUlClass($ulClass));
        }

        return $this->decorator->render($this->view->podMenu($this->container)->setUlClass($ulClass));
    }
    protected function buildPages($data , $alternateLiClass = true) {
        $class = '';
        $index = count($data);
        for ($i = 0; $i < $index; $i++) {

            if(isset($data[$i]['class']) && !empty($data[$i]['class'])) {
                $class .= $data[$i]['class'] . ' ';
            }
            if($alternateLiClass) {
                $altClass = $i % 2 == 0 ? 'odd' : 'even';
            }
            $this->setPage(
                            Zend_Navigation_Page::factory(array(
                                                                'label' => ucfirst($data[$i]['title']),
                                                                'id'    => $data[$i]['url'],
                                                                'uri'   => '/'.$data[$i]['url'],
                                                                'class' => $class . $altClass,
                                                                'order' => (isset($data[$i]['order'])) ? $data[$i]['order'] : $i,
                                                            )
                            )
            );
            unset($altClass);
        }
    }
    public function setPage($page) {
        $this->pages[] = $page;
    }
    /**
     * @return the $pages
     */
    public function getPages ()
    {
        return $this->pages;
    }
	/**
     * @param field_type $pages
     */
    public function setPages ($pages)
    {
        $this->pages = $pages;
    }

	public function getContainer() {
        if(!isset($this->container) || !$this->container instanceof Zend_Navigation_Container) {
            $this->setContainer(new Zend_Navigation());
        }
        return $this->container;
    }
    public function setContainer(Zend_Navigation_Container $container) {
        $this->container = $container;
    }

	/**
     * @return the $decorator
     */
    public function getDecorator ()
    {
        if(!$this->decorator instanceof Zend_Form_Decorator_Interface) {
            $this->setDecorator(new Zend_Form_Decorator_HtmlTag($this->getPodAttribs()));
        }
        return $this->decorator;
    }

	/**
     * @param Zend_Form_Decorator_Interface $decorator
     */
    public function setDecorator (Zend_Form_Decorator_Interface $decorator)
    {
        $this->decorator = $decorator;
    }

	/**
     * @return the $podAttribs
     */
    public function getPodAttribs ()
    {
        return $this->podAttribs;
    }

	/**
     * @param field_type $podAttribs
     */
    public function setPodAttribs ($podAttribs)
    {
        $this->podAttribs = $podAttribs;
    }

	/**
     * @return the $wrapperTag
     */
    public function getWrapperTag ()
    {
        return $this->wrapperTag;
    }

	/**
     * @param string $wrapperTag
     */
    public function setWrapperTag ($wrapperTag)
    {
        $this->wrapperTag = $wrapperTag;
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
