<?php
	
				$key = $_GET["key_noti"];
			require("connect.php");
			$sql = "CALL delete_course_detail('$key')";
			$result_tmp_noti = mysqli_query($conn, $sql);
			if($result_tmp_noti){
				
				header("location:edit_course_detail.php");
				mysql_close($conn);
			}else{
				echo mysqli_error($conn);
			}	
	?>