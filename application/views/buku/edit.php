<div class="container-fluid">

<h2 class="h3 mb-4 text-gray-800">Edit Buku</h2>

<div class="card shadow">
    <div class="card-body">

<form method="post" action="<?= site_url('buku/update/'.$buku->id); ?>">

    <!-- ID (hidden) -->
    <input type="hidden" name="id" value="<?= $buku->id ?>">

    <!-- Nama Buku -->
    <div class="form-group">
        <label>Nama Buku</label>
        <input type="text" name="nama_buku" 
               value="<?= $buku->nama_buku ?>" 
               class="form-control" required>
    </div>

    <!-- Dropdown Kategori -->
    <div class="form-group">
        <label>Kategori</label>
        <select name="kategori_id" class="form-control" required>

            <option value="">-- Pilih Kategori --</option>

            <?php foreach ($kategori as $k): ?>
                <option value="<?= $k->id ?>"
                    <?= ($k->id == $buku->kategori_id) ? 'selected' : '' ?>>
                    
                    <?= $k->nama_kategori ?>
                    
                </option>
            <?php endforeach; ?>

        </select>
    </div>

    <!-- Tombol -->
    <button type="submit" class="btn btn-primary">Update</button>
    <a href="<?= site_url('buku'); ?>" class="btn btn-secondary">Kembali</a>

</form>

    </div>
</div>

</div>