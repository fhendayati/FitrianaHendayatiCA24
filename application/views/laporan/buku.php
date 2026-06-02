<div class="container-fluid">

    <h3 class="h3 mb-4 text-gray-800">
        Laporan Data Buku
    </h3>

    <form method="get">

        <div class="row mb-3">

            <div class="col-md-4">
                <select name="kategori" class="form-control">

                    <option value="">
                        -- Semua Kategori --
                    </option>

                    <?php foreach($kategori as $k): ?>

                    <option value="<?= $k->id; ?>"
                        <?= ($kategori_id == $k->id) ? 'selected' : ''; ?>>

                        <?= $k->nama_kategori; ?>

                    </option>

                    <?php endforeach; ?>

                </select>
            </div>

            <div class="col-md-8">

                <button type="submit"
                    class="btn btn-primary btn-sm">

                    Filter
                </button>

                <a href="<?= site_url('laporan/buku'); ?>"
                    class="btn btn-secondary btn-sm">

                    Reset
                </a>

                <a href="<?= site_url('laporan/cetak_buku?kategori='.$kategori_id); ?>"
                    target="_blank"
                    class="btn btn-success btn-sm">

                    Cetak PDF
                </a>

            </div>

        </div>

    </form>

    <table class="table table-bordered">

        <tr align="center">
            <th>No</th>
            <th>Kode</th>
            <th>Judul</th>
            <th>Kategori</th>
            <th>Stok</th>
        </tr>

        <?php $no=1; foreach($data as $d): ?>

        <tr>
            <td><?= $no++; ?></td>
            <td><?= $d->kode_buku; ?></td>
            <td><?= $d->nama_buku; ?></td>
            <td><?= $d->nama_kategori; ?></td>
            <td><?= $d->stok; ?></td>
        </tr>

        <?php endforeach; ?>

    </table>

</div>