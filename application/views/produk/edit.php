<div class="container-fluid">

<h2 class="h3 mb-4 text-gray-800">Edit Produk</h2>

<div class="card shadow">
    <div class="card-body">

<form method="post" action="<?= site_url('produk/update/'.$produk->id); ?>">

    <!-- ID (hidden) -->
    <input type="hidden" name="id" value="<?= $produk->id ?>">

    <!-- Nama Produk -->
    <div class="form-group">
        <label>Nama Produk</label>
        <input type="text" name="nama_produk" 
               value="<?= $produk->nama_produk ?>" 
               class="form-control" required>
    </div>

    <!-- Harga -->
    <div class="form-group">
        <label>Harga</label>
        <input type="number" name="harga" 
               value="<?= $produk->harga ?>" 
               class="form-control" required>
    </div>

    <!-- Dropdown Kategori -->
    <div class="form-group">
        <label>Kategori</label>
        <select name="kategori_id" class="form-control" required>

            <option value="">-- Pilih Kategori --</option>

            <?php foreach ($kategori as $k): ?>
                <option value="<?= $k->id ?>"
                    <?= ($k->id == $produk->kategori_id) ? 'selected' : '' ?>>
                    
                    <?= $k->nama_kategori ?>
                    
                </option>
            <?php endforeach; ?>

        </select>
    </div>

    <!-- Tombol -->
    <button type="submit" class="btn btn-primary">Update</button>
    <a href="<?= site_url('produk'); ?>" class="btn btn-secondary">Kembali</a>

</form>

    </div>
</div>

</div>