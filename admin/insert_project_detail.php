
	<!DOCTYPE html>
<html>
<head>
	<title>
	insert project Detail</title>
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
				$project_idz = $_POST["project_id_project_detail"];
				$project_id = urlencode(trim($project_idz));

				$content_htmlz = $_POST["content_html_project_detail"];
				$content_html = urlencode(trim($content_htmlz));

				$viewsz = $_POST["views_project_detail"];
				$views = trim($viewsz);

				$is_disabledz = $_POST["is_disabaled_project_detail"];
				$is_disabled = urlencode(trim($is_disabledz));
			
			require("connect.php");
			$sql = "CALL insert_project_detail( '$project_id', '$content_html','$views','$is_disabled')";
			$result_tmp_noti = mysqli_query($conn, $sql);
			if($result_tmp_noti){
				
				header("location:edit_project_detail.php");
				mysqli_close($conn);
			}else{
				echo mysqli_error($conn);
			}
		}
	?>
	<div id="container">
		<div id="menu">
			<div id="btLogout"><a href="edit_project_detail.php">Back</a></div>
		</div>


		<!-- ------------------------------------ -->
		<!--	       BẢNG PROJECT_DETAIL	      -->
		<!-- ------------------------------------ -->

		<div id="space">*****************************************************************</div>
		<div id="project_detail" style="background-color: #cccccc">
			<h3>PROJECT DETAIL</h3>
			<div>
				<form method="POST">
				<table border="1px">
					<tr>
						<th>ID</th>
						<th>PROJECT_ID</th>
						<th>CONTENT_HTML</th>
						<th>VIEWS</th>
						<th>UPDATED</th>
						<th>IS_DISABLED</th>
					
					</tr>

		
					<!-- show data project detail từ db -->

						
						<tr>
						<td>
							<div class="form-group">
	                            <textarea class="form-control-textarea" name="id_project_detail" disabled></textarea>
	                            <label class="label-control" for="cmessage"></label>
	                            <div class="help-block with-errors"></div>
	                        </div> 
						</td>
						<td>
							<div class="form-group">
	                            <textarea class="form-control-textarea" name="project_id_project_detail" required>
	                            	
	                            </textarea>
	                            <label class="label-control" for="cmessage"></label>
	                            <div class="help-block with-errors"></div>
	                        </div> 
						</td>
						<td>
							<div class="form-group">
	                            <textarea class="form-control-textarea" name="content_html_project_detail" required></textarea>
	                            <label class="label-control" for="cmessage"></label>
	                            <div class="help-block with-errors"></div>
	                        </div> 
						</td>
							<td>
							<div class="form-group">
	                            <textarea class="form-control-textarea" name="views_project_detail" required>
	                         
	                            </textarea>
	                            <label class="label-control" for="cmessage"></label>
	                            <div class="help-block with-errors"></div>
	                        </div> 
						</td>
						<td>
							<div class="form-group">
	                            <textarea class="form-control-textarea" name="updated_project_detail" disabled>
	                            
	                            </textarea>
	                            <label class="label-control" for="cmessage"></label>
	                            <div class="help-block with-errors"></div>
	                        </div> 
						</td>
						<td>
							<div class="form-group">
	                            <textarea class="form-control-textarea" name="is_disabaled_project_detail" required>
	                        
	                            </textarea>
	                            <label class="label-control" for="cmessage"></label>
	                            <div class="help-block with-errors"></div>
	                        </div> 
						</td>
					</tr>
						<tr>
						<td><input type="submit" name="btnsubmit" value="INSERT"></td>
					</tr>
					<!--end show data project detail từ db -->
				
				</table>
				</form>
			</div>

			<div id="space"></div>
		<!-- ------------------------------------ -->
		<!--    	HẾT	BẢNG PROJECT_DETAIL	  	  -->
		<!-- ------------------------------------ -->



	</div>
</body>
</html>