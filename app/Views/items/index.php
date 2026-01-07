<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<div class="card shadow">
    <div class="card-header d-flex justify-content-between">
        <h4>Daftar Barang</h4>
        <a href="<?= site_url('items/create') ?>" class="btn btn-primary">Tambah Barang</a>
    </div>
    <div class="card-body">
        <table class="table table-bordered text-center">
            <thead class="">
                <tr>
                    <th>Nama Barang</th>
                    <th>Stock Keeping Unit (SKU)</th>
                    <th>Stok</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($items as $item): ?>
                <tr>
                    <td><?= esc($item->nama_barang) ?></td>
                    <td><?= esc($item->sku) ?></td>
                    <td><strong><?= esc($item->stok) ?></strong></td>
                    <td>
                        <a href="<?= site_url('items/stock/' . $item->id) ?>" class="btn btn-success btn-sm">Atur Stok</a>
                        <a href="<?= site_url('items/edit/' . $item->id) ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="<?= site_url('items/delete/' . $item->id) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus?')">Hapus</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?= $this->endSection() ?>