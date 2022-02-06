<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';

$mail = new PHPMailer(true);
$mail->CharSet = 'UTF-8';
$mail->setLanguage('ru', 'phpmailer/language/');
$mail->IsHTML(true);

//письмо мне
$mail->setFrom("IGOTITEnglish");
$mail->addAddress("lenayork@tut.by");
$mail->Subject = "Заявка на курс";

$body = '<h1>Новая заявка на курс</h1>';

if (trim(!empty($_POST["userName"]))) {
    body.='<p><strong>Имя:</strong>' .$_POST[userName]'</p>';
}

if (trim(!empty($_POST["userEmail"]))) {
    body.='<p><strong>Email:</strong>' .$_POST[userEmail]'</p>';
}

if (trim(!empty($_POST["userMessage"]))) {
    body.='<p><strong>Сообщение:</strong>' .$_POST[userMessage]'</p>';
}

//письмо юзеру
$mail->setFrom("IGOTITEnglish");
$mail->addAddress($_POST[userEmail]);
$mail->Subject = "Заявка на курс";

$body = '<h1>Ваше сообщение отправлено</h1><br/>
<p>Благодарим за интерес к проекту IGOTITEnglish. Как только администратор прочтет ваще сообщение, вы получите ответ.</p>
<br/>
<p>С уважением,</p>
<p>IGOTITEnglish</p>';

$mail->Body = $body;

if (!mail->send()) {
    $message = 'Ошибка';
} else {
    $message = 'Данные отправлены';
}

$response = ['message' => $message];

header('Content-type: application/json');
echo json_encode($response);

?>