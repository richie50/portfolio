<?php
function debug_to_console($data) {
    if(is_array($data) || is_object($data))
	{
		echo("<script>console.log('PHP: ".json_encode($data)."');</script>");
	} else {
		echo("<script>console.log('PHP: ".$data."');</script>");
	}
	debug_to_console("Hello World");
$headers =  'MIME-Version: 1.0 \n';
$headers .= 'From: Your name <info@address.com> \n';
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
		$res['sendstatus'] = 'done';
		//Edit your message here
		$res['message'] = 'Form Submission Successful';
        //$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
        //$extra = 'index.php';
        //echo $uri."/".$extra; 
        //header("Location: http://$host$uri/$extra");
        header("Location: https://richmondfrimpong.herokuapp.com/");
        //exit;
    }
	else{
		$res['message'] = 'Failed to send mail. Please mail me to you@example.com\n';
        
        	header("Location: https://richmondfrimpong.herokuapp.com/");
	}
	echo json_encode($res);
}
?>
