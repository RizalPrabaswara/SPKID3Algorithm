<?php
include ("../koneksi.php");

//Tambah Data Siswa
    // cek tombol?
    if(isset($_POST['daftar'])){

        // ambil data dari formulir
        $nama = $_POST['Nama_Siswa'];
        $idpengguna = $_POST['ID_Pengguna'];
        $nisn = $_POST['NISN'];
        $jk = $_POST['Jenis_Kelamin'];
        $alamat = $_POST['Alamat'];
        $tgl = date(('Y-m-d'),strtotime($_POST['Tgl_Lahir']));
        $namaortu = $_POST['Nama_Orang_Tua'];
        $kondisi = $_POST['Kondisi_Siswa'];

        // buat query (ID_Siswa, Nama_Siswa, NISN, Jenis_Kelamin, Alamat, Tgl_Lahir, Nama_Orang_Tua, Kondisi) 
        $sql = "INSERT INTO siswa
        VALUES (0,$idpengguna,'$nama', '$nisn', '$jk', '$alamat', '$tgl', '$namaortu', '$kondisi')";
        $query = mysqli_query($koneksi, $sql);

        // apakah query simpan berhasil?
        if( $query ) {
            // if ($kondisi = "Lulus"){
            // $sql1 = "INSERT INTO training
            // VALUES (0,0, '', '', '', '', '', '', '')";
            // $query = mysqli_query($koneksi, $sql1);
            // $query2 = mysqli_query($koneksi, "SELECT * FROM training ORDER BY ID_Training DESC LIMIT 1");
            // while($training = mysqli_fetch_array($query2)){
            //     // kalau berhasil alihkan ke halaman index.php dengan status=sukses
            //     header('Location: ../datatraining/formedittraining.php?id='.$training['ID_Training'].'');
            //     }
            // }
            // else {
            // kalau berhasil alihkan ke halaman index.php dengan status=sukses
            header('Location: indexsiswa.php?notifikasi=sukses');
            //}
        } else {
            // kalau gagal alihkan ke halaman indek.php dengan status=gagal
            header('Location: indexsiswa.php?notifikasi=gagal');
        }
    }

//Edit Data Siswa
    // cek tombol?
    else if(isset($_POST['simpan'])){

        // ambil data dari formulir
        $id = $_POST['ID_Siswa'];
        $idpengguna = $_POST['ID_Pengguna'];
        $nama = $_POST['Nama_Siswa'];
        $nisn = $_POST['NISN'];
        $jk = $_POST['Jenis_Kelamin'];
        $alamat = $_POST['Alamat'];
        $tgl = date(('Y-m-d'),strtotime($_POST['Tgl_Lahir']));
        $namaortu = $_POST['Nama_Orang_Tua'];
        $kondisi = $_POST['Kondisi_Siswa'];

        // buat query (ID_Siswa, Nama_Siswa, NISN, Jenis_Kelamin, Alamat, Tgl_Lahir, Nama_Orang_Tua, Kondisi) 
        $sql = "UPDATE siswa
        SET ID_Pengguna=$idpengguna, Nama_Siswa='$nama', NISN='$nisn', Jenis_Kelamin='$jk', Alamat='$alamat', 
        Tgl_Lahir='$tgl', Nama_Orang_Tua='$namaortu', Kondisi='$kondisi' WHERE ID_Siswa=$id";
        $query = mysqli_query($koneksi, $sql);

        // apakah query simpan berhasil?
        if( $query ) {
            if ($kondisi = 'Lulus'){
                $sql1 = "INSERT INTO training
                VALUES (0,0, '', '', '', '', '', '', '')";
                $query = mysqli_query($koneksi, $sql1);
                $query2 = mysqli_query($koneksi, "SELECT * FROM training ORDER BY ID_Training DESC LIMIT 1");
                while($training = mysqli_fetch_array($query2)){
                    // kalau berhasil alihkan ke halaman index.php dengan status=sukses
                    header('Location: ../datatraining/formedittraining.php?id='.$training['ID_Training'].'');
                    }
            }
            else{
            // kalau berhasil alihkan ke halaman index.php dengan status=sukses
            header('Location: indexsiswa.php?notifikasi=suksesedit');
            }
        } else {
            // kalau gagal alihkan ke halaman indek.php dengan status=gagal
            header('Location: indexsiswa.php?notifikasi=gagaledit');
        }

    } else {
        die("Akses dilarang...");
    }

?>