<?php
defined('BASEPATH') OR exit('NO direct script access allowed');

class kategori extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('kategori_model');
    }

    public function index()
    {
        $data['kategori'] = $this->kategori_model->get_all();
        $this->load->view('kategori/index', $data);
    }

    public function tambah()
    {
        $this->load->view('kategori/tambah');
    }

    // =======================
    // SIMPAN
    // =======================
    public function simpan()
    {
        $data = [
            'nama_kategori' => $this->input->post('nama_kategori')
        ];

        $this->kategori_model->insert($data);
        redirect('kategori');
    }
}
?>