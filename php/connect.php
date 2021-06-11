<?php 	
	$host = "35.225.179.119";
	$username = "user01";
	$passdata = "Hao1234567890)";
	$namedatabase = "blog";
	$connect = mysqli_connect( $host , $username ,$passdata, $namedatabase);
	mysqli_query($connect, "SET NAMES 'utf8'");
	 if ($connect) {
	 	
	 }else{
	 	echo "fail";
	 }
 ?>