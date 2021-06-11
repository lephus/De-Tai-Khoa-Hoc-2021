<?php

	//$url = "http://localhost:8080/api-gr3atcode/course/GetALLData?p=2";
	$url = "http://localhost:8080/api-gr3atcode/course/Course_getData?action=getCondition&table=course&start=0&p_id=1";
        
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
