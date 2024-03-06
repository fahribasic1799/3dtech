<?php
//konektor database
include '../koneksi.php';

//menangkapdata yang di kirim dari form
$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

//menginput data ke database
mysqli_query($koneksi,"insert into contact2 values('','$name','$email','$subject','$message')");

//mengalihkan halaman kembali ke index.html
header("location:../index.html");