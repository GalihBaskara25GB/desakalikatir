<?php

class Daftar_user extends CI_Controller
{
    public function index()
    {
        $data['judul'] = 'Pendaftaran Vaksin';
        $data['akun'] = $this->db->get_where('tb_akun', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view("templates/header", $data);
        $this->load->view("templates/sidebar", $data);
        $this->load->view("templates/topbar", $data);
        $this->load->view("Pendaftaran/index", $data);
        $this->load->view("templates/footer");
    }
}
