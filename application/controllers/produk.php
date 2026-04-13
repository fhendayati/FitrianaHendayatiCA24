<?php
defined('BASEPATH') OR exit('NO direct script access allowed');

class produk extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('produk_model');
        $this->load->model('kategori_model'); // untuk dropdown kategori
    }

    // =======================
    // TAMPIL DATA
    // =======================
    public function index()
    {
        $data['produk'] = $this->produk_model->get_all();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('produk/index', $data);
        $this->load->view('templates/footer');
    }

    // =======================
    // TAMBAH DATA
    // =======================
    public function tambah()
    {
        $data['kategori'] = $this->kategori_model->get_all(); // karena mau ngambil data dari kategori model (kalau engga, ga usah)
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('produk/tambah', $data);
        $this->load->view('templates/footer');
    }

    // =======================
    // SIMPAN
    // =======================
    public function simpan()
    {
        $data = [
            'nama_produk' => $this->input->post('nama_produk'),
            'harga' => $this->input->post('harga'),
            'kategori_id' => $this->input->post('kategori_id')
        ];

        $this->produk_model->insert($data);
        $this->session->set_flashdata('success', 'Produk berhasil ditambahkan!');
        redirect('produk');
    }

    // =======================
    // EDIT DATA
    // =======================
    public function edit($id)
    {
        $data['produk'] = $this->produk_model->get_by_id($id);
        $data['kategori'] = $this->kategori_model->get_all();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('produk/edit', $data);
        $this->load->view('templates/footer');
    }

    // =======================
    // SIMPAN UPDATE
    // =======================
    public function update($id)
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nama_produk', 'Nama Produk', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required|numeric');
        $this->form_validation->set_rules('kategori_id', 'Kategori', 'required');

        if($this->form_validation->run()==FALSE){

        }else {
            $data = [
                'nama_produk' => $this->input->post('nama_produk'),
                'harga' => $this->input->post('harga'),
                'kategori_id' => $this->input->post('kategori_id')
            ];
            $this->produk_model->update($id, $data);
            $this->session->set_flashdata('success', 'Produk berhasil di-update!');
            redirect('produk'); 
        }
    }

    // =======================
    // HAPUS DATA
    // =======================
    public function hapus($id)
    {
        $this->produk_model->delete($id);
        $this->session->set_flashdata('success', "Produk berhasil dihapus!");
        redirect('produk');
    }

}
?>