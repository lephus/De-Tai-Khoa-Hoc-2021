
 	<?php
	$key = $_GET["key_noti"];
			require("connect.php");
			$sql = "CALL delete_user('$key')";
			$result_tmp_noti = mysqli_query($conn, $sql);
			if($result_tmp_noti){
				
				header("location:edit_user.php");
				mysql_close($conn);
			}else{
				echo mysqli_error($conn);
			}
		
	?>