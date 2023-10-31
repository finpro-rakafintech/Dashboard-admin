<?php
defined('BASEPATH') or exit('No direct script access allowed');

class NasabahController extends CI_Controller
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
        $this->load->model('NasabahModel');
    }

    public function index()
    {
        $get_nasabah = $this->NasabahModel->getNasabah();

        $include = array(
            'header' => $this->load->view('layout/header'),
            'navbar' => $this->load->view('layout/navbar'),
            'sidebar' => $this->load->view('layout/sidebar'),
            'v_nasabah' => $get_nasabah,
        );

        $this->load->view('data_nasabah/view', $include);
        $this->load->view('layout/footer');
    }
}


?>