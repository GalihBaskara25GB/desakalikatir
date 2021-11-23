<?php
class Akun_model extends CI_Model
{
    public function getallakun()
    {
        return $this->db->get('tb_akun')->result_array();
    }
}
