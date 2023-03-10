<?php

include("../koneksi.php");

if( isset($_GET['id']) ){

    // ambil id dari query string
    $id = $_GET['id'];

    // buat query hapus
    $sql = "DELETE FROM rule WHERE ID_Rule=$id";
    $query = mysqli_query($koneksi, $sql);

    // apakah query hapus berhasil?
    if( $query ){
        header('Location: indexrule.php?notifikasi=hapusberhasil');
    } else {
        header('Location: indexrule.php?notifikasi=hapus');
    }

} else {
    die("akses dilarang...");
}

?>