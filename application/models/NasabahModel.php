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
}


?>