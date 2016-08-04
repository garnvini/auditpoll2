<?php
#call class PHPMailer
include ("class.phpmailer.php");

header('Content-Type: text/html; charset=utf-8');

#variable
$to_name		="Bussarin Chomprom";
$to_email		="sync747@hotmail.com";
$from_name		="=?UTF-8?B?".base64_encode("สำนักตรวจสอบ การประปาส่วนภูมิภาค")."?=";
$email_user_send	="pwaaudit@gmail.com";
$email_pass_send	="pwamail2557";
$subject		="=?UTF-8?B?".base64_encode("แจ้งเรียนเชิญเข้าทำแบบประเมินการปฏิบัติงานของผู้ตรวจสอบ")."?=";
include ("mail_template.php");
#function sendmail
function pwa_sendmail($to_name,$to_email,$from_name,$email_user_send,$email_pass_send,$subject,$body_html,$body_text) {

$mail = new PHPMailer();
$mail -> From     = $email_user_send;
$mail -> FromName = $from_name;

$mail -> AddAddress($to_email,$to_name);
$mail -> Subject	= $subject;
$mail -> Body		= $body_html;
$mail -> AltBody	= $body_text;
$mail -> IsHTML (true);
$mail->CharSet = 'UTF-8';
$mail->IsSMTP();
$mail->Host = 'ssl://smtp.gmail.com';
$mail->Port = 465;
$mail->SMTPAuth		= true;
//$mail->SMTPDebug	= true;
$mail->Username = $email_user_send;
$mail->Password = $email_pass_send;

$mail->Send();
$mail->ClearAddresses();


}

pwa_sendmail($to_name,$to_email,$from_name,$email_user_send,$email_pass_send,$subject,$body_html,$body_text);

?>