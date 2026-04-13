<?php
defined('BASEPATH') OR exit('NO direct script access allowed');

class produk_model extends CI_Model {

    private $table = 'produk';

    // =======================
    // TAMPIL SEMUA DATA
    // =======================
    public function get_all()
    {
        $this->db->select('produk.*,kategori.nama_kategori');
        $this->db->from('produk'); 
        $this->db->join('kategori', 'kategori.id = produk.kategori_id');

        return $this->db->get()->result(); // karena sudah pakai join, jadi tidak perlu get($this->table)
    }

    // =======================
    // AMBIL DATA BY ID
    // =======================
    public function get_by_id($id)
    {
        $this->db->where('id', $id);
        return $this->db->get('produk')->row();
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