<?php 
	include "connect.php";
	$array_notifi = array();
	$query = "SELECT * FROM notification";
	$data = mysqli_query($connect, $query);
	while($row = mysqli_fetch_assoc($data)){
		array_push($array_notifi, new notifi(
			$row['id'],
			$row['content'],
			$row['updated'],
			$row['is_disabled'],
		));
	}
	echo json_encode($array_notifi);

	class notifi{
		function notifi($id, $content, $updated, $is_disabled){
			$this->id = $id;
			$this->content = $content;
			$this->updated = $updated;
			$this->is_disabled = $is_disabled;
		}
	}
 ?>