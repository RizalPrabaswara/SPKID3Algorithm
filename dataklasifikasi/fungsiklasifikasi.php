<?php
include ("../koneksi.php");

//Edit Data Klasifikasi
    // cek tombol?
    if(isset($_POST['simpan'])){

        // ambil data dari formulir
        $id = $_POST['ID_klasifikasi'];
        $nama = $_POST['Nama_Siswa_HasilKlasifikasi'];
        $hasil = $_POST['Hasil_Klasifikasi'];
        $keterangan = $_POST['Keterangan'];

        // buat query (ID_Siswa, Nama_Siswa, NISN, Jenis_Kelamin, Alamat, Tgl_Lahir, Nama_Orang_Tua, Kondisi) 
        $sql = "UPDATE klasifikasi
        SET Nama_Siswa_HasilKlasifikasi='$nama', Hasil_Klasifikasi='$hasil', Keterangan='$keterangan' WHERE ID_klasifikasi=$id";
        $query = mysqli_query($koneksi, $sql);

        // apakah query simpan berhasil?
        if( $query ) {
            // kalau berhasil alihkan ke halaman index.php dengan status=sukses
            header('Location: indexklasifikasi.php?notifikasi=suksesedit');
        } else {
            // kalau gagal alihkan ke halaman indek.php dengan status=gagal
            header('Location: indexklasifikasi.php?notifikasi=gagaledit');
        }

    } else {
        die("Akses dilarang...");
    }

?>