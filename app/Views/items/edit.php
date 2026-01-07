<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
<div class="card col-md-6 mx-auto">
    <div class="card-header">Edit Barang</div>
    <div class="card-body">
        <form action="<?= site_url('items/update/' . $item->id) ?>" method="post">
            <div class="mb-3">
                <label>Nama Barang</label>
                <input type="text" name="nama_barang" class="form-control" value="<?= esc($item->nama_barang) ?>">
            </div>
            <div class="mb-3">
                <label>Stock Keeping Unit (SKU)</label>
                <input type="text" name="sku" class="form-control" value="<?= esc($item->sku) ?>">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="<?= site_url('/') ?>" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
<?= $this->endSection() ?>