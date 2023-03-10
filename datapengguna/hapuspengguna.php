<?php

include("../koneksi.php");

if( isset($_GET['id']) ){

    // ambil id dari query string
    $id = $_GET['id'];

    // buat query hapus
    $sql = "DELETE FROM pengguna WHERE ID_Pengguna=$id";
    $query = mysqli_query($koneksi, $sql);

    // apakah query hapus berhasil?
    if( $query ){
        header('Location: indexpengguna.php?notifikasi=hapusberhasil');
    } else {
        header('Location: indexpengguna.php?notifikasi=hapus');
    }

} else {
    die("akses dilarang...");
}

?>
