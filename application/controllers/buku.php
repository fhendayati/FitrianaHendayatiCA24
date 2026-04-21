<?php
defined('BASEPATH') OR exit('NO direct script access allowed');

class buku extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('buku_model');
        $this->load->model('kategori_model'); // untuk dropdown kategori
    }

    // =======================
    // TAMPIL DATA
    // =======================
    public function index()
    {
        $data['buku'] = $this->buku_model->get_all();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('buku/index', $data);
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
        $this->load->view('buku/tambah', $data);
        $this->load->view('templates/footer');
    }

    // =======================
    // SIMPAN
    // =======================
    public function simpan()
    {
        $data = [
            'nama_buku' => $this->input->post('nama_buku'),
            'kategori_id' => $this->input->post('kategori_id')
        ];

        $this->buku_model->insert($data);
        $this->session->set_flashdata('success', 'Buku berhasil ditambahkan!');
        redirect('buku');
    }

    // =======================
    // EDIT DATA
    // =======================
    public function edit($id)
    {
        $data['buku'] = $this->buku_model->get_by_id($id);
        $data['kategori'] = $this->kategori_model->get_all();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('buku/edit', $data);
        $this->load->view('templates/footer');
    }

    // =======================
    // SIMPAN UPDATE
    // =======================
    public function update($id)
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nama_buku', 'Nama Buku', 'required');
        $this->form_validation->set_rules('kategori_id', 'Kategori', 'required');

        if($this->form_validation->run()==FALSE){

        }else {
            $data = [
                'nama_buku' => $this->input->post('nama_buku'),
                'kategori_id' => $this->input->post('kategori_id')
            ];
            $this->buku_model->update($id, $data);
            $this->session->set_flashdata('success', 'Buku berhasil di-update!');
            redirect('buku'); 
        }
    }

    // =======================
    // HAPUS DATA
    // =======================
    public function hapus($id)
    {
        $this->buku_model->delete($id);
        $this->session->set_flashdata('success', "Buku berhasil dihapus!");
        redirect('buku');
    }

}
?>