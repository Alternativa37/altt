<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html><head>
<?php header('Content-type: application/json');

	$status = array(

		'type'=>'success',

		'message'=>'Email sent!'

	);



    $name = @trim(stripslashes($_POST['name'])); 

    $email = @trim(stripslashes($_POST['email'])); 

    $subject = @trim(stripslashes($_POST['subject'])); 

    $message = @trim(stripslashes($_POST['message'])); 



    $email_from = $email;

    $email_to = 'altt@inbox.ru';



    $body = 'Name: ' . $name . "\n\n" . 'Email: ' . $email . "\n\n" . 'Subject: ' . $subject . "\n\n" . 'Message: ' . $message;



    $success = @mail($email_to, $subject, $body, 'From: <'.$email_from.'>');



    echo json_encode($status);

    di?>
</head><body>
<br>

<br>

</body></html>