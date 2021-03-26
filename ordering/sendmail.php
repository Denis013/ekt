<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';

$mail = new PHPMailer(true);
$mail -> CharSet= 'UTF-8';
$mail -> setLanguage('ru','phpmailer/language/');
$mail ->isHTML(true);

//from whom
$mail->setFrom('ektshopua@gmail.com','Інтренет магазин EKT');
//for whom
$mail->addAddress('denis04gl@gmail.com');
//subject
$mail->Subject='Ваше замовлення прийняте';

////letter's body
$body='<h1>Вітаємо!</h1>';

if (trim(!empty($_POST['firstName']))) {
	$body.='<p><strong>Імя:</strong> ' .$_POST['firstName'].'</p>';
}
if (trim(!empty($_POST['lastName']))) {
	$body.='<p><strong>Прізвище:</strong> ' .$_POST['lastName'].'</p>';
}
if (trim(!empty($_POST['email']))) {
	$body.='<p><strong>E-mail:</strong> ' .$_POST['email'].'</p>';
}
if (trim(!empty($_POST['delivery']))) {
	$body.='<p><strong>Доставка:</strong> ' .$_POST['delivery'].'</p>';
}
if (trim(!empty($_POST['phoneNumber']))) {
	$body.='<p><strong>Номер телефона:</strong> ' .$_POST['phoneNumber'].'</p>';
}
if (trim(!empty($_POST['city']))) {
	$body.='<p><strong>Місто:</strong> ' .$_POST['city'].'</p>';
}
if (trim(!empty($_POST['numberDepartment']))) {
	$body.='<p><strong>Номер відділення:</strong> '.$_POST['numberDepartment'].'</p>';
}
if (trim(!empty($_POST['paying']))) {
	$body.='<p><strong>Оплата:</strong> ' .$_POST['paying'].'</p>';
}
if (trim(!empty($_POST['message']))) {
	$body.='<p><strong>Коментар</strong> ' .$_POST['message'].'</p>';
}
  $body.='<p><strong>Замовлення:</strong> ' .$_POST['localStorage'].'</p>';
  $body.='<p><strong>Телефонувати</strong> ' .$_POST['call'].'</p>';



$mail->Body = $body;

if (!$mail->send()) {
	$message='Помилка';
} else{
	$message='Замовлення оформлене!';

}
$response=['message'=>$message];
header('Content-type: application/json');
echo json_encode($response);
?>