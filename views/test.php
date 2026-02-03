<?php
require_once '../controllers/c_test.php';
if (isset($_POST['submit'])) {
    $ctrl = new ParkirController();
    $ctrl->prosesMasuk($_POST);
}
?>
<form method="POST">
    <h2>Input Parkir Masuk</h2>
    Plat Nomor: <input type="text" name="plat" required><br>
    Jenis: 
    <select name="jenis">
        <option value="mobil">Mobil</option>
        <option value="motor">Motor</option>
    </select><br>
    Area: <input type="number" name="area" value="1"><br>
    <button type="submit" name="submit">Masuk & Cetak Struk</button>
</form>