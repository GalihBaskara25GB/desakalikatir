<?php
class Smt_kriteria extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Smt_kriteria_model');
        $this->load->library('form_validation');
    }
    public function index()
    {
        $data['judul'] = 'Bobot Kriteria';
        $data['smt_kriteria'] = $this->Smt_kriteria_model->getalldata();
        $data['akun'] = $this->db->get_where('tb_akun', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view("templates/sidebar", $data);
        $this->load->view("templates/topbar", $data);
        $this->load->view('smt_kriteria/index', $data);
        $this->load->view('templates/footer');
    }
    public function tambah()
    {
        $data['judul'] = 'Tambah Bobot Kriteria';
        $data['akun'] = $this->db->get_where('tb_akun', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('kriteria', 'Kriteria', 'required|trim', ['required' => 'Kriteria harus di isi!']);
        $this->form_validation->set_rules('bobot', 'Bobot', 'required|trim', ['required' => 'Bobot harus di isi!']);
        
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view("templates/sidebar", $data);
            $this->load->view("templates/topbar", $data);
            $this->load->view('smt_kriteria/tambah_data', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Smt_kriteria_model->tambahdata();
            redirect('smt_kriteria');
        }
    }
    public function hapus($id_kriteria)
    {
        $this->db->where('id_kriteria', $id_kriteria);
        $this->db->delete('smt_kriteria');
        redirect('smt_kriteria');
    }
    public function ubah($id_kriteria)
    {
        $data['judul'] = 'Update Bobot Kriteria';
        $data['akun'] = $this->db->get_where('tb_akun', ['email' => $this->session->userdata('email')])->row_array();
        $data['kriteria'] = $this->Smt_kriteria_model->getkriteriabyid($id_kriteria);
        $data['penyakit'] = ['tidak ada', 'diabetes', 'sesak nafas'];

        $this->form_validation->set_rules('kriteria', 'Kriteria', 'required|trim', ['required' => 'Kriteria harus di isi!']);
        $this->form_validation->set_rules('bobot', 'Bobot', 'required|trim', ['required' => 'Bobot harus di isi!']);
        
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view("templates/sidebar", $data);
            $this->load->view("templates/topbar", $data);
            $this->load->view('smt_kriteria/ubah_data', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Smt_kriteria_model->updatedata();
            redirect('smt_kriteria');
        }
    }
    public function update()
    {
        $request = $this->input->post('kriteria');
        foreach ($request as $r) {
            $this->Smt_kriteria_model->updateKriteria($r['id_kriteria'], array('kriteria' => $r['kriteria'], 
                                                                            'bobot' => $r['bobot'])
                                                                        );
        }
        redirect('smt_kriteria');
    }
}
