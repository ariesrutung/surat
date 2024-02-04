<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('id_user') == FALSE) {
            redirect(base_url("admin/auth/login"));
        }
    }

    public function index()
    {

        $judul = [
            'title' => 'Management User',
            'sub_title' => ''
        ];

        $data['data'] = $this->db->get('user')->result_array();
        $this->load->view('backend/template/header', $judul);
        $this->load->view('backend/user/index', $data);
        $this->load->view('backend/template/footer');
    }

    public function hapus($id)
    {
        $this->db->where(['id_user' => $id]);
        $this->db->delete('user');
        $this->session->set_flashdata('success', 'Berhasil Dihapus!');
        redirect(base_url('admin/user'));
    }

    public function tambah()
    {
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required|min_length[8]|trim|is_unique[user.username]');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[8]|matches[password2]');
        $this->form_validation->set_rules('password2', 'Password2', 'required|trim|min_length[8]|matches[password]');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|trim');
        $this->form_validation->set_rules('level', 'Hak Akses', 'required');
        $this->form_validation->set_rules('no_hp', 'Nomor HP', 'required');
        $this->form_validation->set_rules('address', 'Alamat', 'required');

        if ($this->form_validation->run() == FALSE) {
            $judul = [
                'title' => 'Management User',
                'sub_title' => 'Surat Masuk'
            ];
            $this->load->view('backend/template/header', $judul);
            $this->load->view('backend/user/tambah_user');
            $this->load->view('backend/template/footer');
        } else {
            $name = $this->input->post("name", TRUE);
            $username = $this->input->post("username", TRUE);
            $email = $this->input->post("email", TRUE);
            $no_hp = $this->input->post("no_hp", TRUE);
            $address = $this->input->post("address", TRUE);
            $password = $this->input->post("password", TRUE);
            $level = $this->input->post("level", TRUE);

            $config['upload_path'] = './uploads/profil_pengelola';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $this->load->library('upload', $config);

            if ($this->upload->do_upload('gambar')) {
                $data = array('upload_data' => $this->upload->data());
                $gambar = $data['upload_data']['file_name'];

                $save = [
                    'name' => $name,
                    'username' => $username,
                    'email' => $email,
                    'no_hp' => $no_hp,
                    'address' => $address,
                    'password' => $password,
                    'level' => $level,
                    'gambar' => $gambar,
                ];

                $this->db->insert('user', $save);

                $this->session->set_flashdata('success', 'User Berhasil Ditambah!');
                redirect(base_url('admin/user'));
            }
        }
    }


    public function edit($id)
    {
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required|min_length[8]|trim|is_unique[user.username]');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[8]|matches[password2]');
        $this->form_validation->set_rules('password2', 'Password2', 'required|trim|min_length[8]|matches[password]');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('level', 'Hak Akses', 'required');
        $this->form_validation->set_rules('no_hp', 'Nomor HP', 'required');
        $this->form_validation->set_rules('address', 'Alamat', 'required');

        if ($this->form_validation->run() == FALSE) {
            $judul = [
                'title' => 'Management User',
                'sub_title' => 'Surat Masuk'
            ];
            $data['user'] = $this->db->get_where('user', ['id_user' => $id])->row_array();

            $this->load->view('backend/template/header', $judul);
            $this->load->view('backend/user/edit_user', $data);
            $this->load->view('backend/template/footer');
        } else {
            $username = $this->input->post("username", TRUE);
            $password = $this->input->post("password", TRUE);
            $level = $this->input->post("level", TRUE);

            $name = $this->input->post("name", TRUE);
            $email = $this->input->post("email", TRUE);
            $no_hp = $this->input->post("no_hp", TRUE);
            $address = $this->input->post("address", TRUE);
            $password = $this->input->post("password", TRUE);
            $level = $this->input->post("level", TRUE);

            $config['upload_path'] = './uploads/profil_pengelola';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $this->load->library('upload', $config);

            if ($this->upload->do_upload('gambar')) {
                $data = array('upload_data' => $this->upload->data());
                $gambar = $data['upload_data']['file_name'];

                $update = [
                    'name' => $name,
                    'username' => $username,
                    'email' => $email,
                    'no_hp' => $no_hp,
                    'address' => $address,
                    'password' => $password,
                    'level' => $level,
                    'gambar' => $gambar,
                ];

                $this->db->where('id_user', $id);
                $this->db->update('user', $update);

                $this->session->set_flashdata('success', 'User Berhasil Update!');
                redirect(base_url('admin/user'));
            }
        }
    }
}
