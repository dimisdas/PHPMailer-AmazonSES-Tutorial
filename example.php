<?php
require_once('class.phpmailer.php');


$mail = new phpmailer;

// Set mailer to use AmazonSES.
$mail->IsAmazonSES();

//$mail->Debugoutput = 'html';

// Set AWSAccessKeyId and AWSSecretKey provided by amazon.
$mail->AddAmazonSESKey("ENTER YOUR KEY ID", "ENTER YOUR SECRET KEY");


	
	$mail->setFrom('FROM@VERIFIEDDOMAINinAMAZON.com', 'Name of the Sender');
	$mail->addAddress('RECEIPIENTS EMAIL ADDRESS');
	$mail->Subject = 'Set your Subject';
	$html_code = file_get_contents('index.html');
	
	/* // If the Message is important, like an alert. Don't overuse.
	$mail->Priority = 1;
	// MS Outlook custom header
	// May set to "Urgent" or "Highest" rather than "High"
	$mail->AddCustomHeader("X-MSMail-Priority: High");
	// Not sure if Priority will also set the Importance header:
	$mail->AddCustomHeader("Importance: High");
	*/


//echo json_encode($_GET);
$mail->msgHTML($html_code, dirname(__FILE__));

//send the message, check for errors
$mail->send();
/* End of File */
?>