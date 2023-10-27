<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PropertyController extends CI_Controller{

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
        $this->load->view('Data Properti/index');
		$this->load->view('layout/footer');
    }

    function detailadmin()
    {
        $this->load->view('layout/header');
        $this->load->view('layout/navbar');
        $this->load->view('layout/sidebar');
        $this->load->view('Data Properti/detailadmin');
		$this->load->view('layout/footer');
    }
    function editdata()
    {
        $this->load->view('layout/header');
        $this->load->view('layout/navbar');
        $this->load->view('layout/sidebar');
        $this->load->view('Data Properti/editdata');
		$this->load->view('layout/footer');
    }


}

?>