<?php
	include "connect.php";
	$array = array();
	$query = "SELECT * FROM contribution";
	$data = mysqli_query($connect, $query);
	while($row = mysqli_fetch_assoc($data)){
		array_push($array, new notifi(
			$row['id'],
			$row['name'],
			$row['sex'],
			$row['email'],
			$row['content'],
			$row['updated'],
			$row['is_disabled']
			
		));
	}
	echo json_encode($array);

	class notifi{
		function notifi($id, $name,$sex , $email,$content,$updated,$is_disabled){
			$this->id = $id;
			$this->name = $name;
			$this->sex = $sex;
			$this->email = $email;
			$this->content = $content;
			$this->updated = $updated;
			$this->is_disabled = $is_disabled;
		
		}
	}
 ?>