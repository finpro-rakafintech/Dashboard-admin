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

    // PengajuanModel
    public function getPengajuanDetail($order_id)
    {
        $this->db->select('purchase.*, nasabah.firstname, nasabah.lastname, product.*, nasabah.*');
        $this->db->from('purchase');
        $this->db->join('nasabah', 'purchase.nasabah_id = nasabah.nasabah_id', 'left');
        $this->db->join('product', 'purchase.product_id = product.product_id', 'left');
        $this->db->where('purchase.order_id', $order_id);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            // Return an empty object or handle the case where no data is found
            return new stdClass();
        }
    }
}
