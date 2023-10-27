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

    public function getProperty($limit, $offset) {
        $query = $this->db->get('product', $limit, $offset);
        return $query;
    }

    public function countProperty() {
        return $this->db->count_all('product');
    }
}


?>