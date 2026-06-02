<div class="container-fluid">

<h2 class="h3 mb-4 text-gray-800">Data Buku</h2>

<a href="<?= site_url('buku/tambah'); ?>" class="btn btn-primary mb-3">Tambah</a>

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
            <th>Kode Buku</th>
            <th>Judul Buku</th>
            <th>Penulis</th>
            <th>Stok</th>
            <th>Kategori</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>

    <tbody>
        <?php $no = 1; foreach ($buku as $b): ?>
        <tr>
            <td align="center"><?= $no++; ?></td>
            <td align="center"><?= $b->kode_buku; ?></td>
            <td><?= $b->nama_buku; ?></td>
            <td><?= $b->penulis; ?></td>
            <td align="center"><?= $b->stok; ?></td>
            <td align="center"><?= $b->nama_kategori; ?></td>
            <td align="center">
                <?php if($b->stok > 0): ?>
                    <span class="badge badge-success">Tersedia</span>
                <?php else: ?>
                    <span class="badge badge-danger">Tidak Tersedia</span>
                <?php endif; ?>
            </td>
            <td align="center">
                <a href="<?= site_url('buku/edit/'.$b->id); ?>" class="btn btn-warning btn-sm">Edit</a>
                <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapusModal<?= $b->id ?>">Hapus</button>
            </td>
        </tr>

        <!-- Modal Hapus -->
        <div class="modal fade" id="hapusModal<?= $b->id ?>" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Konfirmasi Hapus</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">
                Yakin mau hapus buku <b><?= $b->nama_buku ?></b>?
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    Batal
                </button>

                <a href="<?= site_url('buku/hapus/'.$b->id); ?>" 
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