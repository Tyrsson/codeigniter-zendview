<?php
class Admin extends My_Controller
{
    public function index() {
        $data = array();
        $data[] = array('id' => 1, 'parent' => 1, 'title' => 'Home Page', 'url' => 'home');
        $data[] = array('id' => 1, 'parent' => 1, 'title' => 'Submissions', 'url' => 'Submissions');
        $data[] = array('id' => 1, 'parent' => 1, 'title' => 'About Us', 'url' => 'about-us');
        $this->view->podData = $data;
        $this->load->view('index.php');
    }
}
