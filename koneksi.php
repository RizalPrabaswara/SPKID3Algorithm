<?php
// untuk tulisan didalam tanda "" silakan sesuaikan dengan detail database Anda
$servername = "localhost";
$database = "dbtugasakhir3";
$username = "root";
$password = "";
 
// membuat koneksi
$koneksi = mysqli_connect($servername, $username, $password, $database);
global $koneksi;

// mengecek koneksi
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>