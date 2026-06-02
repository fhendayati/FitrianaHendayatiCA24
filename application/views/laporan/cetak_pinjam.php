<!DOCTYPE html>
<html>
    <head>
        <title>Cetak Laporan Peminjaman</title>
        <style>
            body{font-family: Arial;}
            h3{text-align: center;}
            table{
                width: 100%;
                border-collapse: collapse;
            }
            table, th, td{
                border: 1px solid black;
            }
            th, td{
                padding: 8px;
                text-align: center;
            }

            @media print{
                button{display: none;}
            }
        </style>
    </head>
    
    <h3>LAPORAN PEMINJAMAN</h3>

        <?php if($bulan): ?>
            <p>Bulan    : <?= $bulan; ?></p>
            <?php endif; ?>

        <table class="table table-bordered mt-3">
            <thead>
                <tr align="center">
                    <th>No</th>
                    <th>Kode Peminjaman</th>
                    <th>Nama Anggota</th>
                    <th>Judul Buku</th>
                    <th>Tanggal Pinjam</th>
                    <th>Tanggal Jatuh Tempo</th>
                    <th>Status</th>
                </tr>
            </thead>
        <body>
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

        <br><br>

        <p style="text-align: right;">
            Tangerang, <?= date('d-m-Y'); ?><br><br><br>
            Fitriana Hendayati
        </p>

        <script>
            window.print();
        </script>
    </body>
</html>