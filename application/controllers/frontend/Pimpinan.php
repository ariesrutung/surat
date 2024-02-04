<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pimpinan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // $this->load->model('Tatakerja_model');

        $this->load->helper(array('form', 'url', 'Cookie', 'String'));
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['tatakerja'] = $this->db->get('tatakerja')->result_array();
        $judul = [
            'title' => 'Tata Kerja Perangkat Desa',
            'sub_title' => 'Jabaran tugas dan fungsi perangkat desa.'
        ];

        $this->load->view('frontend/new_ui/header', $judul);
        $this->load->view('frontend/new_ui/pimpinan', $data);
        $this->load->view('frontend/new_ui/footer', $data);
    }
}
