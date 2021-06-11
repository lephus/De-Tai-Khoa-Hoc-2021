<?php

	//$url = "http://localhost:8080/api-gr3atcode/course/GetALLData?p=2";
	
	//$url = "http://localhost:8080/api-gr3atcode/course/Course_getDetail?action=getDetail&table=course&link=this-is-course-title-f5HFD7638f_";
        
	//$url = "http://localhost:8080/api-gr3atcode/project/Project_getDetail?action=getDetail&table=project&link=https://gr3atcode.com/detail-post.php/this-is-project-title-f5HFD76767";
	//$url = "http://localhost:8080/api-gr3atcode/hottrend/Hottrend_getDetail?action=getDetail&table=hottrend&link=https://gr3atcode.com/detail-post.php/this-is-hottrend-title-f5Hdfsdf";
	//$url = "http://localhost:8080/api-gr3atcode/funny/Funny_getDetail?action=getDetail&table=funny&link=https://gr3atcode.com/detail-post.php/this-is-funny-title-f5Hdfsdf";
	
	//$url = "http://localhost:8080/api-gr3atcode/common/ALL_getData?action=getDetail&table=course&link=this-is-course-title-f5HFD7638f";
	//this-is-hottrend-title-f5Hdfsdf
	//$url = "http://localhost:8080/api-gr3atcode/common/ALL_getData?action=getDetail&table=hottrend&link=this-is-hottrend-title-f5Hdfsdf";
	
	$url = "http://localhost:8080/api-gr3atcode/common/ALL_getData?action=getDetail&table=course&link=this-is-course-title-f5HFD7638f";
	$ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL,$url);
	//curl_setopt($ch, CURLOPT_VERBOSE, true);

	//echo ($ch); echo ("<br>");
        $json = curl_exec($ch);
        echo ($json);
	curl_close($ch);
	//$arr = json_decode($json, true);
        //$leng = count($arr);echo $leng;
?>
