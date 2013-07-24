<?php
class My_Controller Extends MX_Controller
{
    public $view;
    public $layout;

    public function getView ()
    {
        return $this->view;
    }

	/**
     * @param field_type $view
     */
    public function setView ($view)
    {
        $this->view = $view;
    }
	/**
     * @return the $layout
     */
    public function getLayout ()
    {
        return $this->layout;
    }

	/**
     * @param field_type $layout
     */
    public function setLayout ($layout)
    {
        $this->layout = $layout;
    }

}