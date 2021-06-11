<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Quản Lý Gr3atCode</title>
	<style type="text/css">
		*{
			text-align: center;
			margin: 0px;
			padding:0px;
		}
		h3{
			color: blue		}
		#container{
			width: auto;
			margin: auto;
		}
		#menu{
			margin-bottom:150px;
			text-align: center;
			font-size: 25px;
			padding-bottom: 20px;
		}
		#space{
			color: red;
			height: 10px; 
			margin: 50px;
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
		
	</style>
</head>
<body>
	<?php 
		if(isset($_SESSION['user']) && isset($_SESSION['pass'])){
		}else{ 
			header("LOCATION:index.php");
		};?>
	<div id="container">
		<div id="menu">
			<div id="btLogout"><a style="color: green;" href="out.php"  
				>LogOut</a></div>
				<ul>
					<li><a href="edit_notification.php">Notification</a></li>
					<li><a href="edit_hottrend.php">HotTrend</a></li>
					<li><a href="edit_hottrend_detail.php">HotTrend Detail</a></li>
					<li><a href="edit_course.php">Course</a></li>
					<li><a href="edit_course_detail.php">Course Detail</a></li>
					<li><a href="edit_user.php">User</a></li>
					<li><a href="edit_user_contribution.php">User_Contribute</a></li>
					<li><a href="edit_contribution.php">Contribution</a></li>
					<li><a href="edit_project.php">Project</a></li>
					<li><a href="edit_project_detail.php">Project Detail</a></li>
					<li><a href="edit_vote.php">Vote</a></li>
					<li><a href="edit_funny.php">Funny</a></li>
					<li><a href="edit_funny_detail.php">Funny Detail</a></li>
					<li><a href="edit_role.php">Role</a></li>
					<li><a href="edit_comment.php">Comment</a></li>
					<li><a href="edit_type_comment.php">Type Comment</a></li>
				</ul>
		</div>
	</div>
</body>
</html>