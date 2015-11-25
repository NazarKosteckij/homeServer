<?php
 class NotificationService{

	function sendNotification($text){
		$text = str_replace("%20", " ", $text);
		file_get_contents("http://192.168.1.5:8080/api/notifications?email=silver_925@ukr.net&message=$text");
	}


 }
?>
