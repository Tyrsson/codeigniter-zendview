<?php
class Admin extends My_Controller
{
    public function index() {
        $this->view->testVar = 'Testing Scope';
        $this->load->view('index.php');
    }
}
