
	<!DOCTYPE html>
<html>
<head>
	<title>Insert USER</title>
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

				$usernamez = $_POST["username_user"];
				$username = urlencode(trim($usernamez));

				$pwdz = $_POST["pwd_user"];
				$pwd = urlencode(trim($pwdz));

				$namez = $_POST["name_user"];
				$name = urlencode(trim($namez));

				$majorz = $_POST["major_user"];
				$major = urlencode(trim($majorz));

				$role_idz = $_POST["role_id_user"];
				$role_id = urlencode(trim($role_idz));

				$is_disabledz = $_POST["is_disabaled_user"];
				$is_disabled = urlencode(trim($is_disabledz));
			
			require("connect.php");
			$sql = "CALL insert_user('$username', '$pwd', '$name','$major','$role_id','$is_disabled')";
			$result_tmp_noti = mysqli_query($conn, $sql);
			if($result_tmp_noti){
				
				header("location:edit_user.php");
				mysql_close($conn);
			}else{
				echo mysqli_error($conn);
			}
		}
	?>
	<div id="container">
		<div id="menu">
			<div id="btLogout"><a href="edit_user.php">BACK</a></div>
		</div>

	

		<!-- ------------------------------------ -->
		<!--      			  BẢNG USER	          -->
		<!-- ------------------------------------ -->
			<div id="space">*****************************************************************</div>
		<div id="user" style="background-color: #cccccc">
			<h3>USER</h3>
			<div>
				<form method="POST">
				<table border="1px">
					<tr>
						<th>ID</th>
						<th>USERNAME</th>
						<th>PWD</th>
						<th>NAME</th>
						<th>MAJOR</th>
						<th>ROLE_ID</th>
						<th>UPDATED</th>
						<th>IS_DISABLED</th>
			
					</tr>

		
					<!-- show data user từ db -->

				
						
						<tr>
						<td>
							<div class="form-group">
	                            <textarea class="form-control-textarea" name="id_user" disabled></textarea>
	                            <label class="label-control" for="cmessage"></label>
	                            <div class="help-block with-errors"></div>
	                        </div> 
						</td>
						<td>
							<div class="form-group">
	                            <textarea class="form-control-textarea" name="username_user" required>
	                            
	                            </textarea>
	                            <label class="label-control" for="cmessage"></label>
	                            <div class="help-block with-errors"></div>
	                        </div> 
						</td>
						<td>
							<div class="form-group">
	                            <textarea class="form-control-textarea" name="pwd_user" required></textarea>
	                            <label class="label-control" for="cmessage"></label>
	                            <div class="help-block with-errors"></div>
	                        </div> 
						</td>
						<td>
							<div class="form-group">
	                            <textarea class="form-control-textarea" name="name_user" required>
	                          
	                            </textarea>
	                            <label class="label-control" for="cmessage"></label>
	                            <div class="help-block with-errors"></div>
	                        </div> 
						</td>
						<td>
							<div class="form-group">
	                            <textarea class="form-control-textarea" name="major_user" required>
	                            
	                            </textarea>
	                            <label class="label-control" for="cmessage"></label>
	                            <div class="help-block with-errors"></div>
	                        </div> 
						</td>
						<td>
							<div class="form-group">
	                            <textarea class="form-control-textarea" name="role_id_user" required></textarea>
	                            <label class="label-control" for="cmessage"></label>
	                            <div class="help-block with-errors"></div>
	                        </div> 
						</td>
						<td>
							<div class="form-group">
	                            <textarea class="form-control-textarea" name="updated_user" disabled>
	                            
	                            </textarea>
	                            <label class="label-control" for="cmessage"></label>
	                            <div class="help-block with-errors"></div>
	                        </div> 
						</td>
						<td>
							<div class="form-group">
	                            <textarea class="form-control-textarea" name="is_disabaled_user" required>
	                         
	                            </textarea>
	                            <label class="label-control" for="cmessage"></label>
	                            <div class="help-block with-errors"></div>
	                        </div> 
						</td>
					</tr>
					<tr><td><input type="submit" name="btnsubmit" value="INSERT"></td></tr>
						<!--end show data user từ db -->
					
				</table>
				</form>
			</div>

			<div id="space"></div>
		<!-- ------------------------------------ -->
		<!--        	HẾT	BẢNG USER			  -->
		<!-- ------------------------------------ -->




	</div>
</body>
</html>