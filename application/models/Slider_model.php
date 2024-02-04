<?php
class Slider_model extends CI_Model
{
    public function insert_slider($data)
    {
        $this->db->insert('slider', $data);
        return $this->db->insert_id();
    }

    public function get_sliders()
    {
        $query = $this->db->get('slider');
        return $query->result();
    }

    public function update_slider($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('slider', $data);
        return $this->db->affected_rows();
    }

    public function get_gambar_slider($id)
    {
        $this->db->select('gambar');
        $this->db->where('id', $id);
        $query = $this->db->get('slider');

        if ($query->num_rows() > 0) {
            $row = $query->row();
            return $row->gambar;
        }

        return null;
    }

    public function hapus_slider($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('slider');
        return $this->db->affected_rows();
    }

    public function get_active_sliders()
    {
        $this->db->where('status', 1);
        $query = $this->db->get('slider');

        if ($query->num_rows() > 0) {
            return $query->result();  // Menggunakan result() karena mengembalikan multiple rows
        }

        return array();
    }

    public function update_slider_status($id, $status)
    {
        $data = array('status' => $status);
        $this->db->where('id', $id);
        $this->db->update('slider', $data);
        return $this->db->affected_rows();
    }

    public function get_slider_images()
    {
        $query = $this->db->get('slider');
        return $query->result_array();
    }
}
