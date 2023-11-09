<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PengajuanController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        // Validasi jika user belum login
        if ($this->session->userdata('masuk') != TRUE) {
            $url = base_url();
            redirect($url);
        }

        $this->load->library('form_validation');
        $this->load->helper(array('form', 'url'));
        $this->load->model('PengajuanModel');
    }

    public function index()
    {
        $get_pengajuan = $this->PengajuanModel->getPengajuan();

        $include = array(
            'header' => $this->load->view('layout/header'),
            'navbar' => $this->load->view('layout/navbar'),
            'sidebar' => $this->load->view('layout/sidebar'),
            'v_pengajuan' => $get_pengajuan,
        );

        $this->load->view('data_pengajuan/view', $include);
        $this->load->view('layout/footer');
    }

    public function detail()
    {
    }

    public function page_update()
    {
        $id_pengajuan = $this->uri->segment(2);

        $this->db->where('order_id', $id_pengajuan);
        $cek = $this->db->get('purchase');

        if ($cek->num_rows() > 0) {
            foreach ($cek->result() as $row) {
                $data = array(
                    $this->load->view('layout/header'),
                    $this->load->view('layout/navbar'),
                    $this->load->view('layout/sidebar'),
                    'order_id' => $row->order_id,
                    'order_status' => $row->order_status,
                    'date_ordered' => $row->date_ordered,
                    'date_received' => $row->date_received,
                    'total_price' => $row->total_price,
                    'region_id' => $row->region_id,
                    'product_id' => $row->product_id,
                    'nasabah_id' => $row->nasabah_id,
                );
            }
        }

        $this->load->view('data_pengajuan/update', $data);
        $this->load->view('layout/footer');
    }
}
