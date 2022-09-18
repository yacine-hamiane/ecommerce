<?php 

$con = mysqli_connect('localhost:3309','root','','firstshop');

mysqli_set_charset($con , "utf8");


if (mysqli_errno($con)) {
	# code...
	echo "failed to connect to mysql : " . mysqli_connect_error() ;
}


 ?>