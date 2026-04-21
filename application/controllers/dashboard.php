<?php
defined('BASEPATH') OR exit('NO direct script access allowed');

class dashboard extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data['total_kategori'] = $this->db->count_all('kategori');
        $data['total_buku'] = $this->db->count_all('buku');
        $data['total_anggota'] = $this->db->count_all('anggota');

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('dashboard/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('kategori/tambah'); // kategori : controller | tambah : function pada controller
        $this->load->view('templates/footer');
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
        $this->session->set_flashdata('success', 'Kategori berhasil ditambahkan!');
        redirect('kategori');
    }

    public function hapus($id)
    {
        // cek apakah kategori dipakai di tabel produk
        $this->db->where('kategori_id', $id);
        $cek = $this->db->get('produk')->num_rows();

        if ($cek > 0) {
            // kalau masih dipakai
            $this->session->set_flashdata('error', 'Kategori tidak bisa dihapus karena masih digunakan produk');
        } else {
            // kalau aman
            $this->kategori_model->delete($id);
            $this->session->set_flashdata('success', 'Kategori berhasil dihapus!');
        }
        redirect('kategori');
    }


    public function edit($id)
    {
        $data['kategori'] = $this->kategori_model->get_by_id($id);
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('kategori/edit', $data);
        $this->load->view('templates/footer');
    }

    // =======================
    // SIMPAN UPDATE
    // =======================
    public function update($id)
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'required');
        if($this->form_validation->run()==FALSE){

        }else {
            $data = [
                'nama_kategori' => $this->input->post('nama_kategori')
            ];
            $this->kategori_model->update($id, $data);
            $this->session->set_flashdata('success', 'Kategori berhasil di-update!');
            redirect('kategori'); 
        }
    }
}
?>