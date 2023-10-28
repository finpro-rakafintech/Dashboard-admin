<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PropertyModel extends CI_Model
{
    public function getJumlahProperty()
    {
        $query = $this->db->query("SELECT COUNT(*) AS total_property FROM product");
        $result = $query->row();

        return $result->total_property;
    }

    public function getProperty() {
        $query = $this->db->get('product');
        return $query;
    }

    public function get_add($get_input)
    {
        $data = array(
            'nm_product' => $this->input->post('nm_property'),
            'luas_tanah' => $this->input->post('ls_tanah'),
            'luas_bangunan' => $this->input->post('ls_bangunan'),
            'jum_kamartidur' => $this->input->post('jum_kamartidur'),
            'jum_kamarmandi' => $this->input->post('jum_kamarmandi'),
            'jum_garasi' => $this->input->post('jum_garasi'),
            'price' => $this->input->post('price'),
            'description' => $this->input->post('deskripsi'),
        );

        $this->db->where($data);
        $query = $this->db->get('product');

        if ($query->num_rows() > 0) {
            return 0;
        } else {
            $this->db->insert('product', $data);
            return 1;
        }
    }

    public function get_delete($data_property)
    {
        $cek['id'] = $data_property;

        $data = array(
            'product_id' => $data_property['id'],
            'nm_product' => $data_property['nm_prt'],
            'luas_tanah' => $data_property['ls_tanah'],
            'luas_bangunan' => $data_property['ls_bangunan'],
            'jum_kamartidur' => $data_property['j_kmrtidur'],
            'jum_kamarmandi' => $data_property['j_kmrmandi'],
            'jum_garasi' => $data_property['j_garasi'],
            'description' => $data_property['dsc'],
            'price' => $data_property['price'],
            'type' => $data_property['type'],
        );

        $this->db->where($data);
        $query = $this->db->get('product');

        if ($query->num_rows() > 0) {
            $this->db->where($data);
            $this->db->delete('product');
            return 1;
        } else {
            return 0;
        }
    }

    // public function getProperty($limit, $offset) {
    //     $query = $this->db->get('product', $limit, $offset);
    //     return $query;
    // }

    public function countProperty() {
        return $this->db->count_all('product');
    }
}


?>