<?php
$to = 'maxtm1@yandex.ru';
$subject = 'заявка ' . 'Тихонов';
$message = 'Email из формы: ' . '$email' . "\r\n" . 'Телефон: ' . '$phone' . "\r\n";
$headers = 'Content-Type: text/html; charset=utf-8' . "\r\n" . 'From: webmaster@forma-test' . "\r\n" .
    'Reply-To: webmaster@forma-test' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers);