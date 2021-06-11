<?php 
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>WELLCOME ADMIN</title>
	<style type="text/css">
		*{
			margin:0px;
			padding: 0px;
		}
		#container{
			width: 500px;
			margin:auto;
		}
		table{
			padding: 10px;
		}

	</style>
</head>
<body>
		<?php 
	/*connect database*/
		require("connect.php");
		/*tao sql truy van*/
		
		/* lay ra tung hang cua table result*/

 	?>
	<?php 
		if(isset($_POST["btnsubmit"])){
			/* lay user va pass */
			$user = $_POST["txtname"];
			$pass = $_POST["txtpass"];

			$sql="CALL login('$user','$pass')";

		if ($result=mysqli_query($conn, $sql )){
  			$rowcount=mysqli_num_rows($result);
				//while($row = mysqli_fetch_assoc($result)){
					if($rowcount == 1){
						print_r($rowcount);
						// dang nhap thanh cong
						// tao phien lam viec truoc khi chuyen trang
						// session_start();
							$_SESSION['user']= $_POST["txtname"];
							$_SESSION['pass']= $_POST["txtpass"];
							header("LOCATION:admin.php");
					}
						?>
							<script type="text/javascript"> alert("đăng nhập thất bại, kiểm tra thông tin bạn nhập")</script>
						<?php
					
			}	
		}
	 ?>
 

	<div id="container">
		<form method="POST">
			<table>
				<tr><th colspan="2"> ĐĂNG NHẬP Gr3atCode</th></tr>
				<tr><td>User: </td>
					<td><input type="text" name="txtname"></td>
				</tr>
				<tr><td>Password: </td>
					<td><input type="password" name="txtpass"></td>
				</tr>
				<tr><th colspan="2"><input type="submit" name="btnsubmit" value="Login"></i></th></tr>


			</table>

		</form>

	</div>
</body>
</html>