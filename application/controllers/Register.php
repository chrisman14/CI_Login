<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Register extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->model('m_register');
    }

    public function index()
    {
        $this->load->view('register_view');

    }
    public function register()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $fullname = $this->input->post('password');
        $config['upload_path'] = './user_image/';
        $config['allowed_types'] = 'gif|jpg|png';
		$config['file_name'] = $username;
		$config['file_type'] = 'png';
		$config['overwrite'] = true;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('berkas')) {
            $error = array('error' => $this->upload->display_errors());
            // $this->load->view('v_upload', $error);
            var_dump($error);
        } else {
            $data = array('upload_data' => $this->upload->data());
            if ($data) {
                $object = array(
                    'username' => $username,
                    'password' => md5($password),
                    'status' => 'user',
                    'nama_lengkap' => $fullname,
                );
                $query = $this->m_register->register_user("user", $object);
               if($query){
				   echo "Akun Anda telah berhasil di create silahkan  <a href=".base_url()."/login>login</a>";
			   }
            }
        }
    }

}

/* End of file  Register.php */
