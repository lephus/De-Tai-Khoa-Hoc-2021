
	<!DOCTYPE html>
<html>
<head>
	<title>Update Comment</title>
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
		$sql="select * from comment where id = $key";
		$result_noti = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($result_noti);
		/* lay ra tung hang cua table result*/
 	?>
 	<?php
		if(isset($_POST["btnsubmit"])){
				$type_comment = urlencode(trim($_POST["type_comment_id_comment"]));

			
				$content = urlencode(trim( $_POST["content_comment"]));
							$id_post = urlencode(trim( $_POST["id_post_comment"]));

				$is_disabled = urlencode(trim( $_POST["is_disabled_comment"]));



			require("connect.php");
			$sql = "CALL update_comment( '$type_comment','$content' ,'$id_post','$is_disabled', '$key')";
			$result_tmp_noti = mysqli_query($conn, $sql);
			if($result_tmp_noti){
				
				header("location:edit_comment.php");
				mysqli_close($conn);
			}else{
				echo mysqli_error($conn);
			}
		}
	?>
	<div id="container">
		<div id="menu">
			<div id="btLogout"><a href="edit_comment.php">Back</a></div>
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
						<th>TYPE_COMMENT_ID</th>
						<th>CONTENT</th>
						<th>ID POST</th>
						<th>UPDATED</th>
						<th>IS_DISABLED</th>
					
					</tr>

		
					<!-- show data comment từ db -->

						
						<tr>
						<td>
							<div class="form-group">
	                            <textarea class="form-control-textarea" name="id_comment" disabled><?php echo urldecode(trim($row['id'])); ?></textarea>
	                            <label class="label-control" for="cmessage"></label>
	                            <div class="help-block with-errors"></div>
	                        </div> 
						</td>
						<td>
							<div class="form-group">
	                            <textarea class="form-control-textarea" name="type_comment_id_comment" required>
	                            	<?php echo urldecode(trim($row['type_comment_id'])); ?>
	                            </textarea>
	                            <label class="label-control" for="cmessage"></label>
	                            <div class="help-block with-errors"></div>
	                        </div> 
						</td>
						<td>
							<div class="form-group">
	                            <textarea class="form-control-textarea" name="content_comment" required>
	                            	<?php echo urldecode(trim($row['content'])); ?>
	                            </textarea>
	                            <label class="label-control" for="cmessage"></label>
	                            <div class="help-block with-errors"></div>
	                        </div> 
						</td>
						<td>
							<div class="form-group">
	                            <textarea class="form-control-textarea" name="id_post_comment" required>
	                            	<?php echo urldecode(trim($row['id_post'])); ?>
	                            </textarea>
	                            <label class="label-control" for="cmessage"></label>
	                            <div class="help-block with-errors"></div>
	                        </div> 
						</td>
						<td>
							<div class="form-group">
	                            <textarea class="form-control-textarea" name="updated_comment" disabled>
	                            	<?php echo urldecode(trim($row['updated'])); ?>
	                            </textarea>
	                            <label class="label-control" for="cmessage"></label>
	                            <div class="help-block with-errors"></div>
	                        </div> 
						</td>
						<td>
							<div class="form-group">
	                            <textarea class="form-control-textarea" name="is_disabled_comment" required>
	                            	<?php echo urldecode(trim($row['is_disabled'])); ?>
	                            </textarea>
	                            <label class="label-control" for="cmessage"></label>
	                            <div class="help-block with-errors"></div>
	                        </div> 
						</td>
					</tr>
						<tr>
						<td><input type="submit" name="btnsubmit" value="UPDATE"></td>
					</tr>
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