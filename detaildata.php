<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Halaman Data Siswa</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
     <!-- MORRIS CHART STYLES-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
   <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
   <script>
		$(document).ready(function(){
			$("#myModal").modal('show');
		});
	</script>
</head>
<?php
include ("koneksi.php");
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

//Tambah Data Training
    // cek tombol?
    global $koneksi;
    if(isset($_POST['daftar'])){
        // ambil data dari formulir
		$idpengguna = $_POST['ID_Pengguna'];
        $status = $_POST['status'];
    }
    else if(isset($_POST['daftar1'])){
        // ambil data dari formulir
		$idpengguna1 = $_POST['ID_Pengguna1'];
        $status = $_POST['status1'];
    }
    else if(isset($_POST['daftar2'])){
        // ambil data dari formulir
		$idpengguna2 = $_POST['ID_Pengguna2'];
        $status = $_POST['status2'];
    }
    else if(isset($_POST['daftar3'])){
        // ambil data dari formulir
		$idpengguna3 = $_POST['ID_Pengguna3'];
        $status = $_POST['status3'];
    }
    else if(isset($_POST['daftar4'])){
        // ambil data dari formulir
		$idpengguna4 = $_POST['ID_Pengguna4'];
        $status = $_POST['status4'];
    }
    else if(isset($_POST['daftar5'])){
        // ambil data dari formulir
		$idpengguna5 = $_POST['ID_Pengguna5'];
        $status = $_POST['status5'];
    }
    else if(isset($_POST['daftar6'])){
        // ambil data dari formulir
		$idpengguna6 = $_POST['ID_Pengguna6'];
        $status = $_POST['status6'];
    }
    else if(isset($_POST['daftar7'])){
        // ambil data dari formulir
		$idpengguna7 = $_POST['ID_Pengguna7'];
        $status = $_POST['status7'];
    }
