<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UserController extends CI_Controller{

    public function __construct()
	{
		parent::__construct();

		// Validasi jika user belum login
		if ($this->session->userdata('masuk') != TRUE) {
			$url = base_url();
			redirect($url);
		}

        $this->load->library('pagination');
		$this->load->model('UserModel');
	}


    public function index() {
		$get_user = $this->UserModel->getUsers();
    
        $include = array(
            'header' => $this->load->view('layout/header'),
            'navbar' => $this->load->view('layout/navbar'),
            'sidebar' => $this->load->view('layout/sidebar'),
            'v_user' => $get_user,
        );
    
        $this->load->view('data_user/view', $include);
        $this->load->view('layout/footer');
    }


}

?>