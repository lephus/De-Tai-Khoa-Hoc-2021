<!DOCTYPE html>
<html>
<head>
	<title>Update Notification Gr3atCode</title>
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
		$sql="select * from notification where id = $key";
		$result_noti = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($result_noti);
		/* lay ra tung hang cua table result*/
 	?>
 	<?php
		if(isset($_POST["btnsubmit"])){
				$idz = $_POST["id_noti"];
				$id = urlencode(trim($idz));
				$contentz = $_POST["content_noti"];
				$content = urlencode(trim($contentz));
				$updatedz = $_POST["updated_noti"];
				$updated = trim($updatedz);
				$is_disabledz = $_POST["is_disabaled_noti"];
				$is_disabled = urlencode(trim($is_disabledz));
				$key = $_GET["key_noti"];
			require("connect.php");
			$sql = "CALL update_notification('$content', '$updated', '$is_disabled', '$key')";
			$result_tmp_noti = mysqli_query($conn, $sql);
			if($result_tmp_noti){
				header("location:edit_notification.php");
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

		<!-- ---------------------------- -->
		<!--         BẢNG NOTIFICATION    -->
		<!-- ---------------------------- -->
		<div id="notification" style="background-color: #cccccc">
			<h3>NOTIFCATION</h3>
			<div>
				<form method="POST">
				<table border="1px">
					<tr>
						<th>ID</th>
						<th>CONTENT</th>
						<th>UPDATED</th>
						<th>IS_DISABLED</th>
						<th></th>
						<th></th>
					</tr>
					<!-- show data notification từ db -->

						
						<tr>
						<td>
							<div class="form-group">
	                            <textarea class="form-control-textarea" name="id_noti" ><?php echo urldecode(trim($row['id'])); ?></textarea>
	                            <label class="label-control" for="cmessage"></label>
	                            <div class="help-block with-errors"></div>
	                        </div> 
						</td>
						<td>
							<div class="form-group">
	                            <textarea class="form-control-textarea" name="content_noti" required>
	                            	<?php echo urldecode(trim($row['content'])); ?>
	                            </textarea>
	                            <label class="label-control" for="cmessage"></label>
	                            <div class="help-block with-errors"></div>
	                        </div> 
						</td>
						<td>
							<div class="form-group">
	                            <textarea class="form-control-textarea" name="updated_noti" required>
	                            	<?php echo trim($row['updated']); ?>
	                            </textarea>
	                            <label class="label-control" for="cmessage"></label>
	                            <div class="help-block with-errors"></div>
	                        </div> 
						</td>
						<td>
							<div class="form-group">
	                            <textarea class="form-control-textarea" name="is_disabaled_noti" required>
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
					
					<!--end show data notification từ db -->
				</table>
				</form>
			</div>
					</table>
				</form>
			</div>
		</div>
			<!-- ---------------------------- -->
			<!--     HẾT BẢNG NOTIFICATION    -->
			<!-- ---------------------------- -->


	</div>
</body>
</html>