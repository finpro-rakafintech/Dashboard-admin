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
        // $config['base_url'] = base_url('PropertyController/index');
        // $config['total_rows'] = $this->PropertyModel->countProperty();
        // $config['per_page'] = 6;
        // $config['uri_segment'] = 3;
        // $config['full_tag_open'] = '<ul class="pagination">';
        // $config['full_tag_close'] = '</ul>';
        // $config['first_link'] = 'First';
        // $config['last_link'] = 'Last';
        // $config['first_tag_open'] = '<li class="page-item">';
        // $config['first_tag_close'] = '</li>';
        // $config['prev_link'] = '&laquo';
        // $config['prev_tag_open'] = '<li class="page-item">';
        // $config['prev_tag_close'] = '</li>';
        // $config['next_link'] = '&raquo';
        // $config['next_tag_open'] = '<li class="page-item">';
        // $config['next_tag_close'] = '</li>';
        // $config['last_tag_open'] = '<li class="page-item">';
        // $config['last_tag_close'] = '</li>';
        // $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
        // $config['cur_tag_close'] = '</a></li>';
        // $config['num_tag_open'] = '<li class="page-item">';
        // $config['num_tag_close'] = '</li>';
        // $this->pagination->initialize($config);
    
        // $page = $this->uri->segment(3);
        // $offset = max(0, ($page - 1) * $config['per_page']); // Ensure offset is non-negative
    
        // $get_property = $this->PropertyModel->getProperty($config['per_page'], $offset);
        $get_property = $this->PropertyModel->getProperty();
    
        $include = array(
            'header' => $this->load->view('layout/header'),
            'navbar' => $this->load->view('layout/navbar'),
            'sidebar' => $this->load->view('layout/sidebar'),
            'v_property' => $get_property,
        );
    
        $this->load->view('data_property/view', $include);
        $this->load->view('layout/footer');
    }

    public function page_create()
    {
        $include = array(
            'header' => $this->load->view('layout/header'),
            'navbar' => $this->load->view('layout/navbar'),
            'sidebar' => $this->load->view('layout/sidebar'),
        );
    
        $this->load->view('data_property/create', $include);
        $this->load->view('layout/footer');
    }

    public function action_add()
    {
        $this->form_validation->set_rules('nm_property', 'Nama Property', 'trim|required');
        $this->form_validation->set_rules('ls_tanah', 'Luas Tanah', 'trim|required|numeric');
        $this->form_validation->set_rules('ls_bangunan', 'Luas Bangunan', 'trim|required|numeric');
        $this->form_validation->set_rules('jum_kamartidur', 'Jumlah Kamar Tidur', 'trim|required|numeric');
        $this->form_validation->set_rules('jum_kamarmandi', 'Jumlah Kamar Mandi', 'trim|required|numeric');
        $this->form_validation->set_rules('jum_garasi', 'Jumlah Garasi', 'trim|required|numeric');
        $this->form_validation->set_rules('price', 'Harga', 'trim|required|numeric');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'trim|required');

        if ($this->form_validation->run() === FALSE) {
            // $this->session->set_flashdata('error', validation_errors());
            // redirect('page_create_nasabah');
            $this->load->view('layout/header');
            $this->load->view('layout/navbar');
            $this->load->view('layout/sidebar');
            $this->load->view('data_property/create', $this->session->set_flashdata('error', validation_errors()));
            $this->load->view('layout/footer');
        } else {
            $get_input = array(
                'nm_property' => $this->input->post('nm_property'),
                'ls_tanah' => $this->input->post('ls_tanah'),
                'ls_bangunan' => $this->input->post('ls_bangunan'),
                'jum_kamartidur' => $this->input->post('jum_kamartidur'),
                'jum_kamarmandi' => $this->input->post('jum_kamarmandi'),
                'jum_garasi' => $this->input->post('jum_garasi'),
                'price' => $this->input->post('price'),
                'deskripsi' => $this->input->post('deskripsi'),
            );

            $result = $this->PropertyModel->get_add($get_input);

            if ($result) {
                $this->session->set_flashdata('success', 'Input Data, Success!');
            } else {
                $this->session->set_flashdata('failed', 'Input Data, Failed!');
            }

            redirect('view_property');
        }
    }

    public function page_update()
    {
        $id_prt = $this->uri->segment(2);

        $this->db->where('product_id', $id_prt);
        $cek = $this->db->get('product');

        if ($cek->num_rows() > 0) {
            foreach ($cek->result() as $row){
                $data = array(
                    $this->load->view('layout/header'),
                    $this->load->view('layout/navbar'),
                    $this->load->view('layout/sidebar'),
                    'id_prt' => $row->product_id,
                    'nm_prt' => $row->nm_product,
                    'ls_bgn' => $row->luas_bangunan,
                    'ls_tnh' => $row->luas_tanah,
                    'j_kmrtidur' => $row->jum_kamartidur,
                    'j_kmrmandi' => $row->jum_kamarmandi,
                    'j_garasi' => $row->jum_garasi,
                    'dsc' => $row->description,
                    'prc' => $row->price,
                );
            }
        }

        $this->load->view('data_property/update', $data);
        $this->load->view('layout/footer');
    }

    public function action_edit()
    {
        $get_edit = array(
            'id_prt' => $this->input->post('id_prt'),
            'nm_property' => $this->input->post('nm_property'),
            'ls_tanah' => $this->input->post('ls_tanah'),
            'ls_bangunan' => $this->input->post('ls_bangunan'),
            'jum_kamartidur' => $this->input->post('jum_kamartidur'),
            'jum_kamarmandi' => $this->input->post('jum_kamarmandi'),
            'jum_garasi' => $this->input->post('jum_garasi'),
            'price' => $this->input->post('price'),
            'deskripsi' => $this->input->post('deskripsi'),
        );

        $result = $this->PropertyModel->get_edit($get_edit);

        if ($result) {
            $this->session->set_flashdata('success', 'Update Data, Success!');
        } else {
            $this->session->set_flashdata('failed', 'Update Data, Failed!');
        }

        redirect('view_property');
    }

    public function delete()
    {
        $id_property = $this->uri->segment(2);

        $result = $this->PropertyModel->get_delete($id_property);

        if ($result) {
            $this->session->set_flashdata('success', 'Hapus Data, Success!');
        } else {
            $this->session->set_flashdata('failed', 'Hapus Data, Failed!');
        }

        redirect('view_property');
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