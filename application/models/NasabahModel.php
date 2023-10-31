<?php
defined('BASEPATH') or exit('No direct script access allowed');

class NasabahModel extends CI_Model
{
    public function getJumlahNasabah()
    {
        $query = $this->db->query("SELECT COUNT(*) AS total_nasabah FROM nasabah");
        $result = $query->row();

        return $result->total_nasabah;
    }

    public function getNasabah()
    {
        return $this->db->get('nasabah');
    }

    public function searchUser($query)
    {
        $this->db->select('user_id, fullname');
        $this->db->like('user_id', $query);
        $this->db->where_not_in('user_id', $this->getUsedUserIds());
        $result = $this->db->get('user');

        return $result->result();
    }


    public function getUsedUserIds()
    {
        $used_user_ids = $this->db->select('user_id')->get('nasabah')->result_array();
        return array_column($used_user_ids, 'user_id');
    }
}
