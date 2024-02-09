<?php
	
	/*
		The Send Mail php Script for Contact Form
		Server-side data validation is also added for good data validation.
	*/
	
	$data['error'] = false;
	
	$name = $_POST['name'];
	$email = $_POST['email'];
	$subject = $_POST['subject'];
	$message = $_POST['message'];
	
	if( empty($name) ){
		$data['error'] = 'Por favor introduce tu nombre/empresa.';
	}else if(filter_var($email, FILTER_VALIDATE_EMAIL) == false){
		$data['error'] = 'Por favor debe de ser un email valido.';
	}else if( empty($subject) ){
		$data['error'] = 'Por favor introduce un motivo.';
	}else if( empty($message) ){
		$data['error'] = 'Tu mensaje es obigatorio!';
	}else{
		
		$formcontent="From: $name\nSubject: $subject\nEmail: $email\nMessage: $message";
		
		
		//Place your Email Here
		$recipient = "danalozano0612@gmail.com";
		
		$mailheader = "From: $email \r\n";
		
		if( mail($recipient, $name, $formcontent, $mailheader) == false ){
			$data['error'] = 'Lo siento, a ocurrido un error!';
		}else{
			$data['error'] = false;
		}
	
	}
	
	echo json_encode($data);
	
?>