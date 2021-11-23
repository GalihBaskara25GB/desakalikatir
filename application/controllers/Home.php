<?php

class Home extends CI_Controller
{
    public function index()
    {
        $data['judul'] = 'Dashboard';
        $data['halaman'] = "Dashboard";
        $data['ikon'] = 'fas fa-fw fa-tachometer-alt';
        $data['akun'] = $this->db->get_where('tb_akun', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view("templates/header", $data);
        $this->load->view("templates/sidebar", $data);
        $this->load->view("templates/topbar", $data);
        $this->load->view("home/index", $data);
        $this->load->view("templates/footer");
    }
}
