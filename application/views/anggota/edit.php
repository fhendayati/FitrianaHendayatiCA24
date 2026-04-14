<div class="container-fluid">

<h2 class="h3 mb-4 text-gray-800">Edit Anggota</h2>

<div class="card shadow">
    <div class="card-body">

<form method="post" action="<?= site_url('anggota/update/'.$anggota->id); ?>">

    <!-- ID (hidden) -->
    <input type="hidden" name="id" value="<?= $anggota->id ?>">

    <div class="form-group">
        <label>Nomor Anggota</label>
        <input type="text" 
            value="<?= $anggota->nomor_anggota ?>" 
            class="form-control" readonly>
    </div>

    <input type="hidden" name="nomor_anggota" value="<?= $anggota->nomor_anggota ?>">

    <div class="form-group">
        <label>Nama Anggota</label>
        <input type="text" name="nama_anggota" 
               value="<?= $anggota->nama_anggota ?>" 
               class="form-control" required>
    </div>

    <div class="form-group">
        <label>Alamat</label>
        <textarea name="alamat" class="form-control" required><?= $anggota->alamat ?></textarea>
    </div>

    <div class="form-group">
        <label>Telepon</label>
        <input type="text" name="telp_anggota" 
            value="<?= $anggota->telp_anggota ?>" 
            class="form-control" required>
    </div>

    <div class="form-group">
        <label>Email</label>
        <input type="email" name="email" 
            value="<?= $anggota->email ?>" 
            class="form-control" required>
    </div>

    <div class="form-group">
        <label>Tanggal Daftar</label>
        <input type="date" name="tanggal_daftar" 
            value="<?= $anggota->tanggal_daftar ?>" 
            class="form-control" required>
    </div>

    <!-- Tombol -->
    <button type="submit" class="btn btn-primary">Update</button>
    <a href="<?= site_url('anggota'); ?>" class="btn btn-secondary">Kembali</a>

</form>

    </div>
</div>

</div>