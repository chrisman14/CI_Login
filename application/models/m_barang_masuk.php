<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_barang_masuk extends CI_Model
{

    public function ambil_data($perpage, $offset)
    {

        return $this->db->get('tbl_buku', $perpage, $offset)->result();

    }

}

/* End of file m_barang_masuk.php */
