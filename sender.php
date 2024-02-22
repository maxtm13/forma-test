<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300..800&display=swap" rel="stylesheet">
    <title>Document</title>
</head>
<body>

    <?
        $email = htmlspecialchars($_POST['email']);
        $phone = htmlspecialchars($_POST['phone']);
        //amoCRM integration
        require_once 'amocrm.php';
        
        //Email sender

        $to = 'order@salesgenerator.pro, maxtm1@yandex.ru';
        $subject = 'заявка ' . 'Тихонов';
        $message = 'Email из формы: ' . $email . "\r\n" . 'Телефон: ' . $phone . "\r\n";
        $headers = 'Content-Type: text/html; charset=utf-8' . 'From: webmaster@forma-test' . "\r\n" .
            'Reply-To: webmaster@forma-test' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
    ?>
     <div class="content sender">
        <?
        if (mail($to, $subject, $message, $headers)) {?>
            <h2 class="title success">Ваше сообщение отправленно!</h2>
        <? }
        else {  ?>
            <h2 class="title warning">Сообщение не отправленно, попробуйте позже</h2>
        <? } ?>
        <a href="/" class="back">ОК</a>
    </div>
</body>
</html>