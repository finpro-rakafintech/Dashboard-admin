<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ArticleController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        // Validasi jika user belum login
        if ($this->session->userdata('masuk') != TRUE) {
            $url = base_url();
            redirect($url);
        }

        $this->load->library('pagination');
        $this->load->library('form_validation');
        $this->load->helper(array('form', 'url'));
        // $this->load->library('upload');
        $this->load->model('ArticleModel');
    }

    public function index()
    {
        $get_article = $this->ArticleModel->getArticle();

        $include = array(
            'header' => $this->load->view('layout/header'),
            'navbar' => $this->load->view('layout/navbar'),
            'sidebar' => $this->load->view('layout/sidebar'),
            'v_article' => $get_article,
        );

        $this->load->view('data_article/view', $include);
        $this->load->view('layout/footer');
    }

    public function page_create()
    {
        $include = array(
            'header' => $this->load->view('layout/header'),
            'navbar' => $this->load->view('layout/navbar'),
            'sidebar' => $this->load->view('layout/sidebar'),
        );

        $this->load->view('data_article/create', $include);
        $this->load->view('layout/footer');
    }

    public function action_add()
    {
        $this->form_validation->set_rules('nm_article', 'Judul Artikel', 'required|max_length[50]');
        $this->form_validation->set_rules('description', 'Isi Artikel', 'required');
        $this->form_validation->set_rules('userfile', 'Gambar Artikel', 'required|image');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('layout/header');
            $this->load->view('layout/navbar');
            $this->load->view('layout/sidebar');
            $this->load->view('data_article/create', $this->session->set_flashdata('error', validation_errors()));
            $this->load->view('layout/footer');
        }

        $config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = 2048;
        $config['max_width']            = 10000;
        $config['max_height']           = 10000;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('userfile')) {
            echo "Gagal";
        } else {
            $gambar = $this->upload->data();
            $gambar = $gambar['file_name'];

            $get_input = array(
                'nm_article' => $this->input->post('nm_article'),
                'description' => $this->input->post('description'),
                'gambar' => $gambar
            );

            $result = $this->ArticleModel->get_add($get_input);

            if ($result) {
                $this->session->set_flashdata('success', 'Input Data, Success!');
            } else {
                $this->session->set_flashdata('failed', 'Input Data, Failed!');
            }

            redirect('view_article');
        }
    }

    public function page_update()
    {
        $id_article = $this->uri->segment(2);

        $this->db->where('article_id', $id_article);
        $cek = $this->db->get('article');

        if ($cek->num_rows() > 0) {
            foreach ($cek->result() as $row) {
                $data = array(
                    $this->load->view('layout/header'),
                    $this->load->view('layout/navbar'),
                    $this->load->view('layout/sidebar'),
                    'article_id' => $row->article_id,
                    'nm_article' => $row->nm_article,
                    'description' => $row->description,
                    'gambar' => $row->gambar,
                );
            }
        }

        $this->load->view('data_article/update', $data);
        $this->load->view('layout/footer');
    }

    public function action_edit()
    {
        // Ambil data dari formulir edit
        $article_id = $this->input->post('article_id');
        $nm_article = $this->input->post('nm_article');
        $description = $this->input->post('description');

        // Inisialisasi gambar baru dan gambar lama
        $gambar = $this->input->post('gambar');
        $old_gambar = $this->ArticleModel->get_old_gambar($article_id);

        // Memeriksa apakah ada file gambar yang diunggah
        if ($_FILES['userfile']['name']) {
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $config['max_size'] = 2048; // 2MB

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('userfile')) {
                $upload_data = $this->upload->data();
                $gambar = $upload_data['file_name'];

                // Hapus foto lama jika ada perubahan gambar
                if ($old_gambar) {
                    unlink('./uploads/' . $old_gambar);
                }
            } else {
                $error = $this->upload->display_errors();
                $this->session->set_flashdata('error', $error);
                redirect('view_article');
            }
        }

        // Jika tidak ada perubahan gambar, gunakan gambar lama
        if (!$gambar) {
            $gambar = $old_gambar;
        }

        // Data untuk diupdate
        $data = array(
            'nm_article' => $nm_article,
            'description' => $description,
            'gambar' => $gambar,
        );

        $result = $this->ArticleModel->get_edit($article_id, $data);

        if ($result) {
            $this->session->set_flashdata('success', 'Update Data, Success!');
        } else {
            $this->session->set_flashdata('success', 'Update Data, Success!');
        }

        redirect('view_article');
    }

    public function delete()
    {
        $id_article = $this->uri->segment(2);
        $article = $this->ArticleModel->get_article_by_id($id_article);

        if ($article) {
            // Hapus file gambar terkait
            $gambar = $article->gambar;
            $img_path = './uploads/' . $gambar;
            if (file_exists($img_path)) {
                unlink($img_path);
            }

            // Hapus entri artikel dari database
            $result = $this->ArticleModel->get_delete($id_article);

            if ($result) {
                $this->session->set_flashdata('success', 'Hapus Data, Success!');
            } else {
                $this->session->set_flashdata('failed', 'Hapus Data, Failed!');
            }
        } else {
            $this->session->set_flashdata('failed', 'Artikel tidak ditemukan.');
        }

        redirect('view_article');
    }
}
