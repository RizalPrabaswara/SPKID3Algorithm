<?php

include("../koneksi.php");

if( isset($_GET['id']) ){

    // ambil id dari query string
    $id = $_GET['id'];

    // buat query hapus
    $sql = "DELETE FROM siswa WHERE ID_Siswa=$id";
    $query = mysqli_query($koneksi, $sql);

    // apakah query hapus berhasil?
    if( $query ){
        header('Location: indexsiswa.php?notifikasi=hapusberhasil');
    } else {
        header('Location: indexsiswa.php?notifikasi=hapus');
    }

} else {
    die("akses dilarang...");
}

?>