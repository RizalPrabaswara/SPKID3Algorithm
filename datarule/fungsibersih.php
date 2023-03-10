<?php
include ("../koneksi.php");
global $koneksi;
$sql = "UPDATE rule SET Parent=REPLACE(REPLACE(REPLACE(Parent, CHAR(10), ''), CHAR(13), ''), CHAR(9), '') 
WHERE 1";
        $query = mysqli_query($koneksi, $sql);
$sql1 = "DELETE FROM rule WHERE Akar=''";
        $query1 = mysqli_query($koneksi, $sql1);

        // apakah query simpan berhasil?
        if( $query && $query1 ) {
            $sql=mysqli_query($koneksi,"SELECT * FROM rule");	
			while($row=mysqli_fetch_array($sql)){
				if ($row[1] != '') {
                    $sql1 = "UPDATE rule SET Aturan = concat(Parent,' AND ',Akar) WHERE 1";
                    $query = mysqli_query($koneksi, $sql1);
				} 
                else {
                    $sql2 = "UPDATE rule SET Aturan = Akar WHERE ID_Rule=1";
                    $query = mysqli_query($koneksi, $sql2);
				}
            }
            // kalau berhasil alihkan ke halaman index.php dengan status=sukses
            header('Location: indexrule.php?notifikasi=suksesedit');
        } else {
            // kalau gagal alihkan ke halaman indek.php dengan status=gagal
            header('Location: indexrule.php?notifikasi=gagaledit');
        }
?>