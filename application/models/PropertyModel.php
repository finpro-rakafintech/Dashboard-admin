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

    public function get_edit($get_edit)
    {
        $cek_id = array(
            'product_id' => $get_edit['id_prt'],
        );

        $data = array(
            'nm_product' => $get_edit['nm_property'],
            'luas_tanah' => $get_edit['ls_tanah'],
            'luas_bangunan' => $get_edit['ls_bangunan'],
            'jum_kamartidur' => $get_edit['jum_kamartidur'],
            'jum_kamarmandi' => $get_edit['jum_kamarmandi'],
            'jum_garasi' => $get_edit['jum_garasi'],
            'price' => $get_edit['price'],
            'description' => $get_edit['deskripsi'],
        );

        $this->db->where($cek_id);
        $query = $this->db->get('product');

        if ($query->num_rows() > 0) {
            $this->db->set($data);
            $this->db->where($cek_id);
            $this->db->update('product');
            return 1;
        } else {
            $this->db->update('product', $data);
            return 0;
        }
    }

    public function get_delete($data_property)
    {
        $cek['id'] = $data_property;

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