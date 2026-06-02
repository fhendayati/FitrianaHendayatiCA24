<?php
defined('BASEPATH') OR exit('NO direct script access allowed');

class laporan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('login')){
            redirect('login');
        }
    }

    public function peminjaman()
    {
        $bulan = $this->input->get('bulan');

        $this->db->select('peminjaman.*, anggota.nama_anggota, buku.nama_buku');
        $this->db->from('peminjaman');
        $this->db->join('anggota', 'anggota.id = peminjaman.anggota_id');
        $this->db->join('detail_peminjaman', 'detail_peminjaman.peminjaman_id = peminjaman.id');
        $this->db->join('buku', 'buku.id = detail_peminjaman.buku_id');

        if($bulan){
            $this->db->where('DATE_FORMAT(tanggal_pinjam, "%Y-%m")=', $bulan);
        }
        $data['data'] = $this->db->get()->result();
        $data['bulan'] = $bulan;

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('laporan/peminjaman', $data);
        $this->load->view('templates/footer');
    }

    public function buku()
    {
        $kategori_id = $this->input->get('kategori');

        $this->db->select('buku.*, kategori.nama_kategori');
        $this->db->from('buku');
        $this->db->join('kategori', 'kategori.id = buku.kategori_id');

        if($kategori_id){
            $this->db->where('buku.kategori_id', $kategori_id);
        }
        $data['data'] = $this->db->get()->result();
        $data['kategori'] = $this->db->get('kategori')->result();
        $data['kategori_id'] = $kategori_id;

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('laporan/buku', $data);
        $this->load->view('templates/footer');
    }

        public function cetak_buku()
    {
        $kategori_id = $this->input->get('kategori');

        $this->db->select('buku.*, kategori.nama_kategori');
        $this->db->from('buku');
        $this->db->join('kategori', 'kategori.id = buku.kategori_id');

        if($kategori_id){
            $this->db->where('buku.kategori_id', $kategori_id);
        }
        $data['data'] = $this->db->get()->result();
        $data['kategori'] = $this->db->get('kategori')->result();
        $data['kategori_id'] = $kategori_id;

        $this->load->view('laporan/cetak_buku', $data);
    }
}
?>