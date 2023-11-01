<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UserController extends CI_Controller
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
        $this->load->model('UserModel');
    }

    public function index()
    {
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

    public function page_create()
    {
        $include = array(
            'header' => $this->load->view('layout/header'),
            'navbar' => $this->load->view('layout/navbar'),
            'sidebar' => $this->load->view('layout/sidebar'),
        );

        $this->load->view('data_user/create', $include);
        $this->load->view('layout/footer');
    }

    public function action_add()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]');
        $this->form_validation->set_rules('level', 'Level', 'required');
        $this->form_validation->set_rules('fullname', 'Nama Lengkap', 'trim|required|alpha');
        $this->form_validation->set_rules('birthdate', 'Tanggal Lahir', 'required');
        if ($this->form_validation->run() === FALSE) {
            // $this->session->set_flashdata('error', validation_errors());
            // redirect('page_create_nasabah');
            $this->load->view('layout/header');
            $this->load->view('layout/navbar');
            $this->load->view('layout/sidebar');
            $this->load->view('data_user/create', $this->session->set_flashdata('error', validation_errors()));
            $this->load->view('layout/footer');
        } else {
            $get_input = array(
                'fullname' => htmlspecialchars($this->input->post('fullname', TRUE), ENT_QUOTES),
                'birthdate' => htmlspecialchars($this->input->post('birthdate', TRUE), ENT_QUOTES),
                'email' => htmlspecialchars($this->input->post('email', TRUE), ENT_QUOTES),
                'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
                'level' => htmlspecialchars($this->input->post('level', TRUE), ENT_QUOTES)
            );

            $result = $this->UserModel->get_add($get_input);

            if ($result) {
                $this->session->set_flashdata('success', 'Input Data, Success!');
            } else {
                $this->session->set_flashdata('failed', 'Input Data, Failed!');
            }

            redirect('view_user');
        }
    }

    public function page_update()
    {
        $id_user = $this->uri->segment(2);

        $this->db->where('user_id', $id_user);
        $cek = $this->db->get('users');

        if ($cek->num_rows() > 0) {
            foreach ($cek->result() as $row){
                $data = array(
                    $this->load->view('layout/header'),
                    $this->load->view('layout/navbar'),
                    $this->load->view('layout/sidebar'),
                    'user_id' => $row->user_id,
                    'email' => $row->email,
                    'password' => $row->password,
                    'fullname' => $row->fullname,
                    'birthdate' => $row->birthdate,
                    'level' => $row->level
                );
            }
        }

        $this->load->view('data_user/update', $data);
        $this->load->view('layout/footer');
    }
    
    public function action_edit()
    {
        $get_edit = array(
            'user_id' => $this->input->post('user_id'),
            'email' => $this->input->post('email'),
            'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
            'fullname' => $this->input->post('fullname'),
            'birthdate' => $this->input->post('birthdate'),
            'level' => $this->input->post('level')
        );

        $result = $this->UserModel->get_edit($get_edit);

        if ($result) {
            $this->session->set_flashdata('success', 'Update Data, Success!');
        } else {
            $this->session->set_flashdata('failed', 'Update Data, Failed!');
        }

        redirect('view_user');
    }

    public function delete()
    {
        $id_user = $this->uri->segment(2);

        $result = $this->UserModel->get_delete($id_user);

        if ($result) {
            $this->session->set_flashdata('success', 'Hapus Data, Success!');
        } else {
            $this->session->set_flashdata('failed', 'Hapus Data, Failed!');
        }

        redirect('view_user');
    }
}
