
	<!DOCTYPE html>
<html>
<head>
	<title>Update Type Comment</title>
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
	/*connect database*/
		
		$key = $_GET["key_noti"];
		require("connect.php");
		/*tao sql truy van*/
		$sql="select * from type_comment where id = $key";
		$result_noti = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($result_noti);
		/* lay ra tung hang cua table result*/
 	?>
 	<?php
		if(isset($_POST["btnsubmit"])){
				$desc = urlencode(trim($_POST["desc_type_comment"]));


				$is_disabled = urlencode(trim( $_POST["is_disabaled_type_comment"]));

			require("connect.php");
			$sql = "CALL update_type_comment( '$desc','$is_disabled', '$key')";
			$result_tmp_noti = mysqli_query($conn, $sql);
			if($result_tmp_noti){
				
				header("location:edit_type_comment.php");
				mysqli_close($conn);
			}else{
				echo mysqli_error($conn);
			}
		}
	?>
	<div id="container">
		<div id="menu">
			<div id="btLogout"><a href="edit_type_comment.php">Back</a></div>
		</div>

	<!-- ------------------------------------ -->
		<!--	       BẢNG TYPE_COMMENT	   	  -->
		<!-- ------------------------------------ -->
				<div id="space">*****************************************************************</div>
		<div id="type_comment" style="background-color: #cccccc">
			<h3>TYPE COMMENT</h3>
			<div>
				<form method="POST">
				<table border="1px">
					<tr>
						<th>ID</th>
						<th>DESC</th>
						<th>UPDATED</th>
						<th>IS_DISABLED</th>
					
					</tr>

		
					<!-- show data type comment từ db -->

						
							<tr>
						<td>
							<div class="form-group">
	                            <textarea class="form-control-textarea" name="id_type_comment" disabled><?php echo urldecode(trim($row['id'])); ?></textarea>
	                            <label class="label-control" for="cmessage"></label>
	                            <div class="help-block with-errors"></div>
	                        </div> 
						</td>
						<td>
							<div class="form-group">
	                            <textarea class="form-control-textarea" name="desc_type_comment" required>
	                            	<?php echo urldecode(trim($row['descc'])); ?>
	                            </textarea>
	                            <label class="label-control" for="cmessage"></label>
	                            <div class="help-block with-errors"></div>
	                        </div> 
						</td>
						<td>
							<div class="form-group">
	                            <textarea class="form-control-textarea" name="updated_type_comment" disabled>
	                            	<?php echo urldecode(trim($row['updated'])); ?>
	                            </textarea>
	                            <label class="label-control" for="cmessage"></label>
	                            <div class="help-block with-errors"></div>
	                        </div> 
						</td>
						<td>
							<div class="form-group">
	                            <textarea class="form-control-textarea" name="is_disabaled_type_comment" required>
	                            	<?php echo urldecode(trim($row['is_disabled'])); ?>
	                            </textarea>
	                            <label class="label-control" for="cmessage"></label>
	                            <div class="help-block with-errors"></div>
	                        </div> 
						</td>
					</tr>
					<!--end show data type comment từ db -->
						<tr><td><input type="submit" name="btnsubmit" value="UPDATE"></td></tr>
				
				</table>
				</form>
			</div>

			<div id="space"></div>
		<!-- ------------------------------------ -->
		<!--    	HẾT	BẢNG TYPE_COMMENT 		  -->
		<!-- ------------------------------------ -->
		<!-- 1 hottrend -->
		<!-- 2  course	-->
		<!-- 3 project  -->
		<!-- 4 funny    -->





	</div>
</body>
</html>