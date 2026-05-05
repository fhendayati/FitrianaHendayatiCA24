<div class="container-fluid">

<h2 class="h3 mb-4 text-gray-800">Data Peminjaman</h2>

<a href="<?= site_url('peminjaman/tambah'); ?>" class="btn btn-primary mb-3">Tambah</a>

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
        <th>Kode Peminjaman</th>
        <th>Nama Anggota</th>
        <th>Tanggal Pinjam</th>
        <th>Tanggal Jatuh Tempo</th>
        <th>Status</th>
        <th>Aksi</th>
    </tr>
    </thead>
    <tbody>
    <?php $no=1; foreach($data as $d): ?> 
    <tr>
        <td align="center"><?= $no++; ?></td>
        <td align="center"><?= $d->kode_peminjaman; ?></td>
        <td><?= $d->nama_anggota; ?></td>
        <td align="center"><?= $d->tanggal_pinjam; ?></td>
        <td align="center"><?= $d->tanggal_jatuh_tempo; ?></td>
        <td align="center">
            <?php if($d->status == 'dipinjam'): ?>
                <span class="badge badge-warning">Dipinjam</span>
            <?php else: ?>
                <span class="badge badge-success">Kembali</span>
            <?php endif; ?>
        </td>
        <td align="center">
            <?php if($d->status == 'dipinjam'): ?>
                <!-- Tombol Kembalikan -->
                <button class="btn btn-sm text-white"
                        style="background-color:#4dabf7;"
                        data-toggle="modal"
                        data-target="#kembaliModal<?= $d->id ?>">
                    Kembalikan
                </button>

                <!-- MODAL KEMBALIKAN -->
                <div class="modal fade" id="kembaliModal<?= $d->id ?>" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">

                            <div class="modal-header">
                                <h5 class="modal-title">Konfirmasi Pengembalian</h5>
                                <button type="button" class="close" data-dismiss="modal">
                                    &times;
                                </button>
                            </div>

                            <div class="modal-body text-left">
                                Yakin ingin mengembalikan buku untuk 
                                <b><?= $d->nama_anggota ?></b>?
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                    Batal
                                </button>

                                <a href="<?=site_url('peminjaman/kembali/'.$d->id); ?>"
                                   class="btn btn-primary">
                                    Ya, Kembalikan
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </td>
    </tr>
    <?php endforeach; ?>
    </tbody>
</table>
        </div>
    </div>
</div>
</div>