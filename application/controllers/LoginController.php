<?php
defined('BASEPATH') or exit('No direct script access allowed');

class LoginController extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('LoginModel');
		$this->load->library('form_validation');
		$this->load->library('session');
	}


	public function index()
	{
		$this->load->view('layout/header');
		$this->load->view('auth/login');
		$this->load->view('layout/footer');
	}


	public function login()
	{
		$email = htmlspecialchars($this->input->post('email', TRUE), ENT_QUOTES);
		$password = htmlspecialchars($this->input->post('password', TRUE), ENT_QUOTES);

		$cek_level = $this->LoginModel->cek_level($email);

		if ($cek_level) {
			if (password_verify($password, $cek_level['password'])) {
				$data_session = array(
					'nama_user' => $cek_level['fullname'],
					'email' => $cek_level['email']
				);

				$this->session->set_userdata($data_session);

				if ($cek_level['level'] == 'super_admin') {
					// Akses super admin
					$this->session->set_userdata('masuk', TRUE);
					$this->session->set_userdata('role', 'super_admin');
					$this->session->set_userdata('ses_email', $cek_level['email']);
					$this->session->set_userdata('ses_nama', $cek_level['nama_user']);
					redirect('home');
				} else {
					// Akses admin
					$this->session->set_userdata('masuk', TRUE);
					$this->session->set_userdata('role', 'admin');
					$this->session->set_userdata('ses_email', $cek_level['email']);
					$this->session->set_userdata('ses_nama', $cek_level['nama_user']);
					redirect('home');
				}
			} else {
				// Password salah
				// $url = base_url();
				echo $this->session->set_flashdata('msg', 'Email atau Password Salah');
				// redirect($url);
				$this->load->view('layout/header');
				$this->load->view('auth/login');
				$this->load->view('layout/footer');
			}
		} else {
			// Email tidak ditemukan
			// $url = base_url();
			echo $this->session->set_flashdata('msg', 'Email Tidak Ditemukan');
			// redirect($url);
			$this->load->view('layout/header');
			$this->load->view('auth/login');
			$this->load->view('layout/footer');
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();

		$url = base_url();
		redirect($url);
	}
}
