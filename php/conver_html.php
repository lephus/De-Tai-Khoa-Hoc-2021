<?php
	function convert_html($str) {
		trim($str);
		$str = str_replace("_txt_", "<div class='txt'>", $str);
		$str = str_replace("_txtend_", "</div>", $str);
		$str = str_replace("_img_", "<img src=", $str);
		$str = str_replace("_imgend_", "</img>", $str);
		
		$str = str_replace("_youtube_", "<iframe width='560' height='315' 
			 frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture' allowfullscreen src='https://www.youtube.com/embed/'			
			", $str);
		$str = str_replace("_youtubeend_", "</iframe>", $str);

		$str = str_replace("_sup_", "<div class='title_detail'>", $str);
		$str = str_replace("_supend_", "", $str);

		$str = str_replace("_link_", "<div id='link_detail><a href=", $str);
		$str = str_replace("_linkend_", "", $str);

		echo urldecode($str);
		return $str;
	}
?>