?>
<body>
	<?php
		include "koneksi.php";
	?>
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
		<div class="modal-header">
			<h4 class="modal-title" id="myModalLabel">Hasil Klasifikasi</h4>
		</div>
		<div class="modal-body">
            <?php
                if($status == "jenis"){
            ?>
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>ID Klasifikasi</th>
                                <th>Nama Siswa</th>
                                <th>Hasil Klasifikasi</th>
                            </tr>
                        </thead>
                        <tbody> 
                        <?php
                            $sqlmodal2 = "SELECT * FROM klasifikasi WHERE Hasil_Klasifikasi = '".$idpengguna."'";
                            $querymodal1 = mysqli_query($koneksi, $sqlmodal2);
                            while($siswa = mysqli_fetch_array($querymodal1)){
                                echo "<tr>";
                                    echo "<td>".$siswa['ID_klasifikasi']."</td>";
                                    echo "<td>".$siswa['Nama_Siswa_HasilKlasifikasi']."</td>";
                                    echo "<td>".$siswa['Hasil_Klasifikasi']."</td>";
                                echo "</tr>";
                            } 
                        ?>
                        </tbody>
                    </table>
            <?php
                }
                else if($status == "keterangan"){
                    ?>
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>ID Klasifikasi</th>
                                <th>Nama Siswa</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>
                        <tbody> 
                        <?php
                            $sqlmodal2 = "SELECT * FROM klasifikasi WHERE Keterangan = '".$idpengguna1."'";
                            $querymodal1 = mysqli_query($koneksi, $sqlmodal2);
                            while($siswa = mysqli_fetch_array($querymodal1)){
                                echo "<tr>";
                                    echo "<td>".$siswa['ID_klasifikasi']."</td>";
                                    echo "<td>".$siswa['Nama_Siswa_HasilKlasifikasi']."</td>";
                                    echo "<td>".$siswa['Keterangan']."</td>";
                                echo "</tr>";
                            } 
                        ?>
                        </tbody>
                    </table>
            <?php
                }
                else if($status == "iq"){
                    ?>
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>IQ</th>
                                <th>Nama Siswa</th>
                            </tr>
                        </thead>
                        <tbody> 
                        <?php
                            $sqlmodal2 = "SELECT * FROM training WHERE IQ".$idpengguna2."";
                            $querymodal1 = mysqli_query($koneksi, $sqlmodal2);
                            while($siswa = mysqli_fetch_array($querymodal1)){
                                echo "<tr>";
                                    echo "<td>".$siswa['ID_Training']."</td>";
                                    echo "<td>".$siswa['IQ']."</td>";
                                    echo "<td>".$siswa['Nama_Siswa']."</td>";
                                echo "</tr>";
                            } 
                        ?>
                        </tbody>
                    </table>
                    <?php
                }
                else if($status == "nilai"){
                    ?>
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nilai</th>
                                <th>Nama Siswa</th>
                            </tr>
                        </thead>
                        <tbody> 
                        <?php
                            $sqlmodal2 = "SELECT * FROM training WHERE Rata_rata_Nilai_US ='".$idpengguna3."'";
                            $querymodal1 = mysqli_query($koneksi, $sqlmodal2);
                            while($siswa = mysqli_fetch_array($querymodal1)){
                                echo "<tr>";
                                    echo "<td>".$siswa['ID_Training']."</td>";
                                    echo "<td>".$siswa['Rata_rata_Nilai_US']."</td>";
                                    echo "<td>".$siswa['Nama_Siswa']."</td>";
                                echo "</tr>";
                            } 
                        ?>
                        </tbody>
                    </table>
                    <?php
                }
                else if($status == "kedisiplinan"){
                    ?>
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Kedisiplinan</th>
                                <th>Nama Siswa</th>
                            </tr>
                        </thead>
                        <tbody> 
                        <?php
                            $sqlmodal2 = "SELECT * FROM training WHERE Kedisiplinan ='".$idpengguna4."'";
                            $querymodal1 = mysqli_query($koneksi, $sqlmodal2);
                            while($siswa = mysqli_fetch_array($querymodal1)){
                                echo "<tr>";
                                    echo "<td>".$siswa['ID_Training']."</td>";
                                    echo "<td>".$siswa['Kedisiplinan']."</td>";
                                    echo "<td>".$siswa['Nama_Siswa']."</td>";
                                echo "</tr>";
                            } 
                        ?>
                        </tbody>
                    </table>
                    <?php
                }
                else if($status == "keaktifan"){
                    ?>
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Keaktifan</th>
                                <th>Nama Siswa</th>
                            </tr>
                        </thead>
                        <tbody> 
                        <?php
                            $sqlmodal2 = "SELECT * FROM training WHERE Keaktifan ='".$idpengguna5."'";
                            $querymodal1 = mysqli_query($koneksi, $sqlmodal2);
                            while($siswa = mysqli_fetch_array($querymodal1)){
                                echo "<tr>";
                                    echo "<td>".$siswa['ID_Training']."</td>";
                                    echo "<td>".$siswa['Keaktifan']."</td>";
                                    echo "<td>".$siswa['Nama_Siswa']."</td>";
                                echo "</tr>";
                            }  
                        ?>
                        </tbody>
                    </table>
                    <?php
                }
                else if($status == "kerjasama"){
                    ?>
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Kerja Sama</th>
                                <th>Nama Siswa</th>
                            </tr>
                        </thead>
                        <tbody> 
                        <?php
                            $sqlmodal2 = "SELECT * FROM training WHERE Kerja_Sama ='".$idpengguna6."'";
                            $querymodal1 = mysqli_query($koneksi, $sqlmodal2);
                            while($siswa = mysqli_fetch_array($querymodal1)){
                                echo "<tr>";
                                    echo "<td>".$siswa['ID_Training']."</td>";
                                    echo "<td>".$siswa['Kerja_Sama']."</td>";
                                    echo "<td>".$siswa['Nama_Siswa']."</td>";
                                echo "</tr>";
                            }  
                        ?>
                        </tbody>
                    </table>
                    <?php
                }
                else if($status == "ketunaan"){
                    ?>
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Ketunaan</th>
                                <th>Nama Siswa</th>
                            </tr>
                        </thead>
                        <tbody> 
                        <?php
                            $sqlmodal2 = "SELECT * FROM training WHERE Ketunaan ='".$idpengguna7."'";
                            $querymodal1 = mysqli_query($koneksi, $sqlmodal2);
                            while($siswa = mysqli_fetch_array($querymodal1)){
                                echo "<tr>";
                                    echo "<td>".$siswa['ID_Training']."</td>";
                                    echo "<td>".$siswa['Ketunaan']."</td>";
                                    echo "<td>".$siswa['Nama_Siswa']."</td>";
                                echo "</tr>";
                            }  
                        ?>
                        </tbody>
                    </table>
            <?php
                }
            ?>                  
		</div>
		<div class="modal-footer">
			<button type="button" onclick="location.href='indexadmin.php'" class="btn btn-secondary">Tutup</button>
      	</div>    
		</div>
	</div>
	</div>
 <!-- JQUERY SCRIPTS -->
 <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
     <!-- DATA TABLE SCRIPTS -->
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>
         <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>

</body>
</html>