<?php
class Smt_kriteria_model extends CI_Model
{
    public function getalldata()
    {
        return $this->db->get('smt_kriteria')->result_array();
    }
    public function tambahdata()
    {
        $data = [
            'kriteria' => htmlspecialchars($this->input->post('kriteria', true)),
            'bobot' => htmlspecialchars($this->input->post('bobot', true)),
        ];
        $this->db->insert('smt_kriteria', $data);
    }
    public function getkriteriabyid($id_kriteria)
    {
        return $this->db->get_where('smt_kriteria', ['id_kriteria' => $id_kriteria])->row_array();
    }
    public function updatedata()
    {
        $data = [
            'kriteria' => htmlspecialchars($this->input->post('kriteria', true)),
            'bobot' => htmlspecialchars($this->input->post('bobot', true)),
        ];
        $this->db->where('id_kriteria', $this->input->post('id_kriteria'));
        $this->db->update('smt_kriteria', $data);
    }
}
