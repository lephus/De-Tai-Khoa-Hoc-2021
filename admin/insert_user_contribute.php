
	<!DOCTYPE html>
<html>
<head>
	<title>Insert Course Gr3atCode</title>
	<style type="text/css">
		*{
			text-align: center;
			margin: 0px;
			padding:0px;
		}
		h3{
			color: blue;
		}
		#container{
			width: auto;
			margin: auto;
		}
		#menu{
			margin: 10px;
			text-align: center;
			font-size: 25px;
			padding-bottom: 20px;
		}
		#space{
			color: red;
			height: 10px; 
			margin: 50px;
		}
		table{
			width: auto;
			margin: auto;
			text-align: center;
		}
		
		.insert{
			color: green;
			margin:20px ;
		}
		textarea{
			min-height: 50px;
		}
		


	</style>
</head>
<body>

 	<?php
		if(isset($_POST["btnsubmit"])){

				$id_userz = $_POST["id_user_user_contribute"];
				$id_user = urlencode(trim($id_userz));

				$rankingz = $_POST["ranking_user_contribute"];
				$ranking = urlencode(trim($rankingz));

				$is_disabledz = $_POST["is_disabaled_user_contribute"];
				$is_disabled = urlencode(trim($is_disabledz));

			
			require("connect.php");
			$sql = "CALL insert_user_contribute('$id_user', '$ranking','$is_disabled')";
			$result_tmp_noti = mysqli_query($conn, $sql);
			if($result_tmp_noti){
				
				header("location:edit_user_contribution.php");
				mysql_close($conn);
			}else{
				echo mysqli_error($conn);
			}
		}
	?>
	<div id="container">
		<div id="menu">
			<div id="btLogout"><a href="index.php"> LogOut</a></div>
		</div>

	

		

		<!-- ------------------------------------ -->
		<!--       BẢNG user_contribute	          -->
		<!-- ------------------------------------ -->
		<div id="space">*****************************************************************</div>
		<div id="user_contribute" style="background-color: #cccccc">
			<h3>USER CONTRIBUTE</h3>
			<div>
				<form method="POST">
				<table border="1px">
					<tr>
						<th>ID</th>
						<th>ID_USER</th>
						<th>RANKING</th>
						<th>UPDATED</th>
						<th>IS_DISABLED</th>
				
					</tr>

		
					<!-- show data user_contribute từ db -->

				
						<tr>
						<td>
							<div class="form-group">
	                            <textarea class="form-control-textarea" name="id_user_contribute" disabled></textarea>
	                            <label class="label-control" for="cmessage"></label>
	                            <div class="help-block with-errors"></div>
	                        </div> 
						</td>
						<td>
							<div class="form-group">
	                            <textarea class="form-control-textarea" name="id_user_user_contribute" required>
	                       
	                            </textarea>
	                            <label class="label-control" for="cmessage"></label>
	                            <div class="help-block with-errors"></div>
	                        </div> 
						</td>
						<td>
							<div class="form-group">
	                            <textarea class="form-control-textarea" name="ranking_user_contribute" required></textarea>
	                            <label class="label-control" for="cmessage"></label>
	                            <div class="help-block with-errors"></div>
	                        </div> 
						</td>
						<td>
							<div class="form-group">
	                            <textarea class="form-control-textarea" name="updated_user_contribute" disabled>
	                           
	                            </textarea>
	                            <label class="label-control" for="cmessage"></label>
	                            <div class="help-block with-errors"></div>
	                        </div> 
						</td>
						<td>
							<div class="form-group">
	                            <textarea class="form-control-textarea" name="is_disabaled_user_contribute" required>
	                            
	                            </textarea>
	                            <label class="label-control" for="cmessage"></label>
	                            <div class="help-block with-errors"></div>
	                        </div> 
						</td>
					</tr>
					<!--end show data user contribute từ db -->
						<tr><td><input type="submit" name="btnsubmit" value="INSERT"></td></tr>
				</table>
				</form>
			</div>

			<div id="space"></div>
		<!-- ------------------------------------ -->
		<!--    	HẾT	BẢNG user_contribute	  -->
		<!-- ------------------------------------ -->

					




	</div>
</body>
</html>