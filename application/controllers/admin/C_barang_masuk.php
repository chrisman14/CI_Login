<?php

defined('BASEPATH') or exit('No direct script access allowed');

class C_barang_masuk extends CI_Controller
{
     function __construct()
    {
        parent::__construct();

        $this->load->helper('url');
        $this->load->model('M_barang_masuk');

    }

    function index($offset=0)
    {
		
		$data_buku=$this->db->get('tbl_buku');
		$config['total_rows']=$data_buku->num_rows();
		$config['base_url']=base_url().'admin/c_barang_masuk/index';
		$config['per_page']=10;

		//config boostrap
		$config['full_tag_open']="<ul class='pagination pagination-sm' style='position:relative;top:-25px'>";
		$config['full_tag_close']="</ul>";
		$config['num_tag_open']="<li>";
		$config['num_tag_close']="</li>";
		$config['cur_tag_open']="<li class='disable'><li class='active'><a href='#'>";
		$config['cur_tag_close']="<span class='sr-only'></span></a></li>";
		$config['next_tag_open']="<li>";
		$config['next_tag_close']="</li>";
		$config['prev_tag_open']="<li>";
		$config['prev_tag_close']="</li>";
		$config['first_tag_open']="<li>";
		$config['first_tag_close']="</li>";
		$config['last_tag_open']="<li>";
		$config['last_tag_close']="</li>";
		
		$this->pagination->initialize($config);
		
		$data['halaman']=$this->pagination->create_links();

		$data['offset']=$offset;
		$data['data']=$this->M_barang_masuk->ambil_data($config['per_page'], $offset);
		
		$this->load->view('admin/v_barang_masuk', $data);
		
		
		
	}
}

/* End of file  Barang_masuk.php */
