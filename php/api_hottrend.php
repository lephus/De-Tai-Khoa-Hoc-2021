<?php 
	include "connect.php";
	$array_notifi = array();
	$query = "SELECT * FROM hottrend";
	$data = mysqli_query($connect, $query);
	while($row = mysqli_fetch_assoc($data)){
		array_push($array_notifi, new notifi(
			$row['id'],
			$row['title'],
			$row['short_desc'],
			$row['thumbnail'],
			$row['link'],
			$row['updated'],
			$row['is_disabled']
		));
	}
	echo json_encode($array_notifi);

	class notifi{
		function notifi($id, $title, $short_desc,$thumbnail, $link,$updated ,$is_disabled){
			$this->id = $id;
			$this->title = $title;
			$this->short_desc = $short_desc;
			$this->thumbnail = $thumbnail;
			$this->link = $link;
			$this->updated = $updated;
			$this->is_disabled = $is_disabled;
		
		}
	}
 ?>