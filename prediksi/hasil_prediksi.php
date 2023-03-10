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
    <title>Halaman Data Klasifikasi</title>
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
                                <a href="../datasiswa/indexsiswa.php">Data Siswa</a>
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
                                <a href="indexprediksi.php">Data Klasifikasi</a>
                            </li>
                            <li>
                                <a href="hasil_prediksi.php">Klasifikasi</a>
                            </li>
                            <li>
                                <a href="akurasi.php">Akurasi</a>
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
                    </div>
                </div>              
                 <!-- /. ROW  -->
                  <hr />
				  <div class="row">
                <div class="col-md-12">
                    <!-- Form Elements -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Form Data Prediksi
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <form method="POST" action='fungsiprediksi.php'>
                                    <div class="form-group">
                                        <label>ID Pengguna</label>
                                        <select class="form-control" name="ID_Pengguna">
                                            <?php
                                            include '../koneksi.php';
                                            $sql3 = "SELECT * FROM pengguna";
                                            $query = mysqli_query($koneksi, $sql3);
                                    
                                            while($siswa = mysqli_fetch_array($query)){
                                            ?>
                                            <option value="<?=$siswa['ID_Pengguna']?>"><?=$siswa['nama']?></option> 
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Nama Siswa</label>
                                        <select class="form-control" name="Nama_Siswa_HasilKlasifikasi">
                                            <?php
                                            include '../koneksi.php';
                                            $sql3 = "SELECT * FROM pengguna";
                                            $query = mysqli_query($koneksi, $sql3);
                                    
                                            while($siswa = mysqli_fetch_array($query)){
                                            ?>
                                            <option value="<?=$siswa['nama']?>"><?=$siswa['nama']?></option> 
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                        <div class="form-group">
                                            <label for="IQ">IQ : </label>
                                            <input type="number" class="form-control" name="IQ" min="1" max="200"/>
                                        </div> 
                                        <div class="form-group">
                                            <label for="Rata_rata_Nilai_US">Nilai : </label>
                                            <input type="number" class="form-control" name="Rata_rata_Nilai_US" min="1" max="100"/>
                                        </div>
                                        <div class="form-group">
                                            <label>Keaktifan : </label>
                                            <select class="form-control" name="Keaktifan">
                                                <option>Kurang</option>
                                                <option>Baik</option>
                                                <option>Sangat Baik</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Kedisiplinan : </label>
                                            <select class="form-control" name="Kedisiplinan">
                                                <!-- <option>Sangat Kurang</option>     -->
                                                <option>Kurang</option>
                                                <option>Baik</option>
                                                <option>Sangat Baik</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Kerja Sama : </label>
                                            <select class="form-control" name="Kerja_Sama">
                                                <option>Kurang</option>
                                                <option>Baik</option>
                                                <option>Sangat Baik</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Ketunaan : </label>
                                            <select class="form-control" name="Ketunaan">
                                                <option value="Kelainan Fisik">Tuna Rungu</option>
                                                <option value="Kelainan Fisik">Tuna Netra</option>
                                                <option value="Kelainan Fisik">Tuna Wicara</option>
                                                <option value="Kelainan Fisik">Tuna Daksa</option>
                                                <option value="Kelainan Emosional">Tuna Grahita</option>
                                                <option value="Kelainan Emosional">Borderline</option>
                                                <option value="Kelainan Akademik">ADHD</option>
                                                <option value="Kelainan Akademik">Lambat Belajar</option>
                                                <option value="Kelainan Akademik">Cerebral Palsy</option>
                                                <option value="Kelainan Akademik">Autis</option>
                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-primary" value="daftar" name="daftar"> Klasifikasi </button>
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



