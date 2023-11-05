<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ArticleModel extends CI_Model
{
    public function getArticle()
    {
        return $this->db->get('article');
    }

    public function get_add($get_input)
    {
        $data = array(
            'nm_article' => $this->input->post($get_input['nm_article']),
            'description' => $this->input->post($get_input['description']),
            'img_article' => $this->input->post($get_input['img_article'])
        );

        $this->db->where($data);
        $query = $this->db->get('article');

        if ($query->num_rows() > 0) {
            return 0;
        } else {
            $this->db->insert('article', $data);
            return 1;
        }
    }
}


?>