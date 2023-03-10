<?php
    session_start();
	include 'koneksi.php';
    if(isset($_POST['login']))   // untuk mengecek apakah user klik tombol login/tidak 
    {
        $userID=$_POST['nama'];
        $password=$_POST['nomor'];
        $query=mysqli_query($koneksi,"select * from pengguna where nama='$userID' and nomor='$password'");    
        if (mysqli_num_rows($query)==0){
            ?>
            User dan Password tidak cocok <a href="login.php"> <button class="btn mt-3"> Kembali </button> </a></div><?php
        }
        else{
            $data = mysqli_fetch_assoc($query);
            // cek jika user login sebagai admin
                if($data['jabatan']=="admin"){
        
                // buat session login dan username
                $_SESSION['usr']=$userID;
                $_SESSION['nama'] = $userID;
                $_SESSION['jabatan'] = "admin";
                // alihkan ke halaman dashboard admin
                header("location:indexadmin.php");
        
                // cek jika user login sebagai pegawai
            }
                else{
                // buat session login dan username
                $_SESSION['usr']=$userID;
                $_SESSION['nama'] = $userID;
                $_SESSION['jabatan'] = "siswa";
                // alihkan ke halaman dashboard siswa
                header("location:index.php");
                }
        }
    }
?>