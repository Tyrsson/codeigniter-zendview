<?php
class Authors extends CI_Controller
{
	public $paginator; 
	
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('Authors_Model', 'authors');
	}
	public function index()
	{
		
		$data['paginator'] = $this->authors->getAuthors();
		
		$this->load->view('index.php', $data);
	}

}