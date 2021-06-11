
 	<?php
			$key = $_GET["key_noti"];
			require("connect.php");
			$sql = "CALL delete_funny_detail( '$key')";
			$result_tmp_noti = mysqli_query($conn, $sql);
			if($result_tmp_noti){
				
				header("location:edit_funny_detail.php");
				mysqli_close($conn);
			}else{
				echo mysqli_error($conn);
			}
		
	?>