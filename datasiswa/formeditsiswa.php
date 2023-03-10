<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
    session_start();
    if (!isset($_SESSION['usr'])){
        header("location:../login.php");
    }
?>
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Halaman Form Edit Siswa</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="../assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="../assets/css/font-awesome.css" rel="stylesheet" />
     <!-- MORRIS CHART STYLES-->
    <link href="../assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="../assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="../indexadmin.php">Halaman admin</a> 
            </div>
  <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;"> <?php date_default_timezone_set("America/New_York");
echo "Jam Saat Ini " . date("h:i:sa"); ?> &nbsp; 
<a href="../login.php" class="btn btn-danger square-btn-adjust">Logout</a> </div>
        </nav>   
           <!-- /. NAV TOP  -->
           <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				<li class="text-center">
                    <img src="../assets/img/find_user.png" class="user-image img-responsive"/>
					</li>
                    <li>
                        <a class="active-menu"  href="../indexadmin.php"><i class="fa fa-dashboard fa-3x"></i> Dashboard</a>
                    </li>                 
                    <li>
                        <a href="#"><i class="fa fa-sitemap fa-3x"></i> Maintenance Data<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="../datapengguna/indexpengguna.php">Data Pengguna</a>
                            </li>
                            <li>
                                <a href="indexsiswa.php">Data Siswa</a>
                            </li>
                            <li>
                                <a href="../datatraining/indextraining.php">Data Training</a>
                            </li>
                            <li>
                                <a href="../datarule/indexrule.php">Data Rule</a>
                            </li>
                            <li>
                                <a href="../dataklasifikasi/indexklasifikasi.php">Data Klasifikasi</a>
                            </li>
                        </ul>
                    </li> 
                    <li>
                        <a   href="../perhitungan/indexperhitungan.php"><i class="fa fa-bar-chart-o fa-3x"></i> Perhitungan </a>
                    </li>
                    <li  >
                        <a  href="#"><i class="fa fa-sitemap fa-3x"></i> Klasifikasi<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="../prediksi/indexprediksi.php">Data Klasifikasi</a>
                            </li>
                            <li>
                                <a href="../prediksi/hasil_prediksi.php">Klasifikasi</a>
                            </li>
                            <li>
                                <a href="../prediksi/akurasi.php">Akurasi</a>
                            </li>
                        </ul>
                    </li> 	
                </ul> 
            </div>
<?php
include("../koneksi.php");

// kalau tidak ada id di query string
if( !isset($_GET['id']) ){
    header('Location: indexsiswa.php');
}

//ambil id dari query string
$id = $_GET['id'];

// buat query untuk ambil data dari database
$sql = "SELECT * FROM siswa WHERE ID_Siswa=$id";
$query = mysqli_query($koneksi, $sql);
$siswa = mysqli_fetch_assoc($query);

// jika data yang di-edit tidak ditemukan
if( mysqli_num_rows($query) < 1 ){
    die("data tidak ditemukan...");
}
?> 
        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Admin Dashboard</h2>   
                        <h5>Selamat Datang <?php echo " : ".$_SESSION['nama']; ?>, Senang Melihatmu Kembali. </h5>
                    </div>
                </div>              
                 <!-- /. ROW  -->
                 <hr />
               <div class="row">
                <div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Form Edit Data Siswa
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <form method="POST" action='fungsisiswa.php'>
                                        <input type="hidden" name="ID_Siswa" value="<?php echo $siswa['ID_Siswa'] ?>" />
                                        <div class="form-group">
                                            <label>ID Pengguna</label>
                                            <select class="form-control" name="ID_Pengguna">
                                            <?php
                                            include '../koneksi.php';
                                            $sql3 = "SELECT * FROM pengguna";
                                            $query3 = mysqli_query($koneksi, $sql3);
                                    
                                            while($dara = mysqli_fetch_array($query3)){
                                            ?>
                                            <option value="<?=$dara['ID_Pengguna']?>"><?=$dara['nama']?></option> 
                                            <?php
                                            }
                                            ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="Nama_Siswa">Nama Siswa : </label>
                                            <input type="text" class="form-control" name="Nama_Siswa" placeholder="Nama Siswa lengkap" value="<?php echo $siswa['Nama_Siswa'] ?>"/>
                                        </div>
                                        <div class="form-group">
                                            <label for="NISN">NISN : </label>
                                            <input type="text" class="form-control" name="NISN"  maxlength="10" placeholder="NISN" value="<?php echo $siswa['NISN'] ?>"/>
                                        </div>
                                        <div class="form-group">
                                            <?php $jk = $siswa['Jenis_Kelamin']; ?>
                                            <label>Jenis Kelamin </label>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="Jenis_Kelamin" id="optionsRadios1" value="L" <?php echo ($jk == 'L') ? "checked": "" ?>/>Laki - Laki
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="Jenis_Kelamin" id="optionsRadios2" value="P" <?php echo ($jk == 'P') ? "checked": "" ?>/>Perempuan
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="Alamat">Alamat : </label>
                                            <input type="text" class="form-control" name="Alamat" placeholder="Alamat" value="<?php echo $siswa['Alamat'] ?>"/>
                                        </div>
                                        <div class="form-group">
                                            <label for="Tgl_lahir">Tanggal Lahir : </label>
                                            <input type="date" class="form-control" name="Tgl_Lahir" />
                                        </div>
                                        <div class="form-group">
                                            <label for="Nama_Orang_Tua">Nama Orang Tua : </label>
                                            <input type="text" class="form-control" name="Nama_Orang_Tua" placeholder="Nama Orang Tua" value="<?php echo $siswa['Nama_Orang_Tua'] ?>"/>
                                        </div>
                                        <div class="form-group">
                                            <label>Status</label>
                                            <?php $kondisi = $siswa['Kondisi']; ?>
                                            <select class="form-control" name="Kondisi_Siswa">
                                                <option <?php echo ($kondisi == 'Siswa') ? "selected": "" ?>>Siswa</option>
                                                <option <?php echo ($kondisi == 'Lulus') ? "selected": "" ?>>Lulus</option>
                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-primary" value="Simpan" name="simpan"> Submit </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                     <!-- End Form Elements -->
                </div>
            </div>
</div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->

    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="../assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="../assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="../assets/js/jquery.metisMenu.js"></script>
     <!-- MORRIS CHART SCRIPTS -->
     <script src="../assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="../assets/js/morris/morris.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="../assets/js/custom.js"></script>
    
</body>
</html>
