<?php
	require_once("phpmail.php");

	// $email_admin = "yudin.nc@gmail.com";
	$email_admin = "asp.brg@ya.ru";

	$from = "MAIYO";
	$email_from = "robot@.ru";

	$deafult = array("name"=>"Имя","phone"=>"Телефон");

	$fields = array();

	if( count($_POST) ){

		foreach ($deafult  as $key => $value){
			if( isset($_POST[$key]) ){
				$fields[$value] = $_POST[$key];
			}
		}

		$i = 1;
		while( isset($_POST[''.$i]) ){
			$fields[$_POST[$i."-name"]] = $_POST[''.$i];
			$i++;
		}

		$subject = $_POST["subject"];

		$title = "Поступила заявка с MAIYO ".$from.":\n";

		$message = "<div><h3 style=\"color: #333;\">".$title."</h3>";

		foreach ($fields  as $key => $value){
			$message .= "<div><p><b>".$key.": </b>".$value."</p></div>";
		}
			
		$message .= "</div>";

















		
		if(send_mime_mail("Сайт ".$from,$email_from,$name,$email_admin,'UTF-8','UTF-8',$subject,$message,true)){	
			header("Location:./?thx");
		}else{
			echo "Произошла ошибка. Попробуйте заново.";
		}
	}
?>