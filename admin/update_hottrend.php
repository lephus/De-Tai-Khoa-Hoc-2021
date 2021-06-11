
	<!DOCTYPE html>
<html>
<head>
	<title>Update Hot Trend</title>
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
		$sql="select * from hottrend where id = $key";
		$result_noti = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($result_noti);
		/* lay ra tung hang cua table result*/
 	?>

 	<?php
		if(isset($_POST["btnsubmit"])){
				$idz = $_POST["id_hottrend"];
				$id = urlencode(trim($idz));

				$titlez = $_POST["title_hottrend"];
				$title = urlencode(trim($titlez));

				$short_descz = $_POST["short_desc_hottrend"];
				$short_desc = urlencode(trim($short_descz));

				$thumbnail_hottrendz = $_POST["thumbnail_hottrend"];
				$thumbnail_hottrend = urlencode(trim($thumbnail_hottrendz));


				$link = trim(convert_name_end(trim($titlez)));

				$updatedz = $_POST["updated_noti"];
				$updated = trim($updatedz);

				$is_disabledz = $_POST["is_disabaled_hottrend"];
				$is_disabled = urlencode(trim($is_disabledz));
				$key = $_GET["key_noti"];
			require("connect.php");
			$sql =  "CALL update_hottrend( '$title', '$short_desc', '$thumbnail_hottrend','$link','$is_disabled', '$key')";
			$result_tmp_noti = mysqli_query($conn, $sql);
			if($result_tmp_noti){
				header("location:edit_hottrend.php");
					mysqli_close($conn);
			}else{
				echo mysqli_error($conn);
			}
		}
			function convert_name_end($str) {
		$str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $str);
		$str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $str);
		$str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $str);
		$str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $str);
		$str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $str);
		$str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $str);
		$str = preg_replace("/(đ)/", 'd', $str);
		$str = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", 'A', $str);
		$str = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", 'E', $str);
		$str = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'I', $str);
		$str = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", 'O', $str);
		$str = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", 'U', $str);
		$str = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'Y', $str);
		$str = preg_replace("/(Đ)/", 'D', $str);
		$str = preg_replace("/(\“|\”|\‘|\’|\,|\!|\&|\;|\@|\#|\%|\~|\`|\=|\_|\'|\]|\[|\}|\{|\)|\(|\+|\^)/", '-', $str);
		$str = preg_replace("/( )/", '-', $str);
		return $str.'-'.generateRandomString();
	}
	function generateRandomString($length = 10) {
	    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    $charactersLength = strlen($characters);
	    $randomString = '';
	    for ($i = 0; $i < $length; $i++) {
	        $randomString .= $characters[rand(0, $charactersLength - 1)];
	    }
	    return $randomString;
	}
	?>
	<div id="container">
		<div id="menu">
			<div id="btLogout"><a href="edit_hottrend.php">BACK</a></div>
		</div>

	
		<!-- ---------------------------- -->
		<!--         BẢNG HOTTREND	      -->
		<!-- ---------------------------- -->
				<div id="hottrend" style="background-color: #cccccc">
			<h3>HOTTREND</h3>
			<div>
				<form method="POST">
				<table border="1px">
					<tr>
						<th>ID</th>
						<th>TITLE</th>
						<th>SHORT_DESC</th>
						<th>THUMBNAIL</th>
						<th>LINK</th>
						<th>UPDATED</th>
						<th>IS_DISABLED</th>
					
					</tr>
					<!-- show data hottrend từ db -->

				
						
						<tr>
						<td>
							<div class="form-group">
	                            <textarea class="form-control-textarea" name="id_hottrend" disabled><?php echo urldecode(trim($row['id'])); ?></textarea>
	                            <label class="label-control" for="cmessage"></label>
	                            <div class="help-block with-errors"></div>
	                        </div> 
						</td>
						<td>
							<div class="form-group">
	                            <textarea class="form-control-textarea" name="title_hottrend" required>
	                            	<?php echo urldecode(trim($row['title'])); ?>
	                            </textarea>
	                            <label class="label-control" for="cmessage"></label>
	                            <div class="help-block with-errors"></div>
	                        </div> 
						</td>
							<td>
							<div class="form-group">
	                            <textarea class="form-control-textarea" name="short_desc_hottrend" required><?php echo urldecode(trim($row['short_desc'])); ?></textarea>
	                            <label class="label-control" for="cmessage"></label>
	                            <div class="help-block with-errors"></div>
	                        </div> 
						</td>
						<td>
							<div class="form-group">
	                            <textarea class="form-control-textarea" name="thumbnail_hottrend" required>
	                            	<?php echo urldecode(trim($row['thumbnail'])); ?>
	                            </textarea>
	                            <label class="label-control" for="cmessage"></label>
	                            <div class="help-block with-errors"></div>
	                        </div> 
						</td>
						<td>
							<div class="form-group">
	                            <textarea class="form-control-textarea" name="link_hottrend" disabled>
	                            	<?php echo urldecode(trim($row['link'])); ?>
	                            </textarea>
	                            <label class="label-control" for="cmessage"></label>
	                            <div class="help-block with-errors"></div>
	                        </div> 
						</td>
						<td>
							<div class="form-group">
	                            <textarea class="form-control-textarea" name="updated_hottrend" disabled>
	                            	<?php echo urldecode(trim($row['updated'])); ?>
	                            </textarea>
	                            <label class="label-control" for="cmessage"></label>
	                            <div class="help-block with-errors"></div>
	                        </div> 
						</td>
						<td>
							<div class="form-group">
	                            <textarea class="form-control-textarea" name="is_disabaled_hottrend" required>
	                            	<?php echo urldecode(trim($row['is_disabled'])); ?>
	                            </textarea>
	                            <label class="label-control" for="cmessage"></label>
	                            <div class="help-block with-errors"></div>
	                        </div> 
						</td>
						
						
					</tr>
					<!--end show data hot trend từ db -->
					<tr><td><input type="submit" name="btnsubmit" value="UPDATE"></td></tr>
				</table>
				</form>
			</div>

			<div id="space"></div>
		<!-- ---------------------------- -->
		<!--    HẾT  BẢNG HOTTREND	      -->
		<!-- ---------------------------- -->




	</div>
</body>
</html>