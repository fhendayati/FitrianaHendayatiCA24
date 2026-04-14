<?php
defined('BASEPATH') OR exit('NO direct script access allowed');

class anggota extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('anggota_model');
    }

    // =======================
    // TAMPIL DATA
    // =======================
    public function index()
    {
        $data['anggota'] = $this->anggota_model->get_all();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('anggota/index', $data);
        $this->load->view('templates/footer');
    }

    // =======================
    // TAMBAH DATA
    // =======================
    public function tambah()
    {
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('anggota/tambah');
        $this->load->view('templates/footer');
    }

    // =======================
    // SIMPAN
    // =======================
    public function simpan()
    {
        $data = [
            'nomor_anggota' => $this->input->post('nomor_anggota'),
            'nama_anggota' => $this->input->post('nama_anggota'),
            'alamat' => $this->input->post('alamat'),
            'telp_anggota' => $this->input->post('telp_anggota'),
            'email' => $this->input->post('email'),
            'tanggal_daftar' => $this->input->post('tanggal_daftar')
        ];

        $this->anggota_model->insert($data);
        $this->session->set_flashdata('success', 'Anggota berhasil ditambahkan!');
        redirect('anggota');
    }

    // =======================
    // EDIT DATA
    // =======================
    public function edit($id)
    {
        $data['anggota'] = $this->anggota_model->get_by_id($id);
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('anggota/edit', $data);
        $this->load->view('templates/footer');
    }

    // =======================
    // SIMPAN UPDATE
    // =======================
    public function update($id)
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nomor_anggota', 'Nomor Anggota', 'required');
        $this->form_validation->set_rules('nama_anggota', 'Nama Anggota', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('telp_anggota', 'Telepon', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('tanggal_daftar', 'Tanggal Daftar', 'required');

        if($this->form_validation->run()==FALSE){

        }else {
            $data = [
                'nomor_anggota' => $this->input->post('nomor_anggota'),
                'nama_anggota' => $this->input->post('nama_anggota'),
                'alamat' => $this->input->post('alamat'),
                'telp_anggota' => $this->input->post('telp_anggota'),
                'email' => $this->input->post('email'),
                'tanggal_daftar' => $this->input->post('tanggal_daftar')

            ];
            $this->anggota_model->update($id, $data);
            $this->session->set_flashdata('success', 'Anggota berhasil di-update!');
            redirect('anggota'); 
        }
    }

    // =======================
    // HAPUS DATA
    // =======================
    public function hapus($id)
    {
        $this->anggota_model->delete($id);
        $this->session->set_flashdata('success', "Anggota berhasil dihapus!");
        redirect('anggota');
    }

}
?>