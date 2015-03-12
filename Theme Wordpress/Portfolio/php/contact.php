<?php
define ("MAIL", "tommycornilleau@gmail.com");

$state = false;


if( $_POST['robot1'] == "false" && $_POST['robot2'] == "true"){
	$state=true;
}

$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];


if(isset($name) && isset( $email) && isset( $message) && $state==true){
	
	$content='<html>';
	$content.='<body>';
	$content.='Quelqu\'un me contacte via le portfolio!<br /><br /><br />';
	$content.='Nom:<br />'.$name.'<br /><br />';
	$content.='Email:<br />'.$email.'<br /><br />';
	$content.='Message:<br />'.$message;
	$content.='</body>';
	$content.='</html>';
	
	$headers ='From: "Contact Portfolio"<'.$email.'>'."\n";
    $headers .='MIME-Version: 1.0' . "\r\n"; 
    $headers .='Content-type: text/html; charset=iso-8859-1' . "\r\n";
	
    mail(MAIL, 'Contact Portfolio', $content, $headers); 
		
	echo 'true';
}
else{
	echo 'false';
}



?>