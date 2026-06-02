<!DOCTYPE html>
<html>
<head>
    <title>Cetak Laporan Buku</title>

    <style>
        body{
            font-family: Arial;
        }

        h3{
            text-align: center;
        }

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
            button{
                display: none;
            }
        }
    </style>
</head>

<body>

    <h3>LAPORAN DATA BUKU</h3>
    
    <?php if($kategori_id): ?>
        <p>Kategori : <?= $kategori_id; ?></p>
    <?php endif; ?>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Buku</th>
                <th>Judul Buku</th>
                <th>Kategori</th>
                <th>Stok</th>
            </tr>
        </thead>
        <tbody>
            <?php $no=1; foreach($data as $d): ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $d->kode_buku; ?></td>
                <td><?= $d->nama_buku; ?></td>
                <td><?= $d->nama_kategori; ?></td>
                <td><?= $d->stok; ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
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