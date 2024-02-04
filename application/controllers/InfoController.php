<?php
defined('BASEPATH') or exit('No direct script access allowed');

class InfoController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('InfoModel');
    }

    public function index()
    {
        $this->load->view('info/index');
    }

    public function ajax_list()
    {
        $list = $this->InfoModel->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $info) {
            $no++;
            $row = array();
            $row[] = $info->id;
            $row[] = $info->judul;
            $row[] = $info->isi;
            $row[] = $info->lokasi;
            $row[] = $info->gambar;
            $row[] = $info->ket_gambar;
            $row[] = $info->slug;
            $row[] = $info->tanggal;
            $row[] = $info->kategori;
            $row[] = $info->penulis;

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->InfoModel->count_all(),
            "recordsFiltered" => $this->InfoModel->count_filtered(),
            "data" => $data,
        );
        echo json_encode($output);
    }
}
