<?php
class Vaksin_model extends CI_Model
{
    public function getalldata()
    {
        return $this->db->get('tb_vaksin')->result_array();
    }
    public function tambahdata()
    {
        $data = [
            'nama' => htmlspecialchars($this->input->post('nama', true)),
            'email' => htmlspecialchars($this->input->post('email', true)),
            'alamat' => htmlspecialchars($this->input->post('alamat', true)),
            'no_tlp' => htmlspecialchars($this->input->post('no_tlp', true)),
            'nik' => htmlspecialchars($this->input->post('nik', true)),
            'jk' => htmlspecialchars($this->input->post('jk', true)),
            'status' => htmlspecialchars($this->input->post('status', true)),
            'usia' => htmlspecialchars($this->input->post('usia', true)),
            'tgl_lahir' => htmlspecialchars($this->input->post('tgl_lahir', true)),
            'tempat_lahir' => htmlspecialchars($this->input->post('lahir', true)),
            'pekerjaan' => htmlspecialchars($this->input->post('pekerjaan', true)),
            'penyakit' => htmlspecialchars($this->input->post('penyakit', true)),
            'vaksin' => htmlspecialchars($this->input->post('vaksin', true)),
            'terpapar' => htmlspecialchars($this->input->post('terpapar', true)),
        ];
        $this->db->insert('tb_vaksin', $data);
    }
    public function getvaksinbyid($id_vaksin)
    {
        return $this->db->get_where('tb_vaksin', ['id_vaksin' => $id_vaksin])->row_array();
    }
    public function updatedata()
    {
        $data = [
            'nama' => htmlspecialchars($this->input->post('nama', true)),
            'email' => htmlspecialchars($this->input->post('email', true)),
            'alamat' => htmlspecialchars($this->input->post('alamat', true)),
            'no_tlp' => htmlspecialchars($this->input->post('no_tlp', true)),
            'nik' => htmlspecialchars($this->input->post('nik', true)),
            'jk' => htmlspecialchars($this->input->post('jk', true)),
            'status' => htmlspecialchars($this->input->post('status', true)),
            'usia' => htmlspecialchars($this->input->post('usia', true)),
            'tgl_lahir' => htmlspecialchars($this->input->post('tgl_lahir', true)),
            'tempat_lahir' => htmlspecialchars($this->input->post('lahir', true)),
            'pekerjaan' => htmlspecialchars($this->input->post('pekerjaan', true)),
            'penyakit' => htmlspecialchars($this->input->post('penyakit', true)),
            'vaksin' => htmlspecialchars($this->input->post('vaksin', true)),
            'terpapar' => htmlspecialchars($this->input->post('terpapar', true)),
        ];
        $this->db->where('id_vaksin', $this->input->post('id_vaksin'));
        $this->db->update('tb_vaksin', $data);
    }
}
