<?php
class TransaksiController extends Controller {
    public function index() {
        $data['transaksi'] = $this->model('Transaksi')->getAll();
        $data['title'] = 'Daftar Transaksi';
        $this->view('templates/header', $data);
        $this->view('transaksi/index', $data);
    }

    public function detail($id) {
        $data['transaksi'] = $this->model('Transaksi')->getById($id);
        $data['title'] = 'Detail Pelanggan';
        $this->view('templates/header', $data);
        $this->view('transaksi/detail', $data);
    }

    public function add() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $jumlah = $_POST['jumlah'];
            $kd_barang = $_POST['kd_barang'];

            $harga = $this->model('Transaksi')->getHargaBarang($kd_barang);
            $total_harga = $harga * $jumlah;

            $data = [
                'kd_barang' => $kd_barang,
                'id_pelanggan' => $_POST['id_pelanggan'],
                'tanggal' => $_POST['tanggal'],
                'jumlah' => $jumlah,
                'total_harga' => $total_harga
            ];

            $this->model('Transaksi')->insert($data);
            header('Location: ' . BASEURL . '/transaksi');
            exit;
        }

        $data['barang'] = $this->model('Transaksi')->getBarangList();
        $data['pelanggan'] = $this->model('Transaksi')->getPelangganList();

        $data['title'] = 'Tambah Transaksi';
        $this->view('templates/header', $data);
        $this->view('transaksi/add', $data);
    }
}
