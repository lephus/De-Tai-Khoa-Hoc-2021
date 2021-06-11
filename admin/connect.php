<?php 
	//$conn=mysqli_connect("35.225.179.119","user01","Hao1234567890)","blog" )
	//						or die("can not connected database"); 
	$conn=mysqli_connect("127.0.0.1","root","","blog" )
							or die("can not connected database"); 
	mysqli_set_charset($conn, "utf8");
?>