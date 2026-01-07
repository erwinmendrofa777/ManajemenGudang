<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
<div class="card col-md-6 mx-auto">
    <div class="card-header">Tambah Barang</div>
    <div class="card-body">
        <form action="<?= site_url('items/store') ?>" method="post">
            <div class="mb-3">
                <label>Nama Barang</label>
                <input type="text" name="nama_barang" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Stock Keeping Unit (SKU)</label>
                <input type="text" name="sku" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Stok Awal</label>
                <input type="number" name="stok" class="form-control" value="0" min="1">
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="<?= site_url('/') ?>" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
<?= $this->endSection() ?>