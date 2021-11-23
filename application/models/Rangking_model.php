<?php
class Rangking_model extends CI_Model
{
    public function getalldata()
    {
        $this->db->select('rangking.*, tb_vaksin.nama');
        $this->db->from('rangking');
        $this->db->join('tb_vaksin', 'tb_vaksin.id_vaksin = rangking.id_vaksin');
        $this->db->order_by('nilai_preferensi', 'desc');
        return $this->db->get()->result_array();
    }
    public function tambahdata($data)
    {
        $this->db->truncate('rangking');
        $this->db->insert_batch('rangking', $data);
    }
}
