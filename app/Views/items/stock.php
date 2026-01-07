<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
<div class="card col-md-6 mx-auto">
    <div class="card-header">Kelola Stok: <strong><?= esc($item->nama_barang) ?></strong></div>
    <div class="card-body">
        <div class="alert alert-info">Stok Saat Ini: <strong><?= esc($item->stok) ?></strong></div>
        <form action="<?= site_url('items/stock-update/' . $item->id) ?>" method="post">
            <div class="mb-3">
                <label>Aksi</label>
                <select name="type" class="form-select">
                    <option value="masuk">Barang Masuk (+)</option>
                    <option value="keluar">Barang Keluar (-)</option>
                </select>
            </div>
            <div class="mb-3">
                <label>Jumlah</label>
                <input type="number" name="qty" class="form-control" min="1" required>
            </div>
            <button type="submit" class="btn btn-success">Proses Stok</button>
            <a href="<?= site_url('/') ?>" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
<?= $this->endSection() ?>