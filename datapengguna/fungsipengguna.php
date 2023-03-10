<?php
include ("../koneksi.php");

//Tambah Data Pengguna
    // cek tombol?
    if(isset($_POST['daftar'])){

        // ambil data dari formulir
        $nama = $_POST['Nama'];
        $nomor = $_POST['Nomor'];
        $jabatan = $_POST['Jabatan'];

        // buat query (ID_Siswa, Nama_Siswa, NISN, Jenis_Kelamin, Alamat, Tgl_Lahir, Nama_Orang_Tua, Kondisi) 
        $sql = "INSERT INTO pengguna
        VALUES (0,'$nama', '$nomor', '$jabatan')";
        $query = mysqli_query($koneksi, $sql);

        // apakah query simpan berhasil?
        if( $query ) {
            $sql1 = "INSERT INTO klasifikasi
            VALUES (0, '$nama', '', '')";
            $query1 = mysqli_query($koneksi, $sql1);
            // kalau berhasil alihkan ke halaman index.php dengan status=sukses
            header('Location: indexpengguna.php?notifikasi=sukses');
        } else {
            // kalau gagal alihkan ke halaman indek.php dengan status=gagal
            header('Location: indexpengguna.php?notifikasi=gagal');
        }
    }

//Edit Data Pengguna
    // cek tombol?
    else if(isset($_POST['simpan'])){

        // ambil data dari formulir
        $id = $_POST['ID_Pengguna'];
        $nama = $_POST['Nama'];
        $nomor = $_POST['Nomor'];
        $jabatan = $_POST['Jabatan'];

        // buat query (ID_Siswa, Nama_Siswa, NISN, Jenis_Kelamin, Alamat, Tgl_Lahir, Nama_Orang_Tua, Kondisi) 
        $sql = "UPDATE pengguna
        SET nama='$nama', nomor='$nomor', jabatan='$jabatan' WHERE ID_Pengguna=$id";
        $query = mysqli_query($koneksi, $sql);

        // apakah query simpan berhasil?
        if( $query ) {
            // kalau berhasil alihkan ke halaman index.php dengan status=sukses
            header('Location: indexpengguna.php?notifikasi=suksesedit');
        } else {
            // kalau gagal alihkan ke halaman indek.php dengan status=gagal
            header('Location: indexpengguna.php?notifikasi=gagaledit');
        }

    } else {
        die("Akses dilarang...");
    }

?>