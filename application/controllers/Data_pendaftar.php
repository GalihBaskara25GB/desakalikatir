<?php
class Data_pendaftar extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Vaksin_model');
        $this->load->library('form_validation');
    }
    public function index()
    {
        $data['judul'] = 'Data Pendaftar Vaksin';
        $data['vaksin'] = $this->Vaksin_model->getalldata();
        $data['akun'] = $this->db->get_where('tb_akun', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view("templates/sidebar", $data);
        $this->load->view("templates/topbar", $data);
        $this->load->view('data_pendaftar/index', $data);
        $this->load->view('templates/footer');
    }
    public function tambah()
    {
        $data['judul'] = 'Tambah Data Pendaftar Vaksin';
        $data['akun'] = $this->db->get_where('tb_akun', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim', ['required' => 'Nama harus di isi!']);
        $this->form_validation->set_rules('nik', 'NIK', 'required|trim', ['required' => 'NIK harus di isi!']);
        $this->form_validation->set_rules('lahir', 'Tempat_Lahir', 'required|trim', ['required' => 'Tempat Lahir harus di isi!']);
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal_Lahir', 'required|trim', ['required' => 'Tanggal Lahir harus di isi!']);
        $this->form_validation->set_rules('usia', 'Usia', 'required|trim', ['required' => 'Usia harus di isi!']);
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim', ['required' => 'Alamat harus di isi!']);
        $this->form_validation->set_rules('jk', 'Jenis', 'required|trim', ['required' => 'Jenis Kelamin harus di isi!']);
        $this->form_validation->set_rules('status', 'Status', 'required|trim', ['required' => 'Status harus di isi!']);
        $this->form_validation->set_rules(
            'email',
            'Email',
            'required|trim|valid_email|is_unique[tb_vaksin.email]',
            [
                'required' => 'Email harus di isi!',
                'is_unique' => 'Email telah terdaftar',
                'valid_email' => 'Email tidak valid'
            ]
        );
        $this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'required|trim', ['required' => 'Pekerjaan harus di isi!']);
        $this->form_validation->set_rules('vaksin', 'Vaksin', 'required|trim', ['required' => 'Harus di isi!']);
        $this->form_validation->set_rules('terpapar', 'Terpapar', 'required|trim', ['required' => 'Harus di isi!']);
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim', ['required' => 'nama harus di isi!']);
        $this->form_validation->set_rules('no_tlp', 'Telepon', 'required|trim', ['required' => 'No. Telepon harus di isi!']);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view("templates/sidebar", $data);
            $this->load->view("templates/topbar", $data);
            $this->load->view('data_pendaftar/tambah_data', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Vaksin_model->tambahdata();
            redirect('data_pendaftar');
        }
    }
    public function hapus($id_vaksin)
    {
        $this->db->where('id_vaksin', $id_vaksin);
        $this->db->delete('tb_vaksin');
        redirect('data_pendaftar');
    }
    public function ubah($id_vaksin)
    {
        $data['judul'] = 'Update Data Pendaftar Vaksin';
        $data['akun'] = $this->db->get_where('tb_akun', ['email' => $this->session->userdata('email')])->row_array();
        $data['vaksin'] = $this->Vaksin_model->getvaksinbyid($id_vaksin);
        $data['penyakit'] = ['tidak ada', 'diabetes', 'sesak nafas'];

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim', ['required' => 'Nama harus di isi!']);
        $this->form_validation->set_rules('nik', 'NIK', 'required|trim', ['required' => 'NIK harus di isi!']);
        $this->form_validation->set_rules('lahir', 'Tempat_Lahir', 'required|trim', ['required' => 'Tempat Lahir harus di isi!']);
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal_Lahir', 'required|trim', ['required' => 'Tanggal Lahir harus di isi!']);
        $this->form_validation->set_rules('usia', 'Usia', 'required|trim', ['required' => 'Usia harus di isi!']);
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim', ['required' => 'Alamat harus di isi!']);
        $this->form_validation->set_rules('jk', 'Jenis', 'required|trim', ['required' => 'Jenis Kelamin harus di isi!']);
        $this->form_validation->set_rules('status', 'Status', 'required|trim', ['required' => 'Status harus di isi!']);
        $this->form_validation->set_rules(
            'email',
            'Email',
            'required|trim|valid_email',
            [
                'required' => 'Email harus di isi!',
                'valid_email' => 'Email tidak valid'
            ]
        );
        $this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'required|trim', ['required' => 'Pekerjaan harus di isi!']);
        $this->form_validation->set_rules('vaksin', 'Vaksin', 'required|trim', ['required' => 'Harus di isi!']);
        $this->form_validation->set_rules('terpapar', 'Terpapar', 'required|trim', ['required' => 'Harus di isi!']);
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim', ['required' => 'nama harus di isi!']);
        $this->form_validation->set_rules('no_tlp', 'Telepon', 'required|trim', ['required' => 'No. Telepon harus di isi!']);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view("templates/sidebar", $data);
            $this->load->view("templates/topbar", $data);
            $this->load->view('data_pendaftar/ubah_data', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Vaksin_model->updatedata();
            redirect('data_pendaftar');
        }
    }
}
