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
        $this->load->model('UserModel');
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

    public function page_create()
    {
        // Load the UserModel to retrieve user data
        $this->load->model('UserModel');
        $users = $this->UserModel->getUsers()->result();

        $include = array(
            'header' => $this->load->view('layout/header'),
            'navbar' => $this->load->view('layout/navbar'),
            'sidebar' => $this->load->view('layout/sidebar'),
            'users' => $users,  // Pass the user data to the view
        );

        $this->load->view('data_nasabah/create', $include);
        $this->load->view('layout/footer');
    }


    public function action_add()
    {
        $get_input = array(
            'firstname' => htmlspecialchars($this->input->post('firstname', TRUE), ENT_QUOTES),
            'lastname' => htmlspecialchars($this->input->post('lastname', TRUE), ENT_QUOTES),
            'phone_number' => htmlspecialchars($this->input->post('phone_number', TRUE), ENT_QUOTES),
            'no_kredit' => htmlspecialchars($this->input->post('no_kredit', TRUE), ENT_QUOTES),
            'npwp' => htmlspecialchars($this->input->post('npwp', TRUE), ENT_QUOTES),
            'nik' => htmlspecialchars($this->input->post('nik', TRUE), ENT_QUOTES),
            'user_id' => htmlspecialchars($this->input->post('selected_user_id', TRUE), ENT_QUOTES),
            'income' => htmlspecialchars($this->input->post('income', TRUE), ENT_QUOTES),
            'outcome' => htmlspecialchars($this->input->post('outcome', TRUE), ENT_QUOTES)
        );

        $result = $this->UserModel->get_add($get_input);

        if ($result) {
            $this->session->set_flashdata('success', 'Input Data, Success!');
        } else {
            $this->session->set_flashdata('failed', 'Input Data, Failed!');
        }

        redirect('view_user');
    }

    public function search_user()
    {
        $query = $this->input->post('query');
        $users = $this->NasabahModel->searchUser($query);

        foreach ($users as $user) {
            echo '<div class="user-item" data-user_id="' . $user->user_id . '">' . $user->user_id . ' - ' . $user->fullname . '</div>';
        }
    }
}
