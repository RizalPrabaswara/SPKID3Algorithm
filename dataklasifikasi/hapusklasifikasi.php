<?php
include ("../koneksi.php");
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

if( isset($_GET['id']) ){

    // ambil id dari query string
    $id = $_GET['id'];

    // buat query hapus
    $sql = "DELETE FROM klasifikasi WHERE ID_Klasifikasi=$id";
    $query = mysqli_query($koneksi, $sql);

    // apakah query hapus berhasil?
    if( $query ){
        header('Location: indexklasifikasi.php?notifikasi=hapusberhasil');
    } else {
        header('Location: indexklasifikasi.php?notifikasi=hapus');
    }

} else {
    die("akses dilarang...");
}
?>