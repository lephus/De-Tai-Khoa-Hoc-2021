
	<!DOCTYPE html>
<html>
<head>
	<title>Insert Hot Trend Detail</title>
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
				$idz = $_POST["id_hottrend_detail"];
				$id = urlencode(trim($idz));

				$id_hottrendz = $_POST["id_hottrend_hottrend_detail"];
				$id_hottrend = urlencode(trim($id_hottrendz));

				$content_htmlz = $_POST["content_html_hottrend_detail"];
				$content_html = urlencode(trim($content_htmlz));

				$viewsz = $_POST["views_hottrend_detail"];
				$views = urlencode(trim($viewsz));


				$updatedz = $_POST["updated_hottrend_detail"];
				$updated = trim($updatedz);

				$is_disabledz = $_POST["is_disabaled_hottrend_detail"];
				$is_disabled = urlencode(trim($is_disabledz));
			
			require("connect.php");
			$sql = "CALL insert_hottrend_detail('$id_hottrend', '$content_html', '$views','$is_disabled')";
			$result_tmp_noti = mysqli_query($conn, $sql);
			if($result_tmp_noti){
				
				header("location:edit_hottrend_detail.php");
				mysqli_close($conn);
			}else{
				echo mysqli_error($conn);
			}
		}
	?>
	<div id="container">
		<div id="menu">
			<div id="btLogout"><a href="edit_hottrend_detail.php">BACK</a></div>
		</div>

	

		<!-- ------------------------------------ -->
		<!--         BẢNG HOTTREND_DETAILS	      -->
		<!-- ------------------------------------ -->
		<div id="space">*****************************************************************</div>
		<div id="hottrend_detail" style="background-color: #cccccc">
			<h3>HOTTREND DETAIL</h3>
			<div>
				<form method="POST">
				<table border="1px">
					<tr>
						<th>ID</th>
						<th>ID_HOTTREND</th>
						<th>CONTENT_HTML</th>
						<th>VIEW</th>
						<th>UPDATED</th>
						<th>IS_DISABLED</th>
						
					</tr>
					<!-- show data hottrend detail từ db -->

					
						
						<tr>
						<td>
							<div class="form-group">
	                            <textarea class="form-control-textarea" name="id_hottrend_detail" disabled></textarea>
	                            <label class="label-control" for="cmessage"></label>
	                            <div class="help-block with-errors"></div>
	                        </div> 
						</td>
						<td>
							<div class="form-group">
	                            <textarea class="form-control-textarea" name="id_hottrend_hottrend_detail" required>
	                            	
	                            </textarea>
	                            <label class="label-control" for="cmessage"></label>
	                            <div class="help-block with-errors"></div>
	                        </div> 
						</td>
							<td>
							<div class="form-group">
	                            <textarea class="form-control-textarea" name="content_html_hottrend_detail" required></textarea>
	                            <label class="label-control" for="cmessage"></label>
	                            <div class="help-block with-errors"></div>
	                        </div> 
						</td>
						<td>
							<div class="form-group">
	                            <textarea class="form-control-textarea" name="views_hottrend_detail" required>
	                           
	                            </textarea>
	                            <label class="label-control" for="cmessage"></label>
	                            <div class="help-block with-errors"></div>
	                        </div> 
						</td>
						<td>
							<div class="form-group">
	                            <textarea class="form-control-textarea" name="updated_hottrend_detail" disabled>
	                           
	                            </textarea>
	                            <label class="label-control" for="cmessage"></label>
	                            <div class="help-block with-errors"></div>
	                        </div> 
						</td>
						<td>
							<div class="form-group">
	                            <textarea class="form-control-textarea" name="is_disabaled_hottrend_detail" required>
	                            
	                            </textarea>
	                            <label class="label-control" for="cmessage"></label>
	                            <div class="help-block with-errors"></div>
	                        </div> 
						</td>
					</tr>
					<!--end show data hot trend detail từ db -->
						<tr><td><input type="submit" name="btnsubmit" value="INSERT"></td></tr>
				</table>
				</form>
			</div>

			<div id="space"></div>
		<!-- ------------------------------------ -->
		<!--   HẾT   BẢNG HOTTREND_DETAILS	      -->
		<!-- ------------------------------------ -->





	</div>
</body>
</html>