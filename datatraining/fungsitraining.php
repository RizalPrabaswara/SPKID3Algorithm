<?php
include ("../koneksi.php");

//Tambah Data Training
    // cek tombol?
    if(isset($_POST['daftar'])){

        // ambil data dari formulir
        $iq1 = $_POST['IQ'];
		if($iq1 < 75){
			$iq = '0 - 74';
		}else{
			$iq = '75 - 110';
		}
        $nama = $_POST['Nama_Siswa'];
        $nilaius1 = $_POST['Rata_rata_Nilai_US'];
        if($nilaius1 < 75){
			$nilaius = '0 - 74';
		}else{
			$nilaius = '75 - 100';
		}
        $keaktifan = $_POST['Keaktifan'];
        $kedisiplinan = $_POST['Kedisiplinan'];
        $kerjasama = $_POST['Kerja_Sama'];
        $ketunaan = $_POST['Ketunaan'];
        $jenis = $_POST['Jenis_Sekolah'];

        // buat query (ID_Siswa, Nama_Siswa, NISN, Jenis_Kelamin, Alamat, Tgl_Lahir, Nama_Orang_Tua, Kondisi) 
        $sql = "INSERT INTO training
        VALUES (0,'$iq', '$nama', '$nilaius', '$keaktifan', '$kedisiplinan', '$kerjasama', '$ketunaan', '$jenis')";
        $query = mysqli_query($koneksi, $sql);

        // apakah query simpan berhasil?
        if( $query ) {
            // kalau berhasil alihkan ke halaman index.php dengan status=sukses
            header('Location: indextraining.php?notifikasi=sukses');
        } else {
            // kalau gagal alihkan ke halaman indek.php dengan status=gagal
            header('Location: indextraining.php?notifikasi=gagal');
        }
    }

//Edit Data Training
    // cek tombol?
    else if(isset($_POST['simpan'])){

        // ambil data dari formulir
        $id = $_POST['ID_Training'];
        $iq1 = $_POST['IQ'];
        if($iq1 < 75){
			$iq = '0 - 74';
		}else{
			$iq = '75 - 110';
		}
        $nama = $_POST['Nama_Siswa'];
        $nilaius1 = $_POST['Rata_rata_Nilai_US'];
        if($nilaius1 < 75){
			$nilaius = '0 - 74';
		}else{
			$nilaius = '75 - 100';
		}
        $keaktifan = $_POST['Keaktifan'];
        $kedisiplinan = $_POST['Kedisiplinan'];
        $kerjasama = $_POST['Kerja_Sama'];
        $ketunaan = $_POST['Ketunaan'];
        $jenis = $_POST['Jenis_Sekolah'];

        // buat query (ID_Siswa, Nama_Siswa, NISN, Jenis_Kelamin, Alamat, Tgl_Lahir, Nama_Orang_Tua, Kondisi) 
        $sql = "UPDATE training
        SET IQ='$iq', Nama_Siswa='$nama', Rata_rata_Nilai_US='$nilaius', Keaktifan='$keaktifan', Kedisiplinan='$kedisiplinan', 
        Kerja_Sama='$kerjasama', Ketunaan='$ketunaan', Jenis_Sekolah='$jenis' WHERE ID_Training=$id";
        $query = mysqli_query($koneksi, $sql);

        // apakah query simpan berhasil?
        if( $query ) {
            // kalau berhasil alihkan ke halaman index.php dengan status=sukses
            header('Location: indextraining.php?notifikasi=suksesedit');
        } else {
            // kalau gagal alihkan ke halaman indek.php dengan status=gagal
            header('Location: indextraining.php?notifikasi=gagaledit');
        }

    } else {
        die("Akses dilarang...");
    }

?>