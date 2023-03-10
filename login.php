<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
<head>
<title>Login</title>
<meta name="viewport" content="width=device-width,initial-scale=1">
<link rel="stylesheet" type="text/css" href="css/login.css"/>
</head>
<body>
    <br>
    <center><h2><p>Sistem Pendukung Keputusan Pemilihan Jenis Sekolah </p>
        <p>Anak Berkebutuhan Khusus Lulusan SD dengan Algoritma ID3</p></h2></center>
    <div class="wrapper">
        <div class="logo"> <img src="https://www.freepnglogos.com/uploads/tut-wuri-handayani-png-logo/cropped-wuri-handayani2-panau-1.png" alt=""> </div>
        <br>
        <div class="text-center mt-4 name"> Login / Masuk </div>
        <br>
    <form class="p-3 mt-3" action="CekLogin.php" method="post">
        <div class="form-field d-flex align-items-center"> <span class="far fa-user"></span> <input type="text" name="nama" id="nama" placeholder="Nama"> </div>
        <br>
        <div class="form-field d-flex align-items-center"> <span class="fas fa-key"></span> <input type="password" name="nomor" id="nomor" placeholder="NISN/NIGN"> </div> 
        <br>
		<button type="submit" class="btn btn-primary" value="login" name="login">Login </button>
    </form>
    </div>
</body>
</html>