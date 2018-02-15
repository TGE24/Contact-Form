<html>
	<head>
		<title>Portfolio</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="style.css" />
		<link rel="stylesheet" type="text/css" href="newbootstrap.css">
		<link href="https://fonts.googleapis.com/css?family=Playfair+Display" rel="stylesheet">
	</head>
<body>
  	<div class="container ">
<div class="jumbotron">
  <h1>Contact Me</h1> 
  <h2>I Would love To Hear From You</h2>
</div>	


	<div class="form">
  	<?php
if (isset($_POST['contact_name']) && isset($_POST['contact_email']) && isset($_POST['contact_subject']) && isset($_POST['contact_text'])) {
	$contact_name = $_POST['contact_name'];
	$contact_email = $_POST['contact_email'];
	$contact_text = $_POST['contact_text'];
	$contact_subject = $_POST['contact_subject'];

	if (!empty($contact_subject) && !empty($contact_text) && !empty($contact_name) && !empty($contact_email)) {
	require 'phpmailer.php';
	$mail = new PHPMailer();
	$mail->IsSMTP();
	$mail->Mailer = 'smtp';
	$mail->SMTPAuth = true;
	$mail->Host = 'smtp.gmail.com'; // "ssl://smtp.gmail.com" didn't worked
	//$mail->Port = 465;
	//$mail->SMTPSecure = 'ssl';
	// or try these settings (worked on XAMPP and WAMP):
	$mail->Port = 587;
	$mail->SMTPSecure = 'tls';
	 
	 
	$mail->Username = "thankgodegbo@gmail.com";
	$mail->Password = "1some2thing";
	 
	$mail->IsHTML(true); // if you are going to send HTML formatted emails
	$mail->SingleTo = true; // if you want to send a same email to multiple users. multiple emails will be sent one-by-one.
	 
	$mail->From = $contact_email;
	$mail->FromName = $contact_name;
	 
	$mail->addAddress("egbo.thankgod@yahoo.com",$contact_name);
	//$mail->addAddress("egbo.thankgod@yahoo.com","User 2");
	 
	//$mail->addCC($contact_email,"User 3");
	//$mail->addBCC($contact_email,"User 4");
	 
	$mail->Subject = $contact_subject;
	$mail->Body = $contact_name."<br><br>".$contact_email."<br><br>".$contact_text;
	 
	if(!$mail->Send())
	    echo "Message was not sent <br />PHPMailer Error: " . $mail->ErrorInfo;
	else
	    echo "Message has been sent";
		} else {
			echo "All Fields Are Required.";
		}
}

?>
<form action="index.php" method="POST">
		Name:<br><input type="text" name="contact_name" style="width : 41%;"><br><br>
		Email:<br><input type="text" name="contact_email" style="width : 41%;"><br><br>	
		Subject:<br>
		<textarea name="contact_subject" rows="2" cols="50"></textarea><br><br>
		Message:<br>
		<textarea name="contact_text" rows="6" cols="70"></textarea><br><br>
		<button type="submit" class="btn btn-primary" value="Send">SEND</button>

</form>
</div>
</div>
	

		