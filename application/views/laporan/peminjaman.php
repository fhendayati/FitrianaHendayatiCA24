<div class="container-fluid">
    <h3 class="h3 mb-4 text-gray-800">Laporan Peminjaman</h3>
    <form method="get">
        <input type="month" name="bulan" value="<?= $bulan; ?>">
        <button type="submit" class="btn btn-primary btn-sm">Filter</button>
        <a href="<?= site_url('laporan/peminjaman'); ?>" class="btn btn-secondary btn-sm">Reset</a>
    </form>

    <br>
    <a href="<?= site_url('peminjaman/cetak_peminjaman?bulan='. $bulan); ?>" target="_blank" class="btn btn-success btn-sm">Cetak PDF</a>

    <table class="table table-bordered mt-3">
    <tr align="center">
        <th>No</th>
        <th>Kode Peminjaman</th>
        <th>Nama Anggota</th>
        <th>Judul Buku</th>
        <th>Tanggal Pinjam</th>
        <th>Tanggal Jatuh Tempo</th>
        <th>Status</th>
    </tr>
    <tbody>
    <?php $no=1; foreach($data as $d): ?> 
    <tr>
        <td align="center"><?= $no++; ?></td>
        <td align="center"><?= $d->kode_peminjaman; ?></td>
        <td><?= $d->nama_anggota; ?></td>
        <td><?= $d->nama_buku; ?></td>
        <td align="center"><?= $d->tanggal_pinjam; ?></td>
        <td align="center"><?= $d->tanggal_jatuh_tempo; ?></td>
        <td><?= $d->status; ?></td>
    </tr>
    <?php endforeach; ?>
    </table>
</div>