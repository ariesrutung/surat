<?php

class Galeri_model extends CI_Model
{

    public function getProfil()
    {
        return $this->db->get('gallery')->row();
    }

    public function updateProfil($data)
    {
        $this->db->where('id', 1); // Sesuaikan dengan kondisi tertentu, jika perlu
        $this->db->update('gallery', $data);
    }

    public function update_alur_surat_masuk($data)
    {
        $this->db->where('id', 1); // Sesuaikan dengan kondisi tertentu, jika perlu
        $this->db->update('gallery', $data);
    }

    public function updateSuratKeluar($data)
    {
        $this->db->where('id', 1); // Sesuaikan dengan kondisi tertentu, jika perlu
        $this->db->update('gallery', $data);
    }
}
