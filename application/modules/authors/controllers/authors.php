<?php
class Authors extends CI_Controller
{
	public $paginator; 
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('authors', '_model');
   		$this->view->page = $this->_model->index();
	}
	public function index()
	{
		
		$this->paginator = $this->author->getAuthors();
		//Zend_Debug::dump($this->paginator);
		$this->load->view('index.php');
	}

}