	<?php
			$key = $_GET["key_noti"];
			require("connect.php");
			$sql = "CALL delete_comment( '$key')";
			$result_tmp_noti = mysqli_query($conn, $sql);
			if($result_tmp_noti){
				header("location:admin.php");
				mysqli_close($conn);
			}else{
				echo mysqli_error($conn);
			}	
	?>