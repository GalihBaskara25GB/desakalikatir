<?php
class Akun extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Akun_model');
    }
    public function index()
    {
        $data['judul'] = 'Data Akun';
        $data['tabelakun'] = $this->Akun_model->getallakun();
        $data['akun'] = $this->db->get_where('tb_akun', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view("templates/sidebar", $data);
        $this->load->view("templates/topbar", $data);
        $this->load->view('akun/index', $data);
        $this->load->view('templates/footer');
    }
}
