<?php
	$awal = microtime(true); 
	error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
	// ini_set('max_execution_time', '300');
	set_time_limit(0);
	include '../koneksi.php';
	include 'fungsi.php';
	mysqli_query($koneksi,"TRUNCATE rule");	
	pembentukan_tree("","");
	echo "<br><h1><center>---PROSES SELESAI---</center></h1>";
	echo "<center><a href='../datarule/fungsibersih.php' accesskey='5' title='pohon keputusan'>Lihat pohon keputusan yang terbentuk</a></center>";
	
	$akhir = microtime(true);
	$lama = $akhir - $awal;
	echo "<br>Lama eksekusi script adalah: ".$lama." detik";
	
	//fungsi utama
	function proses_DT($parent , $kasus_cabang1 , $kasus_cabang2 , $kasus_cabang3){	
		echo "cabang ";
		pembentukan_tree($parent , $kasus_cabang1);		
		echo "$a"."cabang ";
		pembentukan_tree($parent , $kasus_cabang2);
		echo "$a"."cabang ";
		pembentukan_tree($parent , $kasus_cabang3);
	}		
	
	function pangkas($PARENT, $KASUS, $LEAF){
		global $koneksi;	
			mysqli_query($koneksi,"INSERT INTO rule (Parent,Akar,Aturan,Keputusan) VALUES (\"$PARENT\" , \"$KASUS\" ,'', \"$LEAF\")");
		echo "Keputusan = ".$LEAF."<br>================================<br>";		
	}
	
	//fungsi proses dalam suatu kasus data
	function pembentukan_tree($N_parent , $kasus){
		$a =  0;
		global $koneksi;
		//mengisi kondisi
		if($N_parent!=''){
			$kondisi = $N_parent." AND ".$kasus;
		}else{
			$kondisi = $kasus;
		}		
		echo $kondisi."<br>";
		//cek data heterogen / homogen???
		$cek = cek_heterohomogen('Jenis_Sekolah',$kondisi);		
		if($cek=='homogen'){
			global $keputusan;
			$sql_keputusan = mysqli_query($koneksi,"SELECT DISTINCT(Jenis_Sekolah) FROM training WHERE $kondisi");
			$row_keputusan = mysqli_fetch_array($sql_keputusan);	
			$keputusan = $row_keputusan['0'];
			echo "<br><b>$kondisi"." data ini bernilai "."$cek"." sehingga menunjukkan bahwa hasil keputusan nantinya adalah ". "$keputusan</b>";
			echo "<br>LEAF ";
			//insert atau lakukan pemangkasan cabang
			pangkas($N_parent , $kasus , $keputusan);
			
		}//jika data masih heterogen
		else if($cek=='heterogen'){
				$kondisi_sekolah="";
				if($kondisi!=""){
					$kondisi_sekolah=$kondisi." AND ";
				}
				$jml_tinggi = jumlah_data("$kondisi_sekolah Jenis_Sekolah='SLB'");
				$jml_sedang = jumlah_data("$kondisi_sekolah Jenis_Sekolah='SMP'");
				// $jml_rendah = jumlah_data("$kondisi_ipk Jenis_Sekolah='Ponpes'");
				$jml_total = $jml_tinggi + $jml_sedang;
				// + $jml_rendah  , $jml_rendah
				
				//hitung entropy semua
				$entropy_all = hitung_entropy($jml_tinggi , $jml_sedang);
				echo "<br><b> cabang "."$kondisi"." data ini bernilai "."$cek"." sehingga menunjukkan bahwa hasil keputusan nantinya bercabang</b>";
				Echo "<br>".$entropy_all."Entropy Total <br>";
				
				//cek berapa nilai setiap atribut
				$nilai_iq = array();
				$nilai_iq = cek_nilaiAtribut('IQ',$kondisi);								
				$jmlIq = count($nilai_iq);	
				$nilai_us = array();
				$nilai_us = cek_nilaiAtribut('Rata_rata_Nilai_US',$kondisi);								
				$jmlUs = count($nilai_us);								
				$nilai_keaktifan = array();
				$nilai_keaktifan = cek_nilaiAtribut('Keaktifan',$kondisi);								
				$jmlKeaktifan = count($nilai_keaktifan);
				$nilai_kedisiplinan = array();
				$nilai_kedisiplinan = cek_nilaiAtribut('Kedisiplinan',$kondisi);								
				$jmlKedisiplinan = count($nilai_kedisiplinan);
				$nilai_kerja = array();
				$nilai_kerja = cek_nilaiAtribut('Kerja_Sama',$kondisi);								
				$jmlKerja = count($nilai_kerja);
				$nilai_ketunaan = array();
				$nilai_ketunaan = cek_nilaiAtribut('Ketunaan',$kondisi);								
				$jmlKetunaan = count($nilai_ketunaan);				
							
			//hitung gain atribut
				mysqli_query($koneksi,"TRUNCATE perhitungan");
				//IQ
				if($jmlIq!=1){
					$NA1Iq="IQ='$nilai_iq[0]'";
					$NA2Iq="";
					$NA3Iq="";
					$NA4Iq="";
					if($jmlIq==2){
						$NA2Iq="IQ='$nilai_iq[1]'";
					}else if ($jmlIq==3){
						$NA2Iq="IQ='$nilai_iq[1]'";
						$NA3Iq="IQ='$nilai_iq[2]'";
					}
					else if ($jmlIq==4){
						$NA2Iq="IQ='$nilai_iq[1]'";
						$NA3Iq="IQ='$nilai_iq[2]'";
						$NA4Iq="IQ='$nilai_iq[3]'";
					}				
					hitung_gain($kondisi , "IQ"	, $entropy_all , $NA1Iq, $NA2Iq, 
					$NA3Iq, "", "" , "");	
				}
				
				//rata rata US
				if($jmlUs!=1){
					$NA1Us="Rata_rata_Nilai_US='$nilai_us[0]'";
					$NA2Us="";
					$NA3Us="";
					$NA4Us="";
					if($jmlUs==2){
						$NA2Us="Rata_rata_Nilai_US='$nilai_us[1]'";
					}else if ($jmlUs==3){
						$NA2Us="Rata_rata_Nilai_US='$nilai_us[1]'";
						$NA3Us="Rata_rata_Nilai_US='$nilai_us[2]'";
					}
					else if ($jmlUs==4){
						$NA2Us="Rata_rata_Nilai_US='$nilai_us[1]'";
						$NA3Us="Rata_rata_Nilai_US='$nilai_us[2]'";
						$NA4Us="Rata_rata_Nilai_US='$nilai_us[3]'";
					}				
					hitung_gain($kondisi , "Rata_rata_Nilai_US"	, $entropy_all , $NA1Us, $NA2Us, $NA3Us, 
					$NA4Us, "", "");
				}				
				//Keaktifan
				if($jmlKeaktifan!=1){
					$NA1Keaktifan="Keaktifan='$nilai_keaktifan[0]'";
					$NA2Keaktifan="";
					$NA3Keaktifan="";
					if($jmlKeaktifan==2){
						$NA2Keaktifan="Keaktifan='$nilai_keaktifan[1]'";
					}else if ($jmlKeaktifan==3){
						$NA2Keaktifan="Keaktifan='$nilai_keaktifan[1]'";
						$NA3Keaktifan="Keaktifan='$nilai_keaktifan[2]'";
					}
					hitung_gain($kondisi , "Keaktifan"	, $entropy_all , $NA1Keaktifan, $NA2Keaktifan, 
					$NA3Keaktifan, "", "" , "");	
				}
				//Kedisiplinan
				if($jmlKedisiplinan!=1){
					$NA1Kedisiplinan="Kedisiplinan='$nilai_kedisiplinan[0]'";
					$NA2Kedisiplinan="";
					$NA3Kedisiplinan="";
					if($jmlKedisiplinan==2){
						$NA2Kedisiplinan="Kedisiplinan='$nilai_kedisiplinan[1]'";
					}else if ($jmlKedisiplinan==3){
						$NA2Kedisiplinan="Kedisiplinan='$nilai_kedisiplinan[1]'";
						$NA3Kedisiplinan="Kedisiplinan='$nilai_kedisiplinan[2]'";
					}
					hitung_gain($kondisi , "Kedisiplinan"	, $entropy_all , $NA1Kedisiplinan, $NA2Kedisiplinan, 
					$NA3Kedisiplinan, "", "" , "");	
				}
				//Kerja Sama
				if($jmlKerja!=1){
					$NA1Kerja="Kerja_Sama='$nilai_kerja[0]'";
					$NA2Kerja="";
					$NA3Kerja="";
					if($jmlKerja==2){
						$NA2Kerja="Kerja_Sama='$nilai_kerja[1]'";
					}else if ($jmlKerja==3){
						$NA2Kerja="Kerja_Sama='$nilai_kerja[1]'";
						$NA3Kerja="Kerja_Sama='$nilai_kerja[2]'";
					}
					hitung_gain($kondisi , "Kerja_Sama"	, $entropy_all , $NA1Kerja, $NA2Kerja, 
					$NA3Kerja, "", "" , "");
				}																																				
				//Ketunaan
				if($jmlKetunaan!=1){
					$NA1Ketunaan="Ketunaan='$nilai_ketunaan[0]'";
					$NA2Ketunaan="";
					$NA3Ketunaan="";
					if($jmlKetunaan==2){
						$NA2Ketunaan="Ketunaan='$nilai_ketunaan[1]'";
					}else if ($jmlKetunaan==3){
						$NA2Ketunaan="Ketunaan='$nilai_ketunaan[1]'";
						$NA3Ketunaan="Ketunaan='$nilai_ketunaan[2]'";
					}
					hitung_gain($kondisi , "Ketunaan"	, $entropy_all , $NA1Ketunaan, $NA2Ketunaan, 
					$NA3Ketunaan, "", "" , "");
				}
					
				//ambil nilai gain tertinggi
					$sql_max = mysqli_query($koneksi,"SELECT MAX(Nilai_Gain) FROM perhitungan");
					$row_max = mysqli_fetch_array($sql_max);	
					$max_gain = $row_max[0];
					$sql = mysqli_query($koneksi,"SELECT * FROM perhitungan WHERE Nilai_Gain='$max_gain'");
					$row = mysqli_fetch_array($sql);	
					$atribut = $row[1];
					echo "Atribut terpilih = ".$atribut.", dengan nilai gain = ".$max_gain."<br>";					
					echo "<br>================================<br>";
		$a++;
			if($max_gain == 0){
						global $keputusan;
						echo "<br>LEAF ";
						$Ntinggi = $kondisi." AND Jenis_Sekolah='SLB'";
						$Nsedang = $kondisi." AND Jenis_Sekolah='SMP'";
						// $Nrendah = $kondisi." AND Jenis_Sekolah='Ponpes'";
						$jumlahTinggi = jumlah_data("$Ntinggi");
						$jumlahSedang = jumlah_data("$Nsedang");
						
						if($jumlahSedang <= $jumlahTinggi){
								$keputusan = 'SLB';
						}
						else if($jumlahTinggi <= $jumlahSedang){
								$keputusan = 'SMP';
						}
										
							//insert atau lakukan pemangkasan cabang
						pangkas($N_parent , $kasus , $keputusan);
			}
				//IQ TERPILIH
			else{
				if($atribut=="IQ"){
					//jika nilai atribut 2
					if($jmlIq==2){
						proses_DT($kondisi , "($atribut='$nilai_iq[0]')" , "($atribut='$nilai_iq[1]')", "");
					}
					else if($jmlIq==3){
						proses_DT($kondisi , "($atribut='$nilai_iq[0]')" , "($atribut='$nilai_iq[1]')" , "($atribut='$nilai_iq[2]')");
					}
				}			

				//Rata rata US Terpilih
				else if($atribut=="Rata_rata_Nilai_US"){					
					if($jmlUs==2){
						proses_DT($kondisi , "($atribut='$nilai_us[0]')" , "($atribut='$nilai_us[1]')", "");
					}
					else if($jmlUs==3){
						proses_DT($kondisi , "($atribut='$nilai_us[0]')" , "($atribut='$nilai_us[1]')" , "($atribut='$nilai_us[2]')");
					}
					else if($jmlUs==4){
					}									
				}
				//Keaktifan Terpilih
				else if($atribut=="Keaktifan"){					
					if($jmlKeaktifan==2){
						proses_DT($kondisi , "($atribut='$nilai_keaktifan[0]')" , "($atribut='$nilai_keaktifan[1]')", "");
					}
					else if($jmlKeaktifan==3){
						proses_DT($kondisi , "($atribut='$nilai_keaktifan[0]')" , "($atribut='$nilai_keaktifan[1]')" , "($atribut='$nilai_keaktifan[2]')");
					}
				}
				//Kedisiplinan Terpilih
				else if($atribut=="Kedisiplinan"){					
					if($jmlKedisiplinan==2){
						proses_DT($kondisi , "($atribut='$nilai_kedisiplinan[0]')" , "($atribut='$nilai_kedisiplinan[1]')" , "");
					}
					else if($jmlKedisiplinan==3){
						proses_DT($kondisi , "($atribut='$nilai_kedisiplinan[0]')" , "($atribut='$nilai_kedisiplinan[1]')" , "($atribut='$nilai_kedisiplinan[2]')");
					}
				}
				//Kerjasama Terpilih
				else if($atribut=="Kerja_Sama"){					
					if($jmlKerja==2){
						proses_DT($kondisi , "($atribut='$nilai_kerja[0]')" , "($atribut='$nilai_kerja[1]')", "");
					}
					else if($jmlKerja==3){
						proses_DT($kondisi , "($atribut='$nilai_kerja[0]')" , "($atribut='$nilai_kerja[1]')" , "($atribut='$nilai_kerja[2]')");
					}
				}
				//Ketunaan Terpilih
				else if($atribut=="Ketunaan"){					
					if($jmlKetunaan==2){
						proses_DT($kondisi , "($atribut='$nilai_ketunaan[0]')" , "($atribut='$nilai_ketunaan[1]')", "");
					}
					else if($jmlKetunaan==3){
						proses_DT($kondisi , "($atribut='$nilai_ketunaan[0]')" , "($atribut='$nilai_ketunaan[1]')" , "($atribut='$nilai_ketunaan[2]')");
					}
				}				
			}
		}						
	}
?>