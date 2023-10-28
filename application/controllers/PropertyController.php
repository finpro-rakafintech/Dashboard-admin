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

    public function action_delete()
    {
        $id_product = $this->uri->segment(2);

        $this->db->where('product_id', $id_product);
        $cek = $this->db->get('product');

        if ($cek->num_rows() > 0) {
            foreach ($cek->result() as $row){
                $data_property = array(
                    'id' => $row->product_id,
                    'nm_prt' => $row->nm_product,
                    'ls_tanah' => $row->luas_tanah,
                    'ls_bangunan' => $row->luas_bangunan,
                    'j_kmrtidur' => $row->jum_kamartidur,
                    'j_kmrmandi' => $row->jum_kamarmandi,
                    'j_garasi' => $row->jum_garasi,
                    'dsc' => $row->description,
                    'price' => $row->price,
                    'type' => $row->type,
                );
            }
        }

        $result = $this->PropertyModel->get_delete($data_property);

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