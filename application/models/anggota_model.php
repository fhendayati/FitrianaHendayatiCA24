<?php
defined('BASEPATH') OR exit('NO direct script access allowed');

class anggota_model extends CI_Model {

    private $table = 'anggota';

    // =======================
    // TAMPIL SEMUA DATA
    // =======================
    public function get_all()
    {
        $this->db->order_by('nomor_anggota', 'ASC');
        return $this->db->get('anggota')->result();
    }

    // =======================
    // AMBIL DATA BY ID
    // =======================
    public function get_by_id($id)
    {
        $this->db->where('id', $id);
        return $this->db->get('anggota')->row();
    }

    // =======================
    // INSERT (TAMBAH) DATA
    // =======================
    public function insert($data)
    {
        return $this->db->insert($this->table, $data);
    }

    // =======================
    // UPDATE (EDIT) DATA
    // =======================
    public function update($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update($this->table, $data);
    }

    // =======================
    // DELETE (HAPUS) DATA
    // =======================
    public function delete($id)
    {
        return $this->db->delete($this->table, ['id' => $id]);
    }
}
?>