<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('status') != "admin") {
            redirect(base_url("login"));
        }
    }

    public function index()
    {
		$data = array('content' => 'content');
		$this->load->view('Admin/admin_template', $data);
		
    }

}

/* End of file  Admin.php */
