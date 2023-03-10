<?php

include("../koneksi.php");

if( isset($_GET['id']) ){

    // ambil id dari query string
    $id = $_GET['id'];

    // buat query hapus
    $sql = "DELETE FROM training WHERE ID_Training=$id";
    $query = mysqli_query($koneksi, $sql);

    // apakah query hapus berhasil?
    if( $query ){
        header('Location: indextraining.php?notifikasi=hapusberhasil');
    } else {
        header('Location: indextraining.php?notifikasi=hapus');
    }

} else {
    die("akses dilarang...");
}

?>