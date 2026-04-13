<?php
defined('BASEPATH') OR exit('NO direct script access allowed');

class kategori_model extends CI_Model {

    private $table = 'kategori';

    // Ambil semua data
    public function get_all() // get_all sama kayak SELECT *
    {
        return $this->db->get($this->table)->result();
    }

    public function get_by_id($id)
    {
        $this->db->where('id', $id);
        return $this->db->get('kategori')->row();
    }

    // Insert (tambah) data
    public function insert($data)
    {
        return $this->db->insert($this->table, $data);
    }

    // Delete (hapus) data
    public function delete($id)
    {
        return $this->db->delete($this->table, ['id' => $id]);
    }

    // Update (edit) data
    public function update($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update($this->table, $data);
    }
}
?>