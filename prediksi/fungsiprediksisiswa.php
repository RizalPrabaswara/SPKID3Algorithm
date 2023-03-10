<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Halaman Hasil Prediksi</title>
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
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
   <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
   <script>
		$(document).ready(function(){
			$("#myModal").modal('show');
		});
	</script>
</head>
<?php
include ("../koneksi.php");
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

//Tambah Data Training
    // cek tombol?
    if(isset($_POST['daftar'])){
		global $koneksi;

        // ambil data dari formulir
		$idpengguna = $_POST['ID_Pengguna'];
		$nama = $_POST['Nama_Siswa_HasilKlasifikasi'];
        $iq1 = $_POST['IQ'];
		if($iq1 < 75){
			$iq = '0 - 74';
		}else{
			$iq = '75 - 110';
		}
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

		$sql = "INSERT INTO jawaban
        VALUES (0, $idpengguna ,'$nama','$iq', '$nilaius', '$keaktifan', '$kedisiplinan', '$kerjasama', '$ketunaan')";
        $query = mysqli_query($koneksi, $sql);

        // apakah query simpan berhasil?
        if( $query ) {
			global $idpengguna;
			global $koneksi;
            $sql=mysqli_query($koneksi,"SELECT * FROM rule");	
			$id_rule="";
			$keputusan="";
			while($row=mysqli_fetch_array($sql)){
				if ($row[1] != '') {
					$rule = $row[1] . " AND " . $row[2];
				} else {
					$rule = $row[2];
				}
				
				//mengubah parameter
				$rule=str_replace("<="," k ",$rule);
				$rule=str_replace("="," s ",$rule);
				$rule=str_replace(">"," l ",$rule);		
				//mengganti nilai
				$rule=str_replace("IQ","'$iq'",$rule);
                $rule=str_replace("Rata_rata_Nilai_US","'$nilaius'",$rule);
                $rule=str_replace("Keaktifan","'$keaktifan'",$rule);		
                $rule=str_replace("Kedisiplinan","'$kedisiplinan'",$rule);
                $rule=str_replace("Kerja_Sama","'$kerjasama'",$rule);
                $rule=str_replace("Ketunaan","'$ketunaan'",$rule);
				//menghilangkan '
				$rule = str_replace("'", "", $rule);
				//menggabungkan kata keaktifan, kedisiplinan, kerja sama dan ketunaan
				$rule=str_replace("0 - 74","0-74",$rule);
            	$rule=str_replace("75 - 110","75-110",$rule);
				$rule=str_replace("75 - 100","75-100",$rule);
				$rule=str_replace("Sangat Baik","SangatBaik",$rule);
				$rule=str_replace("Kelainan Fisik","KelainanFisik",$rule);
				$rule=str_replace("Kelainan Emosional","KelainanEmosional",$rule);
				$rule=str_replace("Kelainan Akademik","KelainanAkademik",$rule);
				// echo $row[0].''.$rule;
				//explode and
				$explodeAND = explode(" AND ", $rule);
				$jmlAND = count($explodeAND);
				//menghilangkan ()
				$explodeAND=str_replace("(","",$explodeAND);
				$explodeAND=str_replace(")","",$explodeAND);			
				//deklarasi bol
				$bolAND=array();
				$n=0;
				while($n<$jmlAND){
					//explode or
					$explodeOR = explode(" OR ",$explodeAND[$n]);
					$jmlOR = count($explodeOR);	
					//deklarasi bol
					$bol=array();
					$a=0;
					while($a<$jmlOR){				
						//pecah  dengan spasi
						$exrule2 = explode(" ",$explodeOR[$a]);
						$parameter = $exrule2[1];				
						if($parameter=='s'){
							//pecah  dengan s
							$explodeRule = explode(" s ",$explodeOR[$a]);
							//nilai true false						
							if($explodeRule[0]==$explodeRule[1]){
								$bol[$a]="Benar";
							}else if($explodeRule[0]!=$explodeRule[1]){
								$bol[$a]="Salah";
							}
						}else if($parameter=='k'){
							//pecah  dengan k
							$explodeRule = explode(" k ",$explodeOR[$a]);
							//nilai true false
							if($explodeRule[0]<=$explodeRule[1]){
								$bol[$a]="Benar";
							}else{
								$bol[$a]="Salah";
							}
						}else if($parameter=='l'){
							//pecah dengan s
							$explodeRule = explode(" l ",$explodeOR[$a]);
							//nilai true false
							if($explodeRule[0]>$explodeRule[1]){
								$bol[$a]="Benar";
							}else{
								$bol[$a]="Salah";
							}
						}
						//cetak nilai bolean				
						$a++;
					}
					//isi false
					$bolAND[$n]="Salah";
					$b=0;			
					while($b<$jmlOR){
						//jika $bol[$b] benar bolAND benar
						if($bol[$b]=="Benar"){
							$bolAND[$n]="Benar";
						}
						$b++;
					}			
					$n++;
				}
				//isi boolrule
				$boolRule="Benar";
				$a=0;
				while($a<$jmlAND){			
					//jika ada yang salah boolrule diganti salah
					if($bolAND[$a]=="Salah"){
						$boolRule="Salah";
					}						
					$a++;
				}		
				if($boolRule=="Benar"){
					$keputusan=$row[4];
					$id_rule=$row[0];
				}										
			}
			if ($keputusan == '') {
				$que=mysqli_query($koneksi,"SELECT Parent FROM rule");				
				$jml=array();
				$exParent=array();
				$i=0;
				while($bar=mysqli_fetch_array($que)){
					$exParent=explode(" AND ",$bar['Parent']);								
					$jml[$i] = count($exParent);	
					$i++;
				}
				$maxParent=max($jml);
				$sql_query=mysqli_query($koneksi,"SELECT * FROM rule");				
				while($bar_row=mysqli_fetch_array($sql_query)){
					$explP=explode(" AND ",$bar_row['Parent']);
					$jmlT=count($explP);
					if($jmlT==$maxParent){
						$keputusan=$bar_row[4];
						$id_rule=$bar_row[0];
					}
				}
				$sql1 = "UPDATE klasifikasi SET Hasil_Klasifikasi='$row_bar[4]', Keterangan='Sudah' WHERE ID_klasifikasi=$idpengguna";
        		$query = mysqli_query($koneksi, $sql1);
			}
			else{
				// echo "<h1><center>Anda diprediksi memilih sekolah ".$keputusan."</center></h1>";
				$sql_que=mysqli_query($koneksi,"SELECT * FROM rule WHERE ID_Rule=$id_rule");			
				$row_bar=mysqli_fetch_array($sql_que);
				$rule_terpilih = "IF ".$row_bar[1]." AND ".$row_bar[2]." THEN sekolah = ".$row_bar[4];	
				// echo "<h4><center>Rule yang terpilih adalah rule ke-".$row_bar[0]."<br>".$rule_terpilih."</center></h4>";
				$sql5 = "UPDATE klasifikasi SET Hasil_Klasifikasi='$row_bar[4]', Keterangan='Sudah' WHERE ID_klasifikasi=$idpengguna";
        		$query = mysqli_query($koneksi, $sql5);	
			}				
        } 
		else {
            // kalau gagal alihkan ke halaman indek.php dengan status=gagal
            header('Location: indexprediksi.php');
        }
    }
?>
<body>
	<?php
		include ("../koneksi.php");
	?>
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			<h4 class="modal-title" id="myModalLabel">Hasil Klasifikasi</h4>
		</div>
		<div class="modal-body">
			<p>Putra/Putri anda berdasarkan perhitungan aplikasi disarankan untuk memilih   
				<?php
					$sqlmodal1 = "SELECT * FROM klasifikasi WHERE ID_klasifikasi=$idpengguna";
					$querymodal1 = mysqli_query($koneksi, $sqlmodal1);
					while($klasifikasi = mysqli_fetch_array($querymodal1)){
						echo "<b>Sekolah ".$klasifikasi['Hasil_Klasifikasi']."</b>";
					} 
				?> </p>                   
		</div>
		<div class="modal-footer">
			<button type="button" onclick="location.href='hasil_prediksisiswa.php'" class="btn btn-secondary">Tutup</button>
      	</div>    
		</div>
	</div>
	</div>
</body>
</html>
<?php