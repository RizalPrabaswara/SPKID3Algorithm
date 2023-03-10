<!DOCTYPE html>
<html>
<?php
    session_start();
    if (!isset($_SESSION['usr'])){
        header("location:login.php");
    }
?>
<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>SPK</title>



  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="../css/bootstrap.css" />
  <!-- progress barstle -->
  <link rel="stylesheet" href="../css/css-circular-prog-bar.css">
  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
  <!-- font wesome stylesheet -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
  <!-- Custom styles for this template -->
  <link href="../css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="../css/responsive.css" rel="stylesheet" />




  <link rel="stylesheet" href="../css/css-circular-prog-bar.css">


</head>

<body>
  <div class="top_container">
    <!-- header section strats -->
    <header class="header_section">
      <div class="container">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="../index.html">
            <img src="../images/logo.png" alt="">
            <span>
              SPK Pemilihan Sekolah ABK
            </span>
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="d-flex ml-auto flex-column flex-lg-row align-items-center">
              <ul class="navbar-nav  ">
                <li class="nav-item active">
                  <a class="nav-link" href="../index.php"> Beranda </a>
                </li>
                <li class="nav-item ">
                  <a class="nav-link" href="hasil_prediksisiswa.php"> Prediksi </a>
                </li>
                <li class="nav-item ">
                <a class="nav-link" href="indexprediksisiswa.php"> Data Klasifikasi </a>
                </li>
                <li class="nav-item ">
                  <a class="nav-link" href="../login.php"> Logout </a>
                </li>
              </ul>
              <form class="form-inline my-2 my-lg-0 ml-0 ml-lg-4 mb-3 mb-lg-0">
                <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit"></button>
              </form>
            </div>
        </nav>
      </div>
    </header>
    <section class="hero_section ">
      <div class="hero-container container">
        <div class="hero_detail-box">
          <h3>
            Selamat Datang <br>
            di Sistem Pendukung Keputusan
          </h3>
          <h1>
            Pemilihan Sekolah ABK
          </h1>
          <p>
            Ini adalah sistem yang dibuat untuk menentukan jenis sekolah yang cocok <br/>
            bagi ABK berdasarkan kriteria yang sudah ditentukan sebelumnya.
          </p>
          <div class="hero_btn-continer">
            <a href="hasil_prediksisiswa.php" class="call_to-btn btn_white-border">
              <span>
                Prediksi
              </span>
              <img src="../images/right-arrow.png" alt="">
            </a>
          </div>
        </div>
        <div class="hero_img-container">
          <div>
            <img src="../images/hero.png" alt="" class="img-fluid">
          </div>
        </div>
      </div>
    </section>
  </div>
  <!-- end header section -->

  <!-- about section -->
  <section class="about_section layout_padding">
    <div class="container">
      <h2 class="main-heading ">
        Selamat Datang <?php echo " : ".$_SESSION['nama']; ?>, Senang Melihatmu Kembali.
      </h2>
      <br/>
        <div class="d-flex justify-content-center mt-5">
        <span>
            Silahkan Isi data dibawah ini untuk melakukan prediksi jenis sekolah yang akan dituju
        </span>
        </div>
      <div class="d-flex justify-content-center mt-5">
        <form method="POST" action='fungsiprediksisiswa.php'>
                                    <div class="form-group">
                                        <label>ID Pengguna</label>
                                        <select class="form-control" name="ID_Pengguna">
                                            <?php
                                            include '../koneksi.php';
                                            $sql37 = "SELECT * FROM pengguna";
                                            $query37 = mysqli_query($koneksi, $sql37);
                                    
                                            while($dara = mysqli_fetch_array($query37)){
                                            ?>
                                            <option value="<?=$dara['ID_Pengguna']?>"><?=$dara['nama']?></option> 
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                    <label for="Nama">Nama : </label>
                                        <input type="text" class="form-control" name="Nama_Siswa_HasilKlasifikasi" placeholder="Nama Siswa Lengkap" value="<?php echo $_SESSION['nama']?>" />
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
            <button type="submit" class="btn btn-primary" value="daftar" name="daftar">Klasifikasi </button>
        </form>
      </div>
    </div>
  </section>
  <!-- about section -->

  <!-- about section -->
  <section class="akhir_section layout_padding">
    <div class="container">
      <h2 class="main-heading ">
        Hasil Klasifikasi
      </h2>
      <div class="d-flex justify-content-center mt-5">
      <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <!-- <th>ID Klasifikasi</th> -->
                                            <th>Nama Siswa</th>
                                            <th>Hasil</th>
                                            <!-- <th>Keterangan</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    include '../koneksi.php';
                                    $sql = "SELECT * FROM klasifikasi WHERE Nama_Siswa_HasilKlasifikasi ='".$_SESSION['nama']."' ";
                                    $query = mysqli_query($koneksi, $sql);
                            
                                    while($klasifikasi = mysqli_fetch_array($query)){
                                        echo "<tr>";
                        
                                        // echo "<td>".$klasifikasi['ID_klasifikasi']."</td>";
                                        echo "<td>".$klasifikasi['Nama_Siswa_HasilKlasifikasi']."</td>";
                                        echo "<td>".$klasifikasi['Hasil_Klasifikasi']."</td>";
                                        // echo "<td>".$klasifikasi['Keterangan']."</td>";
                            
                                        echo "</tr>";
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
      </div>
    </div>
  </section>
  <!-- about section -->

  <!-- footer section -->
  <section class="container-fluid footer_section">
    <p>
    </p>
  </section>
  <!-- footer section -->

  <script type="text/javascript" src="../js/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="../js/bootstrap.js"></script>

</body>
</html>