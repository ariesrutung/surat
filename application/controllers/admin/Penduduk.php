<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penduduk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');

        $this->load->model('Penduduk_model');
        if ($this->session->userdata('id_user') == FALSE) {
            redirect(base_url("admin/auth/login"));
        }
    }

    public function index()
    {

        $judul = [
            'title' => 'Penduduk',
            'sub_title' => ''
        ];

        $data['data'] = $this->db->get('penduduk')->result_array();
        $this->load->view('backend/template/header', $judul);
        $this->load->view('backend/penduduk/index', $data);
        $this->load->view('backend/template/footer');
    }

    public function hapus($id)
    {

        $data = $this->db->get_where('penduduk', ['nik' => $id])->row_array();

        $this->db->where(['nik' => $id]);
        $this->db->delete('penduduk');
        $this->session->set_flashdata('success', 'Berhasil Dihapus!');
        redirect(base_url('admin/penduduk'));
    }

    public function tambah_data_penduduk()
    {

        $this->form_validation->set_rules('nik', 'NIK', 'required|trim');
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('no_hp', 'No Hp', 'required|trim');
        $this->form_validation->set_rules('tmpt_lhr', 'Tempat Lahir', 'required|trim');
        $this->form_validation->set_rules('tgl_lhr', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
        $this->form_validation->set_rules('rt', 'RT', 'required|trim');
        $this->form_validation->set_rules('rw', 'RW', 'required|trim');


        if ($this->form_validation->run() == FALSE) {
            $judul = [
                'title' => 'Penduduk',
                'sub_title' => 'Tambah Data Penduduk '
            ];
            $this->load->view('backend/template/header', $judul);
            $this->load->view('backend/penduduk/tambah_data_penduduk');
            $this->load->view('backend/template/footer');
        } else {
            $nik =  $this->input->post("nik", TRUE);
            $nama =  $this->input->post("nama", TRUE);
            $tmpt_lhr =  $this->input->post("tmpt_lhr", TRUE);
            $tgl_lhr =  $this->input->post("tgl_lhr", TRUE);
            $alamat =  $this->input->post("alamat", TRUE);
            $no_hp =  $this->input->post("no_hp", TRUE);
            $pekerjaan =  $this->input->post("pekerjaan", TRUE);
            $pendidikan =  $this->input->post("pendidikan", TRUE);
            $rw =  $this->input->post("rw", TRUE);
            $rt =  $this->input->post("rt", TRUE);

            $save = [
                'nik' => $nik,
                'nama' => $nama,
                'tmpt_lhr' => $tmpt_lhr,
                'tgl_lhr' => date('Y-m-d', strtotime($tgl_lhr)),
                'alamat' => $alamat,
                'no_hp' => $no_hp,
                'pekerjaan' => $pekerjaan,
                'pendidikan' => $pendidikan,
                'rw' => $rw,
                'rt' => $rt

            ];

            $this->db->insert('penduduk', $save);
            $this->session->set_flashdata('success', 'Berhasil Ditambahkan!');
            redirect(base_url("admin/penduduk"));
        }
    }

    public function edit_data_penduduk($id)
    {

        $this->form_validation->set_rules('nik', 'NIK', 'required|trim');
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('no_hp', 'No Hp', 'required|trim');
        $this->form_validation->set_rules('tmpt_lhr', 'Tempat Lahir', 'required|trim');
        $this->form_validation->set_rules('tgl_lhr', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
        $this->form_validation->set_rules('rt', 'RT', 'required|trim');
        $this->form_validation->set_rules('rw', 'RW', 'required|trim');


        if ($this->form_validation->run() == FALSE) {
            $judul = [
                'title' => 'Penduduk',
                'sub_title' => 'Edit Penduduk'
            ];

            $data['penduduk'] = $this->db->get_where('penduduk', ['nik' => $id])->row_array();
            $this->load->view('backend/template/header', $judul);
            $this->load->view('backend/penduduk/edit_data_penduduk', $data);
            $this->load->view('backend/template/footer');
        } else {

            $nik =  $this->input->post("nik", TRUE);
            $nama =  $this->input->post("nama", TRUE);
            $tmpt_lhr =  $this->input->post("tmpt_lhr", TRUE);
            $tgl_lhr =  $this->input->post("tgl_lhr", TRUE);
            $alamat =  $this->input->post("alamat", TRUE);
            $no_hp =  $this->input->post("no_hp", TRUE);
            $pendidikan =  $this->input->post("pendidikan", TRUE);
            $pekerjaan =  $this->input->post("pekerjaan", TRUE);
            $rw =  $this->input->post("rw", TRUE);
            $rt =  $this->input->post("rt", TRUE);

            $update = [
                'nik' => $nik,
                'nama' => $nama,
                'tmpt_lhr' => $tmpt_lhr,
                'tgl_lhr' => date('Y-m-d', strtotime($tgl_lhr)),
                'alamat' => $alamat,
                'no_hp' => $no_hp,
                'pendidikan' => $pendidikan,
                'pekerjaan' => $pekerjaan,
                'rw' => $rw,
                'rt' => $rt
            ];

            $this->db->where('nik', $id);
            $this->db->update('penduduk', $update);

            $this->session->set_flashdata('success', 'Berhasil Diupdate!');
            redirect(base_url("admin/penduduk"));
        }
    }

    function get_autocomplete()
    {
        if (isset($_GET['term'])) {
            $result = $this->Penduduk_model->search_nik($_GET['term']);
            if (count($result) > 0) {
                foreach ($result as $row)
                    $arr_result[] = array(
                        'label'  => $row->nik,
                        'nama' => $row->nama,
                        'no_hp' => $row->no_hp,
                    );
                echo json_encode($arr_result);
            }
        }
    }

    public function ajax_list()
    {
        $list = $this->Penduduk_model->get_datatables();
        $data = array();
        foreach ($list as $key => $info) {
            $row = array();
            $row[] = $key + 1; // Nomor urut
            $row[] = $info->nama;
            $row[] = $info->nik;
            $row[] = $info->no_hp;

            $tanggal_lahir = $info->tgl_lhr;
            $tanggal_lahir_format = date('d-m-Y', strtotime($tanggal_lahir));
            $row[] = $info->tmpt_lhr . ", " . $tanggal_lahir_format;

            $row[] = $info->alamat . " " . "RT " . $info->rt . "/RW " . $info->rw;
            $row[] = $info->pekerjaan;
            $row[] = $info->pendidikan;

            $aksi = '<a href="' . base_url() . 'admin/penduduk/edit_data_penduduk/' . $info->nik . '" class="btn bg-gradient-primary btn-xs mx-1"><i class="fas fa-pencil-alt"></i></a>';
            $aksi .= '<button type="button" class="btn bg-gradient-warning btn-xs mx-1" data-bs-toggle="modal" data-bs-target="#hapusPenduduk' . $info->nik . '"><i class="fas fa-trash-alt"></i></button>';

            $row[] = $aksi;

            $data[] = $row;
        }


        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Penduduk_model->count_all(),
            "recordsFiltered" => $this->Penduduk_model->count_filtered(),
            "data" => $data,
        );
        echo json_encode($output);
    }

    public function getPekerjaan()
    {
        $searchTerm = $this->input->post('searchTerm');
        $response = $this->Penduduk_model->getPekerjaan($searchTerm);

        echo json_encode($response);
    }
}
