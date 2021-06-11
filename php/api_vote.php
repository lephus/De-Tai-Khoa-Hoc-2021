<?php 
	include "connect.php";
	$arr= array();
	$query = "SELECT * FROM vote";
	$data = mysqli_query($connect, $query);
	while($row = mysqli_fetch_assoc($data)){
		array_push($arr, new vote(
			$row['id'],
			$row['subscribe_yt'],
			$row['member_group'],
			$row['number_post'],
			$row['updated'],
			$row['is_disabled']
		));
	}
	echo json_encode($arr);

	class vote{
		function vote($id, $subscribe_yt, $member_group,$number_post,$updated ,$is_disabled){
			$this->id = $id;
			$this->subscribe_yt = $subscribe_yt;
			$this->member_group = $member_group;
			$this->number_post = $number_post;
			$this->updated = $updated;
			$this->is_disabled = $is_disabled;
		
		}
	}
 ?>