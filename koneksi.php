<?php 
$koneksi = mysqli_connect("localhost","root","","3dtech");

// ngecek koneksi
if(mysqli_connect_error()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}

?>