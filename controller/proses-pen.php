<?php
include ("function.php");
$db = new database();
$aksi = $_GET['aksi'];

if ($aksi == 'simpan') {
    // Mengambil data dari form
    $nik = $_POST['nik'];
    $nama = $_POST['nama'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $umur = $_POST['umur'];
    $alamat = $_POST['alamat'];
    $no_telp = $_POST['no_telp'];

    // Menyimpan data ip
    $db->simpan_penduduk($nik, $nama, $jenis_kelamin, $umur, $alamat, $no_telp);
    header("Location: ../?page=ip");

} elseif ($aksi == 'hapus') {
    // Menghapus data ip berdasarkan NIK
    $id = $_GET['id'];
    $db->hapus_penduduk($id);
    header("Location: ../?page=ip");

} elseif ($aksi == 'edit') {
    // Mengambil data dari form untuk edit
    $nik = $_POST['nik'];
    $nama = $_POST['nama'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $umur = $_POST['umur'];
    $alamat = $_POST['alamat'];
    $no_telp = $_POST['no_telp'];

    // Mengedit data ip
    $db->edit_penduduk($nik, $nama, $jenis_kelamin, $umur, $alamat, $no_telp);
    header("Location: ../?page=ip");
}
?>
