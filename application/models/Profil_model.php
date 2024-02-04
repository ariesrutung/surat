<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profil_model extends CI_Model
{
    public function get_profil()
    {
        return $this->db->get('profil')->result();
    }

    public function tambah_profil($data)
    {
        $this->db->insert('profil', $data);
        return $this->db->insert_id();
    }
}
