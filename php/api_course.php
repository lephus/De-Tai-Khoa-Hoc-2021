<?php

	include "connect.php";
	$array = array();
	$query = "SELECT * FROM course";
	$data = mysqli_query($connect, $query);
	while($row = mysqli_fetch_assoc($data)){
		array_push($array, new notifi(
			$row['id'],
			$row['title'],
			$row['author'],
			$row['thumbnail'],
			$row['overview'],
			$row['link'],
			$row['updated'],
			$row['is_disabled']
		));
	}
	echo json_encode($array);

	class notifi{
		function notifi($id, $title, $author,$thumbnail,$overview,$link,$updated ,$is_disabled){
			$this->id = $id;
			$this->title = $title;
			$this->author = $author;
			$this->thumbnail = $thumbnail;
			$this->overview1 = $overview;
			$this->link = $link;
			$this->updated = $updated;
			$this->is_disabled = $is_disabled;
		
		}
	}
 ?>