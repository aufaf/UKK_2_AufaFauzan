<?php
require_once "../models/m_parkir.php";

$m = new m_parkir();


try{

    if(isset($_POST['simpan'])){

        $plat  = $_POST['plat'];
        $jenis = $_POST['jenis'];
        $area  = $_POST['area'];

        // simpan & ambil id transaksi
        $id_parkir = $m->parkirMasuk($plat,$jenis,$area);

        // arahkan ke struk
        header("Location: ../views/cetak_struk.php?id=".$id_parkir);
        exit;
    }else{
     // memanggil fungsi tampil data yang ada pada kelas m_user
        $parkirs = $parkir -> tampil_parkir();
}
}catch(Exception $e){
    echo $e->getMessage();
}

?>
