
	<!DOCTYPE html>
<html>
<head>
	<title>Insert ROLE</title>
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
				$name_rolez = $_POST["name_role_role"];
				$name_role = urlencode(trim($name_rolez));

				$is_disabled = urlencode(trim($_POST["is_disabaled_role"]));


			require("connect.php");
			$sql = "CALL update_role( '$name_role', '$is_disabled')";
			$result_tmp_noti = mysqli_query($conn, $sql);
			if($result_tmp_noti){
				
				header("location:edit_role.php");
				mysqli_close($conn);
			}else{
				echo mysqli_error($conn);
			}
		}
	?>
	<div id="container">
		<div id="menu">
			<div id="btLogout"><a href="edit_role.php">Back</a></div>
		</div>


		<!-- ------------------------------------ -->
		<!--	       BẢNG COMMENT	  			  -->
		<!-- ------------------------------------ -->
			<div id="space">*****************************************************************</div>
		<div id="comment" style="background-color: #cccccc">
			<h3>COMMENT</h3>
			<div>
				<form method="POST">
				<table border="1px">
						<tr>
						<th>ID</th>
						<th>NAME_ROLE</th>
						<th>UPDATED</th>
						<th>IS_DISABLED</th>
					
					</tr>

		
						
						<tr>
						<td>
							<div class="form-group">
	                            <textarea class="form-control-textarea" name="id_role" disabled></textarea>
	                            <label class="label-control" for="cmessage"></label>
	                            <div class="help-block with-errors"></div>
	                        </div> 
						</td>
						<td>
							<div class="form-group">
	                            <textarea class="form-control-textarea" name="name_role_role" required>
	                            
	                            </textarea>
	                            <label class="label-control" for="cmessage"></label>
	                            <div class="help-block with-errors"></div>
	                        </div> 
						</td>
						<td>
							<div class="form-group">
	                            <textarea class="form-control-textarea" name="updated_role" disabled>
	                            	
	                            </textarea>
	                            <label class="label-control" for="cmessage"></label>
	                            <div class="help-block with-errors"></div>
	                        </div> 
						</td>
						<td>
							<div class="form-group">
	                            <textarea class="form-control-textarea" name="is_disabled_role" required>
	                            
	                            </textarea>
	                            <label class="label-control" for="cmessage"></label>
	                            <div class="help-block with-errors"></div>
	                        </div> 
						</td>
					</tr>
							<tr>
						<td><input type="submit" name="btnsubmit" value="INSERT"></td>
					</tr>
					<!--end show data role từ db -->
					
				</table>
				</form>
			</div>

			<div id="space"></div>
		<!-- ------------------------------------ -->
		<!--    	HẾT	BẢNG COMMENT 			  -->
		<!-- ------------------------------------ -->



	</div>
</body>
</html>