<?php
include ("../koneksi.php");
global $koneksi;

$sql = "INSERT INTO klustering SELECT `ID_Training`, `IQ`, `Nilai_PAI`, `Rata_rata_Nilai_US` FROM `training` WHERE 1";
$query = mysqli_query($koneksi, $sql);
// $iq = "";
// $pai = "";
// $nilaius = "";
// $keaktifan = "";
// $kedisiplinan = "";
// $kerjasama = "";
// $ketunaan = "";
$sql1 = "SELECT `Keaktifan`, `Kedisiplinan`, `Kerja_Sama`, `Ketunaan` FROM `training` WHERE 1";
$query = mysqli_query($koneksi, $sql1);
while($row=mysql_fetch_assoc($sql)){
    if($row['Keaktifan'] = 'Kurang'){

    }
}
//         if ($row[1] != '') {
//             $iq = $row[1];
//         } else {
//             $iq = 0;
//         }
//         return $iq;
//         $sql1 = "INSERT INTO klustering
//         VALUES (0,'$iq', 0, 0, 0, 0, 0, 0)";
//         $query1 = mysqli_query($koneksi, $sql1);
    // function pai($pai){
    //     if ($row[2] != '') {
    //         $pai=str_replace("71-75",25,$pai);
    //         $pai=str_replace("76-80",50,$pai);
    //         $pai=str_replace("81-85",75,$pai);
    //         $pai=str_replace("86-90",100,$pai);
    //         $pai=str_replace("91-95",125,$pai);
    //     } else {
    //         $pai = 0;
    //     }
    //     return $pai;
    // }
	// function rata($nilaius){
    //     if ($row[3] != '') {
    //         $nilaius=str_replace("71-75",25,$nilaius);
    //         $nilaius=str_replace("76-80",50,$nilaius);
    //         $nilaius=str_replace("81-85",75,$nilaius);
    //         $nilaius=str_replace("86-90",100,$nilaius);
    //     } else {
    //         $nilaius = 0;
    //     }
    //     return $nilaius;
    // }
    // function keaktifan($keaktifan){
    //     if ($row[4] != '') {
    //         $keaktifan=str_replace("Kurang",25,$keaktifan);
    //         $keaktifan=str_replace("Baik",50,$keaktifan);
    //         $keaktifan=str_replace("Sangat Baik",75,$keaktifan);
    //     } else {
    //         $keaktifan = 0;
    //     }
    //     return $keaktifan;
    // }
    // function kedisiplinan($kedisiplinan){
    //     if ($row[5] != '') {
    //         $kedisiplinan=str_replace("Kurang",25,$kedisiplinan);
    //         $kedisiplinan=str_replace("Baik",50,$kedisiplinan);
    //         $kedisiplinan=str_replace("Sangat Baik",75,$kedisiplinan);
    //     } else {
    //         $kedisiplinan = 0;
    //     }
    //     return $kedisiplinan;
    // }
    // function kerja($kerjasama){
    //     if ($row[6] != '') {
    //         $kerjasama=str_replace("Kurang",25,$kerjasama);
    //         $kerjasama=str_replace("Baik",50,$kerjasama);
    //         $kerjasama=str_replace("Sangat Baik",75,$kerjasama);
    //     } else {
    //         $kerjasama = 0;
    //     }
    //     return $kerjasama;
    // }
    // function ketunaan($ketunaan){
    //     if ($row[7] != '') {
    //         $ketunaan=str_replace("Kelainan Fisik",25,$ketunaan);
    //         $ketunaan=str_replace("Kelainan Emosional",50,$ketunaan);
    //         $ketunaan=str_replace("Kelainan Akademik",75,$ketunaan);
    //     } else {
    //         $ketunaan = 0;
    //     }
    //     return $ketunaan;
    // }
    
    // $sql1 = "INSERT INTO klustering
    // VALUES (0,'$iq', '$pai', '$nilaius', '$keaktifan', '$kedisiplinan', '$kerjasama', '$ketunaan')";
    // $query1 = mysqli_query($koneksi, $sql1);					
//}
// apakah query simpan berhasil?
if( $query ) {
    // kalau berhasil alihkan ke halaman index.php dengan status=sukses
    header('Location: indexkluster.php?notifikasi=sukses');
} else {
    // kalau gagal alihkan ke halaman indek.php dengan status=gagal
    header('Location: indexkluster.php?notifikasi=gagal');
}			