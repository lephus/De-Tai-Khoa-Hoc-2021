

 		<?php
				$key = $_GET["key_noti"];
			require("connect.php");
			$sql =  "CALL delete_hottrend_detail('$key')";

			$result_tmp_noti = mysqli_query($conn, $sql);
			if($result_tmp_noti){
				
				header("location:edit_hottrend_detail.php");
				mysqli_close($conn);
			}else{
				echo mysqli_error($conn);
			}
	
	?>