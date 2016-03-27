<?php
$host  = "https://richmondfrimpong.herokuapp.com/"
$headers =  'MIME-Version: 1.0' . "\r\n";
$headers .= 'From: Your name <info@address.com>' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .='X-Mailer: PHP/' . phpversion();

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
        header("Location: $host");
        //exit;
    }
	else{
		$res['message'] = 'Failed to send mail. Please mail me to you@example.com\n';
        
        	header("Location: $host");
	}
	echo json_encode($res);
?>
