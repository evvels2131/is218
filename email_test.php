<?php

$to = 'tgoralczyk1@gmail.com';

$subject = 'This is a test email';

$header = 'From: Tomasz <tg77@njit.edu>';

$message = 'Your confirmation link <br />';
$message .= '<Click on this link to activate your account. <br/>';

$sentmail = mail($to, $subject, $message, $header);

if ($sendemail)
{
  echo '<br />Email was sent';
} else {
  echo '<br />Email was not sent';
}


?>
