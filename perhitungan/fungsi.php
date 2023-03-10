<?php
include "../koneksi.php";
	//fungsi cek nilai atribut
	function cek_nilaiAtribut($field , $kondisi){
		global $koneksi;
		//sql disticnt		
		$hasil = array();
		if($kondisi==''){
			$sql = mysqli_query($koneksi,"SELECT DISTINCT($field) FROM training");					
		}else{
			$sql = mysqli_query($koneksi,"SELECT DISTINCT($field) FROM training WHERE $kondisi");					
		}
		$a=0;
		while($row = mysqli_fetch_array($sql)){
			$hasil[$a] = $row['0'];
			$a++;
		}	
		return $hasil;
	}	
	//fungsi cek heterogen data
	function cek_heterohomogen($field , $kondisi){
		global $koneksi;
		//sql disticnt
		if($kondisi==''){
			$sql = "SELECT DISTINCT($field) FROM training";
			$query = mysqli_query($koneksi, $sql);					
		}else{
			$sql = "SELECT DISTINCT($field) FROM training WHERE $kondisi";
			$query = mysqli_query($koneksi,$sql);					
		}
		//jika jumlah data 1 maka homogen
		if (mysqli_num_rows($query) == 1) {                      
			$nilai = "homogen";
		}else{
			$nilai = "heterogen";
		}		
		return $nilai;
	}	
	//fungsi menghitung jumlah data
	function jumlah_data($kondisi){
		global $koneksi;
		//sql
		if($kondisi==''){
			$sql = mysqli_query($koneksi,"SELECT COUNT(*) FROM training $kondisi");	
		}else{
			$sql = mysqli_query($koneksi,"SELECT COUNT(*) FROM training WHERE $kondisi");						
		}		
		$row = mysqli_fetch_array($sql);	
		$jml = $row['0'];
		return $jml;
	}
	//fungsi menghitung gain
	function hitung_gain($kasus , $atribut , $ent_all , $kondisi1 , $kondisi2 , $kondisi3 , $kondisi4 , $kondisi5
	, $kondisi6){
		global $koneksi;
		$data_kasus = '';
		if($kasus!=''){
			$data_kasus = $kasus." AND ";
		}
		//untuk atribut 2 nilai atribut	
		if($kondisi3==''){
			$j_tinggi1 = jumlah_data("$data_kasus Jenis_Sekolah='SLB' AND $kondisi1");
			$j_sedang1 = jumlah_data("$data_kasus Jenis_Sekolah='SMP' AND $kondisi1");
			// $j_rendah1 = jumlah_data("$data_kasus Jenis_Sekolah='Ponpes' AND $kondisi1");
			$jml1 = $j_tinggi1 + $j_sedang1;
			$j_tinggi2 = jumlah_data("$data_kasus Jenis_Sekolah='SLB' AND $kondisi2");
			$j_sedang2 = jumlah_data("$data_kasus Jenis_Sekolah='SMP' AND $kondisi2");
			// $j_rendah2 = jumlah_data("$data_kasus Jenis_Sekolah='Ponpes' AND $kondisi2");
			$jml2 = $j_tinggi2 + $j_sedang2;
			//hitung entropy masing-masing kondisi
			$jml_total = $jml1 + $jml2;
			$ent1 = hitung_entropy($j_tinggi1 , $j_sedang1);
			echo $ent1." Entropy1<br>";
			echo $j_tinggi1." SLB Kondisi 1".$kondisi1."<br>";
			echo $j_sedang1." SMP Kondisi 1".$kondisi1."<br>";
			$ent2 = hitung_entropy($j_tinggi2 , $j_sedang2);
			echo $ent2." Entropy2<br>";
			echo $j_tinggi2."SLB Kondisi 2".$kondisi2."<br>";
			echo $j_sedang2."SMP Kondisi 2".$kondisi2."<br>";
			$gain = $ent_all - ((($jml1/$jml_total)*$ent1) + (($jml2/$jml_total)*$ent2));
			// + $j_rendah1 + $j_rendah2 , $j_rendah1 , $j_rendah2
		}
		//untuk atribut 3 nilai atribut
		else if($kondisi4==''){
			$j_tinggi1 = jumlah_data("$data_kasus Jenis_Sekolah='SLB' AND $kondisi1");
			$j_sedang1 = jumlah_data("$data_kasus Jenis_Sekolah='SMP' AND $kondisi1");
			// $j_rendah1 = jumlah_data("$data_kasus Jenis_Sekolah='Ponpes' AND $kondisi1");
			$jml1 = $j_tinggi1 + $j_sedang1 ;
			$j_tinggi2 = jumlah_data("$data_kasus Jenis_Sekolah='SLB' AND $kondisi2");
			$j_sedang2 = jumlah_data("$data_kasus Jenis_Sekolah='SMP' AND $kondisi2");
			// $j_rendah2 = jumlah_data("$data_kasus Jenis_Sekolah='Ponpes' AND $kondisi2");
			$jml2 = $j_tinggi2 + $j_sedang2 ;
			$j_tinggi3 = jumlah_data("$data_kasus Jenis_Sekolah='SLB' AND $kondisi3");
			$j_sedang3 = jumlah_data("$data_kasus Jenis_Sekolah='SMP' AND $kondisi3");
			// $j_rendah3 = jumlah_data("$data_kasus Jenis_Sekolah='Ponpes' AND $kondisi3");
			$jml3 = $j_tinggi3 + $j_sedang3;
			//hitung entropy masing-masing kondisi
			$jml_total = $jml1 + $jml2 + $jml3;
			$ent1 = hitung_entropy($j_tinggi1 , $j_sedang1 );
			echo $ent1."entropy 1<br>";
			echo $j_tinggi1."SLB Kondisi 1".$kondisi1."<br>";
			echo $j_sedang1."SMP Kondisi 1".$kondisi1."<br>";
			$ent2 = hitung_entropy($j_tinggi2 , $j_sedang2 );
			echo $ent2."entropy 2<br>";
			echo $j_tinggi2."SLB Kondisi 2".$kondisi2."<br>";
			echo $j_sedang2."SMP Kondisi 2".$kondisi2."<br>";
			$ent3 = hitung_entropy($j_tinggi3 , $j_sedang3 );
			echo $ent3."Entropy 3<br>";
			echo $j_tinggi3."SLB Kondisi 3".$kondisi3."<br>";
			echo $j_sedang3."SMP Kondisi 3".$kondisi3."<br>";			
			$gain = $ent_all - ((($jml1/$jml_total)*$ent1) + (($jml2/$jml_total)*$ent2) 
						+ (($jml3/$jml_total)*$ent3));
			//+ $j_rendah1+ $j_rendah2 + $j_rendah3	, $j_rendah1 , $j_rendah2 , $j_rendah3
		}
		//untuk atribut 4 nilai atribut
		else if($kondisi5==''){
			$j_tinggi1 = jumlah_data("$data_kasus Jenis_Sekolah='SLB' AND $kondisi1");
			$j_sedang1 = jumlah_data("$data_kasus Jenis_Sekolah='SMP' AND $kondisi1");
			// $j_rendah1 = jumlah_data("$data_kasus Jenis_Sekolah='Ponpes' AND $kondisi1");
			$jml1 = $j_tinggi1 + $j_sedang1 ;
			$j_tinggi2 = jumlah_data("$data_kasus Jenis_Sekolah='SLB' AND $kondisi2");
			$j_sedang2 = jumlah_data("$data_kasus Jenis_Sekolah='SMP' AND $kondisi2");
			// $j_rendah2 = jumlah_data("$data_kasus Jenis_Sekolah='Ponpes' AND $kondisi2");
			$jml2 = $j_tinggi2 + $j_sedang2 ;
			$j_tinggi3 = jumlah_data("$data_kasus Jenis_Sekolah='SLB' AND $kondisi3");
			$j_sedang3 = jumlah_data("$data_kasus Jenis_Sekolah='SMP' AND $kondisi3");
			// $j_rendah3 = jumlah_data("$data_kasus Jenis_Sekolah='Ponpes' AND $kondisi3");
			$jml3 = $j_tinggi3 + $j_sedang3 ;
			$j_tinggi4 = jumlah_data("$data_kasus Jenis_Sekolah='SLB' AND $kondisi4");
			$j_sedang4 = jumlah_data("$data_kasus Jenis_Sekolah='SMP' AND $kondisi4");
			// $j_rendah4 = jumlah_data("$data_kasus Jenis_Sekolah='Ponpes' AND $kondisi4");
			$jml4 = $j_tinggi4 + $j_sedang4 ;
			//+ $j_rendah1 + $j_rendah2 + $j_rendah3 + $j_rendah4 , $j_rendah1 , $j_rendah2 , $j_rendah3 , $j_rendah4
			//hitung entropy masing-masing kondisi
			$jml_total = $jml1 + $jml2 + $jml3+$jml4;
			$ent1 = hitung_entropy($j_tinggi1 , $j_sedang1 );
			$ent2 = hitung_entropy($j_tinggi2 , $j_sedang2 );
			$ent3 = hitung_entropy($j_tinggi3 , $j_sedang3 );
			$ent4 = hitung_entropy($j_tinggi4 , $j_sedang4 );
			$gain = $ent_all - ((($jml1/$jml_total)*$ent1) + (($jml2/$jml_total)*$ent2)
						+ (($jml3/$jml_total)*$ent3) + (($jml4/$jml_total)*$ent4));				
		}
		
		//desimal 3 angka dibelakang koma
		$gain = round($gain,3);	
		if($gain>0){
			echo "Gain ".$atribut." = ".$gain."<br>";
		}		
		mysqli_query($koneksi,"INSERT INTO perhitungan VALUES ('','$atribut','$gain','$ent1','$ent2','$ent3')");
	}
	//fungsi menghitung entropy
	function hitung_entropy($nilai1 , $nilai2){
		global $koneksi;
		global $entropy;
		$total = $nilai1 + $nilai2;
		
		if($nilai1!=0 && $nilai2!=0){
		// else {
			$entropy = (-($nilai1/$total)*(log(($nilai1/$total),2))) + (-($nilai2/$total)*(log(($nilai2/$total),2)));
		}	
		else{
			$entropy = 0;
		}	
		// desimal 3 angka dibelakang koma
		$entropy = round($entropy, 3);	
		return $entropy;
	}		
?>