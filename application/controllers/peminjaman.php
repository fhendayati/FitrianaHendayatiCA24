<?php
defined('BASEPATH') OR exit('NO direct script access allowed');

class peminjaman extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('login')){
            redirect('login');
        }
        $this->load->model('peminjaman_model');
    }

    public function index()
    {
        $data['data'] = $this->peminjaman_model->get_all();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('peminjaman/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $batas = date('Y-m-d', strtotime('-1 year'));
        $data['anggota'] = $this->db->where('tanggal_daftar >=', $batas)->get('anggota')->result();
        $data['buku'] = $this->db->get('buku')->result();

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('peminjaman/tambah', $data);
        $this->load->view('templates/footer');
    }

    public function simpan()
    {
        $data = [
            'kode_peminjaman' => uniqid('PMJ-'),
            'anggota_id' => $this->input->post('anggota_id'),
            'tanggal_pinjam' => date('Y-m-d'),
            'tanggal_jatuh_tempo' => $this->input->post('tanggal_jatuh_tempo'),
            'status' => 'dipinjam',
            'user_id' => $this->session->userdata('id_user')
        ];
        $buku_id = $this->input->post('buku_id');

        $this->peminjaman_model->insert($data, $buku_id);
        $this->session->set_flashdata('success', 'Peminjaman Baru berhasil ditambahkan!');
        redirect('peminjaman');
    }

    public function kembali($id)
    {
        $this->peminjaman_model->pengembalian($id);
        $this->session->set_flashdata('success', 'Peminjaman sudah dikembalikan!');
        redirect('peminjaman');
    }

    public function cetak_peminjaman()
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

        $this->load->view('laporan/cetak_pinjam', $data);
    }
}
?>