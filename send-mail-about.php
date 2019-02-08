<?php
require_once "Mail.php";
$from = $_POST['email'];
$to = "info@nikajankovic.com";
$subject = "Website contact";
$body = 'Name: ' . $_POST['name'] . "\r\n\r\n";
$body .= 'Email: ' . $_POST['email'] . "\r\n\r\n";
$body .= 'Message: ' . $_POST['message'] . "\r\n\r\n";
$host = "mail.nikajankovic.com";
$username = "info@nikajankovic.com";
$password = "nih6g5f4d3s2a1ka";
$headers = array ('From' => $from,
  'To' => $to,
  'Subject' => $subject);
$smtp = Mail::factory('smtp',
  array ('host' => $host,
    'auth' => true,
    'username' => $username,
    'password' => $password));
$mail = $smtp->send($to, $headers, $body);
if (PEAR::isError($mail)) {
  echo("<p>" . $mail->getMessage() . "<br>There was an error with sending your message. Please try again or send an email directly to info@nikajankovic.com while we take care of this.</p>");
 } else {
  echo("<br> <br> <center><p>Your message is sent! We will get back to you soon. <br> <a href='https://nikajankovic.com/about.html'>Back to site</a>  </p><center>");
 }
?>
