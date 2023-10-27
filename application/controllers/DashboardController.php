<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DashboardController extends CI_Controller{

    public function __construct()
	{
		parent::__construct();

		// Validasi jika user belum login
		if ($this->session->userdata('masuk') != TRUE) {
			$url = base_url();
			redirect($url);
		}

		$this->load->model('NasabahModel');
		$this->load->model('PropertyModel');
	}


    public function index() {
		$data = array(
			'jumlah_property' => $this->PropertyModel->getJumlahProperty(),
			'jumlah_nasabah' => $this->NasabahModel->getJumlahNasabah(),
			'data_nasabah' => $this->NasabahModel->getNasabah(),
		);

		$this->load->view('layout/header');
		$this->load->view('layout/navbar');
		$this->load->view('layout/sidebar');
        $this->load->view('dashboard/index', $data);
		$this->load->view('layout/footer');
    }


}

?>