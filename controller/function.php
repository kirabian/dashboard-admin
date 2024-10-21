<?php
class database {
    var $host = "localhost";
    var $uname = "root";
    var $pass = "";
    var $db = "aduancepat";
    var $koneksi;

    function __construct(){
        $this->koneksi = mysqli_connect($this->host, $this->uname, $this->pass, $this->db);
        if (mysqli_connect_errno()) {
            echo "Koneksi database gagal : " . mysqli_connect_error();
        }
    }

    // ini siswa
    function tampil_data_penduduk(){
        $data = mysqli_query($this->koneksi, "SELECT * FROM `penduduk`");
        $hasil = [];
        while($row = mysqli_fetch_assoc($data)){
            $hasil[] = $row;
        }
        return $hasil;
    }

    function simpan_penduduk($nik, $nama, $jenis_kelamin, $umur, $alamat, $no_telp) {
        $query = "INSERT INTO `penduduk` (nik, nama, jenis_kelamin, umur, alamat, no_telp) VALUES ('$nik', '$nama', '$jenis_kelamin', '$umur', '$alamat', '$no_telp')";
        mysqli_query($this->koneksi, $query);
    }
    
    function hapus_penduduk($id) {
        $query = "DELETE FROM `penduduk` WHERE id = '$id'";
        mysqli_query($this->koneksi, $query);
    }
    
    function edit_penduduk($nik, $nama, $jenis_kelamin, $umur, $alamat, $no_telp) {
        $query = "UPDATE `penduduk` SET nama='$nama', jenis_kelamin='$jenis_kelamin', umur='$umur', alamat='$alamat', no_telp='$no_telp' WHERE nik='$nik'";
        mysqli_query($this->koneksi, $query);
    }
    

    function tampil_data_siswa_by_nis($nis){
        $data = mysqli_query($this->koneksi, "SELECT * FROM `siswa` WHERE nis = '$nis'");
        $hasil = [];
        while($row = mysqli_fetch_assoc($data)){
            $hasil[] = $row;
        }
        return $hasil;
    }
    // penutup

    // ini kategori
    function tampil_data_kategori(){
        $data = mysqli_query($this->koneksi, "SELECT * FROM `kategori`");
        $hasil = [];
        while($row = mysqli_fetch_assoc($data)){
            $hasil[] = $row;
        }
        return $hasil;
    }

    function simpan_kategori($idk, $nakat){
        $query = "INSERT INTO `kategori` (idk, nakat) VALUES ('$idk', '$nakat')";
        mysqli_query($this->koneksi, $query);
    }

    function hapus_kategori($idk){
        $query = "DELETE FROM `kategori` WHERE idk = '$idk'";
        mysqli_query($this->koneksi, $query);
    }

    function edit_kategori($idk, $nakat){
        $query = "UPDATE `kategori` SET nakat='$nakat' WHERE idk='$idk'";
        mysqli_query($this->koneksi, $query);
    }

    function tampil_data_kategori_by_idk($idk){
        $data = mysqli_query($this->koneksi, "SELECT * FROM `kategori` WHERE idk = '$idk'");
        $hasil = [];
        while($row = mysqli_fetch_assoc($data)){
            $hasil[] = $row;
        }
        return $hasil;
    }
    // penutup

    // ini user
    function tampil_data_user(){
        $data = mysqli_query($this->koneksi, "SELECT * FROM `user`");
        $hasil = [];
        while($row = mysqli_fetch_assoc($data)){
            $hasil[] = $row;
        }
        return $hasil;
    }

    function simpan_user($id, $usn, $psw){
        $query = "INSERT INTO `user` (id, usn, psw) VALUES ('$id', '$usn', '$psw')";
        mysqli_query($this->koneksi, $query);
    }

    function hapus_user($id){
        $query = "DELETE FROM `user` WHERE id = '$id'";
        mysqli_query($this->koneksi, $query);
    }

    function edit_user($id, $usn, $psw){
        $query = "UPDATE `user` SET usn='$usn', psw='$psw' WHERE id='$id'";
        mysqli_query($this->koneksi, $query);
    }

    function tampil_data_user_by_id($id){
        $data = mysqli_query($this->koneksi, "SELECT * FROM `user` WHERE id = '$id'");
        $hasil = [];
        while($row = mysqli_fetch_assoc($data)){
            $hasil[] = $row;
        }
        return $hasil;
    }
    // penutup

    function input_aspirasi_tampil() {
        $data = mysqli_query($this->koneksi, "SELECT input_aspirasi.*, kategori.nakat, aspirasi.feedback, aspirasi.status FROM input_aspirasi INNER JOIN kategori ON input_aspirasi.idk = kategori.idk INNER JOIN aspirasi ON input_aspirasi.id_pelaporan = aspirasi.id_pelaporan");
        $hasil = [];
        
        while ($row = mysqli_fetch_assoc($data)) {
            $hasil[] = $row;
        }
        
        return $hasil;
    }

    // ... kode lainnya ...
}
?>