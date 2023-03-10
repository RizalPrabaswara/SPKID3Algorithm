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
    <title>Halaman Admin</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
     <!-- MORRIS CHART STYLES-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
    <!-- Chart JS-->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js"></script>
   <!-- <script type="text/javascript" src="assets/js/Chart.js"></script> -->
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
                <a class="navbar-brand" href="indexadmin.php">Halaman admin</a> 
            </div>
  <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;"> <?php date_default_timezone_set("America/New_York");
echo "Jam Saat Ini " . date("h:i:sa"); ?> &nbsp; 
<a href="login.php" class="btn btn-danger square-btn-adjust">Logout</a> </div>
        </nav>   
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				<li class="text-center">
                    <img src="assets/img/find_user.png" class="user-image img-responsive"/>
					</li>
                    <li>
                        <a class="active-menu"  href="indexadmin.php"><i class="fa fa-dashboard fa-3x"></i> Dashboard</a>
                    </li>	                 
                    <li>
                        <a href="#"><i class="fa fa-sitemap fa-3x"></i> Maintenance Data<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="datapengguna/indexpengguna.php">Data Pengguna</a>
                            </li>
                            <li>
                                <a href="datasiswa/indexsiswa.php">Data Siswa</a>
                            </li>
                            <li>
                                <a href="datatraining/indextraining.php">Data Training</a>
                            </li>
                            <li>
                                <a href="datarule/indexrule.php">Data Rule</a>
                            </li>
                            <li>
                                <a href="dataklasifikasi/indexklasifikasi.php">Data Klasifikasi</a>
                            </li>
                        </ul>
                    </li> 
                    <li>
                        <a   href="perhitungan/indexperhitungan.php"><i class="fa fa-bar-chart-o fa-3x"></i> Perhitungan Decision Tree </a>
                    </li>
                    <li>
                        <a   href="Clustering/indexkluster.php"><i class="fa fa-bar-chart-o fa-3x"></i> Clustering </a>
                    </li>
                    <li  >
                    <a href="#"><i class="fa fa-edit fa-3x"></i> Klasifikasi <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="prediksi/indexprediksi.php">Data Klasifikasi</a>
                            </li>
                            <li>
                                <a href="prediksi/hasil_prediksi.php">Klasifikasi</a>
                            </li>
                            <li>
                                <a href="prediksi/akurasi.php">Akurasi</a>
                            </li>
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
                    </div>
                </div>             
                 <!-- /. ROW  -->
                <hr />
                    <?php
                    include 'koneksi.php';
                    ?>
                <div class="row">
                    <div class="col-md-6">           
                        <div style="width: 400px;height: 400px">
                        <canvas id="myChart"></canvas>
                        <form method="POST" action='detaildata.php'>
                                    <div class="form-group">
                                        <label>Data</label>
                                        <select class="form-control" name="ID_Pengguna">
                                            <?php
                                            include 'koneksi.php';
                                            $sql3 = "SELECT DISTINCT Hasil_Klasifikasi FROM klasifikasi";
                                            $query = mysqli_query($koneksi, $sql3);
                                    
                                            while($siswa = mysqli_fetch_array($query)){
                                            ?>
                                            <option value="<?=$siswa['Hasil_Klasifikasi']?>"><?=$siswa['Hasil_Klasifikasi']?></option> 
                                            <?php
                                            }
                                            ?>
                                        </select>
                                        <input type="hidden" name="status" value="jenis"/>
                                    </div>
                        <button type="submit" class="btn btn-primary" value="daftar" name="daftar"> Detail Data </button>
                        </div>
                    </div>
                    <div class="col-md-6">           
                        <div style="width: 400px;height: 400px">
                            <canvas id="myChart1"></canvas>
                            <form method="POST" action='detaildata.php'>
                                    <div class="form-group">
                                        <label>Data</label>
                                        <select class="form-control" name="ID_Pengguna1">
                                            <?php
                                            include 'koneksi.php';
                                            $sql4 = "SELECT DISTINCT Keterangan FROM klasifikasi";
                                            $query = mysqli_query($koneksi, $sql4);
                                    
                                            while($siswa = mysqli_fetch_array($query)){
                                            ?>
                                            <option value="<?=$siswa['Keterangan']?>"><?=$siswa['Keterangan']?></option> 
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    <input type="hidden" name="status1" value="keterangan"/>
                                    </div>
                        <button type="submit" class="btn btn-primary" value="daftar1" name="daftar1"> Detail Data Keterangan</button>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div style="width: 200px;height: 200px">
                            <canvas id="myChart2"></canvas>
                            <form method="POST" action='detaildata.php'>
                                    <div class="form-group">
                                        <label>Data</label>
                                        <select class="form-control" name="ID_Pengguna2">
                                            <option value="<75">Kurang Dari 75</option>
                                            <option value=">=75">Lebih dari 75</option>
                                        </select>
                                    <input type="hidden" name="status2" value="iq"/>
                                    </div>
                        <button type="submit" class="btn btn-primary" value="daftar2" name="daftar2"> Detail Data IQ</button>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div style="width: 200px;height: 200px">
                            <canvas id="myChart3"></canvas>
                            <form method="POST" action='detaildata.php'>
                                    <div class="form-group">
                                        <label>Data</label>
                                        <select class="form-control" name="ID_Pengguna3">
                                            <?php
                                            include 'koneksi.php';
                                            $sql4 = "SELECT DISTINCT Rata_rata_Nilai_US FROM training";
                                            $query = mysqli_query($koneksi, $sql4);
                                    
                                            while($siswa = mysqli_fetch_array($query)){
                                            ?>
                                            <option value="<?=$siswa['Rata_rata_Nilai_US']?>"><?=$siswa['Rata_rata_Nilai_US']?></option> 
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    <input type="hidden" name="status3" value="nilai"/>
                                    </div>
                        <button type="submit" class="btn btn-primary" value="daftar3" name="daftar3"> Detail Data Nilai</button>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div style="width: 200px;height: 200px">
                            <canvas id="myChart4"></canvas>
                            <form method="POST" action='detaildata.php'>
                                    <div class="form-group">
                                        <label>Data</label>
                                        <select class="form-control" name="ID_Pengguna4">
                                            <?php
                                            include 'koneksi.php';
                                            $sql4 = "SELECT DISTINCT Kedisiplinan FROM training";
                                            $query = mysqli_query($koneksi, $sql4);
                                    
                                            while($siswa = mysqli_fetch_array($query)){
                                            ?>
                                            <option value="<?=$siswa['Kedisiplinan']?>"><?=$siswa['Kedisiplinan']?></option> 
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    <input type="hidden" name="status4" value="kedisiplinan"/>
                                    </div>
                        <button type="submit" class="btn btn-primary" value="daftar4" name="daftar4"> Detail Data Kedisiplinan</button>
                        </div>
                    </div>
                </div>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <br/>
                <div class="row">
                    <div class="col-md-4">
                        <div style="width: 200px;height: 200px">
                            <canvas id="myChart5"></canvas>
                            <form method="POST" action='detaildata.php'>
                                    <div class="form-group">
                                        <label>Data</label>
                                        <select class="form-control" name="ID_Pengguna5">
                                            <?php
                                            include 'koneksi.php';
                                            $sql4 = "SELECT DISTINCT Keaktifan FROM training";
                                            $query = mysqli_query($koneksi, $sql4);
                                    
                                            while($siswa = mysqli_fetch_array($query)){
                                            ?>
                                            <option value="<?=$siswa['Keaktifan']?>"><?=$siswa['Keaktifan']?></option> 
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    <input type="hidden" name="status5" value="keaktifan"/>
                                    </div>
                        <button type="submit" class="btn btn-primary" value="daftar5" name="daftar5"> Detail Data Keaktifan</button>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div style="width: 200px;height: 200px">
                            <canvas id="myChart6"></canvas>
                            <form method="POST" action='detaildata.php'>
                                    <div class="form-group">
                                        <label>Data</label>
                                        <select class="form-control" name="ID_Pengguna6">
                                            <?php
                                            include 'koneksi.php';
                                            $sql4 = "SELECT DISTINCT Kerja_Sama FROM training";
                                            $query = mysqli_query($koneksi, $sql4);
                                    
                                            while($siswa = mysqli_fetch_array($query)){
                                            ?>
                                            <option value="<?=$siswa['Kerja_Sama']?>"><?=$siswa['Kerja_Sama']?></option> 
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    <input type="hidden" name="status6" value="kerjasama"/>
                                    </div>
                        <button type="submit" class="btn btn-primary" value="daftar6" name="daftar6"> Detail Data Kerja Sama</button>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div style="width: 200px;height: 200px">
                            <canvas id="myChart7"></canvas>
                            <form method="POST" action='detaildata.php'>
                                    <div class="form-group">
                                        <label>Data</label>
                                        <select class="form-control" name="ID_Pengguna7">
                                            <?php
                                            include 'koneksi.php';
                                            $sql4 = "SELECT DISTINCT Ketunaan FROM training";
                                            $query = mysqli_query($koneksi, $sql4);
                                    
                                            while($siswa = mysqli_fetch_array($query)){
                                            ?>
                                            <option value="<?=$siswa['Ketunaan']?>"><?=$siswa['Ketunaan']?></option> 
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    <input type="hidden" name="status7" value="ketunaan"/>
                                    </div>
                        <button type="submit" class="btn btn-primary" value="daftar7" name="daftar7"> Detail Data Ketunaan</button>
                        </div>
                    </div>
                </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
<script>
    // setup 
    const data = {
      labels: ["SLB", "SMP"],
      datasets: [{
        label: 'Jenis Sekolah',
		data: [
		<?php 
			$jumlah_SLB = mysqli_query($koneksi,"select * from klasifikasi where Hasil_Klasifikasi='SLB'");
			echo mysqli_num_rows($jumlah_SLB);
		?>,
		<?php 
			$jumlah_SMP = mysqli_query($koneksi,"select * from klasifikasi where Hasil_Klasifikasi='SMP'");
			echo mysqli_num_rows($jumlah_SMP);
		?>
		],
        backgroundColor: [
          'rgba(255, 26, 104, 0.2)',
          'rgba(54, 162, 235, 0.2)',
          'rgba(0, 0, 0, 0.2)'
        ],
        borderColor: [
          'rgba(255, 26, 104, 1)',
          'rgba(54, 162, 235, 1)',
          'rgba(0, 0, 0, 1)'
        ],
        borderWidth: 1
      }]
    };

    // config 
    const config = {
      type: 'bar',
      data,
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    };

    // render init block
    const ctx = document.getElementById('myChart');
    const myChart = new Chart(
      ctx,
      config
    );

    
    function clickHandler(evt) {
    const points = myChart.getElementsAtEventForMode(evt, 'nearest', { intersect: true }, true);

        if (points.length) {
            const firstPoint = points[0];
            console.log(firstPoint);
            $label = myChart.data.labels[firstPoint.index];
            $value = myChart.data.datasets[firstPoint.datasetIndex].data[firstPoint.index];
            // $nama = mysqli_query($koneksi, "SELECT Nama_Siswa_HasilKlasifikasi FROM klasifikasi")
        
            console.log($label);
            alert('Label: ' + $label + "\nValue: " + $value);
        }
    }

    ctx.onclick = clickHandler;

    const ctx1 = document.getElementById('myChart1');
    const myChart1 = new Chart(ctx1, {
    type: 'bar',
    data: {
        labels: ["Sudah", "Belum"],
        datasets: [{
            label: 'Status Klasifikasi',
            data: [
            <?php 
                $jumlah_Sudah = mysqli_query($koneksi,"select * from klasifikasi where Keterangan='Sudah'");
                echo mysqli_num_rows($jumlah_Sudah);
            ?>,
            <?php 
                $jumlah_Kosong = mysqli_query($koneksi,"select * from klasifikasi where Keterangan=''");
                echo mysqli_num_rows($jumlah_Kosong);
            ?>
            ],
            backgroundColor: [
            'rgba(255, 26, 104, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(0, 0, 0, 0.2)'
            ],
            borderColor: [
            'rgba(255, 26, 104, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(0, 0, 0, 1)'
            ],
            borderWidth: 1,
        }]
    },
    });

    const ctx2 = document.getElementById('myChart2');
    const myChart2 = new Chart(ctx2, {
    type: 'pie',
    data: {
        labels: ["Dibawah 75", "Diatas 75"],
        datasets: [{
            label: 'IQ Siswa',
            data: [
            <?php 
                $jumlah_dibawah75 = mysqli_query($koneksi,"select * from training where IQ='0 - 74'");
                echo mysqli_num_rows($jumlah_dibawah75);
            ?>,
            <?php 
                $jumlah_diatas75 = mysqli_query($koneksi,"select * from training where IQ='75 - 110'");
                echo mysqli_num_rows($jumlah_diatas75);
            ?>
            ],
            backgroundColor: [
            'rgba(255, 26, 104, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(0, 0, 0, 0.2)'
            ],
            borderColor: [
            'rgba(255, 26, 104, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(0, 0, 0, 1)'
            ],
            borderWidth: 1,
        }]
    },
    });

    const ctx3 = document.getElementById('myChart3');
    const myChart3 = new Chart(ctx3, {
    type: 'pie',
    data: {
        labels: ["Dibawah 74", "Diatas 74"],
        datasets: [{
            label: 'Nilai Siswa',
            data: [
            <?php 
                $jumlah_dibawah75 = mysqli_query($koneksi,"select * from training where Rata_rata_Nilai_US='0 - 74'");
                echo mysqli_num_rows($jumlah_dibawah75);
            ?>,
            <?php 
                $jumlah_diatas75 = mysqli_query($koneksi,"select * from training where Rata_rata_Nilai_US='75 - 100'");
                echo mysqli_num_rows($jumlah_diatas75);
            ?>
            ],
            backgroundColor: [
            'rgba(255, 26, 104, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(0, 0, 0, 0.2)'
            ],
            borderColor: [
            'rgba(255, 26, 104, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(0, 0, 0, 1)'
            ],
            borderWidth: 1,
        }]
    },
    });

    const ctx4 = document.getElementById('myChart4');
    const myChart4 = new Chart(ctx4, {
    type: 'pie',
    data: {
        labels: ["Kurang", "Baik","Sangat Baik"],
        datasets: [{
            label: 'Kedisiplinan',
            data: [
            <?php 
                $jumlah_kurang = mysqli_query($koneksi,"select * from training where Kedisiplinan='Kurang'");
                echo mysqli_num_rows($jumlah_kurang);
            ?>,
            <?php 
                $jumlah_baik = mysqli_query($koneksi,"select * from training where Kedisiplinan='Baik'");
                echo mysqli_num_rows($jumlah_baik);
            ?>,
            <?php 
                $jumlah_sangatbaik = mysqli_query($koneksi,"select * from training where Kedisiplinan='Sangat Baik'");
                echo mysqli_num_rows($jumlah_sangatbaik);
            ?>
            ],
            backgroundColor: [
            'rgba(255, 26, 104, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(153, 102, 255, 0.2)',
            'rgba(0, 0, 0, 0.2)'
            ],
            borderColor: [
            'rgba(255, 26, 104, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(153, 102, 255, 1)',
            'rgba(0, 0, 0, 1)'
            ],
            borderWidth: 1,
        }]
    },
    });

    const ctx5 = document.getElementById('myChart5');
    const myChart5 = new Chart(ctx5, {
    type: 'pie',
    data: {
        labels: ["Kurang", "Baik","Sangat Baik"],
        datasets: [{
            label: 'Keaktifan',
            data: [
            <?php 
                $jumlah_kurang = mysqli_query($koneksi,"select * from training where Keaktifan='Kurang'");
                echo mysqli_num_rows($jumlah_kurang);
            ?>,
            <?php 
                $jumlah_baik = mysqli_query($koneksi,"select * from training where Keaktifan='Baik'");
                echo mysqli_num_rows($jumlah_baik);
            ?>,
            <?php 
                $jumlah_sangatbaik = mysqli_query($koneksi,"select * from training where Keaktifan='Sangat Baik'");
                echo mysqli_num_rows($jumlah_sangatbaik);
            ?>
            ],
            backgroundColor: [
            'rgba(255, 26, 104, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(153, 102, 255, 0.2)',
            'rgba(0, 0, 0, 0.2)'
            ],
            borderColor: [
            'rgba(255, 26, 104, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(153, 102, 255, 1)',
            'rgba(0, 0, 0, 1)'
            ],
            borderWidth: 1,
        }]
    },
    });

    const ctx6 = document.getElementById('myChart6');
    const myChart6 = new Chart(ctx6, {
    type: 'pie',
    data: {
        labels: ["Kurang", "Baik","Sangat Baik"],
        datasets: [{
            label: 'Kerja Sama',
            data: [
            <?php 
                $jumlah_kurang = mysqli_query($koneksi,"select * from training where Kerja_Sama='Kurang'");
                echo mysqli_num_rows($jumlah_kurang);
            ?>,
            <?php 
                $jumlah_baik = mysqli_query($koneksi,"select * from training where Kerja_Sama='Baik'");
                echo mysqli_num_rows($jumlah_baik);
            ?>,
            <?php 
                $jumlah_sangatbaik = mysqli_query($koneksi,"select * from training where Kerja_Sama='Sangat Baik'");
                echo mysqli_num_rows($jumlah_sangatbaik);
            ?>
            ],
            backgroundColor: [
            'rgba(255, 26, 104, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(153, 102, 255, 0.2)',
            'rgba(0, 0, 0, 0.2)'
            ],
            borderColor: [
            'rgba(255, 26, 104, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(153, 102, 255, 1)',
            'rgba(0, 0, 0, 1)'
            ],
            borderWidth: 1,
        }]
    },
    });

    const ctx7 = document.getElementById('myChart7');
    const myChart7 = new Chart(ctx7, {
    type: 'pie',
    data: {
        labels: ["Kelainan Fisik", "Kelainan Akademik","Kelainan Emosional"],
        datasets: [{
            label: 'Ketunaan',
            data: [
            <?php 
                $jumlah_fisik = mysqli_query($koneksi,"select * from training where Ketunaan='Kelainan Fisik'");
                echo mysqli_num_rows($jumlah_fisik);
            ?>,
            <?php 
                $jumlah_akademik = mysqli_query($koneksi,"select * from training where Ketunaan='Kelainan Akademik'");
                echo mysqli_num_rows($jumlah_akademik);
            ?>,
            <?php 
                $jumlah_emosi = mysqli_query($koneksi,"select * from training where Ketunaan='Kelainan Emosional'");
                echo mysqli_num_rows($jumlah_emosi);
            ?>
            ],
            backgroundColor: [
            'rgba(255, 26, 104, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(153, 102, 255, 0.2)',
            'rgba(0, 0, 0, 0.2)'
            ],
            borderColor: [
            'rgba(255, 26, 104, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(153, 102, 255, 1)',
            'rgba(0, 0, 0, 1)'
            ],
            borderWidth: 1,
        }]
    },
    });

	</script>
     <!-- /. WRAPPER  -->

    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
     <!-- MORRIS CHART SCRIPTS -->
     <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    
</body>
</html>