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
        $this->load->library('form_validation');
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
        $this->form_validation->set_rules('firstname', 'First Name', 'trim|required|alpha');
        $this->form_validation->set_rules('lastname', 'Last Name', 'trim|required|alpha');
        $this->form_validation->set_rules('phone_number', 'Phone Number', 'trim|required|numeric|is_unique[nasabah.phone_number]');
        $this->form_validation->set_rules('no_kredit', 'Nomor Kredit', 'trim|required|numeric|is_unique[nasabah.no_kredit]');
        $this->form_validation->set_rules('npwp', 'NPWP', 'trim|required|numeric|is_unique[nasabah.npwp]');
        $this->form_validation->set_rules('nik', 'NIK', 'trim|required|numeric|is_unique[nasabah.nik]');
        $this->form_validation->set_rules('user_id', 'User ID', 'required|is_unique[nasabah.user_id]');
        $this->form_validation->set_rules('income', 'Income', 'trim|required|numeric');
        $this->form_validation->set_rules('outcome', 'Outcome', 'trim|required|numeric');

        if ($this->form_validation->run() === FALSE) {
            // $this->session->set_flashdata('error', validation_errors());
            // redirect('page_create_nasabah');
            $this->load->view('layout/header');
            $this->load->view('layout/navbar');
            $this->load->view('layout/sidebar');
            $this->load->view('data_nasabah/create', $this->session->set_flashdata('error', validation_errors()));
            $this->load->view('layout/footer');
        } else {
            $get_input = array(
                'firstname' => $this->input->post('firstname'),
                'lastname' => $this->input->post('lastname'),
                'phone_number' => $this->input->post('phone_number'),
                'no_kredit' => $this->input->post('no_kredit'),
                'npwp' => $this->input->post('npwp'),
                'nik' => $this->input->post('nik'),
                'user_id' => $this->input->post('user_id'),
                'income' => $this->input->post('income'),
                'outcome' => $this->input->post('outcome')
            );

            $result = $this->NasabahModel->get_add($get_input);

            if ($result) {
                $this->session->set_flashdata('success', 'Input Data, Success!');
            } else {
                $this->session->set_flashdata('failed', 'Input Data, Failed!');
            }

            redirect('view_nasabah');
        }
    }

    public function search_user()
    {
        $query = $this->input->post('query');
        $users = $this->NasabahModel->searchUser($query);

        foreach ($users as $user) {
            echo '<div class="user-item" data-user_id="' . $user->user_id . '">' . $user->user_id . ' - ' . $user->fullname . '</div>';
        }
    }

    public function page_update()
    {
        $users = $this->UserModel->getUsers()->result();

        $id_nasabah = $this->uri->segment(2);

        $this->db->where('nasabah_id', $id_nasabah);
        $cek = $this->db->get('nasabah');

        if ($cek->num_rows() > 0) {
            foreach ($cek->result() as $row) {
                $data = array(
                    $this->load->view('layout/header'),
                    $this->load->view('layout/navbar'),
                    $this->load->view('layout/sidebar'),
                    'users' => $users,
                    'nasabah_id' => $row->nasabah_id,
                    'firstname' => $row->firstname,
                    'lastname' => $row->lastname,
                    'phone_number' => $row->phone_number,
                    'no_kredit' => $row->no_kredit,
                    'npwp' => $row->npwp,
                    'nik' => $row->nik,
                    'user_id' => $row->user_id,
                    'income' => $row->income,
                    'outcome' => $row->outcome
                );
            }
        }
        
        $this->load->view('data_nasabah/update', $data);
        $this->load->view('layout/footer');
    }

    public function action_edit()
    {
        $get_edit = array(
            'nasabah_id' => $this->input->post('nasabah_id'),
            'firstname' => $this->input->post('firstname'),
            'lastname' => $this->input->post('lastname'),
            'phone_number' => $this->input->post('phone_number'),
            'no_kredit' => $this->input->post('no_kredit'),
            'npwp' => $this->input->post('npwp'),
            'nik' => $this->input->post('nik'),
            'user_id' => $this->input->post('user_id'),
            'income' => $this->input->post('income'),
            'outcome' => $this->input->post('outcome')
        );

        $result = $this->NasabahModel->get_edit($get_edit);

        if ($result) {
            $this->session->set_flashdata('success', 'Update Data, Success!');
        } else {
            $this->session->set_flashdata('failed', 'Update Data, Failed!');
        }

        redirect('view_nasabah');
    }

    public function delete()
    {
        $id_nasabah = $this->uri->segment(2);
        $result = $this->NasabahModel->get_delete($id_nasabah);

        if ($result) {
            $this->session->set_flashdata('success', 'Hapus Data, Success!');
        } else {
            $this->session->set_flashdata('failed', 'Hapus Data, Failed!');
        }

        redirect('view_nasabah');
    }
}
