<div class="container-fluid">

<h2 class="h3 mb-4 text-gray-800">Data Anggota</h2>

<a href="<?= site_url('anggota/tambah'); ?>" class="btn btn-primary mb-3">Tambah</a>

<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">

<?php if ($this->session->flashdata('success')): ?>
    <div class="alert alert-success alert-dismissible fade show">
        <?= $this->session->flashdata('success'); ?>
        <button type="button" class="close" data-dismiss="alert">&times;</button>
    </div>
<?php endif; ?>

<table class="table table-bordered" width="100%" cellspacing="0" id="dataTable">
    <thead>
        <tr align="center">
            <th>No</th>
            <th>Nomor Anggota</th>
            <th>Nama Anggota</th>
            <th>Alamat</th>
            <th>Telepon</th>
            <th>Email</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>

    <tbody>
        <?php $no = 1; foreach ($anggota as $a): ?>
        <tr>
            <td align="center"><?= $no++; ?></td>
            <td align="center"><?= $a->nomor_anggota; ?></td>
            <td><?= $a->nama_anggota; ?></td>
            <td><?= $a->alamat; ?></td>
            <td align="center"><?= $a->telp_anggota; ?></td>
            <td><?= $a->email; ?></td>
            <td align="center">
                <?php
                    $tgl_daftar = strtotime($a->tanggal_daftar);
                    $sekarang = time();

                    // 1 tahun = 365 hari
                    if (($sekarang - $tgl_daftar) <= (365 * 24 * 60 * 60)) {
                        echo '<span class="badge badge-success">Aktif</span>';
                    } else {
                        echo '<span class="badge badge-danger">Tidak Aktif</span>';
                    }
                ?>
            </td>
            <td align="center">
                <a href="<?= site_url('anggota/edit/'.$a->id); ?>" class="btn btn-warning btn-sm">Edit</a>
                <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapusModal<?= $a->id ?>">Hapus</button>
            </td>
        </tr>

        <!-- Modal Hapus -->
        <div class="modal fade" id="hapusModal<?= $a->id ?>" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Konfirmasi Hapus</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">
                Yakin mau hapus anggota <b><?= $a->nama_anggota ?></b>?
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    Batal
                </button>

                <a href="<?= site_url('anggota/hapus/'.$a->id); ?>" 
                class="btn btn-danger">
                Hapus
                </a>
            </div>

            </div>
        </div>
        </div>

        <?php endforeach; ?>
    </tbody>
</table>

        </div>
    </div>
</div>

</div>