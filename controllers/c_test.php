<?php
require_once '../models/m_test.php';

class ParkirController {
    private $model;

    public function __construct() {
        $this->model = new ParkirModel();
    }

    public function prosesMasuk($post) {
        $id = $this->model->simpanMasuk($post['plat'], $post['jenis'], $post['area']);
        if ($id) {
            header("Location: cetak_struk.php?id=$id");
        } else {
            echo "Gagal menyimpan data!";
        }
    }

    public function siapkanStruk($id) {
        return $this->model->ambilDetail($id);
    }
}