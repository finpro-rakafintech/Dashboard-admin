<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PengajuanModel extends CI_Model
{
    // public function getPengajuan()
    // {
    //     return $this->db->get('purchase');
    // }

    public function getPengajuan()
    {
        $this->db->select('purchase.*, nasabah.firstname, nasabah.lastname');
        $this->db->from('purchase');
        $this->db->join('nasabah', 'purchase.nasabah_id = nasabah.nasabah_id', 'left');
        $query = $this->db->get();
        return $query;
    }
}
