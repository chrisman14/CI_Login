<?php 

class Login extends CI_Controller{

	function __construct(){
		parent::__construct();		
		$this->load->model('m_login');
  
	}

	function index(){
		if ($this->session->userdata('status') === "admin") {
            redirect(base_url("admin/home"));
		}
		else if ($this->session->userdata('status') === "user") {
            redirect(base_url("user/home"));
        }
		$this->load->view('login_view');
	}

	function aksi_login(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$where = array(
			'username' => $username,
			'password' => md5($password)
			);
		$query = $this->m_login->cek_login("user",$where);
		$data = $query->row();
		$cek = $query->num_rows();
		if($cek > 0){

			$data_session = array(
				'nama' => $data->username,
				'status' => $data->status,
				'nama_lengkap' => $data->nama_lengkap,
				'id' => $data->id,
				);

			$this->session->set_userdata($data_session);
			if ($data->status === "admin") {
				redirect(base_url("admin/home"));
			}
			else  {
				redirect(base_url("user/home"));
			}
			

		}else{
			$data["error"]="Invalid User Id and Password combination";
			$this->load->view('login_view',$data);
			
		}
	}

	function logout(){
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}
}
