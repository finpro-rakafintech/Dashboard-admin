<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PropertyController extends CI_Controller{

    public function __construct()
	{
		parent::__construct();

		// Validasi jika user belum login
		if ($this->session->userdata('masuk') != TRUE) {
			$url = base_url();
			redirect($url);
		}

        $this->load->library('pagination');
		$this->load->model('PropertyModel');
	}


    public function index() {
        $config['base_url'] = base_url('PropertyController/index');
        $config['total_rows'] = $this->PropertyModel->countProperty();
        $config['per_page'] = 6;
        $config['uri_segment'] = 3;
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = 'First';
        $config['last_link'] = 'Last';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        $this->pagination->initialize($config);
    
        $page = $this->uri->segment(3);
        $offset = max(0, ($page - 1) * $config['per_page']); // Ensure offset is non-negative
    
        $get_property = $this->PropertyModel->getProperty($config['per_page'], $offset);
    
        $include = array(
            'header' => $this->load->view('layout/header'),
            'navbar' => $this->load->view('layout/navbar'),
            'sidebar' => $this->load->view('layout/sidebar'),
            'v_property' => $get_property,
        );
    
        $this->load->view('data_property/index', $include);
        $this->load->view('layout/footer');
    }

    function detailadmin()
    {
        $this->load->view('layout/header');
        $this->load->view('layout/navbar');
        $this->load->view('layout/sidebar');
        $this->load->view('data_property/detailadmin');
		$this->load->view('layout/footer');
    }
    function editdata()
    {
        $this->load->view('layout/header');
        $this->load->view('layout/navbar');
        $this->load->view('layout/sidebar');
        $this->load->view('data_property/editdata');
		$this->load->view('layout/footer');
    }


}

?>