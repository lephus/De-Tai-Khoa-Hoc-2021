
	<!DOCTYPE html>
<html>
<head>
	<title>Insert VOTE</title>
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
				$subscribe_ytz = $_POST["subscribe_yt_vote"];
				$subscribe_yt = urlencode(trim($subscribe_ytz));

				$member_groupz = $_POST["member_group_vote"];
				$member_group = urlencode(trim($member_groupz));

				$number_postz = $_POST["number_post_vote"];
				$number_post = trim($number_postz);

				$is_disabaledz = $_POST["is_disabaled_vote"];
				$is_disabled = urlencode(trim($is_disabaledz));
			
			require("connect.php");
			$sql = "CALL insert_vote( '$subscribe_yt', '$member_group','$number_post','$is_disabled')";
			$result_tmp_noti = mysqli_query($conn, $sql);
			if($result_tmp_noti){
				
				header("location:edit_vote.php");
				mysqli_close($conn);
			}else{
				echo mysqli_error($conn);
			}
		}
	?>
	<div id="container">
		<div id="menu">
			<div id="btLogout"><a href="edit_vote.php">BACK</a></div>
		</div>


		<!-- ------------------------------------ -->
		<!--	       BẢNG VOTE	     		  -->
		<!-- ------------------------------------ -->
		<div id="space">*****************************************************************</div>
		<div id="vote" style="background-color: #cccccc">
			<h3>VOTE</h3>
			<div>
				<form method="POST">
				<table border="1px">
					<tr>
						<th>ID</th>
						<th>SUBSCRIBE_YT</th>
						<th>MEMBER_GROUP</th>
						<th>NUMBER_POST</th>
						<th>UPDATED</th>
						<th>IS_DISABLED</th>
						
					</tr>

		
					<!-- show data vote từ db -->
						<tr>
						<td>
							<div class="form-group">
	                            <textarea class="form-control-textarea" name="id_vote" disabled></textarea>
	                            <label class="label-control" for="cmessage"></label>
	                            <div class="help-block with-errors"></div>
	                        </div> 
						</td>
						<td>
							<div class="form-group">
	                            <textarea class="form-control-textarea" name="subscribe_yt_vote" required>
	                  
	                            </textarea>
	                            <label class="label-control" for="cmessage"></label>
	                            <div class="help-block with-errors"></div>
	                        </div> 
						</td>
						<td>
							<div class="form-group">
	                            <textarea class="form-control-textarea" name="member_group_vote" required></textarea>
	                            <label class="label-control" for="cmessage"></label>
	                            <div class="help-block with-errors"></div>
	                        </div> 
						</td>
							<td>
							<div class="form-group">
	                            <textarea class="form-control-textarea" name="number_post_vote" required>
	                         
	                            </textarea>
	                            <label class="label-control" for="cmessage"></label>
	                            <div class="help-block with-errors"></div>
	                        </div> 
						</td>
						<td>
							<div class="form-group">
	                            <textarea class="form-control-textarea" name="updated_vote" disabled>
	                           
	                            </textarea>
	                            <label class="label-control" for="cmessage"></label>
	                            <div class="help-block with-errors"></div>
	                        </div> 
						</td>
						<td>
							<div class="form-group">
	                            <textarea class="form-control-textarea" name="is_disabaled_vote" required>
	                            	
	                            </textarea>
	                            <label class="label-control" for="cmessage"></label>
	                            <div class="help-block with-errors"></div>
	                        </div> 
						</td>
					</tr>
					<tr>
						<td><input type="submit" name="btnsubmit" value="INSERT"></td>
					</tr>
					<!--end show data vote từ db -->
				
				</table>
				</form>
			</div>

			<div id="space"></div>
		<!-- ------------------------------------ -->
		<!--    	HẾT	BẢNG VOTE	  	  		  -->
		<!-- ------------------------------------ -->



	</div>
</body>
</html>