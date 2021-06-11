
	<!DOCTYPE html>
<html>
<head>
	<title>Update Funny Detail</title>
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
		$sql="select * from funny_detail where id = $key";
		$result_noti = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($result_noti);
		/* lay ra tung hang cua table result*/
 	?>
 	<?php
		if(isset($_POST["btnsubmit"])){
				$id_funnyz = $_POST["id_funny_funny_detail"];
				$id_funny = urlencode(trim($id_funnyz));

				$content_htmlz = $_POST["content_html_funny_detail"];
				$content_html = urlencode(trim($content_htmlz));

				$viewsz = $_POST["views_funny_detail"];
				$views = urlencode(trim($viewsz));


				$is_disabledz = $_POST["is_disabled_funny_detail"];
				$is_disabled = urlencode(trim($is_disabledz));
			
			require("connect.php");
			$sql = "CALL update_funny_detail( '$id_funny', '$content_html','$views','$is_disabled' , '$key')";
			$result_tmp_noti = mysqli_query($conn, $sql);
			if($result_tmp_noti){
				
				header("location:edit_funny_detail.php");
				mysqli_close($conn);
			}else{
				echo mysqli_error($conn);
			}
		}
	?>
	<div id="container">
		<div id="menu">
			<div id="btLogout"><a href="edit_funny_detail.php">BACK</a></div>
		</div>


		<!-- ------------------------------------ -->
		<!--         BẢNG FUNNY_DETAILS	      -->
		<!-- ------------------------------------ -->
			<div id="space">*****************************************************************</div>
		<div id="funny_detail" style="background-color: #cccccc">
			<h3>FUNNY DETAIL</h3>
			<div>
				<form method="POST">
				<table border="1px">
					<tr>
						<th>ID</th>
						<th>ID_FUNNY</th>
						<th>CONTENT_HTML</th>
						<th>VIEW</th>
						<th>UPDATED</th>
						<th>IS_DISABLED</th>
					</tr>

		
					<!-- show data funny detail từ db -->

						<tr>
						<td>
							<div class="form-group">
	                            <textarea class="form-control-textarea" name="id_funny_detail" disabled><?php echo urldecode(trim($row['id'])); ?></textarea>
	                            <label class="label-control" for="cmessage"></label>
	                            <div class="help-block with-errors"></div>
	                        </div> 
						</td>
						<td>
							<div class="form-group">
	                            <textarea class="form-control-textarea" name="id_funny_funny_detail" required>
	                            	<?php echo urldecode(trim($row['id_funny'])); ?>
	                            </textarea>
	                            <label class="label-control" for="cmessage"></label>
	                            <div class="help-block with-errors"></div>
	                        </div> 
						</td>
						<td>
							<div class="form-group">
	                            <textarea class="form-control-textarea" name="content_html_funny_detail" required><?php echo urldecode(trim($row['content_html'])); ?></textarea>
	                            <label class="label-control" for="cmessage"></label>
	                            <div class="help-block with-errors"></div>
	                        </div> 
						</td>
							<td>
							<div class="form-group">
	                            <textarea class="form-control-textarea" name="views_funny_detail" required>
	                            	<?php echo urldecode(trim($row['views'])); ?>
	                            </textarea>
	                            <label class="label-control" for="cmessage"></label>
	                            <div class="help-block with-errors"></div>
	                        </div> 
						</td>
						<td>
							<div class="form-group">
	                            <textarea class="form-control-textarea" name="updated_funny_detail" disabled>
	                            	<?php echo urldecode(trim($row['updated'])); ?>
	                            </textarea>
	                            <label class="label-control" for="cmessage"></label>
	                            <div class="help-block with-errors"></div>
	                        </div> 
						</td>
						<td>
							<div class="form-group">
	                            <textarea class="form-control-textarea" name="is_disabled_funny_detail" required>
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
					<!--end show data funny detail từ db -->
				
				</table>
				</form>
			</div>

			<div id="space"></div>
		<!-- ------------------------------------ -->
		<!--    	HẾT  BẢNG FUNNY DETAILS	      -->
		<!-- ------------------------------------ -->





	</div>
</body>
</html>