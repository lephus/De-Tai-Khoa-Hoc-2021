<?php 
	include "connect.php";
	$arr= array();
	$query = "SELECT * FROM project";
	$data = mysqli_query($connect, $query);
	while($row = mysqli_fetch_assoc($data)){
		array_push($arr, new project(
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
	echo json_encode($arr);
	

	class project{
		function project($id, $title, $author,$thumbnail, $overview , $link,$updated ,$is_disabled){
			$this->id = $id;
			$this->title = $title;
			$this->author = $author;
			$this->thumbnail = $thumbnail;
			$this->overview = $overview;
			$this->link = $link;
			$this->updated = $updated;
			$this->is_disabled = $is_disabled;
		
		}
	}
 ?>