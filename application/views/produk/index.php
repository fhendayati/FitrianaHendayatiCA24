<div class="container-fluid">

<h2 class="h3 mb-4 text-gray-800">Data Produk</h2>

<a href="<?= site_url('produk/tambah'); ?>" class="btn btn-primary mb-3">Tambah</a>

<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">

<table class="table table-bordered" width="100%" cellspasing="0" id="dataTable">
    <thead>
        <tr align="center">
            <th>No</th>
            <th>Nama Produk</th>
            <th>Harga (Rp)</th>
            <th>Kategori</th>
            <th>Aksi</th>
        </tr>
    </thead>

    <tbody>
        <?php $no = 1; foreach ($produk as $p): ?>
        <tr>
            <td align="center"><?= $no++; ?></td>
            <td><?= $p->nama_produk; ?></td>
            <td align="right"><?= number_format($p->harga); ?></td>
            <td align="center"><?= $p->nama_kategori; ?></td>

            <td align="center">
                <a href="<?= site_url('produk/edit/'.$p->id); ?>" class="btn btn-warning btn-sm">Edit</a>
                <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapusModal<?= $p->id ?>">Hapus</button>
            </td>
        </tr>

        <!-- Modal Hapus -->
        <div class="modal fade" id="hapusModal<?= $p->id ?>" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Konfirmasi Hapus</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">
                Yakin mau hapus produk <b><?= $p->nama_produk ?></b>?
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    Batal
                </button>

                <a href="<?= site_url('produk/hapus/'.$p->id); ?>" 
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