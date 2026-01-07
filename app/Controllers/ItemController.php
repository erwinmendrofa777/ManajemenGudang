<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ItemModel;
use App\Entities\Item;

class ItemController extends BaseController
{
    protected $itemModel;

    public function __construct()
    {
        $this->itemModel = new ItemModel();
    }

    // 1. Halaman List Barang
    public function index()
    {
        $data['items'] = $this->itemModel->findAll();
        return view('items/index', $data);
    }

    // 2. Form Tambah Barang
    public function create()
    {
        return view('items/create');
    }

    // 3. Proses Simpan Barang (Create)
    public function store()
    {
        // Validasi Input
        if (!$this->validate([
            'nama_barang' => 'required',
            'sku'         => 'required|is_unique[items.sku]',
            'stok'        => 'required|integer|greater_than_equal_to[0]'
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Simpan Data
        $item = new Item($this->request->getPost());
        $this->itemModel->save($item);

        return redirect()->to('/')->with('success', 'Barang berhasil ditambahkan.');
    }

    // 4. Form Edit Barang
    public function edit($id)
    {
        $data['item'] = $this->itemModel->find($id);
        return view('items/edit', $data);
    }

    // 5. Proses Update Barang
    public function update($id)
    {
        if (!$this->validate([
            'nama_barang' => 'required',
            'sku'         => "required|is_unique[items.sku,id,{$id}]",
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $item = $this->itemModel->find($id);
        $item->fill($this->request->getPost());
        
        $this->itemModel->save($item);

        return redirect()->to('/')->with('success', 'Data barang diperbarui.');
    }

    // 6. Hapus Barang
    public function delete($id)
    {
        $this->itemModel->delete($id);
        return redirect()->to('/')->with('success', 'Barang dihapus.');
    }

    // 7. Form Manajemen Stok (Khusus Tambah/Kurang)
    public function manageStock($id)
    {
        $data['item'] = $this->itemModel->find($id);
        return view('items/stock', $data);
    }

    // 8. Proses Perubahan Stok
    public function updateStock($id)
    {
        $item = $this->itemModel->find($id);
        $type = $this->request->getPost('type');
        $qty  = (int) $this->request->getPost('qty');

        if ($qty <= 0) return redirect()->back()->with('error', 'Jumlah harus lebih dari 0.');

        $stokBaru = $item->stok;

        if ($type === 'masuk') {
            $stokBaru += $qty;
        } elseif ($type === 'keluar') {
            $stokBaru -= $qty;

            // VALIDASI: Stok tidak boleh negatif
            if ($stokBaru < 0) {
                return redirect()->back()->with('error', 'Stok tidak mencukupi!');
            }
        }

        $item->stok = $stokBaru;
        $this->itemModel->save($item);

        return redirect()->to('/')->with('success', 'Stok berhasil diupdate.');
    }
}