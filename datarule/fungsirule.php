<?php
include ("../koneksi.php");

//Edit Data Rule
    // cek tombol?
    if(isset($_POST['simpan'])){

        // ambil data dari formulir
        $id = $_POST['ID_Rule'];
        $parent = $_POST['Parent'];
        $akar = $_POST['Akar'];
        $aturan = $_POST['Aturan'];
        $keputusan = $_POST['Keputusan'];

        // buat query (ID_Siswa, Nama_Siswa, NISN, Jenis_Kelamin, Alamat, Tgl_Lahir, Nama_Orang_Tua, Kondisi) 
        $sql = "UPDATE rule
        SET Parent='$parent', Akar='$akar', Aturan='$aturan', Keputusan='$keputusan' WHERE ID_Rule=$id";
        $query = mysqli_query($koneksi, $sql);

        // apakah query simpan berhasil?
        if( $query ) {
            // kalau berhasil alihkan ke halaman index.php dengan status=sukses
            header('Location: indexrule.php?notifikasi=suksesedit');
        } else {
            // kalau gagal alihkan ke halaman indek.php dengan status=gagal
            header('Location: indexrule.php?notifikasi=gagaledit');
        }

    } else {
        die("Akses dilarang...");
    }

?>
