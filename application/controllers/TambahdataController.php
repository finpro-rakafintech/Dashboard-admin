<?php
defined('BASEPATH') or exit('No direct script access allowed');

class TambahdataController extends CI_Controller{

    // public function __construct()
	// {
	// 	parent::__construct();
	// 	$this->load->model('LoginModel');
	// 	$this->load->library('form_validation');
	// 	$this->load->library('session');
	// }


    public function index() {
		$this->load->view('layout/header');
        $this->load->view('layout/navbar');
        $this->load->view('layout/sidebar');
        $this->load->view('Data Properti/tambahdata');
		$this->load->view('layout/footer');
    }


}

?>