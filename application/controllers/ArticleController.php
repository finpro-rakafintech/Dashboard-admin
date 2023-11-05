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
        $this->load->library('upload');
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
        $this->form_validation->set_rules('nm_article', 'Judul Artikel', 'required');
        $this->form_validation->set_rules('description', 'Isi Artikel', 'required');
        $this->form_validation->set_rules('img_article', 'Gambar Artikel', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('layout/header');
            $this->load->view('layout/navbar');
            $this->load->view('layout/sidebar');
            $this->load->view('data_article/create', $this->session->set_flashdata('error', validation_errors()));
            $this->load->view('layout/footer');
        } else {
            $img_article = $_FILES['img_article'];

            if ($img_article = '') {
                
            } else {
                $config['upload_path'] = '.assets/public/gambar_article';
                $config['allowed_types'] = 'jpg|png';

                $this->load->library('upload', $config);
                if (!$this->upload->do_upload('img_article')) {
                    echo "Upload Gagal";
                    die();
                } else {
                    $img_article = $this->upload->data('file_name');
                }
            }

            $get_input = array(
                'nm_article' => $this->input->post('nm_article'),
                'description' => $this->input->post('description'),
                'img_article' => $img_article,
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
}


?>