<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
include "../koneksi.php";
global $koneksi;
$query=mysqli_query($koneksi,"SELECT * FROM datauji");
$id_rule=array();
$it=0;
while($bar=mysqli_fetch_array($query)){
	//ambil data uji
        $iq = $bar['IQ'];
        $nilaius = $bar['Rata_rata_Nilai_US'];
        $keaktifan = $bar['Keaktifan'];
        $kedisiplinan = $bar['Kedisiplinan'];
        $kerjasama = $bar['Kerja_Sama'];
        $ketunaan = $bar['Ketunaan'];

        $sql=mysqli_query($koneksi,"SELECT * FROM rule");	
        $keputusan = "";
        while($row=mysqli_fetch_array($sql)){
            if ($row[1] != '') {
                $rule = $row[1] . " AND " . $row[2];
            } else {
                $rule = $row[2];
            }
            
            //mengubah parameter
            $rule=str_replace("<"," k ",$rule);
            $rule=str_replace("="," s ",$rule);
            $rule=str_replace(">="," l ",$rule);		
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
                        if($explodeRule[0]<$explodeRule[1]){
                            $bol[$a]="Benar";
                        }else{
                            $bol[$a]="Salah";
                        }
                    }else if($parameter=='l'){
                        //pecah dengan s
                        $explodeRule = explode(" l ",$explodeOR[$a]);
                        //nilai true false
                        if($explodeRule[0]>=$explodeRule[1]){
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
                $keputusan=$row['Keputusan'];
                $id_rule[$it]=$row['ID_Rule'];
            }
            if($keputusan==''){
                $que=mysqli_query($koneksi,"SELECT Parent FROM rule");				
                $jml=array();
                $exParent=array();
                $i=0;
                while($row_baris=mysqli_fetch_array($que)){
                    $exParent=explode(" AND ",$row_baris['Parent']);								
                    $jml[$i] = count($exParent);	
                    $i++;
                }
                $maxParent=max($jml);
                $sql_query=mysqli_query($koneksi,"SELECT * FROM rule");				
                while($row_bar=mysqli_fetch_array($sql_query)){
                    $explP=explode(" AND ",$row_bar['Parent']);
                    $jmlT=count($explP);
                    if($jmlT==$maxParent){
                        $keputusan=$row_bar['Keputusan'];
                        $id_rule[$it] = $row_bar['ID_Rule'];
                    }
                }
            }									
        }
        $it++;
	    mysqli_query($koneksi,"UPDATE datauji SET Hasil_Klasifikasi='$keputusan' WHERE ID_Uji=$bar[0]");		
	}
    


//menampilkan data uji dengan hasil prediksi
global $koneksi;
$sql1 = mysqli_query($koneksi,"SELECT * FROM datauji");	
?>
<table bgcolor='#fa5' border='1' cellspacing='0' cellspading='0' align='center' width=950>
	<tr align='center'>
		<th>No</th><th>IQ</th><th>Rata2</th><th>Keaktifan</th><th>Kedisiplinan</th><th>Kerja Sama</th><th>Ketunaan</th><th><b>Sekolah ASLI</b></th><th><b>Sekolah PREDIKSI</b></th><th><b>ID Rule Terpilih</b></th><th><b>Ketepatan</b></th>
	</tr>
<?php
	$warna1 = '#ffc';
	$warna2 = '#eea';
	$warna  = $warna1; 	
	$no=1;	
	while($row=mysqli_fetch_array($sql1)){
		if($warna == $warna1){ 
			$warna = $warna2; 
		} else { 
			$warna = $warna1; 
		} 			
		if($row['Jenis_Sekolah']==$row['Hasil_Klasifikasi']){
			$ketepatan="Benar";
		}else{
			$ketepatan="Salah";
		}
?>
		<tr bgcolor=<?php echo $warna; ?> align='center'>
			<td><?php echo $no;?></td>			
			<td><?php echo $row['IQ'];?></td>
			<td><?php echo $row['Rata_rata_Nilai_US'];?></td>
			<td><?php echo $row['Keaktifan'];?></td>
			<td><?php echo $row['Kedisiplinan'];?></td>
			<td><?php echo $row['Kerja_Sama'];?></td>
			<td><?php echo $row['Ketunaan'];?></td>
			<td><b><?php echo $row['Jenis_Sekolah'];?></b></td>					
			<td><b><?php echo $row['Hasil_Klasifikasi'];?></b></td>
            <td><?php echo $id_rule[$no-1];?></td>
			<td><?php if($ketepatan=='Salah'){ echo "<b>".$ketepatan."</b>"; }else{ echo $ketepatan; } ?></b></td>
		</tr>
	<?php
		$no++;
	}
	?>
</table>

<?php
//perhitungan akurasi
global $koneksi;
$que = mysqli_query($koneksi,"SELECT * FROM datauji");
$jumlah=mysqli_num_rows($que);
$TP=0; $FN=0; $TN=0; $FP=0; $kosong=0;
while($row=mysqli_fetch_array($que)){
	$asli=$row['Jenis_Sekolah'];
	$prediksi=$row['Hasil_Klasifikasi'];
	if($asli=='SLB' & $prediksi=='SLB'){
		$TN++;
	}else if($asli=='SLB' & $prediksi=='SMP'){
		$FP++;
	}else if($asli=='SMP' & $prediksi=='SMP'){
		$TP++;
	}else if($asli=='SMP' & $prediksi=='SLB'){
		$FN++;
	}else if($prediksi==''){
		$kosong++;
	}
}
$tepat=($TP+$TN);
$tidak_tepat=($FP+$FN+$kosong);
$akurasi=($tepat/$jumlah)*100;
$laju_error=($tidak_tepat/$jumlah)*100;
$sensitivitas=($TP/($TP+$FN))*100;
$spesifisitas=($TN/($FP+$TN))*100;
$PrecisionSMP=($TP/($TP+$FP))*100;
$PrecisionSLB=($TN/($FN+$TN))*100;

$akurasi = round($akurasi,2);	
$laju_error = round($laju_error,2);
$sensitivitas = round($sensitivitas,2);	
$spesifisitas = round($spesifisitas,2);	
echo "<center><h4>";
echo "Jumlah data yang diprediksi: $jumlah<br>";
echo "Jumlah data yang diprediksi tepat: $tepat<br>";
echo "Jumlah data yang diprediksi tidak tepat: $tidak_tepat<br>";
if($kosong!=0){ echo "Jumlah data yang prediksinya kosong: $kosong<br></h4>"; }
echo "<h2>AKURASI = $akurasi %<br>";
echo "LAJU ERROR = $laju_error %<br></h2>";
echo "<h4>TP: $TP | TN: $TN | FP: $FP | FN: $FN<br></h4>";
echo "<h2>Recall SMP = $sensitivitas %<br>";
echo "Recall SLB = $spesifisitas %<br>";
echo "<h2>Precision SMP = $PrecisionSMP %<br>";
echo "Precision SLB = $PrecisionSLB %<br>";
echo "</h2></center>";
?>