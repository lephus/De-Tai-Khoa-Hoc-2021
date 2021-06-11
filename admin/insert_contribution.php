
	<!DOCTYPE html>
<html>
<head>
	<title>Insert CONTRIBUTION</title>
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

				$namez = $_POST["name_contribute"];
				$name = urlencode(trim($namez));

				$emailz = $_POST["email_contribute"];
				$email = urlencode(trim($emailz));

				$contentz = $_POST["content_contribute"];
				$content = urlencode(trim($contentz));

				$is_disabledz = $_POST["is_disabaled_contribute"];
				$is_disabled = urlencode(trim($is_disabledz));
			
			require("connect.php");
			$sql = "CALL insert_contribution( '$name', '$email', '$content', '$is_disabled') ";
			$result_tmp_noti = mysqli_query($conn, $sql);
			if($result_tmp_noti){
				
				header("location:edit_contribution.php");
				mysql_close($conn);
			}else{
				echo mysqli_error($conn);
			}
		}
	?>
	<div id="container">
		<div id="menu">
			<div id="btLogout"><a href="edit_contribution.php"> BACK</a></div>
		</div>

	

		<!-- ------------------------------------ -->
		<!--       BẢNG contribute	         	  -->
		<!-- ------------------------------------ -->
			<div id="space">*****************************************************************</div>
		<div id="contribute" style="background-color: #cccccc">
			<h3>CONTRIBUTION</h3>
			<div>
				<form method="POST">
				<table border="1px">
					<tr>
						<th>ID</th>
						<th>NAME</th>
						<th>EMAIL</th>
						<th>CONTENT</th>
						<th>UPDATED</th>
						<th>IS_DISABLED</th>
					
					</tr>

		
					<!-- show data contribute từ db -->

						
						<tr>
						<td>
							<div class="form-group">
	                            <textarea class="form-control-textarea" name="id_contribute" disabled></textarea>
	                            <label class="label-control" for="cmessage"></label>
	                            <div class="help-block with-errors"></div>
	                        </div> 
						</td>
						<td>
							<div class="form-group">
	                            <textarea class="form-control-textarea" name="name_contribute" required>
	                    
	                            </textarea>
	                            <label class="label-control" for="cmessage"></label>
	                            <div class="help-block with-errors"></div>
	                        </div> 
						</td>
						<td>
							<div class="form-group">
	                            <textarea class="form-control-textarea" name="email_contribute" required></textarea>
	                            <label class="label-control" for="cmessage"></label>
	                            <div class="help-block with-errors"></div>
	                        </div> 
						</td>
							<td>
							<div class="form-group">
	                            <textarea class="form-control-textarea" name="content_contribute" required>
	                        
	                            </textarea>
	                            <label class="label-control" for="cmessage"></label>
	                            <div class="help-block with-errors"></div>
	                        </div> 
						</td>
						<td>
							<div class="form-group">
	                            <textarea class="form-control-textarea" name="updated_contribute" disabled>
	                            
	                            </textarea>
	                            <label class="label-control" for="cmessage"></label>
	                            <div class="help-block with-errors"></div>
	                        </div> 
						</td>
						<td>
							<div class="form-group">
	                            <textarea class="form-control-textarea" name="is_disabaled_contribute" required>
	           
	                            </textarea>
	                            <label class="label-control" for="cmessage"></label>
	                            <div class="help-block with-errors"></div>
	                        </div> 
						</td>
					</tr>
						<tr><td><input type="submit" name="btnsubmit" value="INSERT"></td></tr>
					<!--end show data contribute từ db -->
					
				</table>
				</form>
			</div>

			<div id="space"></div>
		<!-- ------------------------------------ -->
		<!--    	HẾT	BẢNG CONTRIBUTE	  		  -->
		<!-- ------------------------------------ -->




	</div>
</body>
</html>