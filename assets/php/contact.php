<?php
function debug_to_console($data) {
    if(is_array($data) || is_object($data))
	{
		echo("<script>console.log('PHP: ".json_encode($data)."')</script>");
	} else {
		echo("<script>console.log('PHP: ".$data."')</script>");
	}
}
	
$headers =  'MIME-Version: 1.0 \n';
$headers .= 'From: Your name <rboy879@gmail.com> \n';
$headers .= 'Content-type: text/html; charset=iso-8859-1 \n';
$headers .='X-Mailer: PHP/' . phpversion();
debug_to_console($headers);
if($_GET['c_name'] || $_GET['c_email'] || $_GET['c_message']){
	$name = $_GET['c_name'];
	$email = $_GET['c_email'];
	$message = $_GET['c_message'];
}
	$to      = 'rboy879@gmail.com';
	$subject = 'Site Contact Form';
    $message = str_replace("\n.", "\n..", $message);
    $message .= "\r\n Sender\t";
    $message .= $email;
    $status = mail($to, $subject, $message , $headers);
	if($status == TRUE){	
		$res['sendstatus'] = 'DONE';
		//Edit your message here
		$res['message'] = 'I WILL CONTACT YOU SOON GOOD BYE . . . . ';
	        header('Refresh: 4; URL=https://richmondfrimpong.herokuapp.com/');
        //exit;
    }
	else{
		$res['message'] = 'Failed to send mail. Please mail me at richee305@yahoo.com\n';
		header('Refresh: 30; URL=https://richmondfrimpong.herokuapp.com/');
        	//header("Location: https://richmondfrimpong.herokuapp.com/");
	}
	echo json_encode($res);
?>
