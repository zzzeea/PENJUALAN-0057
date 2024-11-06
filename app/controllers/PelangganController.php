<?php
class PelangganController extends Controller {
    public function index() {
        $data['pelanggan'] = $this->model('Pelanggan')->getAll();
        $data['title'] = 'Daftar Pelanggan'; 
        $this->view('templates/header', $data);
        $this->view('pelanggan/index', $data);
    }

    public function add() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'id_pelanggan' => trim($_POST['id']),  
                'nm_pelanggan' => trim($_POST['nm_pelanggan']),
                'alamat' => trim($_POST['alamat']),
            ];
    
            if (empty($data['id_pelanggan'])) {
                die("ID Pelanggan tidak boleh kosong.");
            }
    
            $this->model('Pelanggan')->insert($data);
            header('Location: ' . BASEURL . '/pelanggan');
            exit;
        }
    
        $data['title'] = 'Tambah Pelanggan';
        $this->view('templates/header', $data);
        $this->view('pelanggan/add');
    }
    
    public function edit($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'nm_pelanggan' => trim($_POST['nm_pelanggan']),
                'alamat' => trim($_POST['alamat']),
            ];
            $this->model('Pelanggan')->update($id, $data);
            header('Location: ' . BASEURL . '/pelanggan');
            exit;
        }

        $data['pelanggan'] = $this->model('Pelanggan')->getById($id);
        $data['title'] = 'Edit Pelanggan';

        if (!$data['pelanggan']) {
            header('Location: ' . BASEURL . '/pelanggan');
            exit;
        }

        $this->view('templates/header', $data);
        $this->view('pelanggan/edit', $data);
    }

    public function delete($id) {
        if ($id) {
            $this->model('Pelanggan')->delete($id);
        }
        header('Location: ' . BASEURL . '/pelanggan');
        exit;
    }
}
