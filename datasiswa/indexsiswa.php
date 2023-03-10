<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
    session_start();
    if (!isset($_SESSION['usr'])){
        header("location:login.php");
    }
?>
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Halaman Data Siswa</title>
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
            
        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Admin Dashboard</h2>   
                        <h5>Selamat Datang <?php echo " : ".$_SESSION['nama']; ?>, Senang Melihatmu Kembali. </h5>
                        <br />
                        <?php if(isset($_GET['notifikasi'])): ?>
                            <p>
                                <?php
                                    if($_GET['notifikasi'] == 'sukses'){
                                        echo "Pendaftaran siswa baru berhasil!";
                                    }   
                                        else if($_GET['notifikasi'] == 'suksesedit') {
                                        echo "Data  Berhasil Diedit!";
                                    }
                                        else if($_GET['notifikasi'] == 'gagaledit') {
                                        echo "Data  Tidak Berhasil Diedit!";
                                    }
                                        else if($_GET['notifikasi'] == 'hapusberhasil') {
                                        echo "Data  Berhasil Dihapus!";
                                    }
                                        else if($_GET['notifikasi'] == 'hapus') {
                                        echo "Data Tidak Berhasil Dihapus!";
                                    }
                                      else {
                                        echo "Pendaftaran gagal!";
                                    }
                                ?>
                            </p>
                        <?php endif; ?>
                        <br />
                    </div>
                </div>              
                 <!-- /. ROW  -->
                 <hr />
               <div class="row">
                <div class="col-md-12">
                <a href="formsiswa.php" class="btn btn-primary"> Tambah Data </a>
                <hr />
                     <!-- Tabel -->
                     <div class="panel panel-default">
                        <div class="panel-heading">
                             Tabel Siswa
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>ID Siswa</th>
                                            <th>Nama Siswa</th>
                                            <th>NISN</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Alamat</th>
                                            <th>Tgl Lahir</th>
                                            <th>Nama Orang Tua</th>
                                            <th>Kondisi</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    include '../koneksi.php';
                                    $sql = "SELECT * FROM siswa";
                                    $query = mysqli_query($koneksi, $sql);
                            
                                    while($siswa = mysqli_fetch_array($query)){
                                        echo "<tr>";
                        
                                        echo "<td>".$siswa['ID_Siswa']."</td>";
                                        echo "<td>".$siswa['Nama_Siswa']."</td>";
                                        echo "<td>".$siswa['NISN']."</td>";
                                        echo "<td>".$siswa['Jenis_Kelamin']."</td>";
                                        echo "<td>".$siswa['Alamat']."</td>";
                                        echo "<td>".$siswa['Tgl_Lahir']."</td>";
                                        echo "<td>".$siswa['Nama_Orang_Tua']."</td>";
                                        echo "<td>".$siswa['Kondisi']."</td>";
                            
                                        echo "<td>";
                                        echo "<a href='formeditsiswa.php?id=".$siswa['ID_Siswa']."'><button class='btn btn-warning'>Edit</button></a> | ";
                                        echo "<a href='hapussiswa.php?id=".$siswa['ID_Siswa']."'><button class='btn btn-danger'>Hapus</button></a>";
                                        echo "</td>";
                            
                                        echo "</tr>";
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>
</div>
             <!-- /. PAGE INNER  -->
             </div>
         <!-- /. PAGE WRAPPER  -->
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="../assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="../assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="../assets/js/jquery.metisMenu.js"></script>
     <!-- DATA TABLE SCRIPTS -->
    <script src="../assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="../assets/js/dataTables/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>
         <!-- CUSTOM SCRIPTS -->
    <script src="../assets/js/custom.js"></script>

</body>
</html>
