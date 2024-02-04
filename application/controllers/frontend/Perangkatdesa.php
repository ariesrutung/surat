<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Perangkatdesa extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->helper(array('form', 'url', 'Cookie', 'String'));
        $this->load->library('form_validation');
    }

    public function index()
    {
        $judul = [
            'title' => 'Perangkat Desa',
            'sub_title' => 'Profil Perangkat Desa'
        ];
        $data['perangkatdesa'] = $this->db->get('tatakerja')->result_array();
        $this->load->view('frontend/new_ui/header', $judul);
        $this->load->view('frontend/new_ui/perangkatdesa', $data);
        $this->load->view('frontend/new_ui/footer', $data);
    }

    public function detail($slug)
    {
        $data['detail'] = $this->db->get_where('tatakerja', ['slug' => $slug])->row_array();
        $data['perangkatdesa'] = $this->db->get('tatakerja')->result_array();
        $judul = [
            'title' => 'Detail Perangkat Desa',
            'sub_title' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'
        ];

        $this->load->view('frontend/new_ui/header', $judul);
        $this->load->view('frontend/new_ui/detail_perangkatdesa', $data);
        $this->load->view('frontend/new_ui/footer', $data);
    }
}
