<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sambutan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // $this->load->model('galery_model', 'galery');

        $this->load->helper(array('form', 'url', 'Cookie', 'String'));
        $this->load->library('form_validation');
    }

    public function index()
    {
        $judul = [
            'title' => 'Sambutan Kepala Desa',
            'sub_title' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'
        ];
        $data['sambutan'] = $this->db->get_where('profil', ['kategori' => 'sambutan'])->row_array();
        $this->load->view('frontend/new_ui/header', $judul);
        $this->load->view('frontend/new_ui/sambutan', $data);
        $this->load->view('frontend/new_ui/footer', $data);
    }
}
