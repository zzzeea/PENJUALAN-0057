<?php
class BarangController extends Controller {
    public function index() {
        $data['title'] = 'Daftar Barang';
        $data['barang'] = $this->model('Barang')->getAll();
        $this->view('templates/header',$data);
        $this->view('barang/index', $data);
    }

    public function add() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'kode' => $_POST['kode'],
                'nama' => $_POST['nama'],
                'harga' => $_POST['harga'],
                'stok' => $_POST['stok']
            ];
            if ($this->model('Barang')->add($data)) {
                header('Location: ' . BASEURL . '/barang');
            }
        }
        $data['title'] = 'Tambah Barang';
        $this->view('templates/header',$data);
        $this->view('barang/add');
    }


    public function edit($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'nama' => trim($_POST['nama']),
                'harga' => trim($_POST['harga']),
                'stok' => trim($_POST['stok']),
            ];
            $this->model('Barang')->update($id, $data);
            header('Location: ' . BASEURL . '/barang');
            exit;
        }

        $data['barang'] = $this->model('Barang')->getById($id);
        $data['title'] = 'Edit Barang';

        if (!$data['barang']) {
            header('Location: ' . BASEURL . '/barang');
            exit;
        }

        $this->view('templates/header', $data);
        $this->view('barang/edit', $data);
    }

    

    public function delete($id) {
        if ($this->model('Barang')->delete($id)) {
            header('Location: ' . BASEURL . '/barang');
            exit;
        } else {
            echo "Gagal menghapus barang.";
        }
    }
}
