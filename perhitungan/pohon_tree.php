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
    <title>Halaman Admin</title>
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
   <!-- Chart JS-->
   <script type="text/javascript" src="../assets/js/Chart.js"></script>
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
                        <a   href="../perhitungan/indexperhitungan.php"><i class="fa fa-bar-chart-o fa-3x"></i> Perhitungan Decision Tree </a>
                    </li>
                    <li  >
                    <a href="#"><i class="fa fa-edit fa-3x"></i> Klasifikasi <span class="fa arrow"></span></a>
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
                <div class="row">
                <div class="col-md-offset-2"> 
                <!-- <div class="col-md-6">            -->
				<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
include "../koneksi.php";
//select id dari pohon keputusan
$que_sql=mysqli_query($koneksi,"SELECT ID_Rule FROM rule");
$id=array();$l=0;
while($bar_row=mysqli_fetch_array($que_sql)){
	$id[$l]=$bar_row[0];	
	$l++;
}

$query = mysqli_query($koneksi,"SELECT * FROM rule ORDER BY(ID_Rule)");
$temp_rule=array();
$temp_rule[0]='';
$ll=0;//variabel untuk iterasi id pohon keputusan
while($bar=mysqli_fetch_array($query)){	
	//menampung rule
	if($bar[1]!=''){
		$rule=$bar[1]." AND ".$bar[2];
	}else{
		$rule=$bar[2];
	}
	
	$rule = str_replace("OR","/",$rule);
	//explode rule
	$exRule=explode(" AND ",$rule);
	$jml_ExRule=count($exRule);
	$jml_temp=count($temp_rule);
	
	$i=0;
	while($i<$jml_ExRule){				
		if($temp_rule[$i]==$exRule[$i]){
			$temp_rule[$i]=$exRule[$i];
			$exRule[$i]="---- ";
		}else{
			$temp_rule[$i]=$exRule[$i];
		}				
		
		if($i==($jml_ExRule-1)){
			$t=$i;
			while($t<$jml_temp){
				$temp_rule[$t]="";
				$t++;
			}
		}
				
		//jika terakhir tambah cetak keputusan
		if($i==($jml_ExRule-1)){			
			$strip='';
			for($x=1;$x<=$i;$x++){
				$strip=$strip."---- ";
			}
			$sql_que=mysqli_query($koneksi,"SELECT Keputusan FROM rule WHERE ID_Rule=$id[$ll]");
			$row_bar=mysqli_fetch_array($sql_que);
			if($exRule[$i-1]=="---- "){
				echo "<font color='#920'><b>".$exRule[$i]."</b></font> <i>Maka sekolah = </i><strong>".$row_bar[0]." (".$id[$ll].")</strong>";
			}else if($exRule[$i-1]!="---- "){
				echo "<br>".$strip."<font color='#920'><b>".$exRule[$i]."</b></font> <i>Maka sekolah = </i><strong>".$row_bar[0]."  (".$id[$ll].")</strong>";
			}
		}
		//jika pertama
		else if($i==0){
			if($ll==1){
				echo "<font color='#920'><b>".$exRule[$i]."</b></font> <b></b>";
			}else{
				echo $exRule[$i]." ";
			}			
		}
		//jika ditengah
		else{
			if($exRule[$i]=="---- "){
				echo $exRule[$i]." ";
			}else{
				if($exRule[$i-1]=="---- "){
					echo "<font color='#920'><b>".$exRule[$i]."</b></font> <b>: ?</b>";
				}else{
					$strip='';
					for($x=1;$x<=$i;$x++){
						$strip=$strip."---- ";
					}
					echo "<br>".$strip."<font color='#920'><b>".$exRule[$i]."</b></font> <b>: ?</b>";
				}				
			}			
		}
		$i++;
	}
	echo "<br>";
	$ll++;
}
?>
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