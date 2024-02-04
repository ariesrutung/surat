<?php

class Portofolio_model extends CI_Model
{

    function get_all($limit = NULL)
    {
        if ($limit == NULL) {
            $query = $this->db->get('portofolio');
        } else {
            $query = $this->db->query("SELECT * FROM portofolio ORDER BY id LIMIT $limit");
        }
        return $query->result_array();
    }

    function add($data)
    {
        $this->db->insert('portofolio', $data);
        return TRUE;
    }

    function edit($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('portofolio', $data);
        return TRUE;
    }

    public function hapus_portofolio($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('portofolio');
        return $this->db->affected_rows();
    }

    public function get_gambar_portofolio($id)
    {
        $this->db->select('gambar');
        $this->db->where('id', $id);
        $query = $this->db->get('portofolio');

        if ($query->num_rows() > 0) {
            $row = $query->row();
            return $row->gambar;
        }

        return null;
    }

    var $table = 'portofolio';
    var $column_order = array('id', 'judul', 'kategori', 'gambar');
    var $column_search = array('id', 'judul', 'kategori', 'gambar');
    var $order = array('id' => 'asc');

    private function _get_datatables_query()
    {
        $this->db->from($this->table);

        $i = 0;
        foreach ($this->column_search as $item) {
            if ($_POST['search']['value']) {
                if ($i === 0) {
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
                if (count($this->column_search) - 1 == $i) {
                    $this->db->group_end();
                }
            }
            $i++;
        }

        if (isset($_POST['order'])) {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables()
    {
        $this->_get_datatables_query();
        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }
}
