<?php
	header('Content-type: application/json');
	$status=array(
		'type'=>'success',
		'message'=>'Email sent!'
	);
    $name=@trim(stripslashes($_POST['name'])); 
    $email=@trim(stripslashes($_POST['email'])); 
    $phone=@trim(stripslashes($_POST['phone'])); 
    $message=@trim(stripslashes($_POST['message'])); 
    $email_from=$email;
    $email_to='company@domain.com';
    $body='Name: '.$name."\n\n".'Email: '.$email."\n\n".'Telephone: '.$phone."\n\n".'Message: '.$message;
    mail($email_to, 'Contact form', $body, 'From: <'.$email_from.'>');
    echo json_encode($status);
    die;
?>