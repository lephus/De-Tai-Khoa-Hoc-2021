<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>edit COURSE DETAIL</title>
	<style type="text/css">
		*{
			text-align: center;
			margin: 0px;
			padding:0px;
		}
		.me{
			border: 1px black solid;
			padding: 5px;
			color: black;
			margin-left: 5px;
			margin-right: 5px;
			font-size: 20px;
			text-decoration: none;
		}
		.me_ok{
			background-color:  black;
			border: 1px black solid;
			padding: 5px;
			color: white;
			margin-left: 5px;
			margin-right: 5px;
			font-size: 20px;
			text-decoration: none;
		}
		#page{
			margin-top: 20px;
		}
		h3{
			color: blue		}
		#container{
			width: auto;
			margin: auto;
		}
		#menu{
			margin-bottom:50px;
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
		#btLogout{
			border: 1px red solid;
			background-color: #cccccc;
			margin:50px;
		}
		li{
			padding: 10px;
			border: 1px black solid;
			width: 200px;
			float: left;
			list-style: none;
		}
		a:hover {
			color: red;
		}
		textarea{
			min-height: 50px;
		}
	</style>
</head>
<body>
	<?php 
		if(isset($_SESSION['user']) && isset($_SESSION['pass'])){
		}else{ 
			header("LOCATION:index.php");
		};?>
		<?php
		/*connect database*/
		include("connect.php");
		/*tao sql truy van notifcation*/
		// $sql_noti="CALL select_notification";
		// $result_noti = mysqli_query($conn, $sql_noti);
		 if (isset($_GET["page"])) {
        $page = $_GET["page"];
	    } else {
	        $page = 1;
	    }
	    $num_per_page = 5;
	    $start_from = ($page - 1) * 5;
	    $query = "CALL select_limit_course_detail('$start_from','$num_per_page')";
	    $total = mysqli_query($conn, $query);
	   ?>
	

	<div id="container">
		<div id="menu">
			<div id="btLogout"><a style="color: green;" href="admin.php"  
				>BACK</a></div>
		</div>

		<!-- ---------------------------- -->
		<!--         	      -->
		<!-- ---------------------------- -->
			<div id="space">*****************************************************************</div>
		<div id="hottrend" style="background-color: #cccccc">
			<h3>COURSE DETAIL</h3>
			<div>
				<form method="POST">
				<table border="1px">
					<tr>
						<th>ID</th>
						<th>COURSE_ID</th>
						<th>CONTENT_HTML</th>
						<th>VIEWS</th>
						<th>UPDATE</th>
						<th>IS_DISABLED</th>
						<th colspan="2"><a href="insert_course_detail.php">Insert</a></th>
					</tr>
					<!-- show data hottrend t??? db -->

						<?php $i = 1;
                                $i = ($page - 1)* 5 + $i;      	
                         while ($row = mysqli_fetch_array($total)) : ?>
						
						<tr>
						<td>
							<div class="form-group">
	                            <textarea class="form-control-textarea" name="id_course_detail" disabled><?php echo urldecode(trim($row['id'])); ?></textarea>
	                            <label class="label-control" for="cmessage"></label>
	                            <div class="help-block with-errors"></div>
	                        </div> 
						</td>
						<td>
							<div class="form-group">
	                            <textarea class="form-control-textarea" name="course_id_course_detail" disabled>
	                            	<?php echo urldecode(trim($row['course_id'])); ?>
	                            </textarea>
	                            <label class="label-control" for="cmessage"></label>
	                            <div class="help-block with-errors"></div>
	                        </div> 
						</td>
						<td>
							<div class="form-group">
	                            <textarea class="form-control-textarea" name="content_html_course_detail" disabled><?php echo urldecode(trim($row['content_html'])); ?></textarea>
	                            <label class="label-control" for="cmessage"></label>
	                            <div class="help-block with-errors"></div>
	                        </div> 
						</td>
						<td>
							<div class="form-group">
	                            <textarea class="form-control-textarea" name="views_course_detail" disabled>
	                            	<?php echo urldecode(trim($row['views'])); ?>
	                            </textarea>
	                            <label class="label-control" for="cmessage"></label>
	                            <div class="help-block with-errors"></div>
	                        </div> 
						</td>
						<td>
							<div class="form-group">
	                            <textarea class="form-control-textarea" name="updated_course_detail" disabled>
	                            	<?php echo urldecode(trim($row['updated'])); ?>
	                            </textarea>
	                            <label class="label-control" for="cmessage"></label>
	                            <div class="help-block with-errors"></div>
	                        </div> 
						</td>
						<td>
							<div class="form-group">
	                            <textarea class="form-control-textarea" name="is_disabaled_course_detail" disabled>
	                            	<?php echo urldecode(trim($row['is_disabled'])); ?>
	                            </textarea>
	                            <label class="label-control" for="cmessage"></label>
	                            <div class="help-block with-errors"></div>
	                        </div> 
						</td>
						<td>
							<a href="update_course_detail.php?key_noti=<?php echo $row['id']; ?>" style="color: green;font-size: 20px;" >
							Update
							</a>
						</td>
						<td>
							<a onclick="return dele()" href="delete_course_detail.php?key_noti=<?php echo $row['id']; ?>" style="color: red;font-size: 20px;" >
							Delete
							</a>
						</td>
						
					</tr>
					<!--end show data hot course detail t??? db -->
					  <?php endwhile ?>
				</table>
				</form>
			</div>
			<div id="page">
			  <?php
			  			$total->close();
			  			$conn->next_result();
                        $pr_query = "CALL select_course_detail";
                        $pr_res = mysqli_query($conn, $pr_query);
                        $total_record = mysqli_num_rows($pr_res);
                        $total_page = ceil($total_record / $num_per_page);
                        if($page>2){
                        	echo "<a class='me' href='edit_course_detail.php?page=1'><<</a>";
                        }
                        for ($i = 1; $i <= $total_page; $i++) {
                        	if($i > $page-5 && $i<$page+5){
                        	if($i != $page){
                        	echo "<a class='me' href='edit_course_detail.php?page=" . $i . "'>$i</a>";
                        	}else{
                        	 echo "<a class='me_ok' href='edit_course_detail.php?page=" . $i . "'>$i</a>";
                        	}
                           }
                        }
                        if($page<$total_page-1){
                        	echo "<a class='me' href='edit_course_detail.php?page=".$total_page."'>>></a>";
                        }
                        $pr_res->close();
            			$conn->next_result();
                        ?>
               </div>

			<div id="space"></div>
		<!-- ---------------------------- -->
		<!--    	      -->
		<!-- ---------------------------- -->
		<script type="text/javascript">
		function dele(){
			return confirm("ch???c ch???n x??a ?");	   
		}

	</script>
</body>
</html>