<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pegawai extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');

        if ($this->session->userdata('id_user') == FALSE) {
            redirect(base_url("admin/auth/login"));
        }
    }

    public function index()
    {

        $judul = [
            'title' => 'Management Pegawai',
            'sub_title' => ''
        ];

        $data['data'] = $this->db->get('pegawai')->result_array();
        $this->load->view('backend/template/header', $judul);
        $this->load->view('backend/pegawai/index', $data);
        $this->load->view('backend/template/footer');
    }

    public function hapus($id)
    {

        $data = $this->db->get_where('pegawai', ['id_pegawai' => $id])->row_array();

        unlink("./uploads/foto/" . $data['foto']);

        $this->db->where(['id_pegawai' => $id]);
        $this->db->delete('pegawai');
        $this->session->set_flashdata('success', 'Berhasil Dihapus!');
        redirect(base_url('admin/pegawai'));
    }

    public function tambah()
    {

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('nip', 'NIP', 'required|trim');
        $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required|trim');
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
        $this->form_validation->set_rules('no_hp', 'No Hp', 'required|trim');
        $this->form_validation->set_rules('jabatan', 'Jabatan', 'required|trim');
        $this->form_validation->set_rules('pendidikan', 'Pendidikan', 'required|trim');


        if ($this->form_validation->run() == FALSE) {
            $judul = [
                'title' => 'Management User',
                'sub_title' => 'Surat Masuk'
            ];
            $this->load->view('backend/template/header', $judul);
            $this->load->view('backend/pegawai/tambah_data_pegawai');
            $this->load->view('backend/template/footer');
        } else {
            $nama =  $this->input->post("nama", TRUE);
            $nip =  $this->input->post("nip", TRUE);
            $tempat_lahir =  $this->input->post("tempat_lahir", TRUE);
            $tanggal_lahir =  $this->input->post("tanggal_lahir", TRUE);
            $alamat =  $this->input->post("alamat", TRUE);
            $no_hp =  $this->input->post("no_hp", TRUE);
            $jabatan =  $this->input->post("jabatan", TRUE);
            $pendidikan =  $this->input->post("pendidikan", TRUE);

            $config['upload_path']          = './uploads/foto';
            $config['allowed_types']        = 'png|jpg|jpeg';
            $this->load->library('upload', $config);

            if ($this->upload->do_upload('foto')) {

                $data = array('upload_data' => $this->upload->data());
                $foto = $data['upload_data']['file_name'];

                $save = [
                    'nama' => $nama,
                    'nip' => $nip,
                    'tempat_lahir' => $tempat_lahir,
                    'tanggal_lahir' => date('Y-m-d', strtotime($tanggal_lahir)),
                    'alamat' => $alamat,
                    'foto' => $foto,
                    'no_hp' => $no_hp,
                    'jabatan' => $jabatan,
                    'pendidikan' => $pendidikan

                ];

                $this->db->insert('pegawai', $save);
                $this->session->set_flashdata('success', 'Berhasil Ditambahkan!');
                redirect(base_url("admin/pegawai"));
            }
        }
    }

    public function edit($id)
    {

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('nip', 'NIP', 'required|trim');
        $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required|trim');
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
        $this->form_validation->set_rules('no_hp', 'No Hp', 'required|trim');
        $this->form_validation->set_rules('jabatan', 'Jabatan', 'required|trim');
        $this->form_validation->set_rules('pendidikan', 'Pendidikan', 'required|trim');


        if ($this->form_validation->run() == FALSE) {
            $judul = [
                'title' => 'Management User',
                'sub_title' => 'Surat Masuk'
            ];

            $data['pegawai'] = $this->db->get_where('pegawai', ['id_pegawai' => $id])->row_array();
            $this->load->view('backend/template/header', $judul);
            $this->load->view('backend/pegawai/edit_data_pegawai', $data);
            $this->load->view('backend/template/footer');
        } else {

            $nama =  $this->input->post("nama", TRUE);
            $nip =  $this->input->post("nip", TRUE);
            $tempat_lahir =  $this->input->post("tempat_lahir", TRUE);
            $tanggal_lahir =  $this->input->post("tanggal_lahir", TRUE);
            $alamat =  $this->input->post("alamat", TRUE);
            $no_hp =  $this->input->post("no_hp", TRUE);
            $jabatan =  $this->input->post("jabatan", TRUE);
            $pendidikan =  $this->input->post("pendidikan", TRUE);

            $config['upload_path']          = './uploads/foto';
            $config['allowed_types']        = 'png|jpg|jpeg';
            $this->load->library('upload', $config);

            if ($this->upload->do_upload('foto')) {
                $data = $this->db->get_where('pegawai', ['id_pegawai' => $id])->row_array();
                unlink("./uploads/foto/" . $data['foto']);

                $data = array('upload_data' => $this->upload->data());
                $foto = $data['upload_data']['file_name'];

                $update = [
                    'nama' => $nama,
                    'nip' => $nip,
                    'tempat_lahir' => $tempat_lahir,
                    'tanggal_lahir' => date('Y-m-d', strtotime($tanggal_lahir)),
                    'alamat' => $alamat,
                    'foto' => $foto,
                    'no_hp' => $no_hp,
                    'jabatan' => $jabatan,
                    'pendidikan' => $pendidikan

                ];

                $this->db->where('id_pegawai', $id);
                $this->db->update('pegawai', $update);

                $this->session->set_flashdata('success', 'Berhasil Diupdate!');
                redirect(base_url("admin/pegawai"));
            } else {
                $update = [
                    'nama' => $nama,
                    'nip' => $nip,
                    'tempat_lahir' => $tempat_lahir,
                    'tanggal_lahir' => date('Y-m-d', strtotime($tanggal_lahir)),
                    'alamat' => $alamat,
                    'no_hp' => $no_hp,
                    'jabatan' => $jabatan,
                    'pendidikan' => $pendidikan

                ];

                $this->db->where('id_pegawai', $id);
                $this->db->update('pegawai', $update);

                $this->session->set_flashdata('success', 'Berhasil Diupdate!');
                redirect(base_url("admin/pegawai"));
            }
        }
    }
}
