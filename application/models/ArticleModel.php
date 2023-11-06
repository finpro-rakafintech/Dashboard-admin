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
            'nm_article' => $get_input['nm_article'],
            'description' => $get_input['description'],
            'gambar' => $get_input['gambar']
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

    public function get_article_by_id($id_article)
    {
        $this->db->where('article_id', $id_article);
        return $this->db->get('article')->row();
    }

    public function get_old_gambar($article_id)
    {
        $this->db->select('gambar');
        $this->db->where('article_id', $article_id);
        $result = $this->db->get('article')->row();

        if ($result) {
            return $result->gambar;
        } else {
            return null;
        }
    }

    public function get_edit($article_id, $data)
    {
        $this->db->where('article_id', $article_id);
        $this->db->update('article', $data);

        return $this->db->affected_rows() > 0;
    }

    public function get_delete($id_article)
    {
        $cek['article_id'] = $id_article;

        $this->db->where($cek);
        $query = $this->db->get('article');

        if ($query->num_rows() > 0) {
            $this->db->where($cek);
            $this->db->delete('article');
            return 1;
        } else {
            return 0;
        }
    }
}
