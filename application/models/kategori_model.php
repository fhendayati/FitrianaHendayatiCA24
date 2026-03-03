<?php
defined('BASEPATH') OR exit('NO direct script access allowed');

class Kategori_model extends CI_Model {

    private $table = 'kategori';

    // Ambil semua data
    public function get_all() // get_all sama kayak SELECT *
    {
        return $this->db->get($this->table)->result();
    }

    // Insert data
    public function insert($data)
    {
        return $this->db->insert($this->table, $data);
    }
}
?